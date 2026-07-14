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
        Schema::create('satkers', function (Blueprint $table) {
            $table->id();
            
            // Menyambungkan ke tabel kementerian dan wilayah
            $table->foreignId('kementerian_id')->constrained('kementerians')->onDelete('cascade');
            $table->foreignId('wilayah_id')->constrained('wilayahs')->onDelete('cascade');
            
            // Data detail satker
            $table->string('kode_satker', 20)->unique();
            $table->string('nama_satker');
            
            // Menggunakan tipe desimal untuk nilai uang agar presisi (20 digit angka, 2 di belakang koma)
            $table->decimal('pagu_anggaran', 20, 2)->default(0); 
            $table->decimal('realisasi', 20, 2)->default(0);
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('satkers');
    }
};
