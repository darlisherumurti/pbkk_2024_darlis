<?php

namespace App\Http\Controllers\Api;

use App\Facades\BukuServiceFacade;
use App\Http\Requests\Buku\NewBukuRequest;
use App\Http\Requests\Buku\UpdateBukuRequest;
use App\Http\Resources\BukuResource;
use App\Http\Resources\KategoriResource;
use App\Models\Buku;
use Illuminate\Http\Request;

class BukuController
{
    public function index(Request $request)
    {
        $bukus = BukuServiceFacade::getBukusWithKategoris($request);
        $bukus = BukuResource::collection($bukus);
        return $bukus->additional([
            'message' => 'success',
        ]);
    } 

    public function single($id)
    {
        $buku = Buku::with('kategoris')->find($id);

        if(!$buku) {
            return response()->json([
                'message' => 'buku not found',
            ])
            ->setStatusCode(404);
        }
        return (new BukuResource($buku))->additional([
            'message' => 'success',
        ]);
    }

    public function kategori($id)
    {
        $buku = Buku::find($id);

        if(!$buku) {
            return response()->json([
                'message' => 'buku not found',
            ])
            ->setStatusCode(404);
        }

        $response = KategoriResource::collection($buku->kategoris);
        return $response->additional([
            'message' => 'success',
        ]);
    }

    public function store(NewBukuRequest $request)
    {
        $validated = $request->validated();
        unset($validated['kategoris']);
        $buku = Buku::create($validated);
        $buku->kategoris()->attach($request->input('kategoris'));
        return (new BukuResource($buku))->additional([
            'message' => 'success',
        ]);
    }

    public function update(UpdateBukuRequest $request,  $id)
    {
        $validated = $request->validated();
        unset($validated['kategoris']);
        $buku = Buku::find($id);
        if(!$buku) {
            return response()->json([
                'message' => 'buku not found',
            ])
            ->setStatusCode(404);
        }
        $buku->update($validated);
        $buku->kategoris()->sync($request->input('kategoris'));
        return (new BukuResource($buku))->additional([
            'message' => 'success',
        ]);
    }

    public function destroy($id)
    {
        $buku = Buku::find($id);
        if(!$buku) {
            return response()->json([
                'message' => 'buku not found',
            ])
            ->setStatusCode(404);
        }
        $buku->delete();
        return response()->json([
            'message' => 'success',
        ]);
    }
}
