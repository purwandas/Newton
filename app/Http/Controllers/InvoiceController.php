<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\Datatables\Facades\Datatables;
use DB;
use Auth;
use App\ListOrder;
use App\Invoice;
use Carbon\Carbon;

class InvoiceController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('master.list_invoice');
    }


    /**
     * Data for DataTables
     *
     * @return \Illuminate\Http\Response
     */
    public function masterDataTable(Request $request){

        
        $data = Invoice::where('invoices.deleted_at', null)
                    ->join('list_orders','list_orders.id','invoices.id_order')
                    ->select('invoices.*','list_orders.nama_perusahaan','list_orders.penanggung_jawab')
                    ->get();

        return $this->makeTable($data);
    }

    // Datatable template
    public function makeTable($data){

        return Datatables::of($data)
            ->editColumn('file', function ($item) {
               return
               "<a href='$item->file' class='btn btn-sm btn-success'><i class='fa fa-file-pdf-o'></i> Download</a>";
            })
            ->editColumn('period', function ($item) {
               return
               "$item->invoice_start_period - $item->invoice_end_period";
            })
            ->addColumn('order', function ($item) {
               return
               "$item->nama_perusahaan ($item->penanggung_jawab)";
            })
            ->rawColumns(['file'])
            ->make(true);

    }

    public function userIndex()
    {
        return view('user.invoice');
    }
    
}
