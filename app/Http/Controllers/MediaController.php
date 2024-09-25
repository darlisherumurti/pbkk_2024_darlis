<?php

namespace App\Http\Controllers;

use App\Facades\MediaServiceFacade;
use App\Models\Media;
use Illuminate\Http\Request;
use Inertia\Inertia;

class MediaController
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $queryString = $request->query();
        $data['media'] = MediaServiceFacade::getMediasWithURL($request);
        $data['media']->appends($queryString);
        // return view('pertemuan5.media.index', compact('data'));
        return Inertia::render('Media/Index',[
            'data' => $data,
            'title' => 'Media List'
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return Inertia::render('Media/Create',[
            'title' => 'Upload Media'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $media = MediaServiceFacade::uploadMedia($request);
        session()->flash('success', 'Media "' . $media->file_name . '" sukses ditambahkan.');
        return Inertia::location(route('media.index'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Media $media)
    {
        $data['media'] = $media;
        return Inertia::render('Media/Show',[
            'data' => $data
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
