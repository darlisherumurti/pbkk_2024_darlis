<?php

namespace App\Models;

use App\Traits\Searchable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Media extends Model
{
    use HasFactory;
    use Searchable;
    
    protected $table = 'media';

    public function getURL(){
        return Storage::url($this->file_path);
    }
}
