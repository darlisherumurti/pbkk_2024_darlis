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
        Schema::create('buku', function (Blueprint $table) {
            $table->id();
            $table->string('judul'); // Judul buku
            $table->string('penulis'); // Nama penulis
            $table->string('penerbit'); // Nama penerbit
            $table->year('tahun_terbit')->nullable(); // Tahun terbit
            $table->integer('jumlah_halaman')->nullable(); // Jumlah halaman
            $table->string('isbn')->unique(); // ISBN buku
            $table->string('kategori')->nullable(); // Kategori buku
            $table->text('deskripsi')->nullable(); // Deskripsi buku
            $table->timestamps(); // Timestamps created_at dan updated_at
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('buku');
    }
};
