<?php

namespace App\Filters;

use App\Account;
use Illuminate\Http\Request;

class BandwidthFilters extends QueryFilters
{

    /**
     * Ordering data by bandwidth
     */
    public function bandwidth($value) {
        return (!$this->requestAllData($value)) ? $this->builder->where('bandwidth', 'like', '%'.$value.'%') : null;
    }

}