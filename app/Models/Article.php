<?php

namespace App\Models;

use App\Traits\Searchable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;
    use Searchable;
    
    public function author()
    {
        return $this->belongsTo(User::class);
    }

    public function kategoris(){
        return $this->belongsToMany(Kategori::class,'article_kategori');
    }
}
