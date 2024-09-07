<?php

namespace App\Service;


use App\Http\Requests\Pinjamanan\NewPinjamanRequest;
use App\Models\Pinjaman;
use App\Models\User;
use Illuminate\Http\Request;

class PinjamanService
{
    public function getPinjamans(Request $request,){

        $search = $request->input('search') ?? '';
        $status_persetuan = $request->input('status_persetujuan') ?? '';
        $status_pengembalian = $request->input('status_pengembalian') ?? '';


        $query = Pinjaman::query()
        ->search($search)
        ->searchRelation($search, 'user', ['name'])
        ->searchRelation($search, 'buku', ['judul']);

        if($status_persetuan) {
            $query->filter($status_persetuan, 'status_persetujuan');
        }
        if($status_pengembalian) {
            $query->filter($status_pengembalian, 'status_pengembalian');
        }
        return $query->paginator($request,30);
    }

    public function getPinjamansWithUsers(Request $request,){
        
        $search = $request->input('search') ?? '';
        $user = $request->input('user') ?? '';

        $query = Pinjaman::query()
        ->withRelation('users')
        ->search($search);
        
        if($request->has('user')) {
            $query->filterByRelation($user, 'users','user_id');
        }
        return $query->paginator($request,30);
    }

    public function createPinjaman(NewPinjamanRequest $request){
        $validatedData = $request->validated();

        $tanggalPeminjaman = $validatedData['tanggal_peminjaman'];
        $durasiPeminjaman = $validatedData['durasi_peminjaman'];

        $tanggalPeminjamanDate = new \DateTime($tanggalPeminjaman);
        $tanggalPeminjamanDate->modify("+$durasiPeminjaman days");
        $tanggalPengembalian = $tanggalPeminjamanDate->format('Y-m-d');
        
        $validatedData['tanggal_pengembalian'] = $tanggalPengembalian;

        $pinjaman = Pinjaman::create($validatedData);
        return $pinjaman;
    }

    public function getUserPinjamans(Request $request, User $user) { 

        $searchTerm = $request->input('search') ?? '';
        $status_persetujuan = $request->input('status_persetujuan') ?? '';
        $status_pengembalian = $request->input('status_pengembalian') ?? '';

        $query = $user->pinjamans()
        ->search($searchTerm)
        ->orSearchRelation($searchTerm, 'buku', ['judul']);
        
        if($status_persetujuan) {
            $query->filter($status_persetujuan, 'status_persetujuan');
        }
        if($status_pengembalian) {
            $query->filter($status_pengembalian, 'status_pengembalian');
        }

        return $query->paginator($request,30);   
    }

    public function setujuiPinjaman(Pinjaman $pinjaman) {
        $pinjaman->status_persetujuan = 'Disetujui';
        $pinjaman->tanggal_disetujui = now();
        $pinjaman->save();
        return $pinjaman;
    }

    public function tolakPinjaman(Pinjaman $pinjaman) {
        $pinjaman->status_persetujuan = 'Ditolak';
        $pinjaman->save();
        return $pinjaman;
    }

    public function kembalikanPinjaman(Pinjaman $pinjaman) {
        $pinjaman->status_pengembalian = 'Sudah dikembalikan';
        $pinjaman->tanggal_dikembalikan = now();
        $pinjaman->save();
        return $pinjaman;
    }
}