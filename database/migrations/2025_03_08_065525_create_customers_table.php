<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('phone');
            $table->string('email')->unique()->nullable();
            $table->enum('salary_type', ['salaried person', 'self employed'])->nullable();
            $table->integer('cibil_score')->nullable();
            $table->decimal('income', 10, 2)->nullable();
            $table->decimal('monthly_emi', 10, 2)->nullable();
            $table->string('loan_purpose')->nullable();
            $table->unsignedBigInteger('city')->nullable();
            $table->unsignedBigInteger('state')->nullable();
            $table->tinyInteger('status')->default(0);
            $table->string('otp', 11)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customers');
    }
};
