<?php

namespace Tests\Feature;

use App\Mail\OrderPaid;
use App\Mail\OrderReceived;
use App\Models\Order;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\Client\Request as HttpRequest;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Mail;
use Tests\TestCase;

class OrderTest extends TestCase
{
    use RefreshDatabase;

    private const PAYMENT_URL = 'https://sandbox-payment.ipaymu.com/#/abc-123';

    protected function setUp(): void
    {
        parent::setUp();

        Mail::fake();

        config([
            'services.ipaymu.va' => '0000001234567890',
            'services.ipaymu.api_key' => 'SANDBOX-TEST-KEY',
            'services.ipaymu.sandbox' => true,
        ]);
    }

    private function fakeIpaymu(int $status = 1, ?string $reference = null, ?int $amount = null): void
    {
        Http::fake([
            'sandbox.ipaymu.com/api/v2/payment' => Http::response([
                'Status' => 200,
                'Success' => true,
                'Data' => ['SessionID' => 'sess-123', 'Url' => self::PAYMENT_URL],
            ]),
            'sandbox.ipaymu.com/api/v2/transaction' => fn (HttpRequest $request) => Http::response([
                'Status' => 200,
                'Data' => [
                    'TransactionId' => $request['transactionId'],
                    'ReferenceId' => $reference ?? Order::first()?->code,
                    'Status' => $status,
                    'Amount' => $amount ?? Order::first()?->total,
                    'PaymentMethod' => 'VA',
                    'PaymentChannel' => 'BCA',
                ],
            ]),
        ]);
    }

    private function customer(array $overrides = []): array
    {
        return array_merge([
            'name' => 'I Made Santih',
            'whatsapp' => '0812-3456-7890',
            'email' => 'made@example.com',
            'agreement' => '1',
        ], $overrides);
    }

    private function banjarOrder(): array
    {
        return $this->customer([
            'banjar_name' => 'Banjar Adat Santih',
            'region' => 'Sumerta Kelod, Denpasar Timur, Denpasar',
        ]);
    }

    public function test_landing_page_lists_orderable_services(): void
    {
        $this->get('/')
            ->assertOk()
            ->assertSee('id="layanan"', false)
            ->assertSee('Rp1.750.000')
            ->assertSee(route('orders.create', 'banjar-digital-tahunan'))
            ->assertSee(route('orders.create', 'template-custom-standar'))
            ->assertSee(route('orders.create', 'revisi-template'))
            ->assertDontSee(route('orders.create', 'template-basic'));
    }

    public function test_site_shows_faq_and_full_company_contact(): void
    {
        $this->get('/')
            ->assertOk()
            ->assertSee('id="faq"', false)
            ->assertSee('Metode pembayaran apa saja yang tersedia?')
            ->assertSee('Jl. Gemitir No. 75, Denpasar Timur, Kota Denpasar, Bali 80237')
            ->assertSee('0851-1324-3800')
            ->assertSee('tel:+6285113243800', false);

        $this->get('/syarat-ketentuan')->assertOk()->assertSee('Jl. Gemitir No. 75')->assertSee('0851-1324-3800');
        $this->get('/pesan/banjar-digital-tahunan')->assertOk()->assertSee('Jl. Gemitir No. 75');
    }

    public function test_order_page_is_available_for_paid_services_only(): void
    {
        $this->get('/pesan/banjar-digital-tahunan')->assertOk()->assertSee('Rp1.750.000');
        $this->get('/pesan/template-custom-animasi')->assertOk()->assertSee('Rp100.000 – Rp250.000');
        $this->get('/pesan/template-basic')->assertNotFound();
        $this->get('/pesan/tidak-ada')->assertNotFound();
    }

