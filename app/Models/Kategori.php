<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    use HasFactory;
    protected $table = 'kategori'; // Explicitly set the table name if necessary

    protected $fillable = [
        'nama',
    ];
    
    public function bukus()
    {
        return $this->belongsToMany(Buku::class, 'buku_kategori', 'kategori_id', 'buku_id'); // Explicitly define the pivot table name
    }
}
