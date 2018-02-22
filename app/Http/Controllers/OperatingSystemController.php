<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\Datatables\Facades\Datatables;
use DB;
use Auth;
use App\OperatingSystem;
use App\Filters\OperatingSystemFilters;
use Carbon\Carbon;

class OperatingSystemController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('master.list_operating_system');
    }

    public function create()
    {
        return view('master.form.operating_system-form');
    }

    /**
     * Data for DataTables
     *
     * @return \Illuminate\Http\Response
     */
    public function masterDataTable(Request $request){

        
        $data = OperatingSystem::where('operating_systems.deleted_at', null)->get();

        return $this->makeTable($data);
    }

    // Datatable template
    public function makeTable($data){

        return Datatables::of($data)
            ->addColumn('action', function ($item) {
               return
               "<a href='".url('operatingsystem/edit/'.$item->id)."' class='btn-social'><i class='fa fa-pencil-square-o'></i></a>
                <a href='".url('operatingsystem/delete/'.$item->id)."' class='btn-social'><i class='fa fa-remove'></i></a>";
            })
            ->rawColumns(['action'])
            ->make(true);

    }

    public function getDataWithFilters(OperatingSystemFilters $filters){
        $data = OperatingSystem::where('operating_systems.deleted_at', null)
            ->filter($filters)->get();

        return $data;
    }


    public function add(Request $request)
    {
        
        $this->validate($request, [
            'operating_system' => 'required',
        ]);
        // return response()->json($request->all());

        $add = OperatingSystem::create($request->all());

        // return response()->json(['url' => url('/paket')]);

        return redirect('/operatingsystem');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = OperatingSystem::where('operating_systems.id', $id)
            ->first();

        // return response()->json($data);

        return view('master.form.operating_system-form', compact('data'));
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
            'operating_system' => 'required',
        ]);

        $operatingsystem = OperatingSystem::find($id);
        $operatingsystem->update($request->all());  

        return redirect('/operatingsystem');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
        $os = OperatingSystem::find($id);
        if (count($os) > 0) {
            $os->delete();
        }

        return redirect('/operatingsystem');

    }
}
