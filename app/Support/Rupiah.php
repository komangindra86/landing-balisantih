<?php

namespace App\Support;

class Rupiah
{
    public static function format(int $amount): string
    {
        return 'Rp'.number_format($amount, 0, ',', '.');
    }

    /**
     * Harga layanan untuk ditampilkan: nominal pasti, kisaran, atau "Gratis".
     */
    public static function forProduct(array $product): string
    {
        return match ($product['pricing']) {
            'free' => 'Gratis',
            'quote' => self::format($product['price_min']).' – '.self::format($product['price_max']),
            default => self::format($product['price']),
        };
    }
}
