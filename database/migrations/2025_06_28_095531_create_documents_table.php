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
        Schema::create('kyc_documents', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');

            $table->string('profile_photo')->nullable();
            $table->string('aadhar_number')->nullable();
            $table->string('aadhar_card')->nullable();
            $table->string('pan_number')->nullable();
            $table->string('pan_card')->nullable();
            $table->string('address_proof')->nullable();
            $table->string('cancel_cheque')->nullable();
            $table->string('bank_statement')->nullable();
            $table->string('form_16')->nullable();
            $table->string('salary_slip')->nullable();
            $table->string('remark')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kyc_documents');
    }
};
