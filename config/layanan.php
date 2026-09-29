<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Kontak Pesanan
    |--------------------------------------------------------------------------
    |
    | Email admin menerima notifikasi setiap ada pesanan baru. Nomor WhatsApp
    | (format 628xxx) bersifat opsional; bila diisi, halaman konfirmasi
    | menampilkan tombol untuk melanjutkan percakapan lewat WhatsApp.
    |
    */

    'admin_email' => env('ORDER_ADMIN_EMAIL', 'admin.balisantih@gmail.com'),

    'whatsapp' => env('ORDER_WHATSAPP_NUMBER'),

    /*
    |--------------------------------------------------------------------------
    | Layanan & Harga
    |--------------------------------------------------------------------------
    |
    | pricing: "direct" = harga pasti, pesanan langsung menunggu pembayaran.
    |          "quote"  = harga berupa kisaran, admin mengirim penawaran final.
    |          "free"   = gratis, diarahkan ke aplikasi (tidak bisa dipesan).
    |
    */

    'products' => [
        'banjar-digital-tahunan' => [
            'application' => 'Banjar Digital',
            'name' => 'Banjar Digital Tahunan',
            'summary' => 'Server dan domain tahunan agar aplikasi banjar Anda tetap online dengan alamat web sendiri. Akses aplikasi tetap tanpa biaya lisensi.',
            'pricing' => 'direct',
            'price' => 1750000,
            'unit' => 'per tahun',
            'breakdown' => [
                ['label' => 'Biaya server', 'amount' => 1500000],
                ['label' => 'Biaya domain', 'amount' => 250000],
            ],
            'includes' => ['Akses aplikasi tanpa biaya lisensi', 'Alamat web sendiri untuk banjar', 'Aplikasi online sepanjang tahun'],
            'form' => 'banjar',
        ],
        'template-basic' => [
            'application' => 'Undangan Bali',
            'name' => 'Template Basic',
            'summary' => 'Template undangan pernikahan dan ulang tahun siap pakai.',
            'pricing' => 'free',
            'url' => 'https://undangan.balisantih.com',
        ],
        'template-custom-standar' => [
            'application' => 'Undangan Bali',
            'name' => 'Template Custom Standar',
            'summary' => 'Desain undangan custom sesuai tema, warna, dan konten acara Anda.',
            'pricing' => 'quote',
            'price_min' => 25000,
            'price_max' => 100000,
            'form' => 'undangan',
        ],
        'template-custom-animasi' => [
            'application' => 'Undangan Bali',
            'name' => 'Template Custom Animasi',
            'summary' => 'Desain undangan custom dengan elemen animasi yang bergerak.',
            'pricing' => 'quote',
            'price_min' => 100000,
            'price_max' => 250000,
            'form' => 'undangan',
        ],
        'revisi-template' => [
            'application' => 'Undangan Bali',
            'name' => 'Biaya Revisi',
            'summary' => 'Perubahan desain setelah template custom selesai dibuat.',
            'pricing' => 'direct',
            'price' => 5000,
            'unit' => 'per revisi',
            'max_quantity' => 10,
            'form' => 'revisi',
        ],
    ],

];
