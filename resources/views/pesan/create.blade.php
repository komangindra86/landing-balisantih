@extends('layouts.simple')

@php
    use App\Support\Rupiah;

    $isQuote = $product['pricing'] === 'quote';
    $quantity = max(1, (int) old('quantity', 1));
@endphp

@section('title', ($isQuote ? 'Ajukan Pesanan ' : 'Pesan ').$product['name'])
@section('description', $product['summary'])

@section('content')
    <main class="mx-auto max-w-6xl px-5 py-12 sm:py-16">
        <p class="text-sm font-semibold uppercase text-[#8a6a2e]">{{ $product['application'] }}</p>
        <h1 class="mt-3 text-3xl font-semibold leading-tight sm:text-4xl">
            {{ $isQuote ? 'Ajukan pesanan' : 'Pesan' }} {{ $product['name'] }}
        </h1>
        <p class="mt-4 max-w-2xl text-lg leading-8 text-[#5f574d]">{{ $product['summary'] }}</p>

        <div class="mt-10 grid gap-8 lg:grid-cols-[1fr_360px] lg:items-start">
            <form method="POST" action="{{ route('orders.store', $slug) }}" class="rounded-[8px] border border-[#e4dac7] bg-white p-6 sm:p-8">
                @csrf

                <div class="hidden" aria-hidden="true">
                    <label for="field-website">Website</label>
                    <input id="field-website" type="text" name="website" tabindex="-1" autocomplete="off">
                </div>

                @if ($errors->any())
                    <div class="mb-8 rounded-[8px] border border-[#e7c3bb] bg-[#fbefec] px-4 py-3 text-sm text-[#8c3a2d]" role="alert">
                        Ada data yang perlu diperbaiki. Silakan periksa kembali kolom yang ditandai.
                    </div>
                @endif

                <fieldset>
                    <legend class="text-lg font-semibold">Data pemesan</legend>
                    <p class="mt-1 text-sm text-[#6f6558]">Kami menghubungi Anda melalui WhatsApp atau email ini.</p>
                    <div class="mt-5 grid gap-5 sm:grid-cols-2">
                        <x-field name="name" label="Nama lengkap" required autocomplete="name" class="sm:col-span-2" />
                        <x-field name="whatsapp" label="Nomor WhatsApp" type="tel" required autocomplete="tel" inputmode="tel" placeholder="081234567890" />
                        <x-field name="email" label="Email" type="email" required autocomplete="email" placeholder="nama@email.com" />
                    </div>
                </fieldset>

                <div class="mt-10 border-t border-[#eee5d6] pt-8">
                    <fieldset>
                        @if ($product['form'] === 'banjar')
                            <legend class="text-lg font-semibold">Data banjar</legend>
                            <div class="mt-5 grid gap-5 sm:grid-cols-2">
                                <x-field name="banjar_name" label="Nama banjar" required placeholder="Banjar Adat ..." />
                                <x-field name="position" label="Jabatan di banjar" placeholder="Kelian, penyarikan, petengen, ..." />
                                <x-field name="region" label="Desa / kecamatan / kabupaten" required class="sm:col-span-2" placeholder="Desa Sumerta Kelod, Denpasar Timur, Denpasar" />
                                <x-field name="domain" label="Domain yang diinginkan" class="sm:col-span-2" placeholder="banjarnamaanda.com" hint="Belum punya gambaran? Kosongkan saja, kami bantu carikan nama yang tersedia." />
                                <x-field name="notes" label="Catatan" type="textarea" rows="3" class="sm:col-span-2" placeholder="Jumlah krama, kebutuhan khusus, atau waktu mulai yang diinginkan." />
                            </div>
                        @elseif ($product['form'] === 'undangan')
                            <legend class="text-lg font-semibold">Brief undangan</legend>
                            <div class="mt-5 grid gap-5 sm:grid-cols-2">
                                <x-field name="event_type" label="Jenis acara" type="select" required :options="['Pernikahan', 'Ulang tahun', 'Acara lainnya']" />
                                <x-field name="event_date" label="Tanggal acara" type="date" min="{{ now()->toDateString() }}" />
                                <x-field name="theme" label="Tema dan warna" required class="sm:col-span-2" placeholder="Nuansa Bali klasik, warna emas dan hijau tua" />
                                <x-field name="reference" label="Referensi desain" class="sm:col-span-2" placeholder="Tautan contoh desain, Pinterest, atau Instagram" />
                                <x-field name="notes" label="Cerita dan kebutuhan lainnya" type="textarea" class="sm:col-span-2" placeholder="Konten yang ingin ditampilkan, elemen budaya, musik, atau hal lain yang perlu kami ketahui." />
                            </div>
                        @else
                            <legend class="text-lg font-semibold">Detail revisi</legend>
                            <div class="mt-5 grid gap-5 sm:grid-cols-[160px_1fr]">
                                <x-field name="quantity" label="Jumlah revisi" type="number" required value="1" min="1" max="{{ $product['max_quantity'] }}" data-quantity />
                                <x-field name="invitation_ref" label="Undangan yang direvisi" required placeholder="Kode pesanan atau tautan undangan" />
                                <x-field name="notes" label="Perubahan yang diinginkan" type="textarea" required class="sm:col-span-2" placeholder="Jelaskan bagian yang ingin diubah pada setiap revisi." />
                            </div>
                        @endif
                    </fieldset>
                </div>

                <div class="mt-10 border-t border-[#eee5d6] pt-8">
                    <label class="flex items-start gap-3 text-sm leading-6 text-[#3d352c]">
                        <input type="checkbox" name="agreement" value="1" class="mt-1 h-4 w-4 shrink-0 accent-[#29452f]" @checked(old('agreement')) required>
                        <span>
                            Saya menyetujui <a href="{{ route('terms') }}" target="_blank" class="font-semibold text-[#29452f] underline underline-offset-4">Syarat & Ketentuan</a>
                            serta kebijakan <a href="{{ route('refund') }}" target="_blank" class="font-semibold text-[#29452f] underline underline-offset-4">Refund & Pembatalan</a> Bali Santih.
                        </span>
                    </label>
                    @error('agreement')
                        <p class="mt-1.5 text-xs font-medium text-[#b54a3a]">{{ $message }}</p>
                    @enderror

                    <button type="submit" class="mt-6 inline-flex w-full items-center justify-center gap-2 rounded-full bg-[#29452f] px-6 py-3.5 text-sm font-semibold text-white transition hover:bg-[#1f3524] sm:w-auto">
                        {{ $isQuote ? 'Ajukan Pesanan' : 'Lanjut ke Pembayaran' }}
                        <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" aria-hidden="true">
                            <path d="M5 12h14m-6-6 6 6-6 6" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </button>
                </div>
            </form>

            <aside class="lg:sticky lg:top-6">
                <div class="overflow-hidden rounded-[8px] border border-[#e4dac7] bg-white">
                    <div class="bg-[#29452f] p-6 text-white">
                        <p class="text-xs font-semibold uppercase text-[#f5d681]">Ringkasan pesanan</p>
                        <h2 class="mt-2 text-xl font-semibold">{{ $product['name'] }}</h2>
                    </div>
                    <div class="p-6 text-sm">
                        @if ($isQuote)
                            <p class="text-[#6f6558]">Kisaran harga</p>
                            <p class="mt-1 text-2xl font-semibold text-[#1f1b16]">{{ Rupiah::forProduct($product) }}</p>
                            <p class="mt-4 leading-6 text-[#5f574d]">Harga final menyesuaikan tingkat kerumitan desain. Anda belum perlu membayar sekarang.</p>
                        @else
                            <dl class="space-y-3">
                                @foreach ($product['breakdown'] ?? [] as $line)
                                    <div class="flex justify-between gap-4">
                                        <dt class="text-[#6f6558]">{{ $line['label'] }}</dt>
                                        <dd class="text-[#1f1b16]">{{ Rupiah::format($line['amount']) }}</dd>
                                    </div>
                                @endforeach
                                @if (isset($product['max_quantity']))
                                    <div class="flex justify-between gap-4">
                                        <dt class="text-[#6f6558]">Harga {{ $product['unit'] }}</dt>
                                        <dd class="text-[#1f1b16]">{{ Rupiah::format($product['price']) }}</dd>
                                    </div>
                                    <div class="flex justify-between gap-4">
                                        <dt class="text-[#6f6558]">Jumlah</dt>
                                        <dd class="text-[#1f1b16]"><span data-quantity-label>{{ $quantity }}</span> revisi</dd>
                                    </div>
                                @endif
                                <div class="flex items-baseline justify-between gap-4 border-t border-[#eee5d6] pt-4">
                                    <dt class="font-semibold text-[#1f1b16]">Total</dt>
                                    <dd class="text-2xl font-semibold text-[#29452f]" data-total data-price="{{ $product['price'] }}">{{ Rupiah::format($product['price'] * $quantity) }}</dd>
                                </div>
                                @if (! isset($product['max_quantity']))
                                    <p class="text-right text-xs text-[#8b8175]">{{ $product['unit'] }}</p>
                                @endif
                            </dl>
                        @endif
                    </div>
                    <div class="border-t border-[#eee5d6] bg-[#faf8f3] p-6">
                        <h3 class="text-sm font-semibold text-[#1f1b16]">Langkah berikutnya</h3>
                        <ol class="mt-3 space-y-2.5 text-sm leading-6 text-[#5f574d]">
                            @if ($isQuote)
                                <li><span class="font-semibold text-[#8a6a2e]">1.</span> Kami mempelajari brief Anda dan menghubungi untuk konsultasi.</li>
                                <li><span class="font-semibold text-[#8a6a2e]">2.</span> Anda menerima penawaran harga final.</li>
                                <li><span class="font-semibold text-[#8a6a2e]">3.</span> Setelah disetujui dan dibayar, desain mulai dikerjakan.</li>
                            @else
                                <li><span class="font-semibold text-[#8a6a2e]">1.</span> Kirim pesanan, lalu Anda diarahkan ke halaman pembayaran iPaymu.</li>
                                <li><span class="font-semibold text-[#8a6a2e]">2.</span> Bayar dalam 24 jam melalui Virtual Account, QRIS, atau gerai retail.</li>
                                <li><span class="font-semibold text-[#8a6a2e]">3.</span> Pembayaran terkonfirmasi otomatis, lalu layanan kami proses.</li>
                            @endif
                        </ol>
                    </div>
                </div>
            </aside>
        </div>
    </main>
@endsection

@push('scripts')
    <script>
        const quantityInput = document.querySelector('[data-quantity]');
        const quantityLabel = document.querySelector('[data-quantity-label]');
        const totalLabel = document.querySelector('[data-total]');

        quantityInput?.addEventListener('input', () => {
            const quantity = Math.min(Math.max(parseInt(quantityInput.value, 10) || 1, 1), Number(quantityInput.max) || 10);
            quantityLabel.textContent = quantity;
            totalLabel.textContent = 'Rp' + (Number(totalLabel.dataset.price) * quantity).toLocaleString('id-ID');
        });
    </script>
@endpush
