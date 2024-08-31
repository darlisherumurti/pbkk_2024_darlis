<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\Kategori;
use Illuminate\Http\Request;

class Pertemuan2Controller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->input('search','');
        $limit = $request->input('limit', 10); // Default limit is 10

        $query = Buku::query();

        $query->where(function ($q) use ($search) {
            $q->where('judul', 'like', '%' . $search . '%')
              ->orWhere('penulis', 'like', '%' . $search . '%')
              ->orWhere('penerbit', 'like', '%' . $search . '%');
        });

        $data['buku'] = $query->paginate($limit);

        return view('pertemuan2.buku.index', compact('data','search','limit'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data['kategori'] = Kategori::all();
        return view('pertemuan2.buku.create',compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'judul' => 'required|string|max:255',
            'penulis' => 'required|string|max:255',
            'penerbit' => 'required|string|max:255',
            'tahun_terbit' => 'nullable|integer',
            'jumlah_halaman' => 'nullable|integer',
            'isbn' => 'required|string|unique:buku,isbn|max:13',
            'kategori' => 'required|array',
            'kategori.*' => 'exists:kategori,id',
            'deskripsi' => 'nullable|string',
        ]);
        unset($validatedData['kategori']);

        $buku = Buku::create($validatedData);
        $buku->kategoris()->attach($request->input('kategori'));

        return redirect()->route('crud-buku.index')->with('success', 'Buku "' . $buku->judul . '" sukses ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $buku = Buku::findOrFail($id);
        $data['buku'] = $buku;
        return view('pertemuan2.buku.show', compact('data'));

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $buku = Buku::findOrFail($id);
        $data['buku'] = $buku;
        $data['buku-kategori'] = $buku->kategoris->pluck('id')->toArray();
        $data['kategori'] = Kategori::all();
        return view('pertemuan2.buku.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $buku = Buku::findOrFail($id);

        $validatedData = $request->validate([
            'judul' => 'required|string|max:255',
            'penulis' => 'required|string|max:255',
            'penerbit' => 'required|string|max:255',
            'tahun_terbit' => 'nullable|integer',
            'jumlah_halaman' => 'nullable|integer',
            'isbn' => 'required|string|unique:buku,isbn,' . $buku->id . '|max:13',
            'kategori' => 'required|array',
            'kategori.*' => 'exists:kategori,id',
            'deskripsi' => 'nullable|string',
        ]);

        unset($validatedData['kategori']);

        $buku->update($validatedData);

        $buku->kategoris()->sync($request->input('kategori'));

        return redirect()->route('crud-buku.index', $buku->id)->with('success', 'buku "'.$buku->judul.'" sukses diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $buku = Buku::findOrFail($id);
        $buku->kategoris()->detach();
        $buku->delete();
        return redirect()->route('crud-buku.index')->with('success', 'Buku "' . $buku->judul . '" sukses dihapus".');
    }
}
