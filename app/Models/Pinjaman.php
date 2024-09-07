<?php

namespace App\Models;

use App\Traits\Searchable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Str;

    class Pinjaman extends Model
    {
        use HasFactory;
        use Searchable;
        
        protected $table = 'pinjamans';
        public $incrementing = false;

        protected static function boot()
        {
            parent::boot();
            static::creating(function ($model) {
                if (empty($model->id)) {
                    $model->id = (string) Str::random(8);
                }
            });
        }

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
