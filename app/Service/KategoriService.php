<?php

namespace App\Service;
use App\Models\Kategori;
use Illuminate\Http\Request;

class KategoriService
{
    public function getKategoris(Request $request){
        $search = $request->input('search','');
        $query = Kategori::query()
        ->search($search);
        return $query->paginator($request);
    }

    public function getKategorisWithBukus(Request $request){
        $search = $request->input('search') ?? '';
        $query = Kategori::query()
        ->withRelation('bukus')
        ->search($search);
        return $query->paginator($request);
    }

}