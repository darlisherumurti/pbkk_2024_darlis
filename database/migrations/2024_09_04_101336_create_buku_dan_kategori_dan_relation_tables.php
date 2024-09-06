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
            $table->string('image_url')->nullable();
            $table->year('tahun_terbit')->nullable(); // Tahun terbit
            $table->integer('jumlah_halaman')->nullable(); // Jumlah halaman
            $table->string('isbn')->unique(); // ISBN buku
            $table->text('deskripsi')->nullable(); // Deskripsi buku
            $table->timestamps(); // Timestamps created_at dan updated_at
        });

        Schema::create('kategori', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->timestamps();
        });
        
        Schema::create('buku_kategori', function (Blueprint $table) {
            $table->id();
            $table->foreignId('buku_id')->constrained('buku')->onDelete('cascade');
            $table->foreignId('kategori_id')->constrained('kategori')->onDelete('cascade');
            $table->timestamps();
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('buku_kategori'); // Drop the pivot table first
        Schema::dropIfExists('kategori');      // Then drop the kategori table
        Schema::dropIfExists('buku');          // Finally, drop the buku table
    }
};
