<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Services\OrderPayment;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Throwable;

class IpaymuNotificationController extends Controller
{
    /**
     * Notifikasi (notifyUrl) dari iPaymu. Isi notifikasi hanya dipakai untuk
     * menemukan pesanan; status pembayaran selalu dicek ulang ke API iPaymu.
     */
    public function __invoke(Request $request, OrderPayment $payment): Response
    {
        $transactionId = (string) $request->input('trx_id');

        $order = Order::where('code', (string) $request->input('reference_id'))->first()
            ?? Order::where('payment_session_id', (string) $request->input('sid'))->whereNotNull('payment_session_id')->first();

        if (! $order || $transactionId === '') {
            return response('IGNORED', 200);
        }

        try {
            $payment->sync($order, $transactionId);
        } catch (Throwable $e) {
            report($e);

            // Status non-2xx membuat iPaymu mengirim ulang notifikasi nanti.
            return response('RETRY', 500);
        }

        return response('OK', 200);
    }
}
