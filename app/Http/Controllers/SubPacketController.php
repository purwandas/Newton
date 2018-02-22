<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\Datatables\Facades\Datatables;
use DB;
use Auth;
use App\SubPacket;
use Carbon\Carbon;

class SubPacketController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('master.list_sub_packet');
    }

    public function create()
    {
        return view('master.form.sub-packet-form');
    }

    /**
     * Data for DataTables
     *
     * @return \Illuminate\Http\Response
     */
    public function masterDataTable(Request $request){

        
        $data = SubPacket::where('sub_packets.deleted_at', null)
                    ->join('packets','packets.id','sub_packets.id_paket')
                    ->select('sub_packets.*','packets.nama_paket','packets.harga_satuan')->get();

        return $this->makeTable($data);
    }

    // Datatable template
    public function makeTable($data){

        return Datatables::of($data)
            ->addColumn('paket', function ($item) {
               return
               "$item->nama_paket ($item->harga_satuan)";
            })
            ->addColumn('action', function ($item) {
               return
               "<a href='".url('subpaket/edit/'.$item->id)."' class='btn-social'><i class='fa fa-pencil-square-o'></i></a>
                <a href='".url('subpaket/delete/'.$item->id)."' class='btn-social'><i class='fa fa-remove'></i></a>";
            })
            ->rawColumns(['action'])
            ->make(true);

    }


    public function add(Request $request)
    {
        
        $this->validate($request, [
            'id_paket' => 'required',
            'detail' => 'required|string|min:3|max:255',
        ]);
        // return response()->json($request->all());

        $add = SubPacket::create($request->all());

        // return response()->json(['url' => url('/paket')]);

        return redirect('/subpaket');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = SubPacket::where('sub_packets.id', $id)
            ->join('packets','packets.id','sub_packets.id_paket')
            ->select('sub_packets.*','packets.nama_paket','packets.harga_satuan')
            ->first();

        // return response()->json($data);

        return view('master.form.sub-packet-form', compact('data'));
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
            'id_paket' => 'required',
            'detail' => 'required|string|min:3|max:255',
        ]);

        $subpaket = SubPacket::find($id);
        $subpaket->update($request->all());  

        return redirect('/subpaket');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
        $subpaket = SubPacket::find($id);
        if (count($subpaket) > 0) {
            $subpaket->delete();
        }

        return redirect('/subpaket');

    }
}
