<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use RuntimeException;

/**
 * Klien minimal untuk iPaymu API v2 (redirect payment dan cek transaksi).
 *
 * Signature: HMAC-SHA256 dari "POST:{va}:{sha256(body)}:{apiKey}" dengan apiKey sebagai kunci.
 */
class Ipaymu
{
    /** Kode status transaksi iPaymu yang berarti dana sudah dibayar. */
    public const PAID_STATUSES = [1, 6];

    public const EXPIRED_STATUS = -2;

    public function __construct(
        private ?string $va,
        private ?string $apiKey,
        private bool $sandbox = true,
    ) {
    }

    public static function fromConfig(): self
    {
        return new self(
            config('services.ipaymu.va'),
            config('services.ipaymu.api_key'),
            (bool) config('services.ipaymu.sandbox'),
        );
    }

    public function isConfigured(): bool
    {
        return filled($this->va) && filled($this->apiKey);
    }

    /**
     * Buat sesi pembayaran redirect.
     *
     * @param  array<int, array{name: string, price: int, qty: int, description?: string}>  $items
     * @param  array{name: string, email: string, phone: string}  $buyer
     * @return array{session_id: string, url: string}
     */
    public function createPayment(string $referenceId, array $items, array $buyer, array $urls, int $expiryHours): array
    {
        $data = $this->post('/payment', [
            'account' => $this->va,
            'product' => array_column($items, 'name'),
            'qty' => array_column($items, 'qty'),
            'price' => array_column($items, 'price'),
            'description' => array_map(fn ($item) => $item['description'] ?? $item['name'], $items),
            'returnUrl' => $urls['return'],
            'cancelUrl' => $urls['cancel'],
            'notifyUrl' => $urls['notify'],
            'referenceId' => $referenceId,
            'buyerName' => $buyer['name'],
            'buyerEmail' => $buyer['email'],
            'buyerPhone' => $buyer['phone'],
            'expired' => $expiryHours,
            'expiredType' => 'hours',
        ]);

        if (empty($data['SessionID']) || empty($data['Url'])) {
            throw new RuntimeException('Respons iPaymu tidak berisi SessionID/Url.');
        }

        return ['session_id' => $data['SessionID'], 'url' => $data['Url']];
    }

    /**
     * Data transaksi dari iPaymu (TransactionId, ReferenceId, Status, Amount, ...).
     */
    public function checkTransaction(string $transactionId): array
    {
        return $this->post('/transaction', ['transactionId' => $transactionId]);
    }

    private function post(string $path, array $body): array
    {
        if (! $this->isConfigured()) {
            throw new RuntimeException('Kredensial iPaymu belum diatur.');
        }

        $json = json_encode($body, JSON_UNESCAPED_SLASHES);
        $stringToSign = 'POST:'.$this->va.':'.strtolower(hash('sha256', $json)).':'.$this->apiKey;

        $response = Http::acceptJson()
            ->timeout(20)
            ->withHeaders([
                'va' => $this->va,
                'signature' => hash_hmac('sha256', $stringToSign, $this->apiKey),
                'timestamp' => now()->format('YmdHis'),
            ])
            ->withBody($json, 'application/json')
            ->post($this->baseUrl().$path);

        $payload = $response->json() ?? [];

        if ($response->failed() || (int) ($payload['Status'] ?? 0) !== 200) {
            throw new RuntimeException(sprintf(
                'iPaymu %s gagal (HTTP %d): %s',
                $path,
                $response->status(),
                $payload['Message'] ?? $response->body(),
            ));
        }

        return $payload['Data'] ?? [];
    }

    private function baseUrl(): string
    {
        return $this->sandbox ? 'https://sandbox.ipaymu.com/api/v2' : 'https://my.ipaymu.com/api/v2';
    }
}