    public function test_fixed_price_order_redirects_to_ipaymu(): void
    {
        $this->fakeIpaymu();

        $this->post('/pesan/banjar-digital-tahunan', $this->banjarOrder())
            ->assertRedirect(self::PAYMENT_URL);

        $order = Order::sole();
        $this->assertSame(1750000, $order->total);
        $this->assertSame(Order::STATUS_AWAITING_PAYMENT, $order->status);
        $this->assertSame('081234567890', $order->customer_whatsapp);
        $this->assertSame(self::PAYMENT_URL, $order->payment_url);
        $this->assertTrue($order->payment_expires_at->between(now()->addHours(23), now()->addHours(25)));
        $this->assertMatchesRegularExpression('/^BS-\d{6}-[A-Z0-9]{5}$/', $order->code);

        Mail::assertSent(OrderReceived::class, fn ($mail) => $mail->hasTo('admin.balisantih@gmail.com'));

        Http::assertSent(function (HttpRequest $request) use ($order) {
            $expected = hash_hmac(
                'sha256',
                'POST:0000001234567890:'.strtolower(hash('sha256', $request->body())).':SANDBOX-TEST-KEY',
                'SANDBOX-TEST-KEY',
            );

            return $request->url() === 'https://sandbox.ipaymu.com/api/v2/payment'
                && $request->header('signature')[0] === $expected
                && $request['referenceId'] === $order->code
                && $request['price'] === [1500000, 250000]
                && $request['expired'] === 24
                && $request['notifyUrl'] === route('payments.ipaymu.notify')
                && $request['returnUrl'] === $order->statusUrl();
        });
    }

    public function test_revision_total_follows_quantity(): void
    {
        $this->fakeIpaymu();

        $this->post('/pesan/revisi-template', $this->customer([
            'quantity' => 3,
            'invitation_ref' => 'BS-260929-ABCDE',
            'notes' => 'Ganti foto sampul dan warna teks.',
        ]))->assertRedirect(self::PAYMENT_URL);

        $order = Order::sole();
        $this->assertSame(3, $order->quantity);
        $this->assertSame(15000, $order->total);

        Http::assertSent(fn (HttpRequest $request) => $request['price'] === [5000] && $request['qty'] === [3]);
    }

    public function test_notification_marks_order_paid_after_verifying_with_ipaymu(): void
    {
        $this->fakeIpaymu(status: 1);
        $this->post('/pesan/banjar-digital-tahunan', $this->banjarOrder());
        $order = Order::sole();

        $this->post('/pembayaran/ipaymu/notify', [
            'trx_id' => '98765',
            'sid' => 'sess-123',
            'reference_id' => $order->code,
            'status' => 'berhasil',
            'status_code' => '1',
            'amount' => '1750000',
            'via' => 'va',
            'channel' => 'bca',
        ])->assertOk();

        $order->refresh();
        $this->assertSame(Order::STATUS_PAID, $order->status);
        $this->assertSame('98765', $order->payment_trx_id);
        $this->assertSame('VA BCA', $order->payment_channel);
        $this->assertNotNull($order->paid_at);
        Mail::assertSent(OrderPaid::class);

        $this->get($order->statusUrl())->assertOk()->assertSee('Lunas')->assertDontSee('Bayar Sekarang');
    }

    public function test_notification_claims_are_not_trusted_without_ipaymu_confirmation(): void
    {
        $this->fakeIpaymu(status: 0);
        $this->post('/pesan/banjar-digital-tahunan', $this->banjarOrder());
        $order = Order::sole();

        $this->post('/pembayaran/ipaymu/notify', [
            'trx_id' => '98765',
            'reference_id' => $order->code,
            'status' => 'berhasil',
            'status_code' => '1',
        ])->assertOk();

        $this->assertSame(Order::STATUS_AWAITING_PAYMENT, $order->fresh()->status);
        Mail::assertNotSent(OrderPaid::class);
    }

    public function test_transaction_for_another_order_does_not_mark_paid(): void
    {
        $this->fakeIpaymu(status: 1, reference: 'BS-000000-LAINN');
        $this->post('/pesan/banjar-digital-tahunan', $this->banjarOrder());
        $order = Order::sole();

        $this->post('/pembayaran/ipaymu/notify', ['trx_id' => '555', 'reference_id' => $order->code])->assertOk();

        $this->assertSame(Order::STATUS_AWAITING_PAYMENT, $order->fresh()->status);
    }

    public function test_underpaid_transaction_does_not_mark_paid(): void
    {
        $this->fakeIpaymu(status: 1, amount: 1000);
        $this->post('/pesan/banjar-digital-tahunan', $this->banjarOrder());
        $order = Order::sole();

        $this->post('/pembayaran/ipaymu/notify', ['trx_id' => '555', 'reference_id' => $order->code])->assertOk();

        $this->assertSame(Order::STATUS_AWAITING_PAYMENT, $order->fresh()->status);
    }

    public function test_returning_from_ipaymu_syncs_status(): void
    {
        $this->fakeIpaymu(status: 1);
        $this->post('/pesan/banjar-digital-tahunan', $this->banjarOrder());
        $order = Order::sole();

        $this->get($order->statusUrl().'?trx_id=777&status=berhasil')
            ->assertOk()
            ->assertSee('Pesanan Anda segera kami proses');

        $this->assertSame(Order::STATUS_PAID, $order->fresh()->status);
    }

