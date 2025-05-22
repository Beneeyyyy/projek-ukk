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
    Schema::create('industris', function (Blueprint $table) {
        $table->id();
        $table->string('nama');
        $table->string('bidang_usaha');           // Bidang usaha industri
        $table->text('alamat');                   // Alamat industri
        $table->string('kontak');                 // Nomor kontak
        $table->string('email')->unique();        // Email industri
        $table->string('guru_pembimbing');        // Nama guru pembimbing
        $table->timestamps();
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('industris');
    }
};
