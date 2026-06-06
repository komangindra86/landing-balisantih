<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('landing');
})->name('home');

Route::get('/syarat-ketentuan', function () {
    return view('legal', [
        'title' => 'Syarat & Ketentuan',
        'description' => 'Syarat dan ketentuan penggunaan layanan Bali Santih.',
        'content' => '
            <h2 class="text-xl font-semibold text-[#1f1b16]">1. Ruang Lingkup Layanan</h2>
            <p class="mt-3">Bali Santih menyediakan layanan digital untuk Banjar Digital, Portal Warga Banjar, dan Undangan Pernikahan Bali. Detail layanan, harga, waktu pengerjaan, dan batas revisi disepakati sebelum pekerjaan dimulai.</p>

            <h2 class="mt-8 text-xl font-semibold text-[#1f1b16]">2. Pemesanan dan Pembayaran</h2>
            <p class="mt-3">Pemesanan dilakukan melalui kontak resmi Bali Santih. Pembayaran dilakukan setelah pelanggan menerima informasi paket, harga, dan ruang lingkup pekerjaan. Bukti pembayaran dapat diminta untuk verifikasi administrasi.</p>

            <h2 class="mt-8 text-xl font-semibold text-[#1f1b16]">3. Data dan Materi Pelanggan</h2>
            <p class="mt-3">Pelanggan bertanggung jawab atas kebenaran data, foto, nama, lokasi, dan materi lain yang diberikan. Bali Santih dapat menolak materi yang melanggar hukum, mengandung penipuan, atau tidak sesuai dengan layanan.</p>

            <h2 class="mt-8 text-xl font-semibold text-[#1f1b16]">4. Pengerjaan dan Revisi</h2>
            <p class="mt-3">Estimasi pengerjaan mengikuti jenis layanan dan kelengkapan data. Revisi ringan dapat dilakukan sesuai kesepakatan paket. Perubahan besar di luar ruang lingkup awal dapat dikenakan biaya tambahan.</p>

            <h2 class="mt-8 text-xl font-semibold text-[#1f1b16]">5. Kontak Resmi</h2>
            <p class="mt-3">Pertanyaan layanan dapat dikirim ke admin.balisantih@gmail.com. Alamat operasional Bali Santih berada di Denpasar, Bali, Indonesia.</p>
        ',
    ]);
})->name('terms');

Route::get('/kebijakan-privasi', function () {
    return view('legal', [
        'title' => 'Kebijakan Privasi',
        'description' => 'Kebijakan privasi layanan Bali Santih.',
        'content' => '
            <h2 class="text-xl font-semibold text-[#1f1b16]">1. Data yang Dikumpulkan</h2>
            <p class="mt-3">Bali Santih dapat mengumpulkan data yang diberikan pelanggan, seperti nama, email, nomor kontak bila diberikan, data banjar, data acara, foto, lokasi, dan informasi lain yang dibutuhkan untuk menjalankan layanan.</p>

            <h2 class="mt-8 text-xl font-semibold text-[#1f1b16]">2. Penggunaan Data</h2>
            <p class="mt-3">Data digunakan untuk konsultasi, pembuatan layanan, pengelolaan undangan, konfigurasi sistem, komunikasi pelanggan, pencatatan transaksi, dan dukungan teknis.</p>

            <h2 class="mt-8 text-xl font-semibold text-[#1f1b16]">3. Penyimpanan dan Keamanan</h2>
            <p class="mt-3">Bali Santih berupaya menjaga data pelanggan dengan akses terbatas dan penggunaan yang sesuai kebutuhan layanan. Pelanggan dapat meminta perbaikan atau penghapusan data yang tidak lagi diperlukan.</p>

            <h2 class="mt-8 text-xl font-semibold text-[#1f1b16]">4. Pembagian Data</h2>
            <p class="mt-3">Data tidak dijual kepada pihak ketiga. Data dapat diproses oleh penyedia layanan teknis seperti hosting, email, penyimpanan, atau payment gateway sejauh diperlukan untuk menjalankan layanan.</p>

            <h2 class="mt-8 text-xl font-semibold text-[#1f1b16]">5. Kontak Privasi</h2>
            <p class="mt-3">Permintaan terkait privasi dapat dikirim ke admin.balisantih@gmail.com.</p>
        ',
    ]);
})->name('privacy');

Route::get('/refund-pembatalan', function () {
    return view('legal', [
        'title' => 'Refund & Pembatalan',
        'description' => 'Kebijakan refund dan pembatalan layanan Bali Santih.',
        'content' => '
            <h2 class="text-xl font-semibold text-[#1f1b16]">1. Pembatalan Sebelum Pengerjaan</h2>
            <p class="mt-3">Jika pelanggan membatalkan pesanan sebelum pengerjaan dimulai, pembayaran dapat dikembalikan setelah dikurangi biaya administrasi atau biaya payment gateway bila ada.</p>

            <h2 class="mt-8 text-xl font-semibold text-[#1f1b16]">2. Pembatalan Setelah Pengerjaan Berjalan</h2>
            <p class="mt-3">Jika pengerjaan sudah berjalan, refund disesuaikan dengan progres pekerjaan dan biaya yang sudah digunakan. Layanan yang sudah selesai dan sudah diserahterimakan tidak dapat direfund penuh.</p>

            <h2 class="mt-8 text-xl font-semibold text-[#1f1b16]">3. Revisi dan Penyelesaian Masalah</h2>
            <p class="mt-3">Jika terdapat kesalahan dari pihak Bali Santih, kami akan memperbaiki sesuai ruang lingkup layanan tanpa biaya tambahan. Revisi di luar kesepakatan awal dapat dikenakan biaya tambahan.</p>

            <h2 class="mt-8 text-xl font-semibold text-[#1f1b16]">4. Waktu Proses Refund</h2>
            <p class="mt-3">Refund yang disetujui diproses maksimal 7 hari kerja setelah data rekening atau metode pengembalian diterima lengkap. Lama dana diterima dapat bergantung pada bank atau penyedia pembayaran.</p>

            <h2 class="mt-8 text-xl font-semibold text-[#1f1b16]">5. Kontak Refund</h2>
            <p class="mt-3">Permintaan refund atau pembatalan dapat dikirim ke admin.balisantih@gmail.com dengan menyertakan nama pemesan, layanan, tanggal transaksi, dan alasan pembatalan.</p>
        ',
    ]);
})->name('refund');