    public function test_expired_transaction_allows_a_new_payment_link(): void
    {
        $this->fakeIpaymu(status: -2);
        $this->post('/pesan/banjar-digital-tahunan', $this->banjarOrder());
        $order = Order::sole();

        $this->post('/pembayaran/ipaymu/notify', ['trx_id' => '555', 'reference_id' => $order->code])->assertOk();
        $order->refresh();
        $this->assertSame(Order::STATUS_EXPIRED, $order->status);

        $this->get($order->statusUrl())->assertSee('Buat Tautan Pembayaran Baru');

        $this->post(route('orders.pay', ['order' => $order, 'token' => $order->access_token]))
            ->assertRedirect(self::PAYMENT_URL);
        $this->assertSame(Order::STATUS_AWAITING_PAYMENT, $order->fresh()->status);
    }

    public function test_status_page_requires_the_secret_token(): void
    {
        $this->fakeIpaymu();
        $this->post('/pesan/banjar-digital-tahunan', $this->banjarOrder());
        $order = Order::sole();

        $this->get(route('orders.show', ['order' => $order, 'token' => 'salah']))->assertNotFound();
        $this->post(route('orders.pay', ['order' => $order, 'token' => 'salah']))->assertNotFound();
    }

    public function test_custom_template_is_a_quote_until_admin_bills_it(): void
    {
        $this->fakeIpaymu();

        $this->post('/pesan/template-custom-standar', $this->customer([
            'event_type' => 'Pernikahan',
            'theme' => 'Bali klasik, emas dan hijau tua',
        ]));

        $order = Order::sole();
        $this->assertNull($order->total);
        $this->assertSame(Order::STATUS_AWAITING_QUOTE, $order->status);
        Http::assertNothingSent();

        $this->get($order->statusUrl())
            ->assertSee('Rp25.000 – Rp100.000')
            ->assertDontSee('Bayar Sekarang');

        $this->artisan('pesanan:tagih', ['code' => $order->code, 'amount' => 500000])->assertFailed();

        $this->artisan('pesanan:tagih', ['code' => $order->code, 'amount' => 75000])
            ->expectsOutputToContain($order->statusUrl())
            ->assertSuccessful();

        $order->refresh();
        $this->assertSame(75000, $order->total);
        $this->assertSame(self::PAYMENT_URL, $order->payment_url);
        $this->get($order->statusUrl())->assertSee('Bayar Sekarang Rp75.000');
    }

    public function test_order_is_kept_when_ipaymu_is_unavailable(): void
    {
        Http::fake(['sandbox.ipaymu.com/*' => Http::response(['Status' => 401, 'Message' => 'unauthorized'], 401)]);

        $response = $this->post('/pesan/banjar-digital-tahunan', $this->banjarOrder());

        $order = Order::sole();
        $response->assertRedirect($order->statusUrl())->assertSessionHas('payment_error');
        $this->assertNull($order->payment_url);
    }

    public function test_without_credentials_orders_fall_back_to_manual_billing(): void
    {
        config(['services.ipaymu.va' => null, 'services.ipaymu.api_key' => null]);
        Http::fake();

        $this->post('/pesan/banjar-digital-tahunan', $this->banjarOrder());

        $order = Order::sole();
        Http::assertNothingSent();
        $this->get($order->statusUrl())->assertSee('Tagihan segera kami kirimkan')->assertDontSee('Bayar Sekarang');
    }

    public function test_invalid_order_is_rejected_with_indonesian_messages(): void
    {
        $this->from('/pesan/banjar-digital-tahunan')
            ->post('/pesan/banjar-digital-tahunan', ['whatsapp' => '12345'])
            ->assertRedirect('/pesan/banjar-digital-tahunan')
            ->assertSessionHasErrors([
                'name' => 'Nama lengkap wajib diisi.',
                'whatsapp' => 'Gunakan nomor WhatsApp Indonesia, contoh 081234567890.',
                'banjar_name',
                'agreement',
            ]);

        $this->assertSame(0, Order::count());
    }

    public function test_honeypot_submission_is_ignored(): void
    {
        $this->post('/pesan/banjar-digital-tahunan', $this->banjarOrder() + ['website' => 'https://spam.example'])
            ->assertRedirect(route('home'));

        $this->assertSame(0, Order::count());
    }
}
