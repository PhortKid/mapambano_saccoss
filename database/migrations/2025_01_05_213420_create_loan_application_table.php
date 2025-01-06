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
        Schema::create('loan_application', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('client_id'); // Mhusika wa mkopo
            $table->decimal('amount', 15, 2);
            $table->text('description');
            $table->integer('loan_term'); // Muda wa mkopo
            $table->enum('is_approved', ['pending', 'approved', 'rejected'])->default('pending');
            $table->unsignedBigInteger('approved_by')->nullable(); // ID ya aliyeidhinisha
            $table->timestamps();
            // Mahusiano
            $table->foreign('client_id')->references('id')->on('users');
            $table->foreign('approved_by')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('loans');
    }
};
