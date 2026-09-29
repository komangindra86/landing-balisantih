<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Order extends Model
{
    public const STATUS_AWAITING_PAYMENT = 'menunggu_pembayaran';

    public const STATUS_AWAITING_QUOTE = 'menunggu_penawaran';

    public const STATUS_PAID = 'lunas';

    public const STATUS_EXPIRED = 'kedaluwarsa';

    public const DETAIL_LABELS = [
        'banjar_name' => 'Nama banjar',
        'region' => 'Desa / kecamatan / kabupaten',
        'position' => 'Jabatan di banjar',
        'domain' => 'Domain yang diinginkan',
        'event_type' => 'Jenis acara',
        'event_date' => 'Tanggal acara',
        'theme' => 'Tema dan warna',
        'reference' => 'Referensi desain',
        'invitation_ref' => 'Undangan yang direvisi',
        'notes' => 'Catatan',
    ];

    protected $fillable = [
        'code',
        'product',
        'product_name',
        'pricing',
        'quantity',
        'unit_price',
        'total',
        'status',
        'customer_name',
        'customer_whatsapp',
        'customer_email',
        'details',
        'payment_url',
        'payment_session_id',
        'payment_trx_id',
        'payment_channel',
        'payment_expires_at',
        'paid_at',
    ];

    protected $hidden = [
        'access_token',
    ];

    protected function casts(): array
    {
        return [
            'details' => 'array',
            'payment_expires_at' => 'datetime',
            'paid_at' => 'datetime',
        ];
    }

    protected static function booted(): void
    {
        static::creating(function (Order $order) {
            $order->code ??= static::generateCode();
            $order->access_token ??= Str::random(40);
        });
    }

    public static function generateCode(): string
    {
        do {
            $code = 'BS-'.now()->format('ymd').'-'.Str::upper(Str::random(5));
        } while (static::where('code', $code)->exists());

        return $code;
    }

    public function getRouteKeyName(): string
    {
        return 'code';
    }

    /**
     * Halaman status pesanan untuk pemesan. Token rahasia mencegah orang lain
     * membuka data pesanan hanya dengan menebak kode.
     */
    public function statusUrl(): string
    {
        return route('orders.show', ['order' => $this, 'token' => $this->access_token]);
    }

    public function isQuote(): bool
    {
        return $this->pricing === 'quote';
    }

    public function isPaid(): bool
    {
        return $this->status === self::STATUS_PAID;
    }

    /**
     * Pesanan sudah punya total dan belum lunas, sehingga bisa dibayar.
     */
    public function isPayable(): bool
    {
        return $this->total !== null && ! $this->isPaid();
    }

    public function hasActivePaymentLink(): bool
    {
        return $this->payment_url !== null
            && $this->payment_expires_at?->isFuture()
            && $this->status === self::STATUS_AWAITING_PAYMENT;
    }

    public function statusLabel(): string
    {
        return match ($this->status) {
            self::STATUS_AWAITING_PAYMENT => 'Menunggu pembayaran',
            self::STATUS_AWAITING_QUOTE => 'Menunggu penawaran harga',
            self::STATUS_PAID => 'Lunas',
            self::STATUS_EXPIRED => 'Pembayaran kedaluwarsa',
            default => Str::headline($this->status),
        };
    }

    /**
     * Detail pesanan yang terisi, lengkap dengan labelnya.
     *
     * @return array<string, string>
     */
    public function labeledDetails(): array
    {
        $order = array_flip(array_keys(self::DETAIL_LABELS));

        return collect($this->details ?? [])
            ->filter(fn ($value) => filled($value))
            ->sortBy(fn ($value, $key) => $order[$key] ?? PHP_INT_MAX)
            ->mapWithKeys(fn ($value, $key) => [self::DETAIL_LABELS[$key] ?? Str::headline($key) => (string) $value])
            ->all();
    }
}
