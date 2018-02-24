<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Filters\QueryFilters;

class Invoice extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'id_order', 'invoice_number', 'issue_date', 'invoice_start_period', 'invoice_end_period', 'due_date', 'file', 'month_gap', 'installasi', 'paid_status', 'paid_file', 'verification_file'
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

    public function order()
    {
        return $this->belongsTo('App\ListOrder', 'id_order');
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
