<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\Datatables\Facades\Datatables;
use DB;
use Auth;
use App\User;
use Carbon\Carbon;

class userController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('master.list_user');
    }

    /**
     * Data for DataTables
     *
     * @return \Illuminate\Http\Response
     */
    public function masterDataTable(){

        $data = User::
        // where('users.deleted_at', null)
                    // ->where('id', '<>', Auth::user()->id)
                    select('users.*')->get();

        return $this->makeTable($data);
    }

    // Datatable template
    public function makeTable($data){

           return Datatables::of($data)
                ->addColumn('status', function ($item) {
                    if ($item->role == '' ) {
                        return
                       "<a href='".url('user/approve/'.$item->id)."' type='button' class='btn btn-sm btn-small btn-success'> Approve </a>
                        <a href='".url('user/reject/'.$item->id)."' type='button' class='btn btn-sm btn-small btn-danger'> Reject </a>";
                    }
                   return "Approved";
                })
                ->addColumn('action', function ($item) {
                   return
                   "<a href='".url('user/edit/'.$item->id)."' class='btn-social'><i class='fa fa-pencil-square-o'></i></a>
                    <a href='".url('user/delete/'.$item->id)."' class='btn-social'><i class='fa fa-remove'></i></a>";
                })
                ->rawColumns(['status','action'])
                ->make(true);
    }

    public function create()
    {
        return view('master.form.user-form');
    }
    
    public function add(Request $request)
    {
        // return response()->json($request);
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|unique:users',
            'password' => 'required|string|min:6|confirmed',
            'role' => 'required',
        ]);

        $request['password'] = bcrypt($request['password']);

        $store = User::create($request->all());

        return redirect('/user');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = User::where('id', $id)->first();

        return view('master.form.user-form', compact('data'));
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
        // return response()->json($request);
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required',
            'password' => 'confirmed',
        ]);

        $request['password'] = bcrypt($request['password']);

        $user = User::find($id);
        if ($request['password']!='') {
            $user->update([
                'name' => $request['name'],
                'email' => $request['email'],
                'lastname' => $request['lastname'],
                'phone' => $request['phone'],
                'company' => $request['company'],
                'address' => $request['address'],
                'city' => $request['city'],
                'postcode' => $request['postcode'],
                'state' => $request['state'],
                'country' => $request['country'],
                'password' => $request['password'],
            ]);
        }else{
            $user->update([
                'name' => $request['name'],
                'email' => $request['email'],
                'lastname' => $request['lastname'],
                'phone' => $request['phone'],
                'company' => $request['company'],
                'address' => $request['address'],
                'city' => $request['city'],
                'postcode' => $request['postcode'],
                'state' => $request['state'],
                'country' => $request['country'],
            ]);
        }

        if ($request['role'] != '') {
            $user->update(['role' => $request['role']]);
                
        }
        
        if (Auth::user()->role == 'admin') {
            return redirect('/user');
        }
        return redirect('/user-profile');
    }

    public function approve($id)
    {

        $user = User::find($id);
            $user->update([
                'role' => 'user',
            ]);

        return redirect('/user');
    }

    public function reject($id)
    {

        // $user = User::find($id);
        //     $user->update([
        //         'status' => 'user',
        //     ]);

        $user = User::find($id);
        if (count($user) > 0) {
            $user->delete();
        }

        return redirect('/user');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       
        $user = User::find($id);
        if (count($user) > 0) {
            $user->delete();
        }

        return redirect('/user');
    }

    public function userIndex()
    {   

        $data = User::where('id', Auth::user()->id)->first();

        return view('user.user', compact('data'));
    }

}
