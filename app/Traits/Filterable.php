<?php

namespace App\Traits;

use Illuminate\Database\Eloquent\Builder;

trait Filterable
{
    /**
     * Scope a query to search and paginate.
     *
     * @param Builder $query
     * @param string $search
     * @return Builder
     */
    public function scopeFilter($query, $search = null,$limit = 10)
    {
        if ($search) {
            $query->where(function ($q) use ($search) {
                $q->where('judul', 'like', "%{$search}%")
                  ->orWhere('id', 'like', "%{$search}%")
                  ->orWhere('penulis', 'like', "%{$search}%")
                  ->orWhere('penerbit', 'like', "%{$search}%")
                  ->orWhere('kategori', 'like', "%{$search}%")
                  ->orWhere('deskripsi', 'like', "%{$search}%")
                  ->orWhere('isbn', 'like', "%{$search}%");
            });
        }
        
        return $query->paginate($limit); // Ganti 10 dengan jumlah item per halaman
    }
}
