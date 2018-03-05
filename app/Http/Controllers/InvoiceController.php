<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\Datatables\Facades\Datatables;
use DB;
use Auth;
use File;
use App\ListOrder;
use App\Invoice;
use App\Packet;
use Carbon\Carbon;
use App\Traits\UploadTrait;
use App\Traits\StringTrait;


class InvoiceController extends Controller
{
    use UploadTrait;
    use StringTrait;

    // Admin
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
                ->addColumn('verification', function ($item) {
                    if (!empty($item->verification_file) ) {
                        return
                        "<a href='#verification-image' data-toggle='modal' data-id='$item->id' data-verification='$item->verification_file' class='image-confirmation config btn btn-sm btn-warning'>
                            <i class='fa fa-image'></i>
                            Check Image
                        </a>";
                    } else {
                        return 
                        "No Image Found";
                    }
                })
                ->addColumn('force_confirm', function ($item) {
                    if ($item->paid_status != 'Paid') {
                        $url = url('/force-confirm-invoice').'/'.$item->id;
                        return
                        "<a href='$url' class='config btn btn-sm btn-danger'>
                            <i class='fa fa-money'></i>
                            Force Paid
                        </a>";
                    } else {
                        return "<p style='color:green;'>Paid</p>";
                    }
                })
                ->editColumn('paid_status', function ($item) {
                    if ($item->paid_status == 'Paid') {
                        return "<p style='color:green;'>Paid</p>";
                    } else if ($item->paid_status == 'Pending') {
                        return "<p style='color:#CDDC39;'>Pending</p>";
                    } else if ($item->paid_status == 'Fail') {
                        return "<p style='color:#FFA000;'>Fail</p>";
                    } else {
                        return "<p style='color:red;'>Unpaid</p>";
                    }
                })
                ->rawColumns(['file', 'verification', 'paid_status', 'force_confirm'])
                ->make(true);

        }

        public function confirm($id)
        {
            $data = Invoice::where('invoices.id', $id);
                
                $invoice = Invoice::where('invoices.id', $id)->select('id_order')->first();
                $order = ListOrder::find($invoice->id_order);
                $order->update([
                       'pembayaran' => 'Paid'
                    ]);
            $data->update([
                       'paid_status' => 'Paid'
                    ]);

            return redirect('/invoice');

        }

        public function reject($id)
        {
            $data = Invoice::where('invoices.id', $id);
                $invoice = Invoice::where('invoices.id', $id)->select('id_order')->first();
                $order = ListOrder::find($invoice->id_order);
                $order->update([
                       'pembayaran' => 'Unpaid'
                    ]);
            $data->update([
                       'paid_status' => 'Fail'
                    ]);

            return redirect('/invoice');

        }


    // User Invoice
        public function userIndex()
        {
            return view('user.invoice');
        }
        
        public function userDataTable(Request $request){
            
            $data = Invoice::whereNull('invoices.deleted_at')
                        ->whereNull('list_orders.deleted_at')
                        ->where('list_orders.id_user',Auth::user()->id)
                        ->join('list_orders','list_orders.id','invoices.id_order')
                        ->select('invoices.*','list_orders.nama_perusahaan','list_orders.penanggung_jawab', 'list_orders.id_paket', 'list_orders.service')
                        ->get();

            return $this->userMakeTable($data);
        }
        
        public function userMakeTable($data){

            return Datatables::of($data)
                ->editColumn('file', function ($item) {
                   return
                   "<a href='$item->file' class='btn btn-sm btn-success'><i class='fa fa-file-pdf-o'></i> Download</a>";
                })
                ->editColumn('period', function ($item) {
                   return
                   "$item->invoice_start_period - $item->invoice_end_period";
                })
                ->addColumn('total', function ($item) {
                        if ($item->installasi == 'Y') {
                            $installasi = 1;
                        } else {
                            $installasi = 0;
                        }
                        if ($item->service == 'Y') {
                            $service = 1;
                        } else {
                            $service = 0;
                        }
                        
                        
                    $paket = Packet::where('id', $item->id_paket)->first();
                    $harga = $item->month_gap * $paket->harga; //harga paket
                    $harga += ($service * $paket->service *$item->month_gap); //harga service
                    $harga += ($installasi * $paket->installasi); //harga installasi
                    $ppn = $harga * 10/100;
                   return "IDR ".number_format($harga + $ppn);
                })
                ->editColumn('paid_status', function ($item) {
                    if ($item->paid_status == 'Paid') {
                        return "<p style='color:green;'>Paid</p>";
                    } else if ($item->paid_status == 'Pending') {
                        return "<p style='color:#CDDC39;'>Pending</p>";
                    } else if ($item->paid_status == 'Fail') {
                        return "<p style='color:#FFA000;'>Fail (Please Re-upload)</p>";
                    } else {
                        return "<p style='color:red;'>Unpaid</p>";
                    }
                })
                ->addColumn('action', function ($item) {
                    if (!empty($item->verification_file) ) {
                        if ($item->paid_status == 'Paid') {
                            return "<p style='color:green;'>Verified</p>";
                        }
                        return
                        "<a href='#upload' data-toggle='modal' data-id='$item->id' class='change-verification config btn btn-sm btn-warning'>
                            <i class='fa fa-image'></i>
                            Change Verification
                        </a>";
                    } else {
                        return 
                        "<a href='#upload' data-toggle='modal' data-id='$item->id' class='add-verification config btn btn-sm btn-danger'>
                            <i class='fa fa-image'></i>
                            Verify the Transfer
                        </a>";
                    }
                })
                ->rawColumns(['file', 'paid_status', 'action'])
                ->make(true);

        }
        
        public function addVerification(Request $request)
        {
            // return response()->json($request->all());
            $this->validate($request, [
                'verification_file' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);
            
            // Upload file process
            ($request->verification_file != null) ? 
                $image_url = $this->getUploadPathName($request->verification_file, "invoice/".$this->getRandomPath(), 'Invoice') : $image_url = "";
            
            if($request->verification_file != null) $request['gambar'] = $image_url;

            // return response()->json($request->all());
            $update = Invoice::find($request['invoice_id']);
            $update->update([
                       'verification_file' => $image_url,
                       'paid_status' => 'Pending'
                    ]);
           

            if($request->verification_file != null){

                /* Upload updated image */
                $imagePath = explode('/', $update->verification_file);
                $count = count($imagePath);
                $imageFolder = "invoice/" . $imagePath[$count - 2];
                $imageName = $imagePath[$count - 1];

                $this->upload($request->verification_file, $imageFolder, $imageName);

            }

            return redirect('/user-invoice');
        }

        public function editVerification($id)
        {
            $data = Invoice::where('invoices.id', $id)
                ->first();

            return response()->json($data);

        }


}
