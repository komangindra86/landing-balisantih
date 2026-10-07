<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="@yield('description', 'Layanan digital Bali Santih untuk banjar, undangan Bali, dan masyarakat Bali.')">
    <meta name="theme-color" content="#17130f">
    <title>@yield('title') - Bali Santih</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-[#fbfaf6] text-[#1f1b16] antialiased">
    <header class="border-b border-white/10 bg-[#17130f] text-white">
        <nav class="mx-auto flex max-w-6xl items-center justify-between px-5 py-3.5">
            <a href="{{ route('home') }}" class="flex items-center gap-3" aria-label="Bali Santih - Beranda">
                <span class="grid h-10 w-10 place-items-center overflow-hidden rounded-full border border-[#d7b46a]/50 bg-white/95 p-1">
                    <img src="{{ asset('images/logobalisantih.png') }}" alt="Logo Bali Santih" class="h-full w-full object-contain">
                </span>
                <span>
                    <span class="block text-base font-semibold leading-none">Bali Santih</span>
                    <span class="mt-1 block text-[11px] text-white/55">Ekosistem Digital Bali</span>
                </span>
            </a>
            <a href="{{ route('home') }}#layanan" class="inline-flex items-center gap-2 rounded-full border border-white/20 px-4 py-2 text-sm font-semibold text-white/85 transition hover:bg-white/10">
                <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" aria-hidden="true">
                    <path d="m15 18-6-6 6-6" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
                Layanan & Harga
            </a>
        </nav>
    </header>

    @yield('content')

    <footer class="border-t border-[#eadfca] bg-white py-8">
        <div class="mx-auto flex max-w-6xl flex-col gap-4 px-5 text-sm text-[#6f6558] sm:flex-row sm:items-center sm:justify-between">
            <div>
                <p>{{ config('perusahaan.name') }} &middot; NIB {{ config('perusahaan.nib') }}</p>
                <p class="mt-1">{{ config('perusahaan.address') }}</p>
                <p class="mt-1">{{ config('perusahaan.phone') }} &middot; {{ config('perusahaan.email') }}</p>
            </div>
            <div class="flex flex-wrap gap-x-5 gap-y-2">
                <a class="hover:text-[#8a6a2e]" href="{{ route('home') }}#faq">FAQ</a>
                <a class="hover:text-[#8a6a2e]" href="{{ route('terms') }}">Syarat & Ketentuan</a>
                <a class="hover:text-[#8a6a2e]" href="{{ route('privacy') }}">Kebijakan Privasi</a>
                <a class="hover:text-[#8a6a2e]" href="{{ route('refund') }}">Refund & Pembatalan</a>
            </div>
        </div>
    </footer>

    @stack('scripts')
</body>
</html>
