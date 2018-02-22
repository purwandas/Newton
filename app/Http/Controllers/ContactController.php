<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\Datatables\Facades\Datatables;
use DB;
use Auth;
use App\Contact;
use Carbon\Carbon;

class ContactController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('master.list_contact');
    }

    public function create()
    {
        // return view('master.form.contact-form');
    }

    /**
     * Data for DataTables
     *
     * @return \Illuminate\Http\Response
     */
    public function masterDataTable(Request $request){

        $data = Contact::where('contacts.deleted_at', null)
                    ->get();
                    // return $data;

        return $this->makeTable($data);
    }

    // Datatable template
    public function makeTable($data){

        return Datatables::of($data)
            ->addColumn('action', function ($item) {
               return
               "<a href='".url('contacts/delete/'.$item->id)."' class='btn-social'><i class='fa fa-remove'></i></a>";
            })
            ->rawColumns(['action'])
            ->make(true);

    }


    public function add(Request $request)
    {
        
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|string',
            'phone' => 'required|string',
            'message' => 'required|string|min:5|max:255',
        ]);
        // return response()->json($request->all());

        $data = Contact::create($request->all());

        // return response()->json(['url' => url('/paket')]);

        // return redirect('/contact');
        return view('contact', compact('data'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // $data = Contact::where('contacts.id', $id)
        //     ->first();

        // // return response()->json($data);

        // return view('master.form.contact-form', compact('data'));
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
        // $this->validate($request, [
        //     'name' => 'required',
        //     'email' => 'required|string',
        //     'phone' => 'required|string',
        //     'message' => 'required|string|min:5|max:255',
        // ]);

        // $subpaket = Contact::find($id);
        // $subpaket->update($request->all());  

        // return redirect('/contact');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
        $subpaket = Contact::find($id);
        if (count($subpaket) > 0) {
            $subpaket->delete();
        }

        if (Auth::user()->role == 'admin') {
            return redirect('/contacts');
        }

        return redirect('/contact');

    }
}
