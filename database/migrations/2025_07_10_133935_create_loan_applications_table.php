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
        Schema::create('loan_applications', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->enum('loan_type', ['personal', 'business']);
            $table->decimal('amount', 10, 2);
            $table->string('purpose');
            $table->decimal('emi', 10, 2)->nullable();
            $table->string('cibil')->nullable();
            $table->decimal('monthly_income', 10, 2)->nullable();
            $table->enum('emi_bounce', ['Yes', 'No'])->nullable();
            $table->integer('tenure_months');
            $table->decimal('emi_amount', 10, 2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('loan_applications');
    }
};
