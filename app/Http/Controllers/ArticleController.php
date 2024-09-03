<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class ArticleController
{
    public function index(Request $request)
    {   
        $data['articles'] = Article::with('kategoris')
        ->SearchWithRelation($request,'kategoris',['nama_kategori'])->get();
        return view('pertemuan3.article.index',compact('data'));
    }
}
