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
        Schema::create('donations', function (Blueprint $table) {
            $table->id();
            
            // Relasi ke tabel users (donatur). 
            // Dibuat nullable karena donatur bisa bersifat anonim (tanpa login).
            $table->foreignId('user_id')
                ->nullable()
                ->constrained()
                ->nullOnDelete();
            
            // Informasi Transaksi
            $table->string('invoice_number')->unique();
            $table->decimal('amount', 15, 2); // Mendukung nominal hingga 999 triliun dengan 2 angka di belakang koma
            $table->string('payment_method')->default('manual_transfer'); // Contoh: bank_transfer, cash, qris
            $table->string('status')->default('pending'); // Status: pending, confirmed, cancelled
            $table->text('note')->nullable(); // Catatan dari donatur atau admin
            
            // Audit Trail
            $table->timestamp('confirmed_at')->nullable(); // Waktu ketika admin memverifikasi uang masuk
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('donations');
    }
};