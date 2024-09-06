<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

    class Pinjaman extends Model
    {
        use HasFactory;

        public function user()
        {
            return $this->belongsTo(User::class,'user_id');
        }

        public function buku()
        {
            return $this->belongsTo(Buku::class,'buku_id');
        }
    }
