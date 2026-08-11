<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('satker_pejabats', function (Blueprint $table) {
            $table->id();
            $table->foreignId('satker_id')->constrained('satkers')->cascadeOnDelete();
            $table->enum('jenis_jabatan', [
                'KPA',
                'PPK',
                'PPSPM',
                'Bendahara Pengeluaran',
                'Bendahara Penerimaan',
                'Operator',
            ]);
            $table->string('nama')->nullable();
            $table->string('nip', 30)->nullable();
            $table->string('jabatan')->nullable();
            $table->string('pangkat_golongan')->nullable();
            $table->string('no_wa', 30)->nullable();
            $table->string('email')->nullable();
            $table->string('foto')->nullable();
            $table->timestamps();

            $table->unique(['satker_id', 'jenis_jabatan']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('satker_pejabats');
    }
};