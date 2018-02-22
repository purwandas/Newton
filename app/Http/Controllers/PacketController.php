<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\Datatables\Facades\Datatables;
use DB;
use Auth;
use App\Packet;
use App\Filters\PacketFilters;
use Carbon\Carbon;

class PacketController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('master.list_packet');
    }

    /**
     * Data for DataTables
     *
     * @return \Illuminate\Http\Response
     */
    public function masterDataTable(){

        $data = Packet::where('packets.deleted_at', null)
                    ->select('packets.*')->get();

        return $this->makeTable($data);
    }

    // Datatable template
    public function makeTable($data){

           return Datatables::of($data)
               ->editColumn('harga', function ($item) {
                    if (!isset($item->harga)) {
                        return "-";
                    }
                    return number_format($item->harga);
                })
               ->editColumn('installasi', function ($item) {
                    if (!isset($item->installasi)) {
                        return "-";
                    }
                    return number_format($item->installasi);
                })
               ->editColumn('service', function ($item) {
                    if (!isset($item->service)) {
                        return "-";
                    }
                    return number_format($item->service);
                })
                ->addColumn('action', function ($item) {
                   return
                   "<a href='".url('paket/edit/'.$item->id)."' class='btn-social'><i class='fa fa-pencil-square-o'></i></a>
                    <a href='".url('paket/delete/'.$item->id)."' class='btn-social'><i class='fa fa-remove'></i></a>";
                })
                ->rawColumns(['action'])
                ->make(true);
    }

    public function getDataWithFilters(PacketFilters $filters){
        $data = Packet::where('packets.deleted_at', null)
            ->filter($filters)->get();

        return $data;
    }

    public function create()
    {
        return view('master.form.packet-form');
    }
    
    public function add(Request $request)
    {
        
        $this->validate($request, [
            'nama_paket' => 'required',
            'alamat' => 'required',
            'ip_public' => 'required',
            'kecepatan_lokal' => 'required',
            'kecepatan_internasional' => 'required',
            'power' => 'required',
            'size_server' => 'required',
            'tax' => 'required',
            'harga' => 'required',
            'installasi' => 'required',
            'service' => 'required',
        ]);
        // return response()->json($request->all());

        $add = Packet::create(
            [
                'nama_paket' => $request['nama_paket'],
                'alamat' => $request['alamat'],
                'ip_public' => $request['ip_public'],
                'kecepatan_lokal' => $request['kecepatan_lokal'],
                'kecepatan_internasional' => $request['kecepatan_internasional'],
                'power' => $request['power'],
                'size_server' => $request['size_server'],
                'tax' => $request['tax'],
                'harga' => $request['harga'],
                'installasi' => $request['installasi'],
                'service' => $request['service'],
            ]
        );

        // return response()->json(['url' => url('/paket')]);

        return redirect('/paket');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Packet::where('id', $id)->first();

        return view('master.form.packet-form', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'nama_paket' => 'required',
            'alamat' => 'required',
            'ip_public' => 'required',
            'kecepatan_lokal' => 'required',
            'kecepatan_internasional' => 'required',
            'power' => 'required',
            'size_server' => 'required',
            'tax' => 'required',
            'harga' => 'required',
            'installasi' => 'required',
            'service' => 'required',
        ]);
    
        // return response()->json($request->all());

        $paket = Packet::find($id);
        $paket->update($request->all());  

        return redirect('/paket');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
        $paket = Packet::find($id);
        if (count($paket) > 0) {
            $paket->delete();
        }
        // $paket = Packet::destroy($id);

        return redirect('/paket');
    }
}
