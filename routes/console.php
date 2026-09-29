<?php

use App\Models\Order;
use App\Services\OrderPayment;
use App\Support\Rupiah;
use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote');

Artisan::command('pesanan:daftar {--limit=20}', function () {
    $orders = Order::latest()->limit((int) $this->option('limit'))->get();

    $this->table(
        ['Kode', 'Waktu (WITA)', 'Layanan', 'Pemesan', 'WhatsApp', 'Total', 'Status'],
        $orders->map(fn (Order $order) => [
            $order->code,
            $order->created_at->timezone('Asia/Makassar')->format('d-m-Y H:i'),
            $order->product_name.($order->quantity > 1 ? " x{$order->quantity}" : ''),
            $order->customer_name,
            $order->customer_whatsapp,
            $order->total ? Rupiah::format($order->total) : 'Penawaran',
            $order->statusLabel(),
        ]),
    );
})->purpose('Tampilkan pesanan layanan terbaru');

Artisan::command('pesanan:tagih {code} {amount?}', function (OrderPayment $payment) {
    $order = Order::where('code', $this->argument('code'))->first();

    if (! $order) {
        $this->error('Pesanan tidak ditemukan.');

        return 1;
    }

    if ($order->isPaid()) {
        $this->error("Pesanan {$order->code} sudah lunas.");

        return 1;
    }

    $amount = $this->argument('amount');

    if ($order->isQuote()) {
        $product = config("layanan.products.{$order->product}");

        if (! is_numeric($amount) || $amount < $product['price_min'] || $amount > $product['price_max']) {
            $this->error('Isi harga final antara '.Rupiah::forProduct($product).', contoh: pesanan:tagih '.$order->code.' 75000');

            return 1;
        }

        $order->update([
            'unit_price' => (int) $amount,
            'total' => (int) $amount * $order->quantity,
            'status' => Order::STATUS_AWAITING_PAYMENT,
            'payment_url' => null,
        ]);
    } elseif ($amount !== null) {
        $this->error('Harga layanan ini sudah pasti; jalankan tanpa nominal.');

        return 1;
    }

    if ($payment->enabled()) {
        $payment->linkFor($order);
    }

    $this->info("Tagihan {$order->code}: ".Rupiah::format($order->total));
    $this->line('Kirim tautan ini ke pemesan ('.$order->customer_whatsapp.'):');
    $this->line($order->statusUrl());

    return 0;
})->purpose('Tetapkan harga final dan buat tagihan iPaymu untuk pesanan');
