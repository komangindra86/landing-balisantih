<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Bali Santih menyediakan aplikasi portal banjar dan Undangan Bali gratis. QRIS digunakan untuk iuran warga, dana kegiatan banjar, dan wedding gift.">
    <title>Bali Santih - Banjar Digital dan Undangan Bali</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-[#fbfaf6] text-[#1f1b16] antialiased">
    @php
        $services = [
            [
                'title' => 'Portal Banjar Gratis',
                'label' => 'Gratis untuk banjar dan warga',
                'text' => 'Aplikasi portal banjar untuk membantu pengurus menata data krama, kas, dedosan, iuran, pengumuman, laporan, dan dashboard.',
                'points' => ['Data krama dan keluarga', 'Pengumuman banjar', 'Laporan kas dan iuran', 'Akses warga berbasis HP'],
                'icon' => 'M4 20V8l8-5 8 5v12M8 20v-7h8v7',
            ],
            [
                'title' => 'QRIS Iuran Warga',
                'label' => 'Untuk pembayaran sosial banjar',
                'text' => 'Integrasi QRIS disiapkan untuk pembayaran iuran warga, sesari, urunan, dedosan, dan dana kegiatan banjar melalui portal.',
                'points' => ['Pembayaran iuran warga', 'Dana kegiatan banjar', 'Riwayat pembayaran', 'Nominal sesuai keputusan banjar'],
                'icon' => 'M8 7a4 4 0 1 0 8 0 4 4 0 0 0-8 0Zm-3 15a7 7 0 0 1 14 0',
            ],
            [
                'title' => 'Undangan Bali Gratis',
                'label' => 'Gratis untuk membuat undangan',
                'text' => 'Aplikasi Undangan Bali membantu pasangan membuat undangan digital bernuansa Bali dan menerima wedding gift opsional dari tamu.',
                'points' => ['Template undangan Bali', 'Link undangan publik', 'Foto, musik, dan lokasi', 'Wedding Gift QRIS opsional'],
                'icon' => 'M12 21s-7-4.6-9-9.2C1.5 8.4 3.5 5 5c2 0 3.4 1.1 5 3 1.6-1.9 3-3 5-3 3.5 0 5.5 3.4 4 6.8C19 16.4 12 21 12 21Z',
            ],
        ];

        $banjarFeatures = [
            'Data krama dan keluarga',
            'Pencatatan dedosan dan iuran',
            'Kas masuk, kas keluar, dan periode kas',
            'Laporan pembayaran bulanan',
            'Dashboard ringkasan keuangan',
            'Pengumuman sangkep atau samua dengan lampiran',
            'Portal warga untuk informasi mandiri',
            'Pendampingan penggunaan untuk pengurus',
        ];

        $steps = [
            ['title' => 'Daftar', 'text' => 'Banjar atau pasangan membuat akun dan mengisi data awal sesuai kebutuhan aplikasi.'],
            ['title' => 'Atur Data', 'text' => 'Pengurus mengatur iuran dan data warga, sedangkan pasangan mengatur isi undangan.'],
            ['title' => 'Aktifkan QRIS', 'text' => 'QRIS dipakai hanya untuk iuran atau dana banjar dan wedding gift pada undangan.'],
            ['title' => 'Bagikan Link', 'text' => 'Warga membuka portal banjar, atau tamu membuka link undangan digital yang dibagikan.'],
            ['title' => 'Bayar dan Catat', 'text' => 'Pembayaran tercatat di aplikasi sehingga pengurus atau pemilik acara dapat memantau transaksi.'],
        ];

        $paymentFlow = [
            ['title' => 'Warga atau tamu membayar', 'text' => 'Pengguna memilih iuran, dana banjar, atau wedding gift, lalu melakukan pembayaran melalui QRIS.'],
            ['title' => 'Dana diproses payment gateway', 'text' => 'Dana pembayaran diterima dan disettle terlebih dahulu oleh payment gateway pada akun merchant Bali Santih sesuai ketentuan penyedia pembayaran.'],
            ['title' => 'Transaksi dicatat per tujuan', 'text' => 'Aplikasi mencatat pembayaran untuk banjar, kegiatan, pasangan, atau acara yang sesuai agar tidak tercampur secara administrasi.'],
            ['title' => 'Pencairan ke pihak berhak', 'text' => 'Setelah settlement dan verifikasi, dana dapat dicairkan/diteruskan kepada pengurus banjar atau pemilik acara sesuai catatan transaksi dan ketentuan layanan.'],
        ];

        $priceItems = [
            [
                'name' => 'Akses Portal Banjar',
                'price' => 'Rp0 / Gratis',
                'description' => 'Akses aplikasi portal banjar untuk pengurus dan warga tidak dikenakan biaya.',
            ],
            [
                'name' => 'Akses Undangan Bali',
                'price' => 'Rp0 / Gratis',
                'description' => 'Pengguna dapat membuat undangan digital Bali tanpa biaya akses aplikasi.',
            ],
            [
                'name' => 'Iuran Warga, Sesari, Urunan, Dedosan, dan Dana Banjar',
                'price' => 'Rp10.000 - Rp5.000.000',
                'description' => 'Nominal pembayaran ditentukan oleh pengurus banjar sesuai keputusan atau kebutuhan kegiatan.',
            ],
            [
                'name' => 'Wedding Gift / Amplop Digital',
                'price' => 'Rp10.000 - Rp5.000.000',
                'description' => 'Nominal gift dipilih secara sukarela oleh tamu undangan dan dibayar melalui QRIS.',
            ],
        ];

        $invitationTemplates = [
            ['name' => 'Bali Classic', 'url' => 'https://undangan.balisantih.com/preview/templates/bali-classic'],
            ['name' => 'Pura Sunset', 'url' => 'https://undangan.balisantih.com/preview/templates/pura-sunset'],
            ['name' => 'Ubud Garden', 'url' => 'https://undangan.balisantih.com/preview/templates/ubud-garden'],
            ['name' => 'Royal Kamasan', 'url' => 'https://undangan.balisantih.com/preview/templates/royal-kamasan'],
        ];
        $weddingPaymentDemoUrl = 'https://undangan.balisantih.com/demo/wedding-gift-xendit';

        $demoLinks = [
            [
                'name' => 'Demo Aplikasi Banjar',
                'url' => 'https://banjartesting.balisantih.com/login',
                'description' => 'Masuk sebagai pengurus untuk melihat dashboard, data warga, kas, iuran, dedosan, laporan, dan pengumuman.',
                'credential' => 'Email: demo.banjar@balisantih.com | Password: DemoBaliSantih123',
            ],
            [
                'name' => 'Demo Portal Warga',
                'url' => 'https://banjartesting.balisantih.com/portal',
                'description' => 'Masuk sebagai warga untuk melihat informasi banjar, pengumuman, dedosan/iuran, kas, profil, dan ubah password.',
                'credential' => 'Email: demo.warga@balisantih.com | Password: DemoBaliSantih123',
            ],
        ];
    @endphp

    <header class="fixed inset-x-0 top-0 z-50 border-b border-white/10 bg-[#17130f]/88 text-white shadow-sm backdrop-blur-xl">
        <nav class="mx-auto flex max-w-7xl items-center justify-between px-5 py-4 lg:px-8" aria-label="Navigasi utama">
            <a href="#beranda" class="flex items-center gap-3">
                <span class="grid h-10 w-10 place-items-center overflow-hidden rounded-full border border-[#d7b46a]/50 bg-white/95 p-1">
                    <img src="{{ asset('images/logobalisantih.png') }}" alt="Logo Bali Santih" class="h-full w-full object-contain">
                </span>
                <span class="text-lg font-semibold">Bali Santih</span>
            </a>

            <button type="button" class="inline-flex h-10 w-10 items-center justify-center rounded-full border border-white/15 text-white transition hover:bg-white/10 lg:hidden" data-menu-toggle aria-label="Buka menu">
                <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" aria-hidden="true">
                    <path d="M4 7h16M4 12h16M4 17h16" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"/>
                </svg>
            </button>

            <div class="hidden items-center gap-7 text-sm font-medium text-white/78 lg:flex">
                <a class="transition hover:text-[#f5d681]" href="#layanan">Aplikasi Gratis</a>
                <a class="transition hover:text-[#f5d681]" href="#banjar">Banjar Digital</a>
                <a class="transition hover:text-[#f5d681]" href="#undangan">Undangan Bali</a>
                <a class="transition hover:text-[#f5d681]" href="#demo">Demo</a>
                <a class="transition hover:text-[#f5d681]" href="#harga">Harga</a>
                <a class="transition hover:text-[#f5d681]" href="#alur">Alur</a>
                <a class="transition hover:text-[#f5d681]" href="#kontak">Kontak</a>
            </div>

            <a href="#pembayaran" class="hidden rounded-full bg-[#d7b46a] px-5 py-2.5 text-sm font-semibold text-[#17130f] shadow-lg shadow-black/10 transition hover:-translate-y-0.5 hover:bg-[#efcf82] lg:inline-flex">
                Fungsi QRIS
            </a>
        </nav>

        <div class="hidden border-t border-white/10 bg-[#17130f]/96 px-5 pb-5 pt-2 text-sm text-white/80 lg:hidden" data-mobile-menu>
            <div class="mx-auto flex max-w-7xl flex-col gap-1">
                <a class="rounded-[8px] px-3 py-3 hover:bg-white/10" href="#layanan">Aplikasi Gratis</a>
                <a class="rounded-[8px] px-3 py-3 hover:bg-white/10" href="#banjar">Banjar Digital</a>
                <a class="rounded-[8px] px-3 py-3 hover:bg-white/10" href="#undangan">Undangan Bali</a>
                <a class="rounded-[8px] px-3 py-3 hover:bg-white/10" href="#demo">Demo</a>
                <a class="rounded-[8px] px-3 py-3 hover:bg-white/10" href="#harga">Harga</a>
                <a class="rounded-[8px] px-3 py-3 hover:bg-white/10" href="#alur">Alur</a>
                <a class="rounded-[8px] px-3 py-3 hover:bg-white/10" href="#kontak">Kontak</a>
            </div>
        </div>
    </header>

    <main>
        <section id="beranda" class="relative isolate min-h-[88vh] overflow-hidden pt-24 text-white">
            <img src="{{ asset('images/bali-santih-hero.png') }}" alt="Suasana banjar Bali modern dengan sentuhan teknologi digital" class="absolute inset-0 -z-20 h-full w-full object-cover">
            <div class="absolute inset-0 -z-10 bg-[linear-gradient(90deg,rgba(23,19,15,0.94)_0%,rgba(23,19,15,0.78)_45%,rgba(23,19,15,0.28)_100%)]"></div>

            <div class="mx-auto flex min-h-[calc(88vh-6rem)] max-w-7xl items-center px-5 py-16 lg:px-8">
                <div class="max-w-3xl reveal">
                    <div class="mb-6 inline-flex items-center gap-2 rounded-full border border-[#d7b46a]/40 bg-white/10 px-4 py-2 text-sm text-[#f7df9c] backdrop-blur">
                        <span class="h-2 w-2 rounded-full bg-[#6f9b65]"></span>
                        Aplikasi gratis dengan QRIS untuk kebutuhan sosial
                    </div>
                    <h1 class="max-w-4xl text-4xl font-semibold leading-tight text-white sm:text-5xl lg:text-6xl">
                        Portal banjar dan Undangan Bali gratis untuk masyarakat Bali
                    </h1>
                    <p class="mt-6 max-w-2xl text-base leading-8 text-white/80 sm:text-lg">
                        Bali Santih menyediakan aplikasi portal banjar dan Undangan Bali tanpa biaya akses aplikasi. QRIS digunakan untuk memudahkan pembayaran iuran warga, dana kegiatan banjar, dan wedding gift secara transparan.
                    </p>
                    <div class="mt-9 flex flex-col gap-3 sm:flex-row">
                        <a href="#layanan" class="inline-flex items-center justify-center rounded-full bg-[#d7b46a] px-6 py-3.5 text-sm font-semibold text-[#17130f] shadow-xl shadow-black/20 transition hover:-translate-y-0.5 hover:bg-[#efcf82]">
                            Lihat Aplikasi
                        </a>
                        <a href="#kontak" class="inline-flex items-center justify-center rounded-full border border-white/25 bg-white/10 px-6 py-3.5 text-sm font-semibold text-white backdrop-blur transition hover:-translate-y-0.5 hover:bg-white/18">
                            Konsultasi Layanan
                        </a>
                    </div>
                </div>
            </div>
        </section>

        <section id="layanan" class="bg-white py-20 sm:py-24">
            <div class="mx-auto max-w-7xl px-5 lg:px-8">
                <div class="max-w-3xl reveal">
                    <p class="text-sm font-semibold uppercase text-[#8a6a2e]">Aplikasi Gratis</p>
                    <h2 class="mt-4 text-3xl font-semibold text-[#1f1b16] sm:text-4xl">Bali Santih tidak menjual akses aplikasi</h2>
                    <p class="mt-5 text-lg leading-8 text-[#5f574d]">
                        Aplikasi portal banjar dan Undangan Bali disediakan gratis. Pembayaran melalui QRIS hanya digunakan untuk transaksi yang memang dibayarkan warga atau tamu, bukan untuk membeli aplikasi.
                    </p>
                </div>

                <div class="mt-12 grid gap-6 lg:grid-cols-3">
                    @foreach ($services as $service)
                        <article class="reveal flex min-h-[420px] flex-col rounded-[8px] border border-[#eadfca] bg-[#fbfaf6] p-6 transition hover:-translate-y-1 hover:border-[#d7b46a] hover:shadow-xl hover:shadow-[#1f1b16]/10">
                            <div class="grid h-12 w-12 place-items-center rounded-full bg-[#29452f] text-[#f5d681]">
                                <svg class="h-6 w-6" viewBox="0 0 24 24" fill="none" aria-hidden="true">
                                    <path d="{{ $service['icon'] }}" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>
                            </div>
                            <h3 class="mt-6 text-xl font-semibold text-[#1f1b16]">{{ $service['title'] }}</h3>
                            <p class="mt-3 text-2xl font-semibold text-[#29452f]">{{ $service['label'] }}</p>
                            <p class="mt-5 leading-7 text-[#5f574d]">{{ $service['text'] }}</p>
                            <ul class="mt-5 space-y-3 text-sm leading-6 text-[#3d352c]">
                                @foreach ($service['points'] as $point)
                                    <li class="flex gap-3">
                                        <span class="mt-1 grid h-5 w-5 shrink-0 place-items-center rounded-full bg-[#d7b46a] text-[#17130f]">
                                            <svg class="h-3 w-3" viewBox="0 0 24 24" fill="none" aria-hidden="true">
                                                <path d="m5 12 4 4L19 6" stroke="currentColor" stroke-width="2.4" stroke-linecap="round" stroke-linejoin="round"/>
                                            </svg>
                                        </span>
                                        <span>{{ $point }}</span>
                                    </li>
                                @endforeach
                            </ul>
                            <a href="#pembayaran" class="mt-auto inline-flex items-center justify-center rounded-full bg-[#29452f] px-5 py-3 text-sm font-semibold text-white transition hover:bg-[#1f3524]">
                                Lihat Alur QRIS
                            </a>
                        </article>
                    @endforeach
                </div>

                <p class="mt-6 text-sm leading-7 text-[#6f6558] reveal">
                    Catatan: Bali Santih tidak mengenakan biaya untuk akses aplikasi. Nominal iuran, dana banjar, atau wedding gift ditentukan oleh pengurus banjar, warga, tamu, atau pemilik acara sesuai konteks masing-masing.
                </p>
            </div>
        </section>

        <section id="pembayaran" class="bg-[#f3efe5] py-20 sm:py-24">
            <div class="mx-auto grid max-w-7xl gap-10 px-5 lg:grid-cols-[0.95fr_1.05fr] lg:items-start lg:px-8">
                <div class="reveal">
                    <p class="text-sm font-semibold uppercase text-[#8a6a2e]">Penggunaan QRIS</p>
                    <h2 class="mt-4 text-3xl font-semibold text-[#1f1b16] sm:text-4xl">QRIS dipakai untuk pembayaran yang terjadi di dalam aplikasi</h2>
                    <p class="mt-5 text-lg leading-8 text-[#5f574d]">
                        Integrasi payment gateway membantu pembayaran tercatat lebih rapi dan mudah dipantau. Fungsi QRIS dibatasi untuk iuran warga, dana kegiatan banjar, dan wedding gift pada undangan digital.
                    </p>
                </div>
                <div class="grid gap-5 sm:grid-cols-2">
                    <article class="reveal rounded-[8px] border border-[#e1d3b8] bg-white p-6">
                        <h3 class="text-xl font-semibold text-[#1f1b16]">Portal Banjar</h3>
                        <p class="mt-4 leading-7 text-[#5f574d]">Warga membuka portal, memilih tagihan atau kontribusi yang sudah ditetapkan pengurus, lalu membayar melalui QRIS. Bukti dan status pembayaran tersimpan untuk pengurus.</p>
                    </article>
                    <article class="reveal rounded-[8px] border border-[#e1d3b8] bg-white p-6">
                        <h3 class="text-xl font-semibold text-[#1f1b16]">Undangan Bali</h3>
                        <p class="mt-4 leading-7 text-[#5f574d]">Tamu membuka link undangan, memilih nominal wedding gift secara sukarela, lalu membayar melalui QRIS. Dana tercatat pada dashboard pemilik acara.</p>
                    </article>
                </div>
            </div>
            <div class="mx-auto mt-12 max-w-7xl px-5 lg:px-8">
                <div class="reveal rounded-[8px] border border-[#e1d3b8] bg-white p-6 shadow-sm">
                    <div class="grid gap-8 lg:grid-cols-[0.75fr_1.25fr] lg:items-start">
                        <div>
                            <p class="text-sm font-semibold uppercase text-[#8a6a2e]">Aliran Dana</p>
                            <h3 class="mt-3 text-2xl font-semibold text-[#1f1b16]">Dana tidak langsung masuk ke banjar atau pasangan saat QRIS discan</h3>
                            <p class="mt-4 leading-7 text-[#5f574d]">
                                Pembayaran diproses terlebih dahulu oleh payment gateway pada akun merchant Bali Santih. Setelah transaksi berhasil dan settlement, aplikasi mencatat dana tersebut sesuai tujuan pembayaran, lalu pencairan dilakukan kepada pihak yang berhak.
                            </p>
                        </div>
                        <div class="grid gap-4 sm:grid-cols-2">
                            @foreach ($paymentFlow as $flow)
                                <article class="rounded-[8px] border border-[#eadfca] bg-[#fbfaf6] p-5">
                                    <h4 class="font-semibold text-[#1f1b16]">{{ $flow['title'] }}</h4>
                                    <p class="mt-3 text-sm leading-6 text-[#5f574d]">{{ $flow['text'] }}</p>
                                </article>
                            @endforeach
                        </div>
                    </div>
                    <p class="mt-6 rounded-[8px] bg-[#f3efe5] px-4 py-3 text-sm leading-6 text-[#5f574d]">
                        Saat pengguna scan QRIS, nama yang tampil mengikuti nama merchant/sub-merchant yang terdaftar pada payment gateway. Karena itu halaman pembayaran menampilkan tujuan pembayaran dan catatan transaksi agar pengguna memahami dana diproses oleh Bali Santih sebagai penyedia layanan sebelum diteruskan sesuai tujuan.
                    </p>
                </div>
            </div>
        </section>

        <section id="harga" class="bg-white py-20 sm:py-24">
            <div class="mx-auto max-w-7xl px-5 lg:px-8">
                <div class="max-w-3xl reveal">
                    <p class="text-sm font-semibold uppercase text-[#8a6a2e]">Produk/Jasa dan Harga</p>
                    <h2 class="mt-4 text-3xl font-semibold text-[#1f1b16] sm:text-4xl">Daftar produk, jasa, dan nominal transaksi dalam IDR</h2>
                    <p class="mt-5 text-lg leading-8 text-[#5f574d]">
                        Akses aplikasi Bali Santih gratis. Nominal dalam Rupiah/IDR berikut adalah range transaksi QRIS yang terjadi di dalam aplikasi.
                    </p>
                </div>

                <div class="mt-12 overflow-hidden rounded-[8px] border border-[#e1d3b8] bg-[#fbfaf6] reveal">
                    <div class="grid bg-[#29452f] px-5 py-4 text-sm font-semibold uppercase text-white sm:grid-cols-[1fr_220px_1.35fr]">
                        <div>Produk/Jasa</div>
                        <div class="hidden sm:block">Harga / Range IDR</div>
                        <div class="hidden sm:block">Keterangan</div>
                    </div>
                    @foreach ($priceItems as $item)
                        <div class="grid gap-3 border-t border-[#e1d3b8] px-5 py-5 sm:grid-cols-[1fr_220px_1.35fr] sm:items-start">
                            <div>
                                <p class="font-semibold text-[#1f1b16]">{{ $item['name'] }}</p>
                            </div>
                            <div>
                                <p class="text-sm font-semibold uppercase text-[#8a6a2e] sm:hidden">Harga / Range IDR</p>
                                <p class="mt-1 text-lg font-semibold text-[#29452f] sm:mt-0">{{ $item['price'] }}</p>
                            </div>
                            <p class="leading-7 text-[#5f574d]">{{ $item['description'] }}</p>
                        </div>
                    @endforeach
                </div>

                <p class="mt-6 text-sm leading-7 text-[#6f6558] reveal">
                    Pembayaran QRIS diproses untuk iuran/dana banjar dan Wedding Gift. Setiap transaksi menampilkan nominal dalam Rupiah sebelum pengguna melakukan pembayaran.
                </p>
            </div>
        </section>

        <section id="banjar" class="bg-[#17130f] py-20 text-white sm:py-24">
            <div class="mx-auto grid max-w-7xl gap-12 px-5 lg:grid-cols-[0.95fr_1.05fr] lg:items-start lg:px-8">
                <div class="reveal">
                    <p class="text-sm font-semibold uppercase text-[#d7b46a]">Banjar Digital</p>
                    <h2 class="mt-4 text-3xl font-semibold sm:text-4xl">Administrasi banjar dibuat lebih rapi, mudah dicari, dan mudah dilanjutkan</h2>
                    <p class="mt-5 text-lg leading-8 text-white/72">
                        Sistem ini dibuat untuk membantu kelian, sekretaris, bendahara, dan pengurus desa adat bekerja lebih tertata tanpa meninggalkan cara kerja yang sederhana.
                    </p>
                </div>
                <div class="grid gap-4 sm:grid-cols-2">
                    @foreach ($banjarFeatures as $feature)
                        <div class="reveal rounded-[8px] border border-white/10 bg-white/[0.06] p-5">
                            <p class="font-medium leading-7 text-white/86">{{ $feature }}</p>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>

        <section id="undangan" class="bg-[#f3efe5] py-20 sm:py-24">
            <div class="mx-auto max-w-7xl px-5 lg:px-8">
                <div class="grid gap-10 lg:grid-cols-[1.05fr_0.95fr] lg:items-center">
                    <div class="reveal">
                        <p class="text-sm font-semibold uppercase text-[#8a6a2e]">Undangan Bali</p>
                        <h2 class="mt-4 text-3xl font-semibold text-[#1f1b16] sm:text-4xl">Undangan digital bernuansa Bali yang bisa dibagikan melalui link</h2>
                        <p class="mt-5 text-lg leading-8 text-[#5f574d]">
                            Cocok untuk pawiwahan dan acara keluarga. Pemilik acara dapat membuat draft, memilih template, menambahkan foto, musik, lokasi, dan membagikan link undangan publik tanpa biaya akses aplikasi.
                        </p>
                    </div>
                    <div class="reveal rounded-[8px] border border-[#e1d3b8] bg-white p-6 shadow-sm">
                        <h3 class="text-xl font-semibold text-[#1f1b16]">Template tersedia</h3>
                        <div class="mt-5 grid gap-3 sm:grid-cols-2">
                            @foreach ($invitationTemplates as $template)
                                <a href="{{ $template['url'] }}" target="_blank" rel="noopener" class="group rounded-[8px] border border-[#eadfca] bg-[#fbfaf6] px-4 py-3 text-sm font-medium text-[#3d352c] transition hover:-translate-y-0.5 hover:border-[#d7b46a] hover:bg-white hover:shadow-md">
                                    <span class="flex items-center justify-between gap-3">
                                        <span>{{ $template['name'] }}</span>
                                        <span class="text-xs font-semibold uppercase text-[#8a6a2e] group-hover:text-[#29452f]">Lihat contoh</span>
                                    </span>
                                </a>
                            @endforeach
                        </div>
                        <p class="mt-5 text-sm leading-7 text-[#6f6558]">
                            Undangan dapat dilengkapi countdown, galeri, backsound, peta lokasi, tombol berbagi, dan Wedding Gift QRIS opsional untuk amplop digital dari tamu.
                        </p>
                    </div>
                </div>
            </div>
        </section>

        <section id="demo" class="bg-white py-20 sm:py-24">
            <div class="mx-auto max-w-7xl px-5 lg:px-8">
                <div class="grid gap-10 lg:grid-cols-[0.9fr_1.1fr] lg:items-start">
                    <div class="reveal">
                        <p class="text-sm font-semibold uppercase text-[#8a6a2e]">Demo Aplikasi</p>
                        <h2 class="mt-4 text-3xl font-semibold text-[#1f1b16] sm:text-4xl">Coba demo Banjar Digital dan Portal Warga</h2>
                        <p class="mt-5 text-lg leading-8 text-[#5f574d]">
                            Demo disediakan agar calon pengguna dan reviewer dapat melihat alur kerja aplikasi banjar, portal warga, dan contoh undangan digital sebelum menggunakan layanan.
                        </p>
                    </div>
                    <div class="grid gap-5">
                        @foreach ($demoLinks as $demo)
                            <article class="reveal rounded-[8px] border border-[#e1d3b8] bg-[#fbfaf6] p-6">
                                <div class="flex flex-col gap-4 sm:flex-row sm:items-start sm:justify-between">
                                    <div>
                                        <h3 class="text-xl font-semibold text-[#1f1b16]">{{ $demo['name'] }}</h3>
                                        <p class="mt-3 leading-7 text-[#5f574d]">{{ $demo['description'] }}</p>
                                        <p class="mt-4 rounded-[8px] bg-white px-4 py-3 text-sm font-medium text-[#3d352c]">{{ $demo['credential'] }}</p>
                                    </div>
                                    <a href="{{ $demo['url'] }}" target="_blank" rel="noopener" class="inline-flex shrink-0 items-center justify-center rounded-full bg-[#29452f] px-5 py-3 text-sm font-semibold text-white transition hover:-translate-y-0.5 hover:bg-[#1f3524]">
                                        Buka Demo
                                    </a>
                                </div>
                            </article>
                        @endforeach
                        <article class="reveal rounded-[8px] border border-[#e1d3b8] bg-[#fbfaf6] p-6">
                            <div class="flex flex-col gap-4 sm:flex-row sm:items-start sm:justify-between">
                                <div>
                                    <h3 class="text-xl font-semibold text-[#1f1b16]">Demo Undangan Bali + Wedding Gift</h3>
                                    <p class="mt-3 leading-7 text-[#5f574d]">Contoh undangan dapat dibuka tanpa login. Demo khusus Wedding Gift memakai Xendit mode tes agar reviewer dapat mencoba alur pembayaran dari awal sampai link pembayaran dibuat.</p>
                                    <p class="mt-4 rounded-[8px] bg-white px-4 py-3 text-sm font-medium text-[#3d352c]">Mode tes: tidak ada uang asli yang masuk. Biaya layanan ditampilkan transparan sebelum pembayaran.</p>
                                </div>
                                <a href="{{ $weddingPaymentDemoUrl }}" target="_blank" rel="noopener" class="inline-flex shrink-0 items-center justify-center rounded-full bg-[#29452f] px-5 py-3 text-sm font-semibold text-white transition hover:-translate-y-0.5 hover:bg-[#1f3524]">
                                    Coba Payment Demo
                                </a>
                            </div>
                            <div class="mt-5 flex flex-wrap gap-3">
                                @foreach ($invitationTemplates as $template)
                                    <a href="{{ $template['url'] }}" target="_blank" rel="noopener" class="rounded-full border border-[#d7b46a] bg-white px-4 py-2 text-sm font-semibold text-[#3d352c] transition hover:border-[#29452f] hover:text-[#29452f]">
                                        {{ $template['name'] }}
                                    </a>
                                @endforeach
                            </div>
                        </article>
                    </div>
                </div>
            </div>
        </section>

        <section id="alur" class="bg-white py-20 sm:py-24">
            <div class="mx-auto max-w-7xl px-5 lg:px-8">
                <div class="max-w-3xl reveal">
                    <p class="text-sm font-semibold uppercase text-[#8a6a2e]">Alur Penggunaan</p>
                    <h2 class="mt-4 text-3xl font-semibold text-[#1f1b16] sm:text-4xl">Cara aplikasi dan pembayaran QRIS digunakan</h2>
                </div>

                <div class="mt-12 grid gap-5 md:grid-cols-5">
                    @foreach ($steps as $index => $step)
                        <article class="reveal rounded-[8px] border border-[#eadfca] bg-[#fbfaf6] p-5">
                            <div class="grid h-9 w-9 place-items-center rounded-full bg-[#d7b46a] text-sm font-semibold text-[#17130f]">{{ $index + 1 }}</div>
                            <h3 class="mt-5 font-semibold text-[#1f1b16]">{{ $step['title'] }}</h3>
                            <p class="mt-3 text-sm leading-6 text-[#5f574d]">{{ $step['text'] }}</p>
                        </article>
                    @endforeach
                </div>
            </div>
        </section>

        <section id="kontak" class="bg-[#29452f] py-20 text-white sm:py-24">
            <div class="mx-auto grid max-w-7xl gap-10 px-5 lg:grid-cols-[1.05fr_0.95fr] lg:items-center lg:px-8">
                <div class="reveal">
                    <p class="text-sm font-semibold uppercase text-[#f5d681]">Kontak dan Informasi Merchant</p>
                    <h2 class="mt-4 text-3xl font-semibold sm:text-4xl">Diskusikan kebutuhan banjar atau undangan Bali Anda</h2>
                    <p class="mt-5 text-lg leading-8 text-white/76">
                        Kami melayani konsultasi penggunaan portal banjar dan Undangan Bali. Aplikasi disediakan gratis; QRIS digunakan untuk pembayaran iuran warga, dana kegiatan banjar, dan wedding gift.
                    </p>
                </div>
                <div class="reveal rounded-[8px] border border-white/12 bg-white/[0.07] p-6">
                    <dl class="space-y-5 text-sm">
                        <div>
                            <dt class="font-semibold text-[#f5d681]">Badan Usaha</dt>
                            <dd class="mt-1 text-white/82">PT Bali Santih Digital</dd>
                        </div>
                        <div>
                            <dt class="font-semibold text-[#f5d681]">NIB</dt>
                            <dd class="mt-1 text-white/82">220620006618</dd>
                        </div>
                        <div>
                            <dt class="font-semibold text-[#f5d681]">Nama Merchant</dt>
                            <dd class="mt-1 text-white/82">Bali Santih</dd>
                        </div>
                        <div>
                            <dt class="font-semibold text-[#f5d681]">Email Layanan</dt>
                            <dd class="mt-1 text-white/82"><a class="underline underline-offset-4" href="mailto:admin.balisantih@gmail.com">admin.balisantih@gmail.com</a></dd>
                        </div>
                        <div>
                            <dt class="font-semibold text-[#f5d681]">Alamat Operasional</dt>
                            <dd class="mt-1 text-white/82">Denpasar, Bali, Indonesia</dd>
                        </div>
                        <div>
                            <dt class="font-semibold text-[#f5d681]">Jam Layanan</dt>
                            <dd class="mt-1 text-white/82">Senin-Sabtu, 09.00-17.00 WITA</dd>
                        </div>
                    </dl>
                    <a href="mailto:admin.balisantih@gmail.com?subject=Konsultasi%20Layanan%20Bali%20Santih" class="mt-7 inline-flex w-full items-center justify-center rounded-full bg-[#d7b46a] px-6 py-3.5 text-sm font-semibold text-[#17130f] transition hover:-translate-y-0.5 hover:bg-[#efcf82]">
                        Konsultasi via Email
                    </a>
                </div>
            </div>
        </section>
    </main>

    <footer class="bg-[#17130f] py-10 text-white">
        <div class="mx-auto flex max-w-7xl flex-col gap-8 px-5 lg:px-8">
            <div class="flex flex-col gap-6 sm:flex-row sm:items-start sm:justify-between">
                <div>
                    <p class="text-xl font-semibold">Bali Santih</p>
                    <p class="mt-2 text-sm text-white/62">Ngayah lewat teknologi untuk Bali.</p>
                    <p class="mt-4 text-sm font-medium text-white/76">PT Bali Santih Digital</p>
                    <p class="mt-1 text-sm text-white/62">NIB: 220620006618</p>
                </div>
                <div class="text-sm leading-7 text-white/62 sm:text-right">
                    <p>admin.balisantih@gmail.com</p>
                    <p>Denpasar, Bali, Indonesia</p>
                    <p>&copy; {{ date('Y') }} Bali Santih. All rights reserved.</p>
                </div>
            </div>
            <div class="flex flex-wrap gap-4 border-t border-white/10 pt-6 text-sm text-white/62">
                <a class="hover:text-[#f5d681]" href="{{ route('terms') }}">Syarat & Ketentuan</a>
                <a class="hover:text-[#f5d681]" href="{{ route('privacy') }}">Kebijakan Privasi</a>
                <a class="hover:text-[#f5d681]" href="{{ route('refund') }}">Refund & Pembatalan</a>
            </div>
        </div>
    </footer>

    <script>
        const menuToggle = document.querySelector('[data-menu-toggle]');
        const mobileMenu = document.querySelector('[data-mobile-menu]');

        menuToggle?.addEventListener('click', () => {
            mobileMenu?.classList.toggle('hidden');
        });

        mobileMenu?.querySelectorAll('a').forEach((link) => {
            link.addEventListener('click', () => mobileMenu.classList.add('hidden'));
        });

        const observer = new IntersectionObserver((entries) => {
            entries.forEach((entry) => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('is-visible');
                }
            });
        }, { threshold: 0.16 });

        document.querySelectorAll('.reveal').forEach((element) => observer.observe(element));
    </script>
</body>
</html>
