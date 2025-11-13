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
        Schema::create('membership_cards', function (Blueprint $table) {
            $table->id();
            $table->string('name')->comment('Name of the membership card');
            $table->decimal('price', 10, 2)->comment('Price of the membership card');
            $table->decimal('original_price', 10, 2)->nullable()->comment('Original price before discount');
            $table->string('type')->comment('Type of membership, e.g., Silver, Gold, Platinum');
            $table->integer('tenure')->comment('Tenure in months or years');
            $table->string('image')->nullable()->comment('Path or URL to the membership card image');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('membership_cards');
    }
};
