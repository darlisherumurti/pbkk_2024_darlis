<?php

namespace App\Service;

use App\Http\Requests\Buku\NewBukuRequest;
use App\Http\Requests\Buku\UpdateBukuRequest;
use App\Models\Buku;
use Illuminate\Http\Request;

class BukuService
{
    public function getBukus(Request $request,){

        $search = $request->input('search') ?? '';

        $query = Buku::query()
        ->search($search);

        if($request->has('kategori')) {
            $query->filterByRelation($query, $request->input('kategori'), 'kategoris','kategori_id');
        }

        return $query->paginator($request,30);
    }

    public function getBukusWithKategoris(Request $request,){
        
        $search = $request->input('search') ?? '';
        $kategori = $request->input('kategori') ?? '';

        $query = Buku::query()
        ->withRelation('kategoris')
        ->search($search);
        
        if($request->has('kategori')) {
            $query->filterByRelation($kategori, 'kategoris','kategori_id');
        }
        return $query->paginator($request,30);
    }

    public function createBuku(NewBukuRequest $request){
        $validatedData = $request->validated();
        unset($validatedData['kategori']);
        $buku = Buku::create($validatedData);
        $buku->kategoris()->attach($request->input('kategori'));
        return $buku;
    }

    public function updateBuku(UpdateBukuRequest $request, Buku $buku){
        $validatedData = $request->validated();
        unset($validatedData['kategori']);
        $buku->update($validatedData);
        $buku->kategoris()->sync($request->input('kategori'));
        return $buku;
    }

}