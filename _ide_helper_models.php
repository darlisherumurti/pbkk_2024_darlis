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
 * @property string $judul
 * @property string $penulis
 * @property string $penerbit
 * @property string|null $image_url
 * @property int|null $tahun_terbit
 * @property int|null $jumlah_halaman
 * @property string $isbn
 * @property string|null $deskripsi
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Kategori> $kategoris
 * @property-read int|null $kategoris_count
 * @method static \Database\Factories\BukuFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|Buku filter(string $search, string $column = 'id')
 * @method static \Illuminate\Database\Eloquent\Builder|Buku filters(string $search, array $columns = [])
 * @method static \Illuminate\Database\Eloquent\Builder|Buku newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Buku newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Buku paginator(\Illuminate\Http\Request $request, $limit = 10)
 * @method static \Illuminate\Database\Eloquent\Builder|Buku query()
 * @method static \Illuminate\Database\Eloquent\Builder|Buku search(string $search)
 * @method static \Illuminate\Database\Eloquent\Builder|Buku searchRelation(string $search, string $relation, array $relatedColumns)
 * @method static \Illuminate\Database\Eloquent\Builder|Buku whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Buku whereDeskripsi($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Buku whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Buku whereImageUrl($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Buku whereIsbn($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Buku whereJudul($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Buku whereJumlahHalaman($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Buku wherePenerbit($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Buku wherePenulis($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Buku whereTahunTerbit($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Buku whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Buku withRelation(string $relation)
 * @mixin \Eloquent
 * @method static \Illuminate\Database\Eloquent\Builder|Buku filterByRelation(string $search, string $relation = '', $column = 'id')
 */
	class Buku extends \Eloquent {}
}

