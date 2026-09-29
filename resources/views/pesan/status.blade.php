@extends('layouts.simple')

@php
    use App\Models\Order;
    use App\Support\Rupiah;

    $whatsapp = preg_replace('/\D+/', '', (string) config('layanan.whatsapp'));
    $message = "Halo Bali Santih, saya {$order->customer_name} dengan pesanan {$order->code} ({$order->product_name}). Mohon info langkah selanjutnya.";
    $canPayOnline = $paymentEnabled && $order->isPayable();

    [$eyebrow, $heading] = match (true) {
        $order->isPaid() => ['Suksma, pembayaran sudah kami terima', 'Pesanan Anda segera kami proses'],
        $order->status === Order::STATUS_EXPIRED => ['Pesanan '.$order->code, 'Waktu pembayaran sudah habis'],
        $order->status === Order::STATUS_AWAITING_QUOTE => ['Suksma, pesanan sudah kami terima', 'Brief Anda sedang kami pelajari'],
        $canPayOnline => ['Suksma, pesanan sudah kami terima', 'Selesaikan pembayaran Anda'],
        default => ['Suksma, pesanan sudah kami terima', 'Tagihan segera kami kirimkan'],
    };

    $badge = match ($order->status) {
        Order::STATUS_PAID => 'bg-[#e6eee3] text-[#29452f]',
        Order::STATUS_EXPIRED => 'bg-[#fbefec] text-[#8c3a2d]',
        default => 'bg-[#f4ead4] text-[#725b2d]',
    };
@endphp

@section('title', $order->isPaid() ? 'Pembayaran Diterima' : 'Pesanan '.$order->code)

