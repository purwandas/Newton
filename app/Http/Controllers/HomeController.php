<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\ListOrder;
use App\Packet;
use Auth;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::get();
        $user = count($user);

        $order = ListOrder::where('list_orders.deleted_at', null)->get();
        $order = count($order);

        $paket = Packet::where('packets.deleted_at', null)->get();
        $paket = count($paket);

        return view('home', compact('user','order','paket'));
    }

    public function userIndex()
    {
        $service = ListOrder::where('pembayaran','Paid')
                ->where('id_user',Auth::user()->id)
                ->count();

        // $service = 0;//count($service);

        $invoice = ListOrder::where('pembayaran','Paid')
                ->where('id_user',Auth::user()->id)
                ->count();
        // $invoice = 0;//count($invoice);

        return view('user.home', compact('service','invoice'));
    }
}
