Pembayaran pesanan sudah diterima melalui iPaymu.

Kode pesanan : {{ $order->code }}
Layanan      : {{ $order->product_name }}{{ $order->quantity > 1 ? ' x'.$order->quantity : '' }}
Total        : {{ \App\Support\Rupiah::format((int) $order->total) }}
Dibayar      : {{ $order->paid_at->timezone('Asia/Makassar')->format('d-m-Y H:i') }} WITA
Metode       : {{ $order->payment_channel ?? '-' }}
ID transaksi : {{ $order->payment_trx_id }}

Pemesan
Nama         : {{ $order->customer_name }}
WhatsApp     : {{ $order->customer_whatsapp }}
Email        : {{ $order->customer_email }}

Detail
@foreach ($order->labeledDetails() as $label => $value)
- {{ $label }}: {{ $value }}
@endforeach

Langkah berikutnya: proses layanan dan kabari pemesan.
