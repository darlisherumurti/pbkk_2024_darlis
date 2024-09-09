<?php

namespace App\Http\Controllers;


use App\Facades\KategoriServiceFacade as KategoriService;
use App\Models\Kategori;
use Illuminate\Http\Request;

class KategoriController
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $data['kategori'] = KategoriService::getKategoris($request);
        $data['kategori']->appends($request->query());
        return view('pertemuan3.kategori.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        return view('pertemuan3.kategori.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $kategori = KategoriService::createKategori($request);
        return redirect()->back()->with('success', 'Kategori "' . $kategori->nama . '" sukses ditambahkan".');
    }

    /**
     * Display the specified resource.
     */
    public function show(Kategori $kategori)
    {
        $data['kategori'] = $kategori;
        return view('pertemuan3.kategori.show', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Kategori $kategori)
    {
        $data['kategori'] = $kategori;
        return view('pertemuan3.kategori.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Kategori $kategori)
    {
        $kategori = KategoriService::updateKategori($request, $kategori);
        return redirect()->back()->with('success', 'Kategori "' . $kategori->nama . '" sukses diupdate".');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Kategori $kategori)
    {
        $kategori->delete();
        return redirect()->route('kategori.list')->with('success', 'Kategori "' . $kategori->nama . '" sukses dihapus".');
    }
    public function list(Request $request)
    {
        $queryString = $request->query();
        $data['kategori'] = KategoriService::getKategorisWithBukus($request);
        $data['kategori']->appends($queryString);
        return view('pertemuan3.kategori.list', compact('data'));
    }

    public function detail(Kategori $kategori){
        $data['kategori'] = $kategori;
        return view('pertemuan3.kategori.detail', compact('data'));
    }
}
