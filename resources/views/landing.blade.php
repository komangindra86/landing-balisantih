<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Bali Santih menyediakan layanan Banjar Digital, Portal Warga, dan Undangan Bali digital untuk masyarakat Bali. Lihat paket, harga, alur layanan, dan kebijakan.">
    <title>Bali Santih - Banjar Digital dan Undangan Bali</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-[#fbfaf6] text-[#1f1b16] antialiased">
    @php
        $services = [
            [
                'title' => 'Banjar Digital',
                'price' => 'Mulai Rp1.500.000',
                'period' => 'setup awal',
                'text' => 'Sistem administrasi banjar untuk data krama, kas, dedosan, iuran, pengumuman, laporan, dan dashboard pengurus.',
                'points' => ['Pendataan kebutuhan banjar', 'Konfigurasi awal sistem', 'Pelatihan pengurus', 'Pendampingan awal'],
                'icon' => 'M4 20V8l8-5 8 5v12M8 20v-7h8v7',
            ],
            [
                'title' => 'Portal Warga Banjar',
                'price' => 'Mulai Rp350.000',
                'period' => 'per bulan',
                'text' => 'Portal warga untuk melihat profil, pengumuman, dedosan, iuran, dan laporan kas yang sudah disetujui pengurus.',
                'points' => ['Akses warga berbasis HP', 'Informasi banjar terpusat', 'Pengumuman dan laporan kas', 'Maintenance ringan'],
                'icon' => 'M8 7a4 4 0 1 0 8 0 4 4 0 0 0-8 0Zm-3 15a7 7 0 0 1 14 0',
            ],
            [
                'title' => 'Undangan Pernikahan Bali',
                'price' => 'Mulai Rp99.000',
                'period' => 'per acara',
                'text' => 'Undangan digital bernuansa Bali dengan template, foto, musik, lokasi, countdown, link publik, dan fitur Wedding Gift opsional.',
                'points' => ['Template Bali Classic, Pura Sunset, Ubud Garden, Royal Kamasan', 'Link undangan publik', 'Galeri dan musik', 'Wedding Gift QRIS opsional'],
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
            ['title' => 'Konsultasi', 'text' => 'Ceritakan kebutuhan banjar, desa adat, komunitas, atau acara pawiwahan.'],
            ['title' => 'Penawaran', 'text' => 'Kami kirim paket layanan, ruang lingkup, harga, dan estimasi pengerjaan.'],
            ['title' => 'Pembayaran', 'text' => 'Pembayaran dilakukan setelah paket disepakati dan invoice atau link bayar dikirimkan.'],
            ['title' => 'Pengerjaan', 'text' => 'Tim menyiapkan sistem, undangan, data awal, atau konfigurasi sesuai layanan.'],
            ['title' => 'Serah Terima', 'text' => 'Hasil dicek bersama, lalu dilakukan revisi ringan dan pendampingan awal.'],
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
                <a class="transition hover:text-[#f5d681]" href="#layanan">Layanan</a>
                <a class="transition hover:text-[#f5d681]" href="#banjar">Banjar Digital</a>
                <a class="transition hover:text-[#f5d681]" href="#undangan">Undangan Bali</a>
                <a class="transition hover:text-[#f5d681]" href="#alur">Alur</a>
                <a class="transition hover:text-[#f5d681]" href="#kontak">Kontak</a>
            </div>

            <a href="#layanan" class="hidden rounded-full bg-[#d7b46a] px-5 py-2.5 text-sm font-semibold text-[#17130f] shadow-lg shadow-black/10 transition hover:-translate-y-0.5 hover:bg-[#efcf82] lg:inline-flex">
                Lihat Harga
            </a>
        </nav>

        <div class="hidden border-t border-white/10 bg-[#17130f]/96 px-5 pb-5 pt-2 text-sm text-white/80 lg:hidden" data-mobile-menu>
            <div class="mx-auto flex max-w-7xl flex-col gap-1">
                <a class="rounded-[8px] px-3 py-3 hover:bg-white/10" href="#layanan">Layanan</a>
                <a class="rounded-[8px] px-3 py-3 hover:bg-white/10" href="#banjar">Banjar Digital</a>
                <a class="rounded-[8px] px-3 py-3 hover:bg-white/10" href="#undangan">Undangan Bali</a>
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
                        Banjar Digital, Portal Warga, dan Undangan Bali
                    </div>
                    <h1 class="max-w-4xl text-4xl font-semibold leading-tight text-white sm:text-5xl lg:text-6xl">
                        Layanan digital Bali untuk administrasi banjar dan acara keluarga
                    </h1>
                    <p class="mt-6 max-w-2xl text-base leading-8 text-white/80 sm:text-lg">
                        Bali Santih membantu pengurus banjar menata data, iuran, kas, pengumuman, dan portal warga. Kami juga menyediakan Undangan Bali digital untuk pawiwahan dan acara keluarga dengan nuansa lokal Bali.
                    </p>
                    <div class="mt-9 flex flex-col gap-3 sm:flex-row">
                        <a href="#layanan" class="inline-flex items-center justify-center rounded-full bg-[#d7b46a] px-6 py-3.5 text-sm font-semibold text-[#17130f] shadow-xl shadow-black/20 transition hover:-translate-y-0.5 hover:bg-[#efcf82]">
                            Lihat Paket dan Harga
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
                    <p class="text-sm font-semibold uppercase text-[#8a6a2e]">Paket Layanan</p>
                    <h2 class="mt-4 text-3xl font-semibold text-[#1f1b16] sm:text-4xl">Produk dan harga yang dapat dipesan</h2>
                    <p class="mt-5 text-lg leading-8 text-[#5f574d]">
                        Harga dapat disesuaikan setelah kebutuhan dicek, tetapi paket awal berikut menjadi acuan pemesanan layanan Bali Santih.
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
                            <p class="mt-3 text-3xl font-semibold text-[#29452f]">{{ $service['price'] }}</p>
                            <p class="mt-1 text-sm font-medium text-[#8a6a2e]">{{ $service['period'] }}</p>
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
                            <a href="#kontak" class="mt-auto inline-flex items-center justify-center rounded-full bg-[#29452f] px-5 py-3 text-sm font-semibold text-white transition hover:bg-[#1f3524]">
                                Pesan Layanan
                            </a>
                        </article>
                    @endforeach
                </div>

                <p class="mt-6 text-sm leading-7 text-[#6f6558] reveal">
                    Catatan Wedding Gift: jika fitur QRIS gift diaktifkan pada undangan, biaya layanan ditampilkan transparan kepada tamu, yaitu Rp2.000 untuk gift di bawah Rp100.000 dan 2% untuk Rp100.000 ke atas.
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
                            Cocok untuk pawiwahan dan acara keluarga. Pemilik acara dapat membuat draft, memilih template, menambahkan foto, musik, lokasi, dan membagikan link undangan publik.
                        </p>
                    </div>
                    <div class="reveal rounded-[8px] border border-[#e1d3b8] bg-white p-6 shadow-sm">
                        <h3 class="text-xl font-semibold text-[#1f1b16]">Template tersedia</h3>
                        <div class="mt-5 grid gap-3 sm:grid-cols-2">
                            @foreach (['Bali Classic', 'Pura Sunset', 'Ubud Garden', 'Royal Kamasan'] as $template)
                                <div class="rounded-[8px] border border-[#eadfca] bg-[#fbfaf6] px-4 py-3 text-sm font-medium text-[#3d352c]">{{ $template }}</div>
                            @endforeach
                        </div>
                        <p class="mt-5 text-sm leading-7 text-[#6f6558]">
                            Undangan dapat dilengkapi countdown, galeri, backsound, peta lokasi, tombol berbagi, dan Wedding Gift QRIS opsional.
                        </p>
                    </div>
                </div>
            </div>
        </section>

        <section id="alur" class="bg-white py-20 sm:py-24">
            <div class="mx-auto max-w-7xl px-5 lg:px-8">
                <div class="max-w-3xl reveal">
                    <p class="text-sm font-semibold uppercase text-[#8a6a2e]">Alur Pemesanan</p>
                    <h2 class="mt-4 text-3xl font-semibold text-[#1f1b16] sm:text-4xl">Cara memesan layanan Bali Santih</h2>
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
                        Kami melayani konsultasi kebutuhan sistem banjar, portal warga, dan undangan digital Bali. Pembayaran dilakukan setelah layanan, harga, dan ruang lingkup disepakati.
                    </p>
                </div>
                <div class="reveal rounded-[8px] border border-white/12 bg-white/[0.07] p-6">
                    <dl class="space-y-5 text-sm">
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
