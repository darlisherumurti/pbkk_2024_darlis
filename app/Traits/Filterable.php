<?php

namespace App\Traits;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;

trait Filterable
{
    /**
     * Scope a query to search and paginate.
     *
     * @param Builder $query
     * @param string $search
     * @param int $limit
     * @return Builder
     */
    public function scopeFilter($query, Request $request)
    {
        $search = $request->input('search');
        $limit = $request->input('limit', 10);

        if ($search) {
            $columns = Schema::getColumnListing($this->getTable());
            $query->where(function ($q) use ($search, $columns) {
                foreach ($columns as $column) {
                    $q->orWhere($column, 'like', "%{$search}%");
                }
            });
        }
    
        return $query->paginate($limit);
    }
}
