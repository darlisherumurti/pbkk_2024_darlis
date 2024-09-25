<?php

namespace App\Http\Controllers;

use App\Facades\BukuServiceFacade;
use App\Http\Resources\BukuResource;
use App\Models\Buku;
use App\Models\Kategori;
use Illuminate\Http\Request;
use Inertia\Inertia;

class InertiaController
{
    public function index(Request $request)
    {
        return Inertia::render('Index', [
            'title' => 'Hello from controller',
        ]);
    }

    public function buku(Request $request)
    {
        $queryString = $request->query();
        $bukus = BukuServiceFacade::getBukusWithKategoris($request);
        $bukus->appends($queryString);
        $kategoris = Kategori::all();

        return Inertia::render('Buku', [
            'title' => 'List Buku',
            'bukus' => $bukus,
            'kategoris' => $kategoris,
            'queryString' => $queryString,
        ]);
    }
}
