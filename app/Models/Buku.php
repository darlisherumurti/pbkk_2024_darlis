<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Buku extends Model
{
    use HasFactory;

    protected $table = 'buku';

    protected $fillable = [
        'judul',           // Title of the book
        'penulis',         // Author of the book
        'penerbit',        // Publisher
        'tahun_terbit',    // Year of publication
        'jumlah_halaman',  // Number of pages
        'isbn',            // ISBN number
        'kategori',        // Category (if not using the pivot table relationship)
        'deskripsi',       // Description of the book
    ];

    public function kategoris()
    {
        return $this->belongsToMany(Kategori::class, 'buku_kategori','buku_id', 'kategori_id'); // Explicitly define the pivot table name
    }
}
