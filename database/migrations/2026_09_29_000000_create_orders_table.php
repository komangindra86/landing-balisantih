<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('code')->unique();
            $table->string('product');
            $table->string('product_name');
            $table->string('pricing');
            $table->unsignedSmallInteger('quantity')->default(1);
            $table->unsignedInteger('unit_price')->nullable();
            $table->unsignedInteger('total')->nullable();
            $table->string('status')->index();
            $table->string('customer_name');
            $table->string('customer_whatsapp');
            $table->string('customer_email');
            $table->json('details')->nullable();
            $table->string('access_token', 64);
            $table->text('payment_url')->nullable();
            $table->string('payment_session_id')->nullable();
            $table->string('payment_trx_id')->nullable()->index();
            $table->string('payment_channel')->nullable();
            $table->timestamp('payment_expires_at')->nullable();
            $table->timestamp('paid_at')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
