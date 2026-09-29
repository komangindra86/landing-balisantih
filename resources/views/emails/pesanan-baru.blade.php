Pesanan baru masuk melalui balisantih.com.

Kode pesanan : {{ $order->code }}
Layanan      : {{ $order->product_name }}
Status       : {{ $order->statusLabel() }}
@if ($order->total)
Jumlah       : {{ $order->quantity }}
Total        : {{ \App\Support\Rupiah::format($order->total) }}
@endif
Waktu        : {{ $order->created_at->timezone('Asia/Makassar')->format('d-m-Y H:i') }} WITA

Pemesan
Nama         : {{ $order->customer_name }}
WhatsApp     : {{ $order->customer_whatsapp }}
Email        : {{ $order->customer_email }}

Detail
@foreach ($order->labeledDetails() as $label => $value)
- {{ $label }}: {{ $value }}
@endforeach

@if ($order->isQuote())
Langkah berikutnya: hubungi pemesan untuk konsultasi, lalu kirim penawaran harga final.
@else
Langkah berikutnya: kirim tagihan dan instruksi pembayaran kepada pemesan.
@endif
