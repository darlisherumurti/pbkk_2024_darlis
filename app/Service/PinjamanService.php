<?php

namespace App\Service;

use App\Http\Requests\Buku\NewBukuRequest;
use App\Http\Requests\Buku\UpdateBukuRequest;
use App\Http\Requests\Pinjamanan\NewPinjamanRequest;
use App\Models\Buku;
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
        ->withRelation('user')
        ->search($search)
        ->searchWithRelation($search, 'user', ['name']);
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
        return $user->pinjamans;   
    }

}