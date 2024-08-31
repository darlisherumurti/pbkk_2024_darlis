<?php

namespace App\Http\Controllers;

use App\Http\Requests\NewBukuRequest;
use App\Http\Requests\UpdateBukuRequest;
use App\Models\Buku;
use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class BukuController extends Controller
{
    public function index(Request $request)
    {
        $data['buku']  = Buku::with('kategoris')->filter($request);
        return view('pertemuan2.buku.index', compact('data'));
    }

    public function create()
    {
        $data['kategori'] = Kategori::all();
        return view('pertemuan2.buku.create',compact('data'));
    }

    public function store(NewBukuRequest $request)
    {
        $validatedData = $request->validated();
        unset($validatedData['kategori']);
        $buku = Buku::create($validatedData);
        $buku->kategoris()->attach($request->input('kategori'));

        return redirect()->route('crud-buku.index')->with('success', 'Buku "' . $buku->judul . '" sukses ditambahkan.');
    }

    public function show(Buku $buku)
    {
        $data['buku'] = $buku;
        return view('pertemuan2.buku.show', compact('data'));
    }

    public function edit(Buku $buku) 
    {
        $data['buku'] = $buku;
        $data['buku-kategori'] = $buku->kategoris->pluck('id')->toArray();
        $data['kategori'] = Kategori::all();
        return view('pertemuan2.buku.edit', compact('data'));
    }

    public function update(UpdateBukuRequest $request, Buku $buku)
    {
        $validatedData = $request->validated();
        unset($validatedData['kategori']);
        $buku->update($validatedData);
        $buku->kategoris()->sync($request->input('kategori'));
        return redirect()->route('crud-buku.index', $buku->id)->with('success', 'buku "'.$buku->judul.'" sukses diubah');
    }

    public function destroy(Buku $buku)
    {
        $buku->kategoris()->detach();
        $buku->delete();
        return redirect()->route('crud-buku.index')->with('success', 'Buku "' . $buku->judul . '" sukses dihapus".');
    }
}
