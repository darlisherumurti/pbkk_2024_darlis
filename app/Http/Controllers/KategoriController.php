<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;

class KategoriController
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->input('search','');
        $limit = $request->input('limit', 10); // Default limit is 10

        $query = Kategori::with('bukus');
        
        $query->where(function ($q) use ($search) {
            $q->where('nama', 'like', '%' . $search . '%');
        });

        $data['kategori'] = $query->paginate($limit);

        return view('pertemuan2.kategori.index', compact('data','search','limit'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pertemuan2.kategori.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama' => 'required|string|max:255',
        ]);

        $kategori = Kategori::create($validatedData);
        return redirect()->route('crud-kategori.index', $kategori->id)->with('success', 'kategori "'.$kategori->nama.'" sukses ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $kategori = Kategori::findOrFail($id);
        $data['kategori'] = $kategori;
        return view('pertemuan2.kategori.show', compact('data'));

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $kategori = Kategori::findOrFail($id);
        $data['kategori'] = $kategori;
        return view('pertemuan2.kategori.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validatedData = $request->validate([
            'nama' => 'required|string|max:255',
        ]);

        $kategori = Kategori::findOrFail($id);
        $kategori->update($validatedData);
        return redirect()->route('crud-kategori.index', $kategori->id)->with('success', 'kategori "'.$kategori->nama.'" sukses diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $kategori = Kategori::findOrFail($id);
        $kategori->delete();
        return redirect()->route('crud-kategori.index')->with('success', 'Kategori "' . $kategori->nama . '" sukses dihapus".');
    }
}
