<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\Datatables\Facades\Datatables;
use DB;
use Auth;
use App\Bandwidth;
use App\Filters\BandwidthFilters;
use Carbon\Carbon;

class BandwidthController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('master.list_bandwidth');
    }

    public function create()
    {
        return view('master.form.bandwidth-form');
    }

    /**
     * Data for DataTables
     *
     * @return \Illuminate\Http\Response
     */
    public function masterDataTable(Request $request){

        
        $data = Bandwidth::where('bandwidths.deleted_at', null)->get();

        return $this->makeTable($data);
    }

    // Datatable template
    public function makeTable($data){

        return Datatables::of($data)
            ->addColumn('action', function ($item) {
               return
               "<a href='".url('bandwidth/edit/'.$item->id)."' class='btn-social'><i class='fa fa-pencil-square-o'></i></a>
                <a href='".url('bandwidth/delete/'.$item->id)."' class='btn-social'><i class='fa fa-remove'></i></a>";
            })
            ->rawColumns(['action'])
            ->make(true);

    }

    public function getDataWithFilters(BandwidthFilters $filters){
        $data = Bandwidth::where('bandwidths.deleted_at', null)
            ->filter($filters)->get();

        return $data;
    }


    public function add(Request $request)
    {
        
        $this->validate($request, [
            'bandwidth' => 'required',
        ]);
        // return response()->json($request->all());

        $add = Bandwidth::create($request->all());

        // return response()->json(['url' => url('/paket')]);

        return redirect('/bandwidth');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Bandwidth::where('bandwidths.id', $id)
            ->first();

        // return response()->json($data);

        return view('master.form.bandwidth-form', compact('data'));
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
            'bandwidth' => 'required',
        ]);

        $bandwidth = Bandwidth::find($id);
        $bandwidth->update($request->all());  

        return redirect('/bandwidth');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
        $bandwidth = Bandwidth::find($id);
        if (count($bandwidth) > 0) {
            $bandwidth->delete();
        }

        return redirect('/bandwidth');

    }
}
