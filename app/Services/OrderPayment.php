<?php

namespace App\Services;

use App\Mail\OrderPaid;
use App\Models\Order;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Throwable;

class OrderPayment
{
    public function __construct(private Ipaymu $ipaymu)
    {
    }

    public function enabled(): bool
    {
        return $this->ipaymu->isConfigured();
    }

    /**
     * Link pembayaran iPaymu untuk pesanan: pakai yang masih berlaku, atau buat baru.
     */
    public function linkFor(Order $order): string
    {
        if ($order->hasActivePaymentLink()) {
            return $order->payment_url;
        }

        $hours = (int) config('services.ipaymu.expiry_hours', 24);
        $statusUrl = $order->statusUrl();

        $payment = $this->ipaymu->createPayment(
            $order->code,
            $this->items($order),
            [
                'name' => $order->customer_name,
                'email' => $order->customer_email,
                'phone' => $order->customer_whatsapp,
            ],
            [
                'return' => $statusUrl,
                'cancel' => $statusUrl,
                'notify' => route('payments.ipaymu.notify'),
            ],
            $hours,
        );

        $order->update([
            'status' => Order::STATUS_AWAITING_PAYMENT,
            'payment_url' => $payment['url'],
            'payment_session_id' => $payment['session_id'],
            'payment_expires_at' => now()->addHours($hours),
        ]);

        return $payment['url'];
    }

    /**
     * Cocokkan status pesanan dengan data transaksi langsung dari iPaymu.
     * Data dari notifikasi atau URL kembali tidak dipercaya begitu saja.
     */
    public function sync(Order $order, string $transactionId): Order
    {
        if ($order->isPaid()) {
            return $order;
        }

        $transaction = $this->ipaymu->checkTransaction($transactionId);

        if (($transaction['ReferenceId'] ?? null) !== $order->code) {
            Log::warning('Transaksi iPaymu tidak cocok dengan pesanan.', [
                'order' => $order->code,
                'transaction' => $transactionId,
                'reference' => $transaction['ReferenceId'] ?? null,
            ]);

            return $order;
        }

        $status = (int) ($transaction['Status'] ?? 0);

        if (in_array($status, Ipaymu::PAID_STATUSES, true)) {
            $amount = (int) ($transaction['Amount'] ?? $transaction['Total'] ?? $order->total);

            if ($amount < $order->total) {
                Log::warning('Nominal transaksi iPaymu kurang dari total pesanan.', [
                    'order' => $order->code,
                    'transaction' => $transactionId,
                    'amount' => $amount,
                ]);

                return $order;
            }

            $order->update([
                'status' => Order::STATUS_PAID,
                'paid_at' => now(),
                'payment_trx_id' => $transactionId,
                'payment_channel' => collect([$transaction['PaymentMethod'] ?? null, $transaction['PaymentChannel'] ?? null])
                    ->filter()->unique()->implode(' ') ?: null,
            ]);

            try {
                Mail::to(config('layanan.admin_email'))->send(new OrderPaid($order));
            } catch (Throwable $e) {
                report($e);
            }
        } elseif ($status === Ipaymu::EXPIRED_STATUS) {
            $order->update([
                'status' => Order::STATUS_EXPIRED,
                'payment_trx_id' => $transactionId,
                'payment_url' => null,
            ]);
        } else {
            $order->update(['payment_trx_id' => $transactionId]);
        }

        return $order;
    }

    /**
     * @return array<int, array{name: string, price: int, qty: int, description: string}>
     */
    private function items(Order $order): array
    {
        $product = config("layanan.products.{$order->product}", []);

        // Rincian harga (mis. server + domain) ikut ditampilkan di halaman iPaymu
        // selama jumlahnya sama dengan total pesanan.
        $breakdown = $product['breakdown'] ?? [];
        if ($breakdown && array_sum(array_column($breakdown, 'amount')) * $order->quantity === $order->total) {
            return array_map(fn ($line) => [
                'name' => "{$order->product_name} - {$line['label']}",
                'price' => $line['amount'],
                'qty' => $order->quantity,
                'description' => "{$order->code} {$line['label']}",
            ], $breakdown);
        }

        return [[
            'name' => $order->product_name,
            'price' => (int) $order->unit_price,
            'qty' => $order->quantity,
            'description' => "{$order->code} {$order->product_name}",
        ]];
    }
}
