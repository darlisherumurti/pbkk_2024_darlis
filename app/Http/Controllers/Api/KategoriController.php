<?php

namespace App\Http\Controllers\Api;

use App\Facades\KategoriServiceFacade;
use App\Http\Resources\BukuResource;
use App\Http\Resources\KategoriResource;
use App\Models\Kategori;
use Illuminate\Http\Request;

class KategoriController
{

    public function index(Request $request)
    {
        $kategoris = KategoriServiceFacade::getKategoris($request);
        $kategoris = KategoriResource::collection($kategoris);
        return $kategoris;
    }

    public function single(Kategori $kategori)
    {
        return new KategoriResource($kategori);
    }

    public function buku(Kategori $kategori)
    {
        return BukuResource::collection($kategori->bukus);
    }

    public function store(Request $request)
    {
        $kategori = KategoriServiceFacade::createKategori($request);
        return (new KategoriResource($kategori))->additional([
            'message' => 'success',
        ]);
    }

    public function update(Request $request, Kategori $kategori)
    {
        $kategori = KategoriServiceFacade::updateKategori($request, $kategori);
        return (new KategoriResource($kategori))->additional([
            'message' => 'success',
        ]);
    }

    public function delete(Kategori $kategori)
    {
        $deleted = KategoriServiceFacade::deleteKategori($kategori);
        return response()->json([
            'message' => $deleted ? 'success' : 'failed',
        ]);
    }
}
