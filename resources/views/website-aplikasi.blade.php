@extends('layouts.simple')

@php
    $values = [
        [
            'title' => 'Tulus dari dua arah',
            'text' => 'Kami mengerjakan website atau aplikasi Anda dengan sepenuh hati. Anda memberikan punia sesuai kemampuan. Tidak ada tawar-menawar yang memberatkan.',
        ],
        [
            'title' => 'Terbuka sejak awal',
            'text' => 'Fitur, halaman, dan jadwal pengerjaan dibicarakan dan disepakati bersama sebelum mulai, sehingga tidak ada hal yang mengejutkan di belakang.',
        ],
        [
            'title' => 'Menguatkan Bali',
            'text' => 'Punia Anda membantu Bali Santih terus ngayah: membangun teknologi yang bermanfaat bagi banjar, keluarga, dan usaha di Bali.',
        ],
    ];

    $offerings = [
        [
            'label' => 'Website',
            'title' => 'Agar usaha Anda mudah ditemukan dan dihubungi',
            'tone' => 'bg-[#8b4f38]',
            'items' => [
                ['title' => 'Profil usaha', 'text' => 'Cerita usaha, nilai yang Anda pegang, dan alasan pelanggan memilih Anda.'],
                ['title' => 'Katalog, menu, atau daftar kamar', 'text' => 'Produk dan layanan lengkap dengan foto dan harga, untuk toko, warung, kafe, atau homestay.'],
                ['title' => 'Pemesanan lewat WhatsApp', 'text' => 'Peta lokasi, jam buka, dan tombol WhatsApp agar pelanggan langsung menghubungi Anda.'],
                ['title' => 'Komunitas dan lembaga', 'text' => 'Website untuk sanggar, sekaa, yayasan, atau kegiatan masyarakat.'],
            ],
        ],
        [
            'label' => 'Aplikasi',
            'title' => 'Agar pekerjaan sehari-hari lebih rapi dan cepat',
            'tone' => 'bg-[#29452f]',
            'items' => [
                ['title' => 'Aplikasi toko bangunan', 'text' => 'Stok barang, harga, penjualan, piutang pelanggan, dan laporan dalam satu tempat.'],
                ['title' => 'Aplikasi kasir (POS)', 'text' => 'Transaksi penjualan, struk, stok, dan laporan harian untuk warung, toko, atau kafe.'],
                ['title' => 'Aplikasi driver dan transport', 'text' => 'Pemesanan driver atau tur di Bali, jadwal perjalanan, dan pencatatan pendapatan.'],
                ['title' => 'Aplikasi operasional lainnya', 'text' => 'Reservasi, data pelanggan, absensi karyawan, atau alur kerja khas usaha Anda.'],
            ],
        ],
    ];

    $steps = [
        ['title' => 'Ceritakan kebutuhan Anda', 'text' => 'Isi formulir konsultasi. Kami menghubungi Anda untuk berdiskusi, tanpa biaya.'],
        ['title' => 'Sepakati ruang lingkup', 'text' => 'Kami merangkum fitur, halaman, dan jadwal pengerjaan untuk disetujui bersama.'],
        ['title' => 'Dikerjakan bersama', 'text' => 'Website atau aplikasi dibangun, dan Anda dapat mencoba serta memberi masukan selama proses.'],
        ['title' => 'Serah terima dan punia', 'text' => 'Setelah siap digunakan, Anda memberikan punia melalui tagihan resmi Bali Santih.'],
    ];

    $faqs = [
        [
            'question' => 'Apa bedanya website dan aplikasi?',
            'answer' => 'Website membantu usaha Anda dikenal dan dihubungi pelanggan, misalnya profil usaha atau katalog. Aplikasi membantu pekerjaan sehari-hari, misalnya kasir, stok barang, atau pemesanan driver. Masih bingung? Pilih "Belum yakin" pada formulir, kita tentukan bersama saat konsultasi.',
        ],
        [
            'question' => 'Apakah aplikasinya bisa dipakai dari HP?',
            'answer' => 'Bisa. Aplikasi kami rancang agar dapat dibuka dari komputer maupun HP melalui browser. Kebutuhan aplikasi Android dapat didiskusikan saat konsultasi.',
        ],
        [
            'question' => 'Berapa punia yang sebaiknya saya berikan?',
            'answer' => 'Tidak ada angka yang benar atau salah. Berikan sesuai kemampuan usaha Anda dan manfaat yang Anda rasakan. Jika masih ragu, sampaikan saja saat konsultasi; kami terbuka untuk berdiskusi.',
        ],
        [
            'question' => 'Apakah ada biaya lain di luar punia?',
            'answer' => 'Konsultasi tidak dipungut biaya. Bila website atau aplikasi memerlukan layanan pihak ketiga seperti domain, hosting, atau server, biayanya kami sampaikan secara terbuka dan disepakati sebelum pengerjaan dimulai.',
        ],
        [
            'question' => 'Kapan dan bagaimana punia diberikan?',
            'answer' => 'Setelah website atau aplikasi siap diserahterimakan, kami mengirim tagihan resmi sesuai nominal punia yang Anda sampaikan. Punia dapat dibayar melalui iPaymu dengan Virtual Account bank, QRIS, atau gerai retail.',
        ],
        [
            'question' => 'Usaha saya masih kecil. Apakah tetap bisa?',
            'answer' => 'Tentu. Konsep punia justru kami pilih agar warung keluarga, perajin, dan usaha kecil tetap bisa memiliki website atau aplikasi yang layak tanpa terbebani daftar harga.',
        ],
    ];
