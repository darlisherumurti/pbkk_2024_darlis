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
        Schema::create('pinjaman', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('buku_id')->constrained('buku')->onDelete('cascade');
            $table->enum('status_persetujuan', ['Menunggu Persetujuan', 'Disetujui', 'Ditolak'])->default('Menunggu Persetujuan');
            $table->enum('status_pengembalian', ['Belum dikembalikan', 'Sudah dikembalikan'])->nullable();
            $table->string('nama_lengkap');
            $table->string('alamat');
            $table->string('keterangan');  
            $table->integer('durasi_peminjaman'); // hari
            $table->date('tanggal_peminjaman');
            $table->date('tanggal_persetujuan')->nullable();
            $table->date('tanggal_pengembalian')->nullable();
            $table->date('tanggal_dikembalikan')->nullable();
            $table->timestamps();
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pinjaman');
    }
};
