<?php

namespace App\Http\Controllers;

use App\Mail\OrderReceived;
use App\Models\Order;
use App\Services\OrderPayment;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\View\View;
use Throwable;

class OrderController extends Controller
{
    public function create(string $product): View
    {
        return view('pesan.create', [
            'slug' => $product,
            'product' => $this->findProduct($product),
        ]);
    }

    public function store(Request $request, string $product, OrderPayment $payment): RedirectResponse
    {
        $item = $this->findProduct($product);

        // Honeypot: kolom tersembunyi ini hanya diisi oleh bot.
        if (filled($request->input('website'))) {
            return redirect()->route('home');
        }

        $request->merge([
            'whatsapp' => preg_replace('/[\s\-().]+/', '', (string) $request->input('whatsapp')),
        ]);

        $validated = $request->validate(
            array_merge([
                'name' => ['required', 'string', 'max:100'],
                'whatsapp' => ['required', 'regex:/^(\+62|62|0)8[0-9]{7,12}$/'],
                'email' => ['required', 'email', 'max:150'],
                'agreement' => ['accepted'],
            ], $this->detailRules($item)),
            $this->messages(),
            $this->attributes($item),
        );

        $quantity = (int) ($validated['quantity'] ?? 1);
        $price = $item['price'] ?? null;

        $order = Order::create([
            'product' => $product,
            'product_name' => $item['name'],
            'pricing' => $item['pricing'],
            'quantity' => $quantity,
            'unit_price' => $price,
            'total' => $price ? $price * $quantity : null,
            'status' => $item['pricing'] === 'quote' ? Order::STATUS_AWAITING_QUOTE : Order::STATUS_AWAITING_PAYMENT,
            'customer_name' => $validated['name'],
            'customer_whatsapp' => $validated['whatsapp'],
            'customer_email' => $validated['email'],
            'details' => collect($validated)->except(['name', 'whatsapp', 'email', 'agreement', 'quantity'])->all(),
        ]);

        try {
            Mail::to(config('layanan.admin_email'))->send(new OrderReceived($order));
        } catch (Throwable $e) {
            report($e);
        }

        if ($order->isPayable() && $payment->enabled()) {
            return $this->redirectToPayment($order, $payment);
        }

        return redirect()->to($order->statusUrl());
    }

    public function show(Request $request, Order $order, string $token, OrderPayment $payment): View
    {
        abort_unless(hash_equals($order->access_token, $token), 404);

        // iPaymu mengembalikan pemesan dengan trx_id di URL. Statusnya dicek ulang
        // langsung ke iPaymu agar halaman ini segera menampilkan status terbaru.
        $transactionId = $request->query('trx_id');
        if (is_string($transactionId) && $transactionId !== '' && ! $order->isPaid() && $payment->enabled()) {
            try {
                $payment->sync($order, $transactionId);
            } catch (Throwable $e) {
                report($e);
            }
        }

        return view('pesan.status', [
            'order' => $order,
            'product' => config("layanan.products.{$order->product}"),
            'paymentEnabled' => $payment->enabled(),
        ]);
    }

    public function pay(Order $order, string $token, OrderPayment $payment): RedirectResponse
    {
        abort_unless(hash_equals($order->access_token, $token), 404);

        if (! $order->isPayable() || ! $payment->enabled()) {
            return redirect()->to($order->statusUrl());
        }

        return $this->redirectToPayment($order, $payment);
    }

    private function redirectToPayment(Order $order, OrderPayment $payment): RedirectResponse
    {
        try {
            return redirect()->away($payment->linkFor($order));
        } catch (Throwable $e) {
            report($e);

            return redirect()->to($order->statusUrl())->with('payment_error', true);
        }
    }

    private function findProduct(string $slug): array
    {
        $product = config("layanan.products.{$slug}");

        abort_if(! $product || $product['pricing'] === 'free', 404);

        return $product;
    }

    private function detailRules(array $product): array
    {
        return match ($product['form']) {
            'banjar' => [
                'banjar_name' => ['required', 'string', 'max:100'],
                'region' => ['required', 'string', 'max:150'],
                'position' => ['nullable', 'string', 'max:60'],
                'domain' => ['nullable', 'string', 'max:100'],
                'notes' => ['nullable', 'string', 'max:1000'],
            ],
            'undangan' => [
                'event_type' => ['required', 'in:Pernikahan,Ulang tahun,Acara lainnya'],
                'event_date' => ['nullable', 'date', 'after_or_equal:today'],
                'theme' => ['required', 'string', 'max:200'],
                'reference' => ['nullable', 'string', 'max:255'],
                'notes' => ['nullable', 'string', 'max:1500'],
            ],
            'revisi' => [
                'quantity' => ['required', 'integer', 'between:1,'.($product['max_quantity'] ?? 10)],
                'invitation_ref' => ['required', 'string', 'max:255'],
                'notes' => ['required', 'string', 'max:1500'],
            ],
        };
    }

    private function messages(): array
    {
        return [
            'required' => ':Attribute wajib diisi.',
            'email' => 'Format email belum benar.',
            'max' => ':Attribute maksimal :max karakter.',
            'in' => 'Pilih salah satu :attribute yang tersedia.',
            'date' => ':Attribute belum valid.',
            'after_or_equal' => ':Attribute tidak boleh sebelum hari ini.',
            'integer' => ':Attribute harus berupa angka.',
            'between' => ':Attribute minimal :min dan maksimal :max.',
            'whatsapp.regex' => 'Gunakan nomor WhatsApp Indonesia, contoh 081234567890.',
            'agreement.accepted' => 'Mohon setujui Syarat & Ketentuan serta kebijakan Refund & Pembatalan.',
        ];
    }

    private function attributes(array $product): array
    {
        return [
            'name' => 'nama lengkap',
            'whatsapp' => 'nomor WhatsApp',
            'email' => 'email',
            'quantity' => 'jumlah revisi',
            'notes' => $product['form'] === 'revisi' ? 'perubahan yang diinginkan' : 'catatan',
        ] + array_map('strtolower', Order::DETAIL_LABELS);
    }
}
