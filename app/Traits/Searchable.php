<?php

namespace App\Traits;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;

trait Searchable
{
    /**
     * Scope a query to search and paginate.
     *
     * @param Builder $query
     * @param string $search
     * @param int $limit
     * @return Builder
     */
    public function scopeSearch($query, Request $request)
    {
        $search = $request->input('search');
        if ($search) {
            $columns = Schema::getColumnListing($this->getTable());
            $query->where(function ($q) use ($search, $columns) {
                foreach ($columns as $column) {
                    $q->orWhere($column, 'like', "%{$search}%");
                }
            });
        }
        return $query;
    }

    public function scopeSearchWithRelations($query, Request $request, string $relation = '', array $relatedColumns = [])
    {
        $search =  (string) $request->input('search');

        if ($search) {
            $table = $this->getTable();
            $columns = Schema::getColumnListing($this->getTable());
            $query->where(function ($q) use ($search, $table, $columns, $relation, $relatedColumns) {

                if ($relation && $this->relationExists($relation)) {
                    $q->whereHas($relation, function ($que) use ($search, $relatedColumns) {
                        foreach ($relatedColumns as $relatedColumn) {
                            $que->where("{$relatedColumn}", 'like', '%' . $search . '%');
                        }
                    });
                }
                foreach ($columns as $column) {
                    $q->orWhere("{$table}.{$column}", 'like', '%' . $search . '%');
                }
            });
        }
        return $query;
    }

    public function scopePaginator($query, Request $request)
    {
        $limit = $request->input('limit', 10);
        return $query->paginate($limit);
    }

    /**
     * Check if the relation exists on the model.
     *
     * @param string $relation
     * @return bool
     */
    protected function relationExists(string $relation): bool
    {
        return method_exists($this, $relation);
    }
}
