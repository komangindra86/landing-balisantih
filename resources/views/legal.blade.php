<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="{{ $description ?? 'Informasi kebijakan layanan Bali Santih.' }}">
    <title>{{ $title }} - Bali Santih</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-[#fbfaf6] text-[#1f1b16] antialiased">
    <header class="border-b border-[#eadfca] bg-white">
        <nav class="mx-auto flex max-w-5xl items-center justify-between px-5 py-5">
            <a href="{{ route('home') }}" class="flex items-center gap-3">
                <span class="grid h-10 w-10 place-items-center overflow-hidden rounded-full border border-[#d7b46a]/50 bg-white p-1">
                    <img src="{{ asset('images/logobalisantih.png') }}" alt="Logo Bali Santih" class="h-full w-full object-contain">
                </span>
                <span class="text-lg font-semibold">Bali Santih</span>
            </a>
            <a href="{{ route('home') }}#layanan" class="rounded-full bg-[#29452f] px-5 py-2.5 text-sm font-semibold text-white">Lihat Layanan</a>
        </nav>
    </header>

    <main class="mx-auto max-w-5xl px-5 py-14">
        <p class="text-sm font-semibold uppercase text-[#8a6a2e]">Kebijakan Layanan</p>
        <h1 class="mt-4 text-3xl font-semibold sm:text-4xl">{{ $title }}</h1>
        <p class="mt-3 text-sm text-[#6f6558]">Terakhir diperbarui: 6 Juni 2026</p>

        <article class="mt-10 rounded-[8px] border border-[#eadfca] bg-white p-6 leading-8 text-[#3d352c] shadow-sm sm:p-8">
            {!! $content !!}
        </article>
    </main>

    <footer class="border-t border-[#eadfca] bg-white py-8">
        <div class="mx-auto flex max-w-5xl flex-col gap-3 px-5 text-sm text-[#6f6558] sm:flex-row sm:items-center sm:justify-between">
            <p>&copy; {{ date('Y') }} Bali Santih. All rights reserved.</p>
            <p>admin.balisantih@gmail.com - Denpasar, Bali, Indonesia</p>
        </div>
    </footer>
</body>
</html>
