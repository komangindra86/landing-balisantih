<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Bali Santih adalah ekosistem digital untuk banjar, undangan Bali, hunian, dan informasi Wariga yang dikelola oleh PT Bali Santih Digital.">
    <meta name="theme-color" content="#17130f">
    <title>Bali Santih - Ekosistem Digital untuk Kehidupan Bali</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-[#fbfaf6] text-[#1f1b16] antialiased">
    @php
        $applications = [
            [
                'name' => 'Banjar Digital',
                'category' => 'Komunitas & Adat',
                'status' => 'Demo tersedia',
                'description' => 'Ruang kerja digital untuk membantu pengurus menata data krama, kas, iuran, dedosan, aset, laporan, dan pengumuman banjar.',
                'features' => ['Administrasi banjar', 'Portal warga', 'Kas dan laporan', 'Akses dari HP'],
                'url' => 'https://banjartesting.balisantih.com/login',
                'cta' => 'Coba Demo',
                'tone' => 'bg-[#29452f]',
                'icon' => 'M4 20V8l8-5 8 5v12M8 20v-7h8v7',
            ],
            [
                'name' => 'Undangan Bali',
                'category' => 'Momen & Keluarga',
                'status' => 'Tersedia',
                'description' => 'Undangan pernikahan digital bernuansa Bali dengan tampilan elegan, galeri, musik, lokasi acara, dan tautan yang mudah dibagikan.',
                'features' => ['Template bernuansa Bali', 'Galeri dan musik', 'Peta lokasi', 'Wedding gift opsional'],
                'url' => 'https://undangan.balisantih.com',
                'cta' => 'Buka Aplikasi',
                'tone' => 'bg-[#8b4f38]',
                'icon' => 'M12 21s-7-4.6-9-9.2C1.5 8.4 3.5 5 7 5c2 0 3.4 1.1 5 3 1.6-1.9 3-3 5-3 3.5 0 5.5 3.4 4 6.8C19 16.4 12 21 12 21Z',
            ],
            [
                'name' => 'BaliKos',
                'category' => 'Hunian & Mobilitas',
                'status' => 'Tersedia',
                'description' => 'Platform pencarian kos di Bali untuk membandingkan harga, fasilitas, dan lokasi, lalu menghubungi pemilik secara langsung.',
                'features' => ['Pencarian berdasarkan lokasi', 'Harga transparan', 'Detail fasilitas', 'Kontak pemilik langsung'],
                'url' => 'https://balikos.balisantih.com',
                'cta' => 'Cari Kos',
                'tone' => 'bg-[#315b63]',
                'icon' => 'M3 21h18M5 21V5a2 2 0 0 1 2-2h10a2 2 0 0 1 2 2v16M9 8h.01M15 8h.01M9 12h.01M15 12h.01M9 16h6',
            ],
            [
                'name' => 'Wariga Bali Santih',
                'category' => 'Budaya & Waktu',
                'status' => 'Tersedia',
                'description' => 'Layanan informasi Kalender Bali dan Dewasa Ayu dengan penjelasan yang terbuka dan mudah dipahami masyarakat.',
                'features' => ['Kalender Bali', 'Pencarian Dewasa Ayu', 'Alasan rekomendasi', 'Rujukan konsultasi adat'],
                'url' => 'https://wariga.balisantih.com',
                'cta' => 'Buka Wariga',
                'tone' => 'bg-[#725b2d]',
                'icon' => 'M7 3v3M17 3v3M4 9h16M5 5h14a1 1 0 0 1 1 1v14a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1V6a1 1 0 0 1 1-1Zm3 8h3v3H8v-3Z',
            ],
        ];

        $values = [
            [
                'number' => '01',
                'title' => 'Berangkat dari kebutuhan nyata',
                'text' => 'Setiap aplikasi dibangun untuk menjawab pekerjaan dan kebutuhan yang dekat dengan kehidupan masyarakat Bali.',
            ],
            [
                'number' => '02',
                'title' => 'Mudah digunakan dari HP',
                'text' => 'Alur dibuat sederhana agar layanan tetap mudah dijangkau oleh pengurus, warga, keluarga, dan masyarakat luas.',
            ],
            [
                'number' => '03',
                'title' => 'Terbuka dan dapat dipahami',
                'text' => 'Informasi, status layanan, serta transaksi yang tersedia ditampilkan dengan bahasa yang jelas dan transparan.',
            ],
            [
                'number' => '04',
                'title' => 'Tumbuh dengan semangat ngayah',
                'text' => 'Teknologi ditempatkan sebagai alat untuk memperkuat pelayanan, kebersamaan, dan kebermanfaatan untuk Bali.',
            ],
        ];

        $audiences = [
            ['title' => 'Untuk Banjar', 'text' => 'Membantu administrasi, komunikasi, dan pencatatan banjar berjalan lebih rapi.'],
            ['title' => 'Untuk Warga', 'text' => 'Membuka akses informasi dan layanan sehari-hari dengan lebih mudah dari perangkat pribadi.'],
            ['title' => 'Untuk Bali', 'text' => 'Merawat relevansi budaya dan kebersamaan melalui teknologi yang bertanggung jawab.'],
        ];

        $invitationTemplates = [
            ['name' => 'Bali Classic', 'url' => 'https://undangan.balisantih.com/preview/templates/bali-classic'],
            ['name' => 'Pura Sunset', 'url' => 'https://undangan.balisantih.com/preview/templates/pura-sunset'],
            ['name' => 'Ubud Garden', 'url' => 'https://undangan.balisantih.com/preview/templates/ubud-garden'],
            ['name' => 'Royal Kamasan', 'url' => 'https://undangan.balisantih.com/preview/templates/royal-kamasan'],
        ];

        $weddingPaymentDemoUrl = 'https://undangan.balisantih.com/demo/wedding-gift-xendit';

        $services = config('layanan.products');
        $banjarService = $services['banjar-digital-tahunan'];
        $invitationServices = collect($services)->filter(fn ($service) => $service['application'] === 'Undangan Bali');

        $orderSteps = [
            ['title' => 'Pilih layanan dan isi data', 'text' => 'Lengkapi data pemesan dan kebutuhan Anda melalui formulir singkat.'],
            ['title' => 'Bayar dengan aman', 'text' => 'Bayar melalui iPaymu dengan Virtual Account, QRIS, atau gerai retail. Untuk desain custom, tautan pembayaran dikirim setelah harga disepakati.'],
            ['title' => 'Layanan diproses', 'text' => 'Pembayaran terkonfirmasi otomatis, lalu tim kami mengerjakan layanan dan mengabari Anda.'],
        ];

        $price = fn (string $slug) => \App\Support\Rupiah::forProduct($services[$slug]);

        $faqs = [
            [
                'question' => 'Apa itu Bali Santih?',
                'answer' => 'Bali Santih adalah ekosistem aplikasi digital untuk masyarakat Bali yang dikelola oleh PT Bali Santih Digital. Saat ini terdiri dari Banjar Digital, Undangan Bali, BaliKos, dan Wariga Bali Santih.',
            ],
            [
                'question' => 'Apakah aplikasi Bali Santih berbayar?',
                'answer' => 'Akses semua aplikasi gratis, tanpa biaya lisensi. Yang berbayar hanya layanan pendukung: Banjar Digital server dan domain tahunan '.$price('banjar-digital-tahunan').' per tahun, Template Custom Standar '.$price('template-custom-standar').', Template Custom Animasi '.$price('template-custom-animasi').', dan revisi template custom '.$price('revisi-template').' per revisi.',
                'link' => ['label' => 'Lihat Layanan & Harga', 'url' => '#layanan'],
            ],
            [
                'question' => 'Bagaimana cara memesan layanan?',
                'answer' => 'Pilih layanan pada bagian Layanan & Harga, isi formulir pemesanan, lalu selesaikan pembayaran. Untuk template custom, Anda mengirim brief terlebih dahulu; setelah harga final disepakati, kami mengirimkan tautan pembayaran.',
            ],
            [
                'question' => 'Metode pembayaran apa saja yang tersedia?',
                'answer' => 'Pembayaran diproses melalui payment gateway iPaymu. Anda dapat membayar dengan Virtual Account bank, QRIS, atau gerai retail. Pilihan metode yang aktif ditampilkan di halaman pembayaran iPaymu.',
            ],
            [
                'question' => 'Berapa lama batas waktu pembayaran?',
                'answer' => 'Tautan pembayaran berlaku 24 jam. Jika waktunya habis, Anda dapat membuat tautan pembayaran baru dari halaman status pesanan tanpa perlu memesan ulang.',
            ],
            [
                'question' => 'Bagaimana saya tahu pembayaran saya sudah diterima?',
                'answer' => 'Setelah pembayaran terkonfirmasi, halaman status pesanan otomatis berubah menjadi Lunas. Simpan tautan halaman status dan kode pesanan Anda. Tim kami kemudian menghubungi Anda melalui WhatsApp atau email untuk memproses layanan.',
            ],
            [
                'question' => 'Apakah ada biaya tambahan di luar harga yang tertera?',
                'answer' => 'Tidak. Biaya transaksi payment gateway ditanggung Bali Santih. Harga final template custom disampaikan melalui penawaran sebelum pengerjaan dimulai, sehingga tidak ada biaya yang muncul tanpa persetujuan Anda.',
            ],
            [
                'question' => 'Bisakah pesanan dibatalkan dan dana dikembalikan?',
                'answer' => 'Pesanan dapat dibatalkan tanpa biaya selama belum dibayar. Pembayaran yang sudah diterima dapat dikembalikan bila pesanan dibatalkan sebelum pengerjaan dimulai. Setelah desain dikerjakan atau server dan domain diaktifkan, pembayaran tidak dapat dikembalikan kecuali layanan tidak dapat kami berikan.',
                'link' => ['label' => 'Baca kebijakan Refund & Pembatalan', 'url' => route('refund')],
            ],
            [
                'question' => 'Bagaimana dana iuran banjar dan wedding gift diproses?',
                'answer' => 'Pembayaran QRIS di Banjar Digital dan Undangan Bali diproses oleh payment gateway pada akun merchant Bali Santih. Setelah transaksi berhasil, aplikasi mencatat tujuan pembayaran, lalu dana dicairkan atau diteruskan kepada banjar atau pemilik acara yang berhak.',
                'link' => ['label' => 'Lihat Transparansi Pembayaran', 'url' => '#transparansi'],
            ],
            [
                'question' => 'Bagaimana data saya digunakan?',
                'answer' => 'Data yang Anda berikan hanya digunakan untuk menjalankan layanan, seperti memproses pesanan, menghubungi Anda, dan mencatat transaksi. Data tidak dijual kepada pihak ketiga.',
                'link' => ['label' => 'Baca Kebijakan Privasi', 'url' => route('privacy')],
            ],
            [
                'question' => 'Bagaimana cara menghubungi Bali Santih?',
                'answer' => 'Hubungi kami melalui telepon '.config('perusahaan.phone').' atau email '.config('perusahaan.email').'. Kantor kami beralamat di '.config('perusahaan.address').'. Jam layanan '.config('perusahaan.hours').'.',
                'link' => ['label' => 'Lihat kontak', 'url' => '#kontak'],
            ],
        ];
    @endphp

    <header class="fixed inset-x-0 top-0 z-50 border-b border-white/10 bg-[#17130f]/90 text-white shadow-sm backdrop-blur-xl">
        <nav class="mx-auto flex max-w-7xl items-center justify-between px-5 py-3.5 lg:px-8" aria-label="Navigasi utama">
            <a href="#beranda" class="flex items-center gap-3" aria-label="Bali Santih - Beranda">
                <span class="grid h-10 w-10 place-items-center overflow-hidden rounded-full border border-[#d7b46a]/50 bg-white/95 p-1">
                    <img src="{{ asset('images/logobalisantih.png') }}" alt="Logo Bali Santih" class="h-full w-full object-contain">
                </span>
                <span>
                    <span class="block text-base font-semibold leading-none">Bali Santih</span>
                    <span class="mt-1 block text-[11px] text-white/55">Ekosistem Digital Bali</span>
                </span>
            </a>

            <div class="hidden items-center gap-7 text-sm font-medium text-white/75 lg:flex">
                <a class="transition hover:text-[#f5d681]" href="#aplikasi">Aplikasi</a>
                <a class="transition hover:text-[#f5d681]" href="#layanan">Layanan</a>
                <a class="transition hover:text-[#f5d681]" href="#tentang">Tentang</a>
                <a class="transition hover:text-[#f5d681]" href="#ngayah">Konsep Ngayah</a>
                <a class="transition hover:text-[#f5d681]" href="#transparansi">Transparansi</a>
                <a class="transition hover:text-[#f5d681]" href="#faq">FAQ</a>
                <a class="transition hover:text-[#f5d681]" href="#kontak">Kontak</a>
            </div>

            <div class="flex items-center gap-3">
                <a href="#aplikasi" class="hidden items-center gap-2 rounded-full bg-[#d7b46a] px-5 py-2.5 text-sm font-semibold text-[#17130f] transition hover:bg-[#efcf82] sm:inline-flex">
                    Jelajahi Aplikasi
                    <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" aria-hidden="true">
                        <path d="m9 18 6-6-6-6" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                </a>
                <button type="button" class="inline-flex h-10 w-10 items-center justify-center rounded-full border border-white/15 text-white transition hover:bg-white/10 lg:hidden" data-menu-toggle aria-label="Buka menu" aria-expanded="false">
                    <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" aria-hidden="true">
                        <path d="M4 7h16M4 12h16M4 17h16" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"/>
                    </svg>
                </button>
            </div>
        </nav>

        <div class="hidden border-t border-white/10 bg-[#17130f]/98 px-5 pb-5 pt-2 text-sm text-white/80 lg:hidden" data-mobile-menu>
            <div class="mx-auto flex max-w-7xl flex-col gap-1">
                <a class="rounded-[8px] px-3 py-3 hover:bg-white/10" href="#aplikasi">Aplikasi</a>
                <a class="rounded-[8px] px-3 py-3 hover:bg-white/10" href="#layanan">Layanan</a>
                <a class="rounded-[8px] px-3 py-3 hover:bg-white/10" href="#tentang">Tentang</a>
                <a class="rounded-[8px] px-3 py-3 hover:bg-white/10" href="#ngayah">Konsep Ngayah</a>
                <a class="rounded-[8px] px-3 py-3 hover:bg-white/10" href="#transparansi">Transparansi</a>
                <a class="rounded-[8px] px-3 py-3 hover:bg-white/10" href="#faq">FAQ</a>
                <a class="rounded-[8px] px-3 py-3 hover:bg-white/10" href="#kontak">Kontak</a>
            </div>
        </div>
    </header>

    <main>
        <section id="beranda" class="relative isolate flex min-h-[86vh] flex-col overflow-hidden pt-[69px] text-white">
            <img src="{{ asset('images/bali-santih-hero.png') }}" alt="Kehidupan masyarakat Bali yang tumbuh bersama teknologi" class="absolute inset-0 -z-20 h-full w-full object-cover object-center">
            <div class="absolute inset-0 -z-10 bg-[linear-gradient(90deg,rgba(20,17,13,0.96)_0%,rgba(20,17,13,0.82)_48%,rgba(20,17,13,0.25)_100%)]"></div>
            <div class="absolute inset-x-0 bottom-0 -z-10 h-44 bg-[linear-gradient(0deg,rgba(20,17,13,0.72),transparent)]"></div>

            <div class="mx-auto flex w-full max-w-7xl flex-1 items-center px-5 py-14 lg:px-8">
                <div class="max-w-3xl reveal">
                    <p class="flex items-center gap-3 text-sm font-semibold text-[#f5d681]">
                        <span class="h-px w-10 bg-[#d7b46a]"></span>
                        PT Bali Santih Digital
                    </p>
                    <h1 class="mt-6 max-w-4xl text-4xl font-semibold leading-[1.12] text-white sm:text-5xl lg:text-6xl">
                        Ekosistem digital untuk kehidupan Bali
                    </h1>
                    <p class="mt-6 max-w-2xl text-base leading-8 text-white/78 sm:text-lg">
                        Bali Santih menghadirkan layanan digital untuk banjar, keluarga, hunian, dan pengetahuan budaya. Teknologi yang modern, mudah digunakan, dan tetap tumbuh dari semangat ngayah untuk Bali.
                    </p>
                    <div class="mt-9 flex flex-col gap-3 sm:flex-row">
                        <a href="#aplikasi" class="inline-flex items-center justify-center gap-2 rounded-full bg-[#d7b46a] px-6 py-3.5 text-sm font-semibold text-[#17130f] shadow-xl shadow-black/20 transition hover:-translate-y-0.5 hover:bg-[#efcf82]">
                            Lihat Semua Aplikasi
                            <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" aria-hidden="true">
                                <path d="m9 18 6-6-6-6" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                        </a>
                        <a href="#kontak" class="inline-flex items-center justify-center rounded-full border border-white/25 bg-white/10 px-6 py-3.5 text-sm font-semibold text-white backdrop-blur transition hover:-translate-y-0.5 hover:bg-white/15">
                            Konsultasi dengan Kami
                        </a>
                    </div>
                </div>
            </div>

            <div class="border-t border-white/12 bg-[#17130f]/55 backdrop-blur-md">
                <div class="mx-auto grid max-w-7xl grid-cols-2 px-5 text-xs font-medium text-white/70 sm:grid-cols-4 lg:px-8">
                    @foreach ($applications as $application)
                        <a href="#aplikasi" class="border-white/10 px-3 py-4 transition hover:bg-white/[0.06] hover:text-white sm:border-l sm:first:border-l-0">
                            <span class="block text-[#f5d681]">{{ sprintf('%02d', $loop->iteration) }}</span>
                            <span class="mt-1 block">{{ $application['name'] }}</span>
                        </a>
                    @endforeach
                </div>
            </div>
        </section>

        <section id="aplikasi" class="scroll-mt-20 bg-white py-20 sm:py-24">
            <div class="mx-auto max-w-7xl px-5 lg:px-8">
                <div class="grid gap-8 lg:grid-cols-[0.75fr_1.25fr] lg:items-end">
                    <div class="reveal">
                        <p class="text-sm font-semibold uppercase text-[#8a6a2e]">Empat Aplikasi, Satu Ekosistem</p>
                        <h2 class="mt-4 text-3xl font-semibold leading-tight text-[#1f1b16] sm:text-4xl">Temukan layanan yang sesuai dengan kebutuhan Anda</h2>
                    </div>
                    <p class="reveal max-w-2xl text-lg leading-8 text-[#5f574d] lg:justify-self-end">
                        Setiap aplikasi memiliki fokus yang jelas dan dapat diakses langsung melalui subdomain Bali Santih. Pilih layanan untuk melihat pengalaman lengkapnya.
                    </p>
                </div>

                <div class="mt-12 grid gap-6 md:grid-cols-2">
                    @foreach ($applications as $application)
                        <article class="reveal group flex min-h-[430px] flex-col overflow-hidden rounded-[8px] border border-[#e4dac7] bg-[#fbfaf6] transition hover:-translate-y-1 hover:border-[#c9aa69] hover:shadow-2xl hover:shadow-[#1f1b16]/10">
                            <div class="{{ $application['tone'] }} flex items-start justify-between p-6 text-white">
                                <div class="grid h-12 w-12 place-items-center rounded-full border border-white/20 bg-white/10 text-[#f5d681]">
                                    <svg class="h-6 w-6" viewBox="0 0 24 24" fill="none" aria-hidden="true">
                                        <path d="{{ $application['icon'] }}" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"/>
                                    </svg>
                                </div>
                                <span class="rounded-full border border-white/20 bg-black/10 px-3 py-1.5 text-xs font-medium text-white/82">{{ $application['status'] }}</span>
                            </div>
                            <div class="flex flex-1 flex-col p-6 sm:p-7">
                                <p class="text-xs font-semibold uppercase text-[#8a6a2e]">{{ $application['category'] }}</p>
                                <h3 class="mt-3 text-2xl font-semibold text-[#1f1b16]">{{ $application['name'] }}</h3>
                                <p class="mt-4 leading-7 text-[#5f574d]">{{ $application['description'] }}</p>
                                <ul class="mt-6 grid gap-3 text-sm text-[#3d352c] sm:grid-cols-2">
                                    @foreach ($application['features'] as $feature)
                                        <li class="flex items-center gap-2.5">
                                            <svg class="h-4 w-4 shrink-0 text-[#557650]" viewBox="0 0 24 24" fill="none" aria-hidden="true">
                                                <path d="m5 12 4 4L19 6" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"/>
                                            </svg>
                                            <span>{{ $feature }}</span>
                                        </li>
                                    @endforeach
                                </ul>
                                <a href="{{ $application['url'] }}" target="_blank" rel="noopener" class="mt-auto inline-flex items-center justify-between border-t border-[#dfd3bd] pt-6 text-sm font-semibold text-[#29452f] transition group-hover:text-[#1f3524]">
                                    {{ $application['cta'] }}
                                    <span class="grid h-9 w-9 place-items-center rounded-full bg-[#29452f] text-white transition group-hover:translate-x-1">
                                        <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" aria-hidden="true">
                                            <path d="M5 12h14m-6-6 6 6-6 6" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                        </svg>
                                    </span>
                                </a>
                            </div>
                        </article>
                    @endforeach
                </div>
            </div>
        </section>

        <section id="layanan" class="scroll-mt-20 border-t border-[#ece3d2] bg-[#fbfaf6] py-20 sm:py-24">
            <div class="mx-auto max-w-7xl px-5 lg:px-8">
                <div class="grid gap-8 lg:grid-cols-[0.75fr_1.25fr] lg:items-end">
                    <div class="reveal">
                        <p class="text-sm font-semibold uppercase text-[#8a6a2e]">Layanan & Harga</p>
                        <h2 class="mt-4 text-3xl font-semibold leading-tight text-[#1f1b16] sm:text-4xl">Aplikasi tetap gratis, layanan pendukung dengan harga terbuka</h2>
                    </div>
                    <p class="reveal max-w-2xl text-lg leading-8 text-[#5f574d] lg:justify-self-end">
                        Semua aplikasi Bali Santih dapat digunakan tanpa biaya lisensi. Untuk kebutuhan tambahan seperti alamat web sendiri bagi banjar atau desain undangan khusus, Anda dapat memesannya langsung di sini.
                    </p>
                </div>

                <div class="mt-12 grid gap-6 lg:grid-cols-[0.9fr_1.1fr]">
                    <article class="reveal flex flex-col overflow-hidden rounded-[8px] bg-[#29452f] text-white">
                        <div class="flex-1 p-6 sm:p-8">
                            <p class="text-xs font-semibold uppercase text-[#f5d681]">{{ $banjarService['application'] }}</p>
                            <h3 class="mt-3 text-2xl font-semibold">Server & domain tahunan</h3>
                            <p class="mt-4 leading-7 text-white/72">{{ $banjarService['summary'] }}</p>

                            <p class="mt-8 flex flex-wrap items-baseline gap-x-2">
                                <span class="text-4xl font-semibold">{{ \App\Support\Rupiah::forProduct($banjarService) }}</span>
                                <span class="text-sm text-white/60">{{ $banjarService['unit'] }}</span>
                            </p>
                            <dl class="mt-5 divide-y divide-white/10 border-y border-white/10 text-sm">
                                @foreach ($banjarService['breakdown'] as $line)
                                    <div class="flex justify-between gap-4 py-3">
                                        <dt class="text-white/65">{{ $line['label'] }}</dt>
                                        <dd class="text-white/90">{{ \App\Support\Rupiah::format($line['amount']) }} / tahun</dd>
                                    </div>
                                @endforeach
                            </dl>
                            <ul class="mt-6 grid gap-3 text-sm text-white/85">
                                @foreach ($banjarService['includes'] as $include)
                                    <li class="flex items-center gap-2.5">
                                        <svg class="h-4 w-4 shrink-0 text-[#f5d681]" viewBox="0 0 24 24" fill="none" aria-hidden="true">
                                            <path d="m5 12 4 4L19 6" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"/>
                                        </svg>
                                        <span>{{ $include }}</span>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="border-t border-white/10 p-6 sm:px-8">
                            <a href="{{ route('orders.create', 'banjar-digital-tahunan') }}" class="inline-flex w-full items-center justify-center gap-2 rounded-full bg-[#d7b46a] px-6 py-3.5 text-sm font-semibold text-[#17130f] transition hover:-translate-y-0.5 hover:bg-[#efcf82]">
                                Pesan Sekarang
                                <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" aria-hidden="true">
                                    <path d="M5 12h14m-6-6 6 6-6 6" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>
                            </a>
                        </div>
                    </article>

                    <article class="reveal flex flex-col overflow-hidden rounded-[8px] border border-[#e4dac7] bg-white">
                        <div class="p-6 sm:p-8">
                            <p class="text-xs font-semibold uppercase text-[#8a6a2e]">Undangan Bali</p>
                            <h3 class="mt-3 text-2xl font-semibold text-[#1f1b16]">Template undangan & desain custom</h3>
                            <p class="mt-4 leading-7 text-[#5f574d]">Mulai dengan template gratis, atau pesan desain khusus sesuai tema, warna, dan cerita acara Anda.</p>
                        </div>
                        <ul class="flex-1 divide-y divide-[#eee5d6] border-t border-[#eee5d6]">
                            @foreach ($invitationServices as $slug => $service)
                                <li class="flex flex-col gap-4 px-6 py-5 sm:px-8 xl:flex-row xl:items-center xl:justify-between">
                                    <div class="xl:max-w-xs">
                                        <p class="font-semibold text-[#1f1b16]">{{ $service['name'] }}</p>
                                        <p class="mt-1 text-sm leading-6 text-[#6f6558]">{{ $service['summary'] }}</p>
                                    </div>
                                    <div class="flex items-center justify-between gap-5 xl:justify-end">
                                        <p class="whitespace-nowrap xl:text-right">
                                            <span class="block font-semibold text-[#29452f]">{{ \App\Support\Rupiah::forProduct($service) }}</span>
                                            <span class="block text-xs text-[#8b8175]">{{ $service['unit'] ?? ($service['pricing'] === 'quote' ? 'kisaran harga' : 'tanpa biaya') }}</span>
                                        </p>
                                        @if ($service['pricing'] === 'free')
                                            <a href="{{ $service['url'] }}" target="_blank" rel="noopener" class="inline-flex shrink-0 items-center rounded-full border border-[#cdbd9f] px-4 py-2 text-sm font-semibold text-[#3d352c] transition hover:border-[#8a6a2e]">Buka Aplikasi</a>
                                        @else
                                            <a href="{{ route('orders.create', $slug) }}" class="inline-flex shrink-0 items-center rounded-full bg-[#29452f] px-4 py-2 text-sm font-semibold text-white transition hover:bg-[#1f3524]">{{ $service['pricing'] === 'quote' ? 'Ajukan Pesanan' : 'Pesan' }}</a>
                                        @endif
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                        <p class="border-t border-[#eee5d6] bg-[#faf8f3] px-6 py-5 text-sm leading-6 text-[#5f574d] sm:px-8">
                            Harga template custom menyesuaikan tingkat kerumitan desain. Ajukan brief Anda terlebih dahulu, lalu kami kirimkan penawaran harga final sebelum pengerjaan dimulai.
                        </p>
                    </article>
                </div>

                <div class="mt-12 grid gap-x-8 gap-y-8 sm:grid-cols-3">
                    @foreach ($orderSteps as $step)
                        <div class="reveal border-t border-[#d9cdb8] pt-5">
                            <span class="text-sm font-semibold text-[#8a6a2e]">{{ sprintf('%02d', $loop->iteration) }}</span>
                            <h3 class="mt-3 font-semibold text-[#1f1b16]">{{ $step['title'] }}</h3>
                            <p class="mt-2 text-sm leading-7 text-[#665d52]">{{ $step['text'] }}</p>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>

        <section id="tentang" class="scroll-mt-20 bg-[#f0eee7] py-20 sm:py-24">
            <div class="mx-auto grid max-w-7xl gap-12 px-5 lg:grid-cols-[1.05fr_0.95fr] lg:items-center lg:px-8">
                <div class="reveal">
                    <p class="text-sm font-semibold uppercase text-[#8a6a2e]">Tentang Bali Santih</p>
                    <h2 class="mt-4 max-w-2xl text-3xl font-semibold leading-tight text-[#1f1b16] sm:text-4xl">Teknologi yang tumbuh dari nilai Bali</h2>
                    <p class="mt-6 max-w-2xl text-lg leading-8 text-[#5f574d]">
                        Bali Santih bukan sekadar kumpulan aplikasi. Kami membangun ekosistem layanan yang membantu masyarakat mengelola administrasi, komunikasi, momen keluarga, hunian, dan informasi budaya secara lebih mudah dan tertata.
                    </p>
                    <p class="mt-5 max-w-2xl leading-7 text-[#6b6257]">
                        Seluruh layanan dikembangkan dan dikelola oleh PT Bali Santih Digital, badan usaha yang berbasis di Denpasar, Bali.
                    </p>
                </div>
                <div class="reveal border-y border-[#d8cbb4] py-3">
                    <dl class="divide-y divide-[#d8cbb4]">
                        <div class="grid grid-cols-[90px_1fr] gap-5 py-5 sm:grid-cols-[130px_1fr]">
                            <dt class="text-3xl font-semibold text-[#29452f]">4</dt>
                            <dd>
                                <span class="block font-semibold text-[#1f1b16]">Aplikasi dalam satu ekosistem</span>
                                <span class="mt-1 block text-sm leading-6 text-[#6b6257]">Melayani kebutuhan komunitas, keluarga, hunian, dan budaya.</span>
                            </dd>
                        </div>
                        <div class="grid grid-cols-[90px_1fr] gap-5 py-5 sm:grid-cols-[130px_1fr]">
                            <dt class="text-3xl font-semibold text-[#29452f]">PT</dt>
                            <dd>
                                <span class="block font-semibold text-[#1f1b16]">PT Bali Santih Digital</span>
                                <span class="mt-1 block text-sm leading-6 text-[#6b6257]">NIB 2206260006618</span>
                            </dd>
                        </div>
                        <div class="grid grid-cols-[90px_1fr] gap-5 py-5 sm:grid-cols-[130px_1fr]">
                            <dt class="text-3xl font-semibold text-[#29452f]">Bali</dt>
                            <dd>
                                <span class="block font-semibold text-[#1f1b16]">Dibangun dekat dengan penggunanya</span>
                                <span class="mt-1 block text-sm leading-6 text-[#6b6257]">Berangkat dari Denpasar untuk memberi manfaat lebih luas.</span>
                            </dd>
                        </div>
                    </dl>
                </div>
            </div>
        </section>

        <section id="ngayah" class="scroll-mt-20 bg-[#29452f] py-20 text-white sm:py-24">
            <div class="mx-auto max-w-7xl px-5 lg:px-8">
                <div class="grid gap-8 lg:grid-cols-[0.85fr_1.15fr]">
                    <div class="reveal">
                        <p class="text-sm font-semibold uppercase text-[#f5d681]">Konsep Ngayah</p>
                        <h2 class="mt-4 text-3xl font-semibold leading-tight sm:text-4xl">Mengutamakan manfaat, bukan sekadar aplikasi</h2>
                    </div>
                    <p class="reveal max-w-2xl text-lg leading-8 text-white/72 lg:justify-self-end">
                        Kami percaya teknologi terbaik adalah teknologi yang membantu orang banyak. Semangat ngayah menjadi cara Bali Santih menentukan apa yang perlu dibangun dan bagaimana layanan diberikan.
                    </p>
                </div>

                <div class="mt-14 grid gap-8 md:grid-cols-3">
                    @foreach ($audiences as $audience)
                        <article class="reveal border-t border-[#d7b46a]/55 pt-6">
                            <span class="text-sm font-semibold text-[#f5d681]">{{ sprintf('%02d', $loop->iteration) }}</span>
                            <h3 class="mt-5 text-xl font-semibold">{{ $audience['title'] }}</h3>
                            <p class="mt-3 leading-7 text-white/68">{{ $audience['text'] }}</p>
                        </article>
                    @endforeach
                </div>
            </div>
        </section>

        <section class="bg-white py-20 sm:py-24">
            <div class="mx-auto max-w-7xl px-5 lg:px-8">
                <div class="max-w-3xl reveal">
                    <p class="text-sm font-semibold uppercase text-[#8a6a2e]">Cara Kami Bekerja</p>
                    <h2 class="mt-4 text-3xl font-semibold leading-tight text-[#1f1b16] sm:text-4xl">Digital yang tenang, jelas, dan dekat dengan masyarakat</h2>
                </div>
                <div class="mt-12 grid gap-x-8 gap-y-10 sm:grid-cols-2 lg:grid-cols-4">
                    @foreach ($values as $value)
                        <article class="reveal border-t border-[#d9cdb8] pt-5">
                            <span class="text-sm font-semibold text-[#8a6a2e]">{{ $value['number'] }}</span>
                            <h3 class="mt-5 text-lg font-semibold leading-7 text-[#1f1b16]">{{ $value['title'] }}</h3>
                            <p class="mt-3 text-sm leading-7 text-[#665d52]">{{ $value['text'] }}</p>
                        </article>
                    @endforeach
                </div>
            </div>
        </section>

        <section id="transparansi" class="scroll-mt-20 bg-[#f0eee7] py-20 sm:py-24">
            <div class="mx-auto max-w-7xl px-5 lg:px-8">
                <div class="grid gap-10 lg:grid-cols-[0.85fr_1.15fr]">
                    <div class="reveal">
                        <p class="text-sm font-semibold uppercase text-[#8a6a2e]">Transparansi Pembayaran</p>
                        <h2 class="mt-4 text-3xl font-semibold leading-tight text-[#1f1b16] sm:text-4xl">Akses aplikasi gratis, transaksi dijelaskan secara terbuka</h2>
                        <p class="mt-5 text-lg leading-8 text-[#5f574d]">
                            Integrasi QRIS saat ini digunakan pada Banjar Digital dan Undangan Bali. BaliKos dan Wariga Bali Santih tidak termasuk dalam alur pembayaran ini.
                        </p>
                    </div>

                    <div class="reveal overflow-hidden rounded-[8px] border border-[#d9cdb8] bg-white">
                        <div class="grid divide-y divide-[#e8dfcf] sm:grid-cols-2 sm:divide-x sm:divide-y-0">
                            <div class="p-6">
                                <p class="text-xs font-semibold uppercase text-[#8a6a2e]">Banjar Digital</p>
                                <h3 class="mt-3 text-xl font-semibold text-[#1f1b16]">Iuran dan dana banjar</h3>
                                <p class="mt-3 text-sm leading-7 text-[#5f574d]">QRIS dapat digunakan untuk iuran warga, sesari, urunan, dedosan, dan dana kegiatan yang ditetapkan pengurus.</p>
                                <p class="mt-4 font-semibold text-[#29452f]">Rp10.000 - Rp5.000.000</p>
                            </div>
                            <div class="p-6">
                                <p class="text-xs font-semibold uppercase text-[#8a6a2e]">Undangan Bali</p>
                                <h3 class="mt-3 text-xl font-semibold text-[#1f1b16]">Wedding gift opsional</h3>
                                <p class="mt-3 text-sm leading-7 text-[#5f574d]">Tamu dapat memilih nominal wedding gift secara sukarela. Pembuatan dan akses undangan tetap gratis.</p>
                                <p class="mt-4 font-semibold text-[#29452f]">Rp10.000 - Rp5.000.000</p>
                            </div>
                        </div>
                        <div class="border-t border-[#e8dfcf] bg-[#faf8f3] p-6">
                            <h3 class="font-semibold text-[#1f1b16]">Bagaimana dana diproses?</h3>
                            <p class="mt-3 text-sm leading-7 text-[#5f574d]">
                                Pembayaran diproses terlebih dahulu oleh payment gateway pada akun merchant Bali Santih. Setelah transaksi berhasil dan settlement, aplikasi mencatat tujuan pembayaran sebelum dana dicairkan atau diteruskan kepada pihak yang berhak sesuai ketentuan layanan.
                            </p>
                            <div class="mt-5 flex flex-wrap gap-3">
                                <a href="{{ $weddingPaymentDemoUrl }}" target="_blank" rel="noopener" class="inline-flex items-center gap-2 rounded-full bg-[#29452f] px-5 py-3 text-sm font-semibold text-white transition hover:bg-[#1f3524]">
                                    Coba Demo Pembayaran
                                    <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" aria-hidden="true">
                                        <path d="M7 17 17 7M8 7h9v9" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                    </svg>
                                </a>
                                <a href="{{ route('terms') }}" class="inline-flex items-center rounded-full border border-[#cdbd9f] bg-white px-5 py-3 text-sm font-semibold text-[#3d352c] transition hover:border-[#8a6a2e]">
                                    Baca Ketentuan
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <details class="reveal mt-8 rounded-[8px] border border-[#d9cdb8] bg-white p-5">
                    <summary class="cursor-pointer font-semibold text-[#1f1b16]">Akses demo untuk reviewer</summary>
                    <div class="mt-5 grid gap-5 border-t border-[#e8dfcf] pt-5 md:grid-cols-2">
                        <div>
                            <p class="font-semibold text-[#1f1b16]">Demo Pengurus Banjar</p>
                            <p class="mt-2 text-sm leading-6 text-[#5f574d]">Email: demo.banjar@balisantih.com</p>
                            <p class="text-sm leading-6 text-[#5f574d]">Password: DemoBaliSantih123</p>
                            <a href="https://banjartesting.balisantih.com/login" target="_blank" rel="noopener" class="mt-3 inline-flex text-sm font-semibold text-[#29452f] underline underline-offset-4">Buka demo pengurus</a>
                        </div>
                        <div>
                            <p class="font-semibold text-[#1f1b16]">Demo Portal Warga</p>
                            <p class="mt-2 text-sm leading-6 text-[#5f574d]">Email: demo.warga@balisantih.com</p>
                            <p class="text-sm leading-6 text-[#5f574d]">Password: DemoBaliSantih123</p>
                            <a href="https://banjartesting.balisantih.com/portal" target="_blank" rel="noopener" class="mt-3 inline-flex text-sm font-semibold text-[#29452f] underline underline-offset-4">Buka demo warga</a>
                        </div>
                    </div>
                    <div class="mt-5 flex flex-wrap gap-2 border-t border-[#e8dfcf] pt-5">
                        @foreach ($invitationTemplates as $template)
                            <a href="{{ $template['url'] }}" target="_blank" rel="noopener" class="rounded-full border border-[#d7b46a] px-4 py-2 text-sm font-semibold text-[#3d352c] transition hover:bg-[#f4ead4]">
                                {{ $template['name'] }}
                            </a>
                        @endforeach
                    </div>
                </details>
            </div>
        </section>

        <section id="faq" class="scroll-mt-20 bg-white py-20 sm:py-24">
            <div class="mx-auto grid max-w-7xl gap-10 px-5 lg:grid-cols-[0.75fr_1.25fr] lg:px-8">
                <div class="reveal">
                    <p class="text-sm font-semibold uppercase text-[#8a6a2e]">Pertanyaan Umum</p>
                    <h2 class="mt-4 text-3xl font-semibold leading-tight text-[#1f1b16] sm:text-4xl">Hal yang sering ditanyakan</h2>
                    <p class="mt-5 text-lg leading-8 text-[#5f574d]">
                        Jawaban singkat seputar aplikasi, pemesanan layanan, pembayaran, dan pengembalian dana. Belum menemukan jawabannya? Hubungi kami.
                    </p>
                </div>

                <div class="reveal divide-y divide-[#e8dfcf] border-y border-[#e8dfcf]">
                    @foreach ($faqs as $faq)
                        <details class="group py-1">
                            <summary class="flex cursor-pointer list-none items-center justify-between gap-6 py-4 font-semibold text-[#1f1b16] [&::-webkit-details-marker]:hidden">
                                {{ $faq['question'] }}
                                <svg class="h-5 w-5 shrink-0 text-[#8a6a2e] transition group-open:rotate-45" viewBox="0 0 24 24" fill="none" aria-hidden="true">
                                    <path d="M12 5v14M5 12h14" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
                                </svg>
                            </summary>
                            <div class="pb-5 pr-10 text-sm leading-7 text-[#5f574d]">
                                <p>{{ $faq['answer'] }}</p>
                                @isset($faq['link'])
                                    <a href="{{ $faq['link']['url'] }}" class="mt-2 inline-flex font-semibold text-[#29452f] underline underline-offset-4">{{ $faq['link']['label'] }}</a>
                                @endisset
                            </div>
                        </details>
                    @endforeach
                </div>
            </div>
        </section>

        <section id="kontak" class="scroll-mt-20 bg-[#17130f] py-20 text-white sm:py-24">
            <div class="mx-auto max-w-7xl px-5 lg:px-8">
                <div class="grid gap-12 lg:grid-cols-[1.15fr_0.85fr] lg:items-end">
                    <div class="reveal">
                        <p class="text-sm font-semibold uppercase text-[#f5d681]">Tumbuh Bersama Bali Santih</p>
                        <h2 class="mt-4 max-w-3xl text-3xl font-semibold leading-tight sm:text-4xl lg:text-5xl">Punya kebutuhan digital untuk komunitas atau masyarakat Bali?</h2>
                        <p class="mt-6 max-w-2xl text-lg leading-8 text-white/68">
                            Ceritakan kebutuhan Anda. Kami terbuka untuk konsultasi, kolaborasi, dan pengembangan layanan yang memberi manfaat nyata.
                        </p>
                        <a href="mailto:admin.balisantih@gmail.com?subject=Konsultasi%20Bali%20Santih" class="mt-8 inline-flex items-center gap-2 rounded-full bg-[#d7b46a] px-6 py-3.5 text-sm font-semibold text-[#17130f] transition hover:-translate-y-0.5 hover:bg-[#efcf82]">
                            Hubungi Bali Santih
                            <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" aria-hidden="true">
                                <path d="M5 12h14m-6-6 6 6-6 6" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                        </a>
                    </div>
                    <dl class="reveal divide-y divide-white/10 border-y border-white/10 text-sm">
                        <div class="grid grid-cols-[110px_1fr] gap-4 py-4">
                            <dt class="text-white/48">Perusahaan</dt>
                            <dd class="text-white/82">{{ config('perusahaan.name') }}</dd>
                        </div>
                        <div class="grid grid-cols-[110px_1fr] gap-4 py-4">
                            <dt class="text-white/48">NIB</dt>
                            <dd class="text-white/82">{{ config('perusahaan.nib') }}</dd>
                        </div>
                        <div class="grid grid-cols-[110px_1fr] gap-4 py-4">
                            <dt class="text-white/48">Alamat</dt>
                            <dd class="text-white/82">{{ config('perusahaan.address') }}, Indonesia</dd>
                        </div>
                        <div class="grid grid-cols-[110px_1fr] gap-4 py-4">
                            <dt class="text-white/48">Telepon</dt>
                            <dd><a class="text-white/82 underline underline-offset-4 hover:text-[#f5d681]" href="tel:{{ config('perusahaan.phone_link') }}">{{ config('perusahaan.phone') }}</a></dd>
                        </div>
                        <div class="grid grid-cols-[110px_1fr] gap-4 py-4">
                            <dt class="text-white/48">Email</dt>
                            <dd><a class="text-white/82 underline underline-offset-4 hover:text-[#f5d681]" href="mailto:{{ config('perusahaan.email') }}">{{ config('perusahaan.email') }}</a></dd>
                        </div>
                        <div class="grid grid-cols-[110px_1fr] gap-4 py-4">
                            <dt class="text-white/48">Jam layanan</dt>
                            <dd class="text-white/82">{{ config('perusahaan.hours') }}</dd>
                        </div>
                    </dl>
                </div>
            </div>
        </section>
    </main>

    <footer class="border-t border-white/8 bg-[#17130f] py-9 text-white">
        <div class="mx-auto max-w-7xl px-5 lg:px-8">
            <div class="flex flex-col gap-8 sm:flex-row sm:items-start sm:justify-between">
                <div class="flex items-center gap-3">
                    <span class="grid h-10 w-10 place-items-center overflow-hidden rounded-full border border-[#d7b46a]/40 bg-white/95 p-1">
                        <img src="{{ asset('images/logobalisantih.png') }}" alt="Logo Bali Santih" class="h-full w-full object-contain">
                    </span>
                    <div>
                        <p class="font-semibold">Bali Santih</p>
                        <p class="mt-1 text-sm text-white/52">Ngayah lewat teknologi untuk Bali.</p>
                    </div>
                </div>
                <div class="flex flex-wrap gap-x-5 gap-y-3 text-sm text-white/55 sm:justify-end">
                    <a class="hover:text-[#f5d681]" href="#faq">FAQ</a>
                    <a class="hover:text-[#f5d681]" href="{{ route('terms') }}">Syarat & Ketentuan</a>
                    <a class="hover:text-[#f5d681]" href="{{ route('privacy') }}">Kebijakan Privasi</a>
                    <a class="hover:text-[#f5d681]" href="{{ route('refund') }}">Refund & Pembatalan</a>
                </div>
            </div>
            <div class="mt-8 flex flex-col gap-2 border-t border-white/8 pt-6 text-xs text-white/42 sm:flex-row sm:items-center sm:justify-between">
                <p>{{ config('perusahaan.name') }} &middot; NIB {{ config('perusahaan.nib') }} &middot; {{ config('perusahaan.address') }} &middot; {{ config('perusahaan.phone') }}</p>
                <p>&copy; {{ date('Y') }} Bali Santih. All rights reserved.</p>
            </div>
        </div>
    </footer>

    <script>
        document.documentElement.classList.add('js');

        const menuToggle = document.querySelector('[data-menu-toggle]');
        const mobileMenu = document.querySelector('[data-mobile-menu]');

        menuToggle?.addEventListener('click', () => {
            const isOpen = !mobileMenu?.classList.toggle('hidden');
            menuToggle.setAttribute('aria-expanded', String(isOpen));
        });

        mobileMenu?.querySelectorAll('a').forEach((link) => {
            link.addEventListener('click', () => {
                mobileMenu.classList.add('hidden');
                menuToggle?.setAttribute('aria-expanded', 'false');
            });
        });

        const observer = new IntersectionObserver((entries) => {
            entries.forEach((entry) => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('is-visible');
                    observer.unobserve(entry.target);
                }
            });
        }, { threshold: 0.12 });

        document.querySelectorAll('.reveal').forEach((element) => observer.observe(element));
    </script>
</body>
</html>
