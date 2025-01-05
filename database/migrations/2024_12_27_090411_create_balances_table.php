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
        Schema::create('balances', function (Blueprint $table) {
            $table->id();
            $table->string('title'); // Maelezo ya urari
            $table->decimal('opening_debit', 15, 2)->default(0); // Debit ya Salio Anzia
            $table->decimal('opening_credit', 15, 2)->default(0); // Credit ya Salio Anzia
            $table->decimal('monthly_debit', 15, 2)->default(0); // Debit ya Urari wa Mwezi
            $table->decimal('monthly_credit', 15, 2)->default(0); // Credit ya Urari wa Mwezi
            $table->decimal('jonal_debit', 15, 2)->default(0); //  Debit
            $table->decimal('jonal_credit', 15, 2)->default(0); //  jonal
            $table->decimal('total_debit', 15, 2)->default(0); // Jumla ya Debit
            $table->decimal('total_credit', 15, 2)->default(0); // Jumla ya Credit
            $table->string('date');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('balances');
    }
};
