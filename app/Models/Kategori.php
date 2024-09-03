<?php

namespace App\Models;

use App\Traits\Searchable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    use HasFactory;
    use Searchable;
    
    public function articles(){
        return $this->belongsToMany(Article::class,'article_kategori');
    }
}
