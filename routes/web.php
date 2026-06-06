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
            <p class="mt-3">Bali Santih menyediakan aplikasi portal banjar dan Undangan Bali digital yang dapat digunakan gratis. Aplikasi membantu pengurus banjar mengelola data warga, pengumuman, kas, iuran, dan membantu pasangan membuat undangan digital bernuansa Bali.</p>

            <h2 class="mt-8 text-xl font-semibold text-[#1f1b16]">2. Penggunaan QRIS dan Pembayaran</h2>
            <p class="mt-3">Bali Santih tidak menjual akses aplikasi. QRIS digunakan untuk pembayaran yang terjadi di dalam aplikasi, seperti iuran warga, sesari, urunan, dedosan, dana kegiatan banjar, dan wedding gift pada Undangan Bali. Nominal pembayaran ditentukan oleh pengurus banjar, warga, tamu, atau pemilik acara sesuai konteks masing-masing.</p>

            <h2 class="mt-8 text-xl font-semibold text-[#1f1b16]">3. Data dan Materi Pelanggan</h2>
            <p class="mt-3">Pelanggan bertanggung jawab atas kebenaran data, foto, nama, lokasi, dan materi lain yang diberikan. Bali Santih dapat menolak materi yang melanggar hukum, mengandung penipuan, atau tidak sesuai dengan layanan.</p>

            <h2 class="mt-8 text-xl font-semibold text-[#1f1b16]">4. Status Transaksi</h2>
            <p class="mt-3">Status pembayaran ditampilkan atau dicatat di aplikasi setelah proses pembayaran berhasil diverifikasi oleh sistem pembayaran. Pengguna bertanggung jawab memastikan nominal dan tujuan pembayaran sudah benar sebelum melakukan pembayaran.</p>

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
            <p class="mt-3">Data digunakan untuk pengelolaan portal banjar, pengelolaan undangan, komunikasi pengguna, pencatatan transaksi iuran atau wedding gift, verifikasi pembayaran, dan dukungan teknis.</p>

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
            <p class="mt-3">Karena akses aplikasi Bali Santih gratis, kebijakan refund terutama berlaku untuk transaksi yang dilakukan melalui QRIS, seperti iuran warga, dana kegiatan banjar, atau wedding gift. Permintaan pembatalan harus disampaikan kepada pengurus banjar atau pemilik acara sesuai tujuan pembayaran.</p>

            <h2 class="mt-8 text-xl font-semibold text-[#1f1b16]">2. Pembatalan Setelah Pengerjaan Berjalan</h2>
            <p class="mt-3">Pembayaran iuran atau dana kegiatan banjar mengikuti ketentuan pengurus banjar. Wedding gift yang sudah berhasil dibayarkan kepada pemilik acara umumnya tidak dapat dibatalkan sepihak kecuali terdapat kesalahan transaksi dan disetujui oleh pihak terkait.</p>

            <h2 class="mt-8 text-xl font-semibold text-[#1f1b16]">3. Revisi dan Penyelesaian Masalah</h2>
            <p class="mt-3">Jika terjadi kendala teknis pada pencatatan transaksi, pengguna dapat menghubungi kontak resmi Bali Santih dengan menyertakan bukti pembayaran, waktu transaksi, nominal, dan tujuan pembayaran.</p>

            <h2 class="mt-8 text-xl font-semibold text-[#1f1b16]">4. Waktu Proses Refund</h2>
            <p class="mt-3">Refund yang disetujui diproses sesuai hasil verifikasi pengurus banjar, pemilik acara, atau pihak terkait. Lama dana diterima dapat bergantung pada bank atau penyedia pembayaran.</p>

            <h2 class="mt-8 text-xl font-semibold text-[#1f1b16]">5. Kontak Refund</h2>
            <p class="mt-3">Permintaan bantuan terkait refund atau pembatalan dapat dikirim ke admin.balisantih@gmail.com dengan menyertakan nama pengirim, tanggal transaksi, nominal, tujuan pembayaran, bukti pembayaran, dan alasan permintaan.</p>
        ',
    ]);
})->name('refund');