@section('content')
    <main class="mx-auto max-w-3xl px-5 py-12 sm:py-16">
        <div class="grid h-14 w-14 place-items-center rounded-full {{ $order->status === Order::STATUS_EXPIRED ? 'bg-[#fbefec] text-[#8c3a2d]' : 'bg-[#e6eee3] text-[#29452f]' }}">
            @if ($order->status === Order::STATUS_EXPIRED)
                <svg class="h-7 w-7" viewBox="0 0 24 24" fill="none" aria-hidden="true">
                    <path d="M12 7v5l3 2m6-2a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
            @else
                <svg class="h-7 w-7" viewBox="0 0 24 24" fill="none" aria-hidden="true">
                    <path d="m5 12 4 4L19 6" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
            @endif
        </div>
        <p class="mt-6 text-sm font-semibold uppercase text-[#8a6a2e]">{{ $eyebrow }}</p>
        <h1 class="mt-3 text-3xl font-semibold leading-tight sm:text-4xl">{{ $heading }}</h1>
        <p class="mt-4 text-lg leading-8 text-[#5f574d]">
            @if ($order->isPaid())
                Pembayaran Anda sudah terkonfirmasi. Tim Bali Santih akan memproses layanan dan mengabari Anda melalui WhatsApp atau email pada jam layanan.
            @elseif ($order->status === Order::STATUS_EXPIRED)
                Tautan pembayaran sebelumnya sudah tidak berlaku. Anda dapat membuat tautan pembayaran baru untuk pesanan yang sama.
            @elseif ($order->status === Order::STATUS_AWAITING_QUOTE)
                Tim Bali Santih akan menghubungi Anda melalui WhatsApp atau email untuk konsultasi dan penawaran harga final. Setelah harga disepakati, tautan pembayaran kami kirimkan. Belum ada pembayaran yang perlu dilakukan.
            @elseif ($canPayOnline)
                Pembayaran diproses aman melalui iPaymu. Anda dapat memilih Virtual Account bank, QRIS, atau pembayaran di gerai retail. Tautan pembayaran berlaku 24 jam.
            @else
                Tim Bali Santih akan mengirim tagihan resmi beserta instruksi pembayaran ke WhatsApp atau email Anda pada jam layanan.
            @endif
        </p>

        @if (session('payment_error'))
            <div class="mt-6 rounded-[8px] border border-[#e7c3bb] bg-[#fbefec] px-4 py-3 text-sm leading-6 text-[#8c3a2d]" role="alert">
                Halaman pembayaran belum dapat dibuka. Pesanan Anda tetap tersimpan; silakan coba lagi beberapa saat, atau hubungi kami.
            </div>
        @endif

        @if ($canPayOnline)
            <form method="POST" action="{{ route('orders.pay', ['order' => $order, 'token' => $order->access_token]) }}" class="mt-8">
                @csrf
                <button type="submit" class="inline-flex w-full items-center justify-center gap-2 rounded-full bg-[#d7b46a] px-6 py-3.5 text-sm font-semibold text-[#17130f] transition hover:-translate-y-0.5 hover:bg-[#efcf82] sm:w-auto">
                    {{ $order->status === Order::STATUS_EXPIRED ? 'Buat Tautan Pembayaran Baru' : 'Bayar Sekarang '.Rupiah::format($order->total) }}
                    <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" aria-hidden="true">
                        <path d="M5 12h14m-6-6 6 6-6 6" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                </button>
                @if ($order->hasActivePaymentLink())
                    <p class="mt-3 text-sm text-[#6f6558]">
                        Bayar sebelum {{ $order->payment_expires_at->timezone('Asia/Makassar')->locale('id')->translatedFormat('j F Y, H.i') }} WITA.
                        Sudah membayar? Status diperbarui otomatis, muat ulang halaman ini dalam beberapa menit.
                    </p>
                @endif
            </form>
        @endif

        <div class="mt-10 overflow-hidden rounded-[8px] border border-[#e4dac7] bg-white">
            <div class="flex flex-col gap-1 border-b border-[#eee5d6] bg-[#faf8f3] p-6 sm:flex-row sm:items-center sm:justify-between">
                <div>
                    <p class="text-xs font-semibold uppercase text-[#8a6a2e]">Kode pesanan</p>
                    <p class="mt-1 font-mono text-2xl font-semibold tracking-wide text-[#1f1b16]">{{ $order->code }}</p>
                </div>
                <span class="mt-3 inline-flex self-start rounded-full px-3 py-1.5 text-xs font-semibold sm:mt-0 sm:self-auto {{ $badge }}">{{ $order->statusLabel() }}</span>
            </div>
            <dl class="divide-y divide-[#eee5d6] text-sm">
                <div class="grid gap-1 px-6 py-4 sm:grid-cols-[180px_1fr]">
                    <dt class="text-[#6f6558]">Layanan</dt>
                    <dd class="font-medium text-[#1f1b16]">{{ $order->product_name }}{{ $order->quantity > 1 ? ' × '.$order->quantity : '' }}</dd>
                </div>
                <div class="grid gap-1 px-6 py-4 sm:grid-cols-[180px_1fr]">
                    <dt class="text-[#6f6558]">{{ $order->total === null ? 'Kisaran harga' : 'Total' }}</dt>
                    <dd class="font-semibold text-[#29452f]">
                        {{ $order->total === null && $product ? Rupiah::forProduct($product) : Rupiah::format((int) $order->total) }}
                        @if ($order->total !== null && ! $order->isQuote() && ! empty($product['unit']) && empty($product['max_quantity']))
                            <span class="font-normal text-[#8b8175]">{{ $product['unit'] }}</span>
                        @endif
                    </dd>
                </div>
                @if ($order->isPaid())
                    <div class="grid gap-1 px-6 py-4 sm:grid-cols-[180px_1fr]">
                        <dt class="text-[#6f6558]">Dibayar</dt>
                        <dd class="text-[#1f1b16]">
                            {{ $order->paid_at->timezone('Asia/Makassar')->locale('id')->translatedFormat('j F Y, H.i') }} WITA{{ $order->payment_channel ? ' · '.$order->payment_channel : '' }}
                        </dd>
                    </div>
                @endif
                <div class="grid gap-1 px-6 py-4 sm:grid-cols-[180px_1fr]">
                    <dt class="text-[#6f6558]">Pemesan</dt>
                    <dd class="text-[#1f1b16]">{{ $order->customer_name }} &middot; {{ $order->customer_whatsapp }} &middot; {{ $order->customer_email }}</dd>
                </div>
                @foreach ($order->labeledDetails() as $label => $value)
                    <div class="grid gap-1 px-6 py-4 sm:grid-cols-[180px_1fr]">
                        <dt class="text-[#6f6558]">{{ $label }}</dt>
                        <dd class="whitespace-pre-line text-[#1f1b16]">{{ $value }}</dd>
                    </div>
                @endforeach
            </dl>
        </div>

        <p class="mt-6 text-sm leading-6 text-[#6f6558]">
            Simpan tautan halaman ini untuk melihat status pesanan kapan saja. Bali Santih tidak pernah meminta pembayaran di luar halaman resmi iPaymu atau tagihan resmi dari kami. Jam layanan Senin-Sabtu, 09.00-17.00 WITA.
        </p>

        <div class="mt-8 flex flex-wrap gap-3">
            @if ($whatsapp)
                <a href="https://wa.me/{{ $whatsapp }}?text={{ rawurlencode($message) }}" target="_blank" rel="noopener" class="inline-flex items-center gap-2 rounded-full border border-[#cdbd9f] bg-white px-6 py-3.5 text-sm font-semibold text-[#3d352c] transition hover:border-[#8a6a2e]">
                    Hubungi via WhatsApp
                </a>
            @endif
            <a href="mailto:{{ config('layanan.admin_email') }}?subject={{ rawurlencode('Pesanan '.$order->code) }}&body={{ rawurlencode($message) }}" class="inline-flex items-center gap-2 rounded-full border border-[#cdbd9f] bg-white px-6 py-3.5 text-sm font-semibold text-[#3d352c] transition hover:border-[#8a6a2e]">
                Hubungi via Email
            </a>
            <a href="{{ route('home') }}" class="inline-flex items-center rounded-full border border-[#cdbd9f] bg-white px-6 py-3.5 text-sm font-semibold text-[#3d352c] transition hover:border-[#8a6a2e]">
                Kembali ke Beranda
            </a>
        </div>
    </main>
@endsection
