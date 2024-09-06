<?php

namespace App\Models;

use App\Traits\Searchable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

    class Pinjaman extends Model
    {
        use HasFactory;
        use Searchable;
        
        protected $table = 'pinjaman';
        protected $fillable = [
            'user_id', 'buku_id', 'nama_lengkap', 'alamat', 'keterangan', 
            'tanggal_peminjaman', 'durasi_peminjaman', 'tanggal_persetujuan', 
            'tanggal_pengembalian', 'tanggal_dikembalikan'
        ];

        public function user()
        {
            return $this->belongsTo(User::class,'user_id');
        }

        public function buku()
        {
            return $this->belongsTo(Buku::class,'buku_id');
        }
    }
