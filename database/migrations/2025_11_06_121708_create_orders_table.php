<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('razorpay_order_id')->unique();
            $table->unsignedBigInteger('customer_id')->nullable();
            $table->integer('amount');
            $table->string('currency')->default('INR');
            $table->enum('status', ['created', 'paid', 'failed'])->default('created');
            $table->string('payment_id')->nullable();
            $table->string('signature')->nullable();
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
