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

    public function createKategori(Request $request){
        $validated = $request->validate([
            'nama' => ['required', 'string', 'max:255', 'unique:kategori,nama'],
        ]);
        return Kategori::create($validated);
    }

    public function updateKategori(Request $request, Kategori $kategori){
        $validated = $request->validate([
            'nama' => ['required', 'string', 'max:255', 'unique:kategori,nama,' . $kategori->id],
        ]);
        return $kategori->update($validated);
    }

    public function deleteKategori(Kategori $kategori){
        return $kategori->delete();
    }

}