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

    public function single($id)
    {   
        $kategori = Kategori::find($id);
        if(!$kategori) {
            return response()->json([
                'message' => 'kategori not found',
            ])
            ->setStatusCode(404);
        }
        return new KategoriResource($kategori);
    }

    public function buku($id)
    {
        $kategori = Kategori::find($id);
        if(!$kategori) {
            return response()->json([
                'message' => 'kategori not found',
            ])
            ->setStatusCode(404);
        }
        return BukuResource::collection($kategori->bukus);
    }

    public function store(Request $request)
    {
        $kategori = KategoriServiceFacade::createKategori($request);
        return (new KategoriResource($kategori))->additional([
            'message' => 'success',
        ]);
    }

    public function update(Request $request, $id)
    {
        $kategori = Kategori::find($id);
        if(!$kategori) {
            return response()->json([
                'message' => 'kategori not found',
            ])
            ->setStatusCode(404);
        }
        $kategori = KategoriServiceFacade::updateKategori($request, $kategori);
        return (new KategoriResource($kategori))->additional([
            'message' => 'success',
        ]);
    }

    public function delete($id)
    {
        $kategori = Kategori::find($id);
        if(!$kategori) {
            return response()->json([
                'message' => 'kategori not found',
            ])
            ->setStatusCode(404);
        }
        $deleted = KategoriServiceFacade::deleteKategori($kategori);
        return response()->json([
            'message' => $deleted ? 'success' : 'failed',
        ]);
    }
}
