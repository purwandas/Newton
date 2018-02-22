<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Filters\QueryFilters;

class SubPacket extends Model
{
    use SoftDeletes;
            
    protected $fillable = [
        'id_paket', 'detail'
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

    public function paket()
    {
        return $this->belongsTo('App\Packet', 'id_paket');
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
