<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Bali Santih adalah platform digital berbasis semangat ngayah untuk banjar, warga, komunitas adat, dan masyarakat Bali.">
    <title>Bali Santih - Platform Digital Berbasis Ngayah untuk Bali</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-[#fbfaf6] text-[#1f1b16] antialiased">
    <header class="fixed inset-x-0 top-0 z-50 border-b border-white/10 bg-[#17130f]/85 text-white shadow-sm backdrop-blur-xl">
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

            <div class="hidden items-center gap-8 text-sm font-medium text-white/78 lg:flex">
                <a class="transition hover:text-[#f5d681]" href="#beranda">Beranda</a>
                <a class="transition hover:text-[#f5d681]" href="#layanan">Layanan</a>
                <a class="transition hover:text-[#f5d681]" href="#tentang">Tentang</a>
                <a class="transition hover:text-[#f5d681]" href="#ngayah">Konsep Ngayah</a>
                <a class="transition hover:text-[#f5d681]" href="#kontak">Kontak</a>
            </div>

            <a href="#kontak" class="hidden rounded-full bg-[#d7b46a] px-5 py-2.5 text-sm font-semibold text-[#17130f] shadow-lg shadow-black/10 transition hover:-translate-y-0.5 hover:bg-[#efcf82] lg:inline-flex">
                Mulai Sekarang
            </a>
        </nav>

        <div class="hidden border-t border-white/10 bg-[#17130f]/95 px-5 pb-5 pt-2 text-sm text-white/80 lg:hidden" data-mobile-menu>
            <div class="mx-auto flex max-w-7xl flex-col gap-1">
                <a class="rounded-xl px-3 py-3 hover:bg-white/10" href="#beranda">Beranda</a>
                <a class="rounded-xl px-3 py-3 hover:bg-white/10" href="#layanan">Layanan</a>
                <a class="rounded-xl px-3 py-3 hover:bg-white/10" href="#tentang">Tentang</a>
                <a class="rounded-xl px-3 py-3 hover:bg-white/10" href="#ngayah">Konsep Ngayah</a>
                <a class="rounded-xl px-3 py-3 hover:bg-white/10" href="#kontak">Kontak</a>
                <a class="mt-2 rounded-full bg-[#d7b46a] px-5 py-3 text-center font-semibold text-[#17130f]" href="#kontak">Mulai Sekarang</a>
            </div>
        </div>
    </header>

    <main>
        <section id="beranda" class="relative isolate min-h-[92vh] overflow-hidden pt-24 text-white">
            <img src="{{ asset('images/bali-santih-hero.png') }}" alt="Suasana banjar Bali modern dengan sentuhan teknologi digital" class="absolute inset-0 -z-20 h-full w-full object-cover">
            <div class="absolute inset-0 -z-10 bg-[linear-gradient(90deg,rgba(23,19,15,0.92)_0%,rgba(23,19,15,0.74)_42%,rgba(23,19,15,0.32)_100%)]"></div>

            <div class="mx-auto flex min-h-[calc(92vh-6rem)] max-w-7xl items-center px-5 py-16 lg:px-8">
                <div class="max-w-3xl reveal">
                    <div class="mb-6 inline-flex items-center gap-2 rounded-full border border-[#d7b46a]/40 bg-white/10 px-4 py-2 text-sm text-[#f7df9c] backdrop-blur">
                        <span class="h-2 w-2 rounded-full bg-[#6f9b65]"></span>
                        Ngayah lewat teknologi untuk Bali
                    </div>
                    <h1 class="max-w-4xl text-4xl font-semibold leading-tight text-white sm:text-5xl lg:text-7xl">
                        Platform Digital Berbasis Ngayah untuk Bali
                    </h1>
                    <p class="mt-6 max-w-2xl text-base leading-8 text-white/78 sm:text-lg">
                        Bali Santih hadir untuk membantu banjar, warga, dan masyarakat Bali beradaptasi dengan teknologi tanpa meninggalkan nilai adat, kebersamaan, dan semangat ngayah.
                    </p>
                    <div class="mt-9 flex flex-col gap-3 sm:flex-row">
                        <a href="#layanan" class="inline-flex items-center justify-center rounded-full bg-[#d7b46a] px-6 py-3.5 text-sm font-semibold text-[#17130f] shadow-xl shadow-black/20 transition hover:-translate-y-0.5 hover:bg-[#efcf82]">
                            Lihat Layanan
                        </a>
                        <a href="#kontak" class="inline-flex items-center justify-center rounded-full border border-white/25 bg-white/10 px-6 py-3.5 text-sm font-semibold text-white backdrop-blur transition hover:-translate-y-0.5 hover:bg-white/18">
                            Hubungi Kami
                        </a>
                    </div>
                </div>
            </div>
        </section>

        <section id="tentang" class="bg-[#fbfaf6] py-20 sm:py-24">
            <div class="mx-auto grid max-w-7xl gap-12 px-5 lg:grid-cols-[0.9fr_1.1fr] lg:items-center lg:px-8">
                <div class="reveal">
                    <p class="text-sm font-semibold uppercase text-[#8a6a2e]">Tentang Bali Santih</p>
                    <h2 class="mt-4 text-3xl font-semibold text-[#1f1b16] sm:text-4xl">Teknologi yang Tumbuh dari Nilai Bali</h2>
                </div>
                <div class="reveal rounded-[8px] border border-[#e7ddc7] bg-white p-7 shadow-sm sm:p-9">
                    <p class="text-lg leading-8 text-[#5f574d]">
                        Bali Santih bukan sekadar platform digital. Kami membangun ekosistem layanan yang membantu masyarakat Bali mengelola administrasi, komunikasi, acara, dan kebutuhan komunitas secara lebih mudah, transparan, dan tertata.
                    </p>
                </div>
            </div>
        </section>

        <section id="ngayah" class="bg-[#17130f] py-20 text-white sm:py-24">
            <div class="mx-auto max-w-7xl px-5 lg:px-8">
                <div class="max-w-3xl reveal">
                    <p class="text-sm font-semibold uppercase text-[#d7b46a]">Konsep Ngayah</p>
                    <h2 class="mt-4 text-3xl font-semibold sm:text-4xl">Mengutamakan Ngayah, Bukan Sekadar Aplikasi</h2>
                    <p class="mt-5 text-lg leading-8 text-white/72">
                        Kami percaya teknologi terbaik adalah teknologi yang membantu orang banyak. Melalui konsep ngayah, Bali Santih berkomitmen menghadirkan solusi digital yang bermanfaat untuk banjar, desa adat, komunitas, dan masyarakat Bali.
                    </p>
                </div>

                <div class="mt-12 grid gap-5 md:grid-cols-3">
                    @foreach ([
                        ['title' => 'Untuk Banjar', 'text' => 'Administrasi, pengumuman, dan laporan dibuat lebih rapi agar pengurus bisa bekerja lebih tenang.'],
                        ['title' => 'Untuk Warga', 'text' => 'Informasi banjar dapat diakses dari HP dengan alur yang sederhana dan mudah dipahami.'],
                        ['title' => 'Untuk Bali', 'text' => 'Teknologi dipakai untuk menjaga kebersamaan, transparansi, dan daya hidup komunitas adat.'],
                    ] as $item)
                        <article class="reveal rounded-[8px] border border-white/10 bg-white/[0.06] p-6 transition hover:-translate-y-1 hover:border-[#d7b46a]/50 hover:bg-white/[0.09]">
                            <div class="mb-5 h-1.5 w-12 rounded-full bg-[#d7b46a]"></div>
                            <h3 class="text-xl font-semibold">{{ $item['title'] }}</h3>
                            <p class="mt-4 leading-7 text-white/68">{{ $item['text'] }}</p>
                        </article>
                    @endforeach
                </div>
            </div>
        </section>

        <section id="layanan" class="bg-white py-20 sm:py-24">
            <div class="mx-auto max-w-7xl px-5 lg:px-8">
                <div class="flex flex-col gap-5 md:flex-row md:items-end md:justify-between reveal">
                    <div class="max-w-2xl">
                        <p class="text-sm font-semibold uppercase text-[#8a6a2e]">Layanan Platform</p>
                        <h2 class="mt-4 text-3xl font-semibold text-[#1f1b16] sm:text-4xl">Ekosistem Digital untuk Banjar dan Komunitas Bali</h2>
                    </div>
                    <p class="max-w-xl leading-7 text-[#5f574d]">
                        Mulai dari tata kelola banjar sampai undangan pernikahan Bali, setiap layanan dirancang agar praktis, tertata, dan tetap hangat.
                    </p>
                </div>

                <div class="mt-12 grid gap-6 md:grid-cols-2 xl:grid-cols-4">
                    @foreach ([
                        ['title' => 'Banjar Digital', 'icon' => 'M4 20V8l8-5 8 5v12M8 20v-7h8v7', 'text' => 'Sistem administrasi banjar, data warga, pengumuman sangkep atau samua, laporan keuangan, dan portal warga.'],
                        ['title' => 'Portal Warga Banjar', 'icon' => 'M8 7a4 4 0 1 0 8 0 4 4 0 0 0-8 0Zm-3 15a7 7 0 0 1 14 0', 'text' => 'Warga bisa login, melihat data diri, membaca pengumuman, dan mengakses informasi banjar dari HP.'],
                        ['title' => 'Undangan Pernikahan Bali', 'icon' => 'M12 21s-7-4.6-9-9.2C1.5 8.4 3.5 5 7 5c2 0 3.4 1.1 5 3 1.6-1.9 3-3 5-3 3.5 0 5.5 3.4 4 6.8C19 16.4 12 21 12 21Z', 'text' => 'Undangan digital bernuansa Bali dengan template elegan, lokasi acara, musik, dan link yang mudah dibagikan.'],
                        ['title' => 'Layanan Digital Bali Lainnya', 'icon' => 'M5 5h6v6H5zM13 5h6v6h-6zM5 13h6v6H5zM13 13h6v6h-6z', 'text' => 'Segera hadir: event banjar, kupon bazar, layanan adat, dan fitur komunitas Bali lainnya.'],
                    ] as $service)
                        <article class="reveal flex min-h-[320px] flex-col rounded-[8px] border border-[#eadfca] bg-[#fbfaf6] p-6 transition hover:-translate-y-1 hover:border-[#d7b46a] hover:shadow-xl hover:shadow-[#1f1b16]/10">
                            <div class="grid h-12 w-12 place-items-center rounded-full bg-[#29452f] text-[#f5d681]">
                                <svg class="h-6 w-6" viewBox="0 0 24 24" fill="none" aria-hidden="true">
                                    <path d="{{ $service['icon'] }}" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>
                            </div>
                            <h3 class="mt-6 text-xl font-semibold text-[#1f1b16]">{{ $service['title'] }}</h3>
                            <p class="mt-4 flex-1 leading-7 text-[#5f574d]">{{ $service['text'] }}</p>
                            <a href="#kontak" class="mt-6 inline-flex items-center gap-2 text-sm font-semibold text-[#7c5d22] transition hover:text-[#29452f]">
                                Pelajari
                                <span aria-hidden="true">-></span>
                            </a>
                        </article>
                    @endforeach
                </div>
            </div>
        </section>

        <section class="bg-[#f3efe5] py-20 sm:py-24">
            <div class="mx-auto max-w-7xl px-5 lg:px-8">
                <div class="max-w-2xl reveal">
                    <p class="text-sm font-semibold uppercase text-[#8a6a2e]">Keunggulan</p>
                    <h2 class="mt-4 text-3xl font-semibold text-[#1f1b16] sm:text-4xl">Dirancang untuk Kebutuhan Nyata Masyarakat Bali</h2>
                </div>
                <div class="mt-10 grid gap-4 sm:grid-cols-2 lg:grid-cols-4">
                    @foreach ([
                        'Berbasis kebutuhan masyarakat Bali',
                        'Mudah digunakan dari HP',
                        'Mendukung transparansi dan komunikasi',
                        'Dikembangkan dengan semangat ngayah',
                    ] as $point)
                        <div class="reveal flex gap-4 rounded-[8px] bg-white p-5 shadow-sm">
                            <span class="mt-1 grid h-7 w-7 shrink-0 place-items-center rounded-full bg-[#d7b46a] text-[#17130f]">
                                <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" aria-hidden="true">
                                    <path d="m5 12 4 4L19 6" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>
                            </span>
                            <p class="font-medium leading-7 text-[#3d352c]">{{ $point }}</p>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>

        <section id="kontak" class="bg-white py-20 sm:py-24">
            <div class="mx-auto max-w-7xl px-5 lg:px-8">
                <div class="reveal overflow-hidden rounded-[8px] bg-[#29452f] px-6 py-12 text-white shadow-2xl shadow-[#29452f]/20 sm:px-10 lg:px-14">
                    <div class="grid gap-10 lg:grid-cols-[1.2fr_0.8fr] lg:items-center">
                        <div>
                            <p class="text-sm font-semibold uppercase text-[#f5d681]">Mulai Bersama Bali Santih</p>
                            <h2 class="mt-4 text-3xl font-semibold sm:text-4xl">Saatnya Banjar dan Komunitas Bali Naik Kelas Secara Digital</h2>
                            <p class="mt-5 max-w-3xl text-lg leading-8 text-white/76">
                                Mulai dari administrasi banjar, portal warga, hingga undangan digital Bali, semua bisa dibangun dalam satu ekosistem Bali Santih.
                            </p>
                        </div>
                        <div class="flex flex-col gap-4 lg:items-end">
                            <a href="mailto:halo@balisantih.test" class="inline-flex w-full items-center justify-center rounded-full bg-[#d7b46a] px-6 py-3.5 text-sm font-semibold text-[#17130f] transition hover:-translate-y-0.5 hover:bg-[#efcf82] sm:w-auto">
                                Konsultasi Sekarang
                            </a>
                            <p class="text-sm text-white/64">Email: admin.balisantih@gmail.com</p>
                            {{-- <p class="text-sm text-white/64">WhatsApp: +62 812-3456-7890</p> --}}
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <footer class="bg-[#17130f] py-10 text-white">
        <div class="mx-auto flex max-w-7xl flex-col gap-8 px-5 sm:flex-row sm:items-center sm:justify-between lg:px-8">
            <div>
                <p class="text-xl font-semibold">Bali Santih</p>
                <p class="mt-2 text-sm text-white/62">Ngayah lewat teknologi untuk Bali.</p>
            </div>
            <div class="text-sm leading-7 text-white/62 sm:text-right">
                <p>admin.balisantih@gmail.com</p>
                <p>Denpasar, Bali</p>
                <p>&copy; {{ date('Y') }} Bali Santih. All rights reserved.</p>
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
