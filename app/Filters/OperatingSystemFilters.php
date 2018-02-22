<?php

namespace App\Filters;

use App\Account;
use Illuminate\Http\Request;

class OperatingSystemFilters extends QueryFilters
{

    /**
     * Ordering data by bandwidth
     */
    public function operatingsystem($value) {
        return (!$this->requestAllData($value)) ? $this->builder->where('operating_system', 'like', '%'.$value.'%') : null;
    }

}