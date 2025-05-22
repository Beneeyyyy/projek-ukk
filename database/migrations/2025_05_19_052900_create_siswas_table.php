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
    Schema::create('siswas', function (Blueprint $table) {
        $table->id();
        $table->string('nama');
        $table->string('nis')->unique();
        $table->enum('gender', ['Laki-laki', 'Perempuan']);
        $table->text('alamat');
        $table->string('kontak');
        $table->string('email')->unique();
        $table->integer('status_pkl'); // Misal: 0 = belum, 1 = sedang, 2 = selesai
        $table->timestamps();
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('siswas');
    }
};
