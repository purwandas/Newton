<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Filters\QueryFilters;

class Packet extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'nama_paket', 
        'alamat', 'kecepatan_lokal', 'kecepatan_internasional', 'power', 'size_server', 'jenis_paket', 'tax', 'harga', 'installasi', 'service', 'ip_public'
        //'lokasi', 'volume', 'satuan', 'harga_satuan', 'status'
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];

    /* Metode tambahan untuk model Branch Sport. */

    /**
     * Relation Method(s).
     *
     */

    public function subPacket()
    {
        return $this->hasMany('App\SubPacket', 'paket_id');
    }

    /**
     * Filtering Berdasarakan Request User
     * @param $query
     * @param QueryFilters $filters
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeFilter($query, QueryFilters $filters)
    {
        return $filters->apply($query);
    }
}
