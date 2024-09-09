<?php

namespace App\Http\Controllers\Api;

use App\Facades\PinjamanServiceFacade;
use App\Http\Requests\Pinjamanan\NewPinjamanRequest;
use App\Http\Resources\PinjamanResource;
use App\Models\Pinjaman;
use Illuminate\Http\Request;

class PinjamanController
{
    public function index(Request $request)
    {
        $pinjamans = PinjamanServiceFacade::getPinjamans($request);
        $pinjamans = PinjamanResource::collection($pinjamans);
        return $pinjamans->additional([
            'message' => 'success',
        ]);
    }

    public function me(Request $request)
    {
        $user = $request->user();
        $pinjamans = PinjamanServiceFacade::getUserPinjamans($request, $user);
        $pinjamans = PinjamanResource::collection($pinjamans);
        return $pinjamans->additional([
            'message' => 'success',
        ]);
    }

    public function single(Pinjaman $pinjaman)
    {
        return (new PinjamanResource($pinjaman))->additional([
            'message' => 'success',
        ]);
    }

    public function store(NewPinjamanRequest $request)
    {
        $pinjaman = PinjamanServiceFacade::createPinjaman($request);
        return (new PinjamanResource($pinjaman))->additional([
            'message' => 'success',
        ]);
    }

    public function setujui(Pinjaman $pinjaman)
    {
        $pinjaman = PinjamanServiceFacade::setujuiPinjaman($pinjaman);
        return (new PinjamanResource($pinjaman))->additional([
            'message' => 'success',
        ]);
    }

    public function tolak(Pinjaman $pinjaman)
    {
        $pinjaman = PinjamanServiceFacade::tolakPinjaman($pinjaman);
        return (new PinjamanResource($pinjaman))->additional([
            'message' => 'success',
        ]);
    }

    public function kembalikan(Pinjaman $pinjaman)
    {   
        $pinjaman = PinjamanServiceFacade::kembalikanPinjaman($pinjaman);
        return (new PinjamanResource($pinjaman))->additional([
            'message' => 'success',
        ]);
    }
}
