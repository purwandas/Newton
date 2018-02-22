<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\Datatables\Facades\Datatables;
use DB;
use Auth;
use App\Feedback;
use Carbon\Carbon;

class FeedbackController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('master.list_feedback');
    }

    // public function create()
    // {
    //     return view('master.form.feedback-form');
    // }

    /**
     * Data for DataTables
     *
     * @return \Illuminate\Http\Response
     */
    public function masterDataTable(Request $request){

        
        $data = Feedback::where('feedbacks.deleted_at', null)
                    ->join('users','users.id','feedbacks.id_user')
                    ->select('feedbacks.*','users.name','users.email')->get();

        return $this->makeTable($data);
    }

    // Datatable template
    public function makeTable($data){

        return Datatables::of($data)
            ->addColumn('action', function ($item) {
               return
               "<a href='".url('feedback/delete/'.$item->id)."' class='btn-social'><i class='fa fa-remove'></i></a>";
            })
            ->rawColumns(['action'])
            ->make(true);

    }


    public function add(Request $request)
    {
        
        $this->validate($request, [
            'id_user' => 'required',
            'feedback' => 'required|string|min:3|max:255',
        ]);
        // return response()->json($request->all());

        $add = Feedback::create($request->all());

        // return response()->json(['url' => url('/paket')]);

        return redirect('/feedback');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Feedback::where('feedbacks.id_user', $id)
            ->select('feedbacks.*')
            ->first();

        // return response()->json($data);

        return view('master.form.feedback-form', compact('data'));
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
            'id_user' => 'required',
            'feedback' => 'required|string|min:3|max:255',
        ]);

        $feedback = Feedback::find($id);
        $feedback->update($request->all());  

        return redirect('/feedback');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
        $feedback = Feedback::find($id);
        if (count($feedback) > 0) {
            $feedback->delete();
        }

        return redirect('/feedback');

    }
}
