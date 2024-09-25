<?php

namespace App\Http\Controllers;

use App\Facades\PinjamanServiceFacade as PinjamanService;
use App\Http\Requests\Pinjamanan\NewPinjamanRequest;
use App\Models\Buku;
use App\Models\Pinjaman;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class PinjamanController
{
    /**
     * Display a listing of the resource.
     */
    public function pengembalian_show(Request $request)
    {
        $data['pinjaman'] = PinjamanService::getPinjamans($request);
        $data['pinjaman']->appends($request->query());
        return view('pertemuan5.pinjaman.pengembalian', compact('data'));
    }

    public function persetujuan_show(Request $request)
    {
        $data['pinjaman'] = PinjamanService::getPinjamans($request);
        $data['pinjaman']->appends($request->query());
        return view('pertemuan5.pinjaman.persetujuan', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Buku $buku)
    {
        $data['buku'] = $buku;
        return view('pertemuan5.pinjaman.create', compact('data'));
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
            return view('pertemuan5.pinjaman.show', compact('data'));
        } else {
            abort(403);
        }
    }

    public function me(Request $request)
    {
        $user = $request->user();
        $data['pinjaman'] = PinjamanService::getUserPinjamans($request, $user);
        $data['pinjaman']->appends($request->query());
    
        return view('pertemuan5.pinjaman.me', compact('data'));
    }

    public function setujui(Pinjaman $pinjaman)
    {
        PinjamanService::setujuiPinjaman($pinjaman);
        return redirect()->back()->with('success', 'Pinjaman ' . $pinjaman->buku->judul . ' telah disetujui.');
    }

    public function tolak(Pinjaman $pinjaman)
    {
        PinjamanService::tolakPinjaman($pinjaman);
        return redirect()->back()->with('success', 'Pinjaman ' . $pinjaman->buku->judul . ' telah ditolak.');
    }

    public function kembalikan(Pinjaman $pinjaman)
    {
        PinjamanService::kembalikanPinjaman($pinjaman);
        return redirect()->back()->with('success', 'Pinjaman ' . $pinjaman->buku->judul . ' telah dikembalikan.');
    }

    public function detail(Pinjaman $pinjaman)
    {
        $data['pinjaman'] = $pinjaman;
        return view('pertemuan5.pinjaman.detail', compact('data'));
    }

}
