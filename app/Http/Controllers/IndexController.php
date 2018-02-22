<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use DB;
use Auth;
use App\Slider;
use App\Packet;
use Carbon\Carbon;

class IndexController extends Controller
{
    public function show()
    {
        $data = Slider::whereNull('deleted_at')->get();
        $paket = Packet::whereNull('deleted_at')->get();

        // return response()->json($data);

        return view('index', compact('data','paket'));
    }    
}
