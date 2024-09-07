<?php

// @formatter:off
// phpcs:ignoreFile
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property string $nama
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Buku> $bukus
 * @property-read int|null $bukus_count
 * @method static \Database\Factories\KategoriFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|Kategori filter(string $search, string $column = 'id')
 * @method static \Illuminate\Database\Eloquent\Builder|Kategori filterByRelation(string $search, string $relation = '', $column = 'id')
 * @method static \Illuminate\Database\Eloquent\Builder|Kategori filters(string $search, array $columns = [])
 * @method static \Illuminate\Database\Eloquent\Builder|Kategori newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Kategori newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Kategori paginator(\Illuminate\Http\Request $request, $limit = 10)
 * @method static \Illuminate\Database\Eloquent\Builder|Kategori query()
 * @method static \Illuminate\Database\Eloquent\Builder|Kategori search(string $search, $ignoreTimestamps = true)
 * @method static \Illuminate\Database\Eloquent\Builder|Kategori searchRelation(string $search, string $relation, array $relatedColumns)
 * @method static \Illuminate\Database\Eloquent\Builder|Kategori whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Kategori whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Kategori whereNama($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Kategori whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Kategori withRelation(string $relation)
 */
	class Kategori extends \Eloquent {}
}