@endphp

@section('title', 'Website & Aplikasi untuk Usaha')
@section('description', 'Bali Santih menerima pembuatan website dan aplikasi custom untuk usaha di Bali, seperti aplikasi kasir (POS), toko bangunan, dan pemesanan driver, dengan konsep punia tanpa harga baku.')

@section('content')
    <main>
        <section class="bg-[#17130f] text-white">
            <div class="mx-auto max-w-6xl px-5 py-16 sm:py-24">
                <p class="flex items-center gap-3 text-sm font-semibold text-[#f5d681]">
                    <span class="h-px w-10 bg-[#d7b46a]"></span>
                    Website & Aplikasi untuk Usaha
                </p>
                <h1 class="mt-6 max-w-3xl text-4xl font-semibold leading-[1.15] sm:text-5xl">Website dan aplikasi untuk usaha Anda, dikerjakan dengan semangat ngayah</h1>
                <p class="mt-6 max-w-2xl text-lg leading-8 text-white/75">
                    Bali Santih menerima pembuatan website dan aplikasi custom untuk usaha di Bali, mulai dari website profil warung atau homestay hingga aplikasi kasir (POS), toko bangunan, dan pemesanan driver. Tidak ada daftar harga baku. Anda memberikan punia sesuai kemampuan dan manfaat yang Anda rasakan.
                </p>
                <div class="mt-9 flex flex-col gap-3 sm:flex-row">
                    <a href="{{ route('orders.create', 'website-aplikasi') }}" class="inline-flex items-center justify-center gap-2 rounded-full bg-[#d7b46a] px-6 py-3.5 text-sm font-semibold text-[#17130f] transition hover:-translate-y-0.5 hover:bg-[#efcf82]">
                        Ajukan Konsultasi
                        <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" aria-hidden="true">
                            <path d="M5 12h14m-6-6 6 6-6 6" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </a>
                    <a href="#contoh" class="inline-flex items-center justify-center rounded-full border border-white/25 bg-white/10 px-6 py-3.5 text-sm font-semibold text-white transition hover:bg-white/15">
                        Lihat Contoh Kebutuhan
                    </a>
                </div>
            </div>
        </section>

        <section id="contoh" class="scroll-mt-6 bg-white py-16 sm:py-20">
            <div class="mx-auto max-w-6xl px-5">
                <p class="text-sm font-semibold uppercase text-[#8a6a2e]">Yang Bisa Kami Bantu</p>
                <h2 class="mt-4 max-w-2xl text-3xl font-semibold leading-tight sm:text-4xl">Dari dikenal pelanggan hingga mengelola pekerjaan sehari-hari</h2>

                <div class="mt-10 grid gap-6 lg:grid-cols-2">
                    @foreach ($offerings as $offering)
                        <article class="overflow-hidden rounded-[8px] border border-[#e4dac7] bg-[#fbfaf6]">
                            <div class="{{ $offering['tone'] }} p-6 text-white">
                                <p class="text-xs font-semibold uppercase text-[#f5d681]">{{ $offering['label'] }}</p>
                                <h3 class="mt-2 text-xl font-semibold">{{ $offering['title'] }}</h3>
                            </div>
                            <ul class="divide-y divide-[#eee5d6]">
                                @foreach ($offering['items'] as $item)
                                    <li class="px-6 py-4">
                                        <p class="font-semibold text-[#1f1b16]">{{ $item['title'] }}</p>
                                        <p class="mt-1 text-sm leading-6 text-[#5f574d]">{{ $item['text'] }}</p>
                                    </li>
                                @endforeach
                            </ul>
                        </article>
                    @endforeach
                </div>
                <p class="mt-8 text-sm leading-7 text-[#5f574d]">Ini hanya contoh, bukan batasan. Punya kebutuhan lain? Ceritakan saja, kita diskusikan bersama.</p>
            </div>
        </section>

        <section id="punia" class="scroll-mt-6 border-t border-[#ece3d2] bg-[#fbfaf6] py-16 sm:py-20">
            <div class="mx-auto grid max-w-6xl gap-10 px-5 lg:grid-cols-[0.9fr_1.1fr]">
                <div>
                    <p class="text-sm font-semibold uppercase text-[#8a6a2e]">Konsep Punia</p>
                    <h2 class="mt-4 text-3xl font-semibold leading-tight sm:text-4xl">Punia, bukan daftar harga</h2>
                </div>
                <div class="space-y-5 text-lg leading-8 text-[#5f574d]">
                    <p>Dalam kehidupan masyarakat Bali, punia adalah pemberian yang tulus ikhlas, sesuai kemampuan. Nilai itulah yang kami bawa ke dalam cara kami bekerja.</p>
                    <p>Setiap usaha punya kondisi yang berbeda. Warung keluarga dan toko bangunan besar tentu tidak bisa disamakan. Karena itu kami tidak memasang harga baku. Kami mengerjakan website dan aplikasi Anda sebagai bentuk ngayah, dan Anda memberikan punia sebagai dukungan agar Bali Santih dapat terus melayani lebih banyak usaha di Bali.</p>
                </div>
            </div>

            <div class="mx-auto mt-12 grid max-w-6xl gap-6 px-5 md:grid-cols-3">
                @foreach ($values as $value)
                    <article class="rounded-[8px] border border-[#e4dac7] bg-white p-6">
                        <span class="text-sm font-semibold text-[#8a6a2e]">{{ sprintf('%02d', $loop->iteration) }}</span>
                        <h3 class="mt-3 text-lg font-semibold text-[#1f1b16]">{{ $value['title'] }}</h3>
                        <p class="mt-3 text-sm leading-7 text-[#5f574d]">{{ $value['text'] }}</p>
                    </article>
                @endforeach
            </div>
        </section>

        <section class="bg-[#29452f] py-16 text-white sm:py-20">
            <div class="mx-auto max-w-6xl px-5">
                <p class="text-sm font-semibold uppercase text-[#f5d681]">Alur Kerja</p>
                <h2 class="mt-4 max-w-2xl text-3xl font-semibold leading-tight sm:text-4xl">Sederhana, terbuka, dan disepakati bersama</h2>
                <ol class="mt-10 grid gap-x-8 gap-y-8 sm:grid-cols-2 lg:grid-cols-4">
                    @foreach ($steps as $step)
                        <li class="border-t border-white/15 pt-5">
                            <span class="text-sm font-semibold text-[#f5d681]">{{ sprintf('%02d', $loop->iteration) }}</span>
                            <h3 class="mt-3 font-semibold">{{ $step['title'] }}</h3>
                            <p class="mt-2 text-sm leading-7 text-white/70">{{ $step['text'] }}</p>
                        </li>
                    @endforeach
                </ol>
            </div>
        </section>

        <section class="bg-[#fbfaf6] py-16 sm:py-20">
            <div class="mx-auto grid max-w-6xl gap-10 px-5 lg:grid-cols-[0.75fr_1.25fr]">
                <div>
                    <p class="text-sm font-semibold uppercase text-[#8a6a2e]">Pertanyaan Umum</p>
                    <h2 class="mt-4 text-3xl font-semibold leading-tight sm:text-4xl">Seputar website, aplikasi, dan punia</h2>
                </div>
                <div class="divide-y divide-[#e8dfcf] border-y border-[#e8dfcf]">
                    @foreach ($faqs as $faq)
                        <details class="group py-1">
                            <summary class="flex cursor-pointer list-none items-center justify-between gap-6 py-4 font-semibold text-[#1f1b16] [&::-webkit-details-marker]:hidden">
                                {{ $faq['question'] }}
                                <svg class="h-5 w-5 shrink-0 text-[#8a6a2e] transition group-open:rotate-45" viewBox="0 0 24 24" fill="none" aria-hidden="true">
                                    <path d="M12 5v14M5 12h14" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
                                </svg>
                            </summary>
                            <p class="pb-5 pr-10 text-sm leading-7 text-[#5f574d]">{{ $faq['answer'] }}</p>
                        </details>
                    @endforeach
                </div>
            </div>
        </section>

        <section class="bg-white py-16 sm:py-20">
            <div class="mx-auto max-w-6xl px-5">
                <div class="rounded-[8px] bg-[#17130f] px-6 py-12 text-center text-white sm:px-12">
                    <h2 class="text-3xl font-semibold leading-tight">Mari mulai dari cerita usaha Anda</h2>
                    <p class="mx-auto mt-4 max-w-xl leading-7 text-white/70">Konsultasi tidak dipungut biaya. Ceritakan usaha dan website atau aplikasi yang Anda bayangkan, kami yang akan menghubungi Anda.</p>
                    <a href="{{ route('orders.create', 'website-aplikasi') }}" class="mt-8 inline-flex items-center gap-2 rounded-full bg-[#d7b46a] px-6 py-3.5 text-sm font-semibold text-[#17130f] transition hover:-translate-y-0.5 hover:bg-[#efcf82]">
                        Ajukan Konsultasi
                        <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" aria-hidden="true">
                            <path d="M5 12h14m-6-6 6 6-6 6" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </a>
                </div>
            </div>
        </section>
    </main>
@endsection
