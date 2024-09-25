<?php

namespace App\Service;
use App\Models\Media;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Storage;

class MediaService
{

    public function getAllMedia(){
        return Media::all();
    }

    public function withURL($medias)
    {
        if ($medias instanceof LengthAwarePaginator) {
            $medias->getCollection()->transform(function ($media) {
                $media->url = Storage::url($media->file_path);
                return $media;
            });
    
            return $medias;
        }
    
        if ($medias instanceof Collection) {
            return $medias->map(function ($media) {
                $media->url = Storage::url($media->file_path);
                return $media;
            });
        }
    
        return $medias;
    }
    
    public function getMedias(Request $request)
    {
        $search = $request->input('search','');
        $query = Media::query();
        $query->search($search);
        return $query->paginator($request);
    }

    public function getMediasWithURL(Request $request)
    {
        $data = $this->getMedias($request);
        return $this->withURL($data);
    }
    public function uploadMedia(Request $request)
    {
        $validated = $request->validate([
            'file' => 'required|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $filename = time() . '.' . $file->getClientOriginalExtension();

            $filePath = $file->storeAs('media', $filename, 'public');

            $media = new Media();
            $media->file_name = $filename;
            $media->file_path = $filePath;
            $media->file_type = $file->getClientMimeType();
            $media->file_size = $file->getSize();
            $media->save();

            return $media;
        }

        return null;
    }

    public function deleteMedia(Media $media)
    {
        if ($media) {
            Storage::delete($media->file_path);
            $media->delete();
        }
    }


}
