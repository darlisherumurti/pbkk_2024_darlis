<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PinjamanResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'buku' => new BukuResource($this->buku),
            'user' => new UserResource($this->user),
            'status_persetujuan' => $this->status_persetujuan,
            'status_pengembalian' => $this->status_pengembalian,
            'alamat' => $this->alamat,
            'keterangan' => $this->keterangan,
            'durasi_peminjaman' => $this->durasi_peminjaman,
            'tanngal' => [
                'pengembalian' => $this->tanggal_pengembalian,
                'peminjaman' => $this->tanggal_peminjaman,
                'disetujui' => $this->tanggal_disetujui,
                'dikembalikan' => $this->tanggal_dikembalikan
            ]
        ];
    }
}
