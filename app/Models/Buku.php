<?php

namespace App\Models;

use App\Traits\Searchable;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

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
 */
class Buku extends Model
{
    use Searchable;
    use HasFactory;

    protected $table ='buku';

    protected $fillable = [
        'judul',
        'penulis',
        'penerbit',
        'image_url',
        'tahun_terbit',
        'jumlah_halaman',
        'isbn',
        'deskripsi',
    ];
    public function kategoris(): BelongsToMany {
        return $this->belongsToMany(Kategori::class, 'buku_kategori', 'buku_id', 'kategori_id');
    }
    public function created_days_ago()
    {
         return Carbon::createFromTimestamp(strtotime($this->created_at))->diff(Carbon::now())->days;
    } 
}
