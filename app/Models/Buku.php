<?php

namespace App\Models;

use App\Traits\Filterable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Buku extends Model
{
    use HasFactory;
    use Filterable;
    // nama table di database
    // jika tidak didefinisi maka akan menggunakan berdasarkan nama class
    protected $table = 'buku';

    // Tentukan kolom-kolom yang bisa diisi secara massal
    protected $fillable = [
        'judul',
        'penulis',
        'penerbit',
        'tahun_terbit',
        'jumlah_halaman',
        'isbn',
        'kategori',
        'deskripsi',
    ];
}
