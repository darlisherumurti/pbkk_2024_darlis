<?php

namespace App\Http\Controllers;

use App\Facades\PinjamanServiceFacade as PinjamanService;
use App\Http\Requests\Pinjamanan\NewPinjamanRequest;
use App\Models\Buku;
use App\Models\Pinjaman;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class PinjamanController
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $data['pinjaman'] = PinjamanService::getPinjamans($request);
        $data['pinjaman']->appends($request->query());
        return view('pertemuan3.pinjaman.list', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Buku $buku)
    {
        $data['buku'] = $buku;
        return view('pertemuan3.pinjaman.create', compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(NewPinjamanRequest $request)
    {
        $pinjaman = PinjamanService::createPinjaman($request);
        return redirect()->route('buku.index')->with('success', 'Pinjaman "' . $pinjaman->buku->judul . '" sukses ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Pinjaman $pinjaman)
    {
        if(Gate::allows('view-pinjaman', $pinjaman)) {   
            $data['pinjaman'] = $pinjaman;
            return view('pertemuan3.pinjaman.show', compact('data'));
        } else {
            abort(403);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pinjaman $pinjaman)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pinjaman $pinjaman)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pinjaman $pinjaman)
    {
        //
    }

    public function me(Request $request)
    {
        $user = $request->user();
        $data['pinjaman'] = PinjamanService::getUserPinjamans($request, $user);
        // $data['pinjaman']->appends($request->query());

        return view('pertemuan3.pinjaman.me', compact('data'));
    }

    public function setujui(Pinjaman $pinjaman)
    {
        //
    }

    public function tolak(Pinjaman $pinjaman)
    {
        //
    }

    public function kembalikan(Pinjaman $pinjaman)
    {
        //
    }

    public function detail(Pinjaman $pinjaman)
    {
        $data['pinjaman'] = $pinjaman;
        return view('pertemuan3.pinjaman.detail', compact('data'));
    }

    public function list(Request $request){
        $data['pinjaman'] = PinjamanService::getPinjamans($request);
        return view('pertemuan3.pinjaman.list', compact('data'));
    }
}
