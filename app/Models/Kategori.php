<?php

namespace App\Models;

use App\Traits\Filterable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    use HasFactory;
    use Filterable;
    
    protected $table = 'kategori'; // Explicitly set the table name if necessary

    protected $fillable = [
        'nama',
    ];
    
    public function bukus()
    {
        return $this->belongsToMany(Buku::class, 'buku_kategori', 'kategori_id', 'buku_id'); // Explicitly define the pivot table name
    }
}
