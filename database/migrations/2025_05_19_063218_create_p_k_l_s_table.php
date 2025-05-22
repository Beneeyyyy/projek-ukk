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
        Schema::create('p_k_l_s', function (Blueprint $table) {
            $table->id();

            // Relasi ke tabel siswa
            $table->foreignId('siswa_id')->constrained('siswas')->onDelete('cascade');

            // Relasi ke tabel industri
            $table->foreignId('industri_id')->constrained('industris')->onDelete('cascade');

            // Relasi ke tabel guru
            $table->foreignId('guru_id')->constrained('data_gurus')->onDelete('cascade');

            // Kolom tanggal mulai dan selesai
            $table->date('mulai');
            $table->date('selesai');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('p_k_l_s');
    }
};
