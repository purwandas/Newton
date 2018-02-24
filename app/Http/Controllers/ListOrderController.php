<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\Datatables\Datatables;
use DB;
use Auth;
use App\User;
use App\Packet;
use App\SubPacket;
use App\ListOrder;
use App\Invoice;
use App\Bandwidth;
use Carbon\Carbon;
use App\Traits\StringTrait;
use App\Traits\UploadTrait;
// use Vsmoraes\Pdf\Pdf;
use PDF;
use Mail;

class ListOrderController extends Controller
{

    use StringTrait;
    use UploadTrait;

    // Generate PDF
    protected function generate_pdf($order,$invoice) {
        $paket = Packet::where('packets.id',$order->id_paket)
                ->select('packets.*')
                ->first();
        $user = User::where('id',Auth::user()->id)->first();

        if(Auth::user()->role == 'admin'){//kalo admin ambil data alamat dari order
            $address = $order->provinsi.'<br/>'.$order->alamat_perusahaan.', '.$order->kode_pos; 
            $nama_perusahaan = $order->nama_perusahaan;
        }else{//ambil dari user
            $thisUser = Auth::user();
            $address = $user->state.', '.$user->city.'<br/>'.$user->address.', '.$user->postcode;
            $nama_perusahaan = $user->company;
        }

        $subtotal = 0;
        $selisih = $invoice->month_gap;
        for ($i=0; $i < $selisih; $i++) {
            if ($i>0) {
                $startDate = $dt->addDay()->toDateString();
            }else{
                $startDate = $invoice->invoice_start_period;
            }
            $subtotal += $paket->harga;
            $date1[$i] = $startDate;

            $arrayNewDate = explode('-', $startDate);
            $dt = Carbon::create($arrayNewDate[0], $arrayNewDate[1], $arrayNewDate[2], 0);
            $date2[$i] = $dt->addMonth(1)->subDay()->toDateString();
        }

        $installasi = 0;
        if ($invoice->installasi == 'Y') {
            $installasi = $paket->installasi;
        }

        $service = 0;
        $total_service = 0;
        if ($order->service == 'Y') {
            $service = $paket->service;
            $total_service = $service * $invoice->month_gap;
        }

        $subtotal += $installasi + $total_service;

        $ppn = $subtotal / 10;

        $total = $subtotal + $ppn;

        $due_date   = $this->convertDate($invoice->due_date);
        // if (Auth::user()->role == 'admin') {
        //     $tempDate = explode(' ', $due_date);
        //     $due_date = $tempDate[0].' '.$tempDate[2].' '.$tempDate[3];
        // }

        $issue_date = $this->convertDate($invoice->issue_date);
        
        $pdf = PDF::loadView('pdfs.example', 
            [
                "order"=>$order, 
                "invoice"=>$invoice, 
                "paket"=>$paket,
                "address"=>$address,
                "nama_perusahaan"=>$nama_perusahaan,
                "date1"=>$date1,
                "date2"=>$date2,
                "installasi"=>$installasi,
                "service"=>$service,
                "total_service"=>$total_service,
                "subtotal"=>number_format($subtotal),
                "ppn"=>number_format($ppn),
                "total"=>number_format($total),
                "due_date"=>$due_date, 
                "issue_date"=>$issue_date,
                "harga"=>number_format($paket->harga),
            ]);
        $pdf_url = $this->getPdfPathName($pdf, $this->getRandomPath(), 'INVOICE');
        $pdf->save('pdf/'.$pdf_url);
        return asset('pdf').'/'.$pdf_url; //save ini ke db
        // return $pdf->save($pdf_url);
        
        /*
        output(): Outputs the PDF as a string.
        save($filename): Save the PDF to a file
        download($filename): Make the PDF downloadable by the user.
        stream($filename): Return a response with the PDF to show in the browser.
        */
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('master.list_order');
    }

    /**
     * Data for DataTables
     *
     * @return \Illuminate\Http\Response
     */
    public function masterDataTable(){

        $data = ListOrder::where('list_orders.deleted_at', null)
                    ->select('list_orders.*')->get();

        return $this->makeTable($data);
    }

    // Datatable template
    public function makeTable($data){

           return Datatables::of($data)
               ->addColumn('jenis_layanan', function ($item) {
                    $paket = Packet::where('id',$item->id_paket)->first();

                   return $paket->nama_paket.' ('.$paket->harga_satuan.')';

                })
           		->addColumn('action', function ($item) {
                   return
                   "<a href='".url('listorder/edit/'.$item->id)."' class='btn-social'><i class='fa fa-pencil-square-o'></i></a>
                    <a href='".url('listorder/delete/'.$item->id)."' class='btn-social'><i class='fa fa-remove'></i></a>";
                })
                ->editColumn('tipe_pelanggan', function ($item) {
                    if (!isset($item->tipe_pelanggan)) {
                        return "-";
                    }
                    return $item->tipe_pelanggan;
                })
                ->editColumn('nama_perusahaan', function ($item) {
                    if (!isset($item->nama_perusahaan)) {
                        return "-";
                    }
                    return $item->nama_perusahaan;
                })
                ->editColumn('alamat_perusahaan', function ($item) {
                    if (!isset($item->alamat_perusahaan)) {
                        return "-";
                    }
                    return $item->alamat_perusahaan;
                })
                ->editColumn('jabatan_penanggung_jawab', function ($item) {
                    if (!isset($item->jabatan_penanggung_jawab)) {
                        return "-";
                    }
                    return $item->jabatan_penanggung_jawab;
                })
                ->editColumn('nip_penanggung_jawab', function ($item) {
                    if (!isset($item->nip_penanggung_jawab)) {
                        return "-";
                    }
                    return $item->nip_penanggung_jawab;
                })
                ->editColumn('telp', function ($item) {
                    if (!isset($item->telp)) {
                        return "-";
                    }
                    return $item->telp;
                })
                ->editColumn('jenis_server', function ($item) {
                    if (!isset($item->jenis_server)) {
                        return "-";
                    }
                    return $item->jenis_server;
                })
                ->editColumn('ukuran_server', function ($item) {
                    if (!isset($item->ukuran_server)) {
                        return "-";
                    }
                    return $item->ukuran_server;
                })
                ->editColumn('rencana_pemasangan', function ($item) {
                    if (!isset($item->rencana_pemasangan)) {
                        return "-";
                    }
                    return $item->rencana_pemasangan;
                })
                ->editColumn('status', function ($item) {
                    if (!isset($item->status)) {
                        return "-";
                    }
                    return $item->status;
                })
                ->editColumn('pembayaran', function ($item) {
                    if (!isset($item->pembayaran)) {
                        return "-";
                    }
                    return $item->pembayaran;
                })
                ->rawColumns(['action'])
                ->make(true);
    }

    public function create()
    {
        return view('master.form.order-form');
    }
    
    public function add(Request $request)
    {
        
        if (Auth::user()->role == 'admin') {
            $this->validate($request, [
                'id_paket' => 'required',
                'tipe_pelanggan' => 'required',
                'penanggung_jawab' => 'required',
                'email' => 'required',
                'tipe_pelanggan' => 'required',
                'installasi' => 'required',
                'service' => 'required',
            ]);

            $request['pembayaran'] = "Unpaid";
            $order = ListOrder::create($request->all());

            // Begin Generate PDF Invoice Yearly
                $startDate = $request['rencana_pemasangan'];
                $startMonth = substr($startDate, 5, 2);
                $selisih = 13 - $startMonth;

                if ( ($request['jangka_waktu'] - $selisih) > 0) {
                    $availableMonth = $request['jangka_waktu'];
                    $jml = 1 + ceil( ($availableMonth - $selisih) / 12 );
                    
                }else{
                    $availableMonth = $request['jangka_waktu'];
                    $jml = 1;
                }

                for ($i=0; $i < $jml; $i++) { 
                    
                    if ($i == 0) {
                        if ($request['installasi'] == 'Y') {
                            $installasi_status = 'Y';
                        }else{
                            $installasi_status = 'N';
                        }

                        if ($availableMonth > $selisih) {
                            $gap = $selisih;
                        }else{
                            $gap = $availableMonth;
                        }
                        $arrayNewDate = explode('-', $startDate);
                        $dt = Carbon::create($arrayNewDate[0], $arrayNewDate[1], $arrayNewDate[2], 0);
                        $endDate = $dt->addMonth($gap);
                        $endDate = $endDate->subDay()->format('Y-m-d');
                        $availableMonth -= $gap;
                    }else{
                        $installasi_status = 'N';
                        if ($availableMonth >= 12) {
                            $gap = 12;
                        }else{
                            $gap = $availableMonth;
                        }
                        $arrayNewDate = explode('-', $endDate);
                        $dt = Carbon::create($arrayNewDate[0], $arrayNewDate[1], $arrayNewDate[2], 0);
                        $endDate = $dt->addDays(1)->format('Y-m-d');
                        $startDate = $endDate;
                        $arrayNewDate = explode('-', $startDate);
                        $dt = Carbon::create($arrayNewDate[0], $arrayNewDate[1], $arrayNewDate[2], 0);
                        $endDate = $dt->addMonth($gap)->subDay()->format('Y-m-d');
                        $availableMonth -= $gap;
                    }

                /* Make Invoice */
                    $dateNow = Carbon::now()->addDay();
                    $date = Carbon::now()->addDay()->format('Y-m-d');
                    // $arrayDate = explode('-', $dateNow);

                    // $invoice = Invoice::where('created_at',)
                    $invoice = DB::table("invoices")
                    ->whereRaw('MONTH(created_at) = ?',[$dateNow->month])
                    ->whereRaw('YEAR(created_at) = ?',[$dateNow->year])
                    ->orderBy('id','desc')
                    ->first();

                    $number = 1;
                    if (!empty($invoice)) {
                        $number = $this->newInvoiceNumber($invoice->invoice_number);
                    }
                    
                    // 334/INV/NCI/I/2018
                    $montRoman = $this->convertRoman($dateNow->month);
                    $generateNumber = $number.'/INV/NCI/'.$montRoman.'/'.$dateNow->year;
                    $startPeriodDate = $startDate;
                    $endPeriodDate = $endDate;

                    $filePath = '';

                    $invoiceData = Invoice::create([
                                        "id_order" => $order->id,
                                        "invoice_number" => $generateNumber,
                                        "issue_date" => $date,
                                        "month_gap" => $gap,
                                        "installasi" => $installasi_status,
                                        "invoice_start_period" => $startPeriodDate,
                                        "invoice_end_period" => $endPeriodDate,
                                        "due_date" => $endPeriodDate,
                                        "file" => $filePath,
                                    ]);
                /* End Make Invoice */

                /* Create Invoice PDF */

                    $filePath = $this->generate_pdf($order, $invoiceData);

                    $invoiceUpdate = Invoice::find($invoiceData->id);
                    $invoiceUpdate->file = $filePath;
                    $invoiceUpdate->save();

                /* End Invoice PDF */
            }

            $dataOrder = ListOrder::where('list_orders.id',$order->id)
                    ->join('packets','packets.id','list_orders.id_paket')
                    ->join('invoices','invoices.id_order','list_orders.id')
                    ->select('list_orders.id', 'list_orders.email', 'list_orders.penanggung_jawab')
                    ->first();

            $data = $dataOrder->toArray();

            /* Send Mail */
            // http://localhost/newton54/public/pdf/sdkVSqSbgquCEtII4PTSG0QCaWc6uy1518283015b9G0iIbZdiwu3sgmljOhwu2JFXgfVX/INVOICE-1518283015.pdf
                Mail::send('mails.order', $data, function($message) use ($data){
                    $message->to($data['email']);
                    $message->subject('Order Information');
                        $getDataInvoice = Invoice::where('id_order',$data['id'])
                        ->select('invoices.file')
                        ->get();
                        foreach ($getDataInvoice as $key => $value) {
                            $index = $key + 1;
                            $message->attach($value->file, [
                                'as' => "Invoice$index.pdf",
                                'mime' => 'application/pdf',
                            ]);
                        }
                    // $message->attach($data['file'], [
                    //         'as' => 'Invoice.pdf',
                    //         'mime' => 'application/pdf',
                    //     ]);
                    // $message->attach('http://localhost/newton54/public/pdf/sdkVSqSbgquCEtII4PTSG0QCaWc6uy1518283015b9G0iIbZdiwu3sgmljOhwu2JFXgfVX/INVOICE-1518283015.pdf', [
                    //         'as' => 'Invoice2.pdf',
                    //         'mime' => 'application/pdf',
                    //     ]);
                    // $message->attach('http://localhost/newton54/public/pdf/sdkVSqSbgquCEtII4PTSG0QCaWc6uy1518283015b9G0iIbZdiwu3sgmljOhwu2JFXgfVX/INVOICE-1518283015.pdf', [
                    //         'as' => 'Invoice3.pdf',
                    //         'mime' => 'application/pdf',
                    //     ]);
                });
            /* End Mail */
            return redirect('/listorder');
        }else if (Auth::user()->role == 'user') {
            $this->validate($request, [
                'id_paket' => 'required',
                'installasi' => 'required',
                'service' => 'required',
            ]);

            $user_id = Auth::user()->id;
            $user = User::where('id',$user_id)->first();

            $status_installasi = 'N';
            if ($request['installasi']>0) {
                $status_installasi = 'Y';
            }
            $status_service = 'N';
            if ($request['service']>0) {
                $status_service = 'Y';
            }

            $order = ListOrder::create(
                [
                    'id_paket' => $request['id_paket'],
                    'tipe_pelanggan' => null,
                    'nama_perusahaan' => $user->company,
                    'alamat_perusahaan' => $user->address,
                    'provinsi' => $user->state,
                    'kode_pos' => $user->postcode,
                    'telp' => $user->phone,
                    'penanggung_jawab' => $user->name.' '.$user->lastname,
                    'jabatan_penanggung_jawab' => null,
                    'nip_penanggung_jawab' => null,
                    'hp_penanggung_jawab' => $user->phone,
                    'email' => $user->email,
                    'rencana_pemasangan' => $request['start_date'],
                    'jangka_waktu' => $request['jangka_waktu'],
                    'installasi' => $status_installasi,
                    'pembayaran' => 'Unpaid',
                    'service' => $status_service,
                    'new_file' => null,
                    'status_survei' => null,
                    'rencana_survei' => $request['survey_date'],
                    'id_operating_system' => $request['operating_system'],
                    'id_user' => $user_id,                    
                ]);

            // $request['jangka_waktu']=15;
            $startDate = $request['start_date'];
            $startMonth = substr($startDate, 5, 2);
            $selisih = 13 - $startMonth;
            // echo "$selisih () ";

            if ( ($request['jangka_waktu'] - $selisih) > 0) {
                $availableMonth = $request['jangka_waktu'];
                // echo "$availableMonth*<hr>";
                $jml = 1 + ceil( ($availableMonth - $selisih) / 12 );
                
            }else{
                $availableMonth = $request['jangka_waktu'];
                // echo "$availableMonth<hr>";
                $jml = 1;
            }


            for ($i=0; $i < $jml; $i++) { 
                
                if ($i == 0) {
                    if ($status_installasi == 'Y') {
                        $installasi_status = 'Y';
                    }else{
                        $installasi_status = 'N';
                    }

                    if ($availableMonth > $selisih) {
                        $gap = $selisih;
                    }else{
                        $gap = $availableMonth;
                    }
                    $arrayNewDate = explode('-', $startDate);
                    $dt = Carbon::create($arrayNewDate[0], $arrayNewDate[1], $arrayNewDate[2], 0);
                    $endDate = $dt->addMonth($gap);
                    $endDate = $endDate->subDay()->format('Y-m-d');
                    $availableMonth -= $gap;
                }else{
                    $installasi_status = 'N';
                    if ($availableMonth >= 12) {
                        $gap = 12;
                    }else{
                        $gap = $availableMonth;
                    }
                    $arrayNewDate = explode('-', $endDate);
                    $dt = Carbon::create($arrayNewDate[0], $arrayNewDate[1], $arrayNewDate[2], 0);
                    $endDate = $dt->addDays(1)->format('Y-m-d');
                    $startDate = $endDate;
                    $arrayNewDate = explode('-', $startDate);
                    $dt = Carbon::create($arrayNewDate[0], $arrayNewDate[1], $arrayNewDate[2], 0);
                    $endDate = $dt->addMonth($gap)->subDay()->format('Y-m-d');
                    $availableMonth -= $gap;
                }
                // echo "$startDate - $endDate<br>";
                /* Make Invoice */
                    $dateNow = Carbon::now()->addDay();
                    $date = Carbon::now()->addDay()->format('Y-m-d');

                    $invoice = DB::table("invoices")
                    ->whereRaw('MONTH(created_at) = ?',[$dateNow->month])
                    ->whereRaw('YEAR(created_at) = ?',[$dateNow->year])
                    ->orderBy('id','desc')
                    ->first();

                    $number = 1;
                    if (!empty($invoice)) {
                        $number = $this->newInvoiceNumber($invoice->invoice_number);
                    }
                    
                    // Invoice Number Format: 334/INV/NCI/I/2018
                    $montRoman = $this->convertRoman($dateNow->month);
                    $generateNumber = $number.'/INV/NCI/'.$montRoman.'/'.$dateNow->year;
                    // $startPeriodDate = $request['survey_date'];
                    $startPeriodDate = $startDate;
                    $arrayNewDate = explode('-', $startPeriodDate);
                    $dt = Carbon::create($arrayNewDate[0], $arrayNewDate[1], $arrayNewDate[2], 0);
                    // $endPeriodDate = $dt->addMonth($request['jangka_waktu']);
                    $endPeriodDate = $endDate;

                    $filePath = '';

                    $invoiceData = Invoice::create([
                                        "id_order" => $order->id,
                                        "invoice_number" => $generateNumber,
                                        "issue_date" => $date,
                                        "month_gap" => $gap,
                                        "installasi" => $installasi_status,
                                        "invoice_start_period" => $startPeriodDate,
                                        "invoice_end_period" => $endPeriodDate,
                                        "due_date" => $endPeriodDate,
                                        "file" => $filePath,
                                    ]);

                    /* Create Invoice PDF */

                    $filePath = $this->generate_pdf($order, $invoiceData);

                    $invoiceUpdate = Invoice::find($invoiceData->id);
                    $invoiceUpdate->file = $filePath;
                    $invoiceUpdate->save();

                    /* End Invoice PDF */

                /* End Make Invoice */
                
            }

            $dataOrder = ListOrder::where('list_orders.id',$order->id)
                        ->join('packets','packets.id','list_orders.id_paket')
                        ->join('invoices','invoices.id_order','list_orders.id')
                        ->select('list_orders.id', 'list_orders.email', 'list_orders.penanggung_jawab')
                        ->first();

            $data = $dataOrder->toArray();

            $dataInvoice = Invoice::where('id_order',$order->id)
                    ->select('invoices.invoice_number', 'invoices.file')
                    ->get();

                /* Send Mail */
                    Mail::send('mails.order', $data, function($message) use ($data){
                        $message->to($data['email']);
                        $message->subject('Order Information');
                            $getDataInvoice = Invoice::where('id_order',$data['id'])
                            ->select('invoices.file')
                            ->get();
                            foreach ($getDataInvoice as $key => $value) {
                                $index = $key + 1;
                                $message->attach($value->file, [
                                    'as' => "Invoice$index.pdf",
                                    'mime' => 'application/pdf',
                                ]);
                            }
                        
                    });
                /* End Mail */

            return view('user.order-end',
                [
                    'order_number' => $order->id,
                    'invoice' => $dataInvoice,
                ]
            );
        }
        
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = ListOrder::where('id', $id)->first();

        $paket = Packet::where('id', $data->id_paket)->first();

        $bandwidth = Bandwidth::where('id', $data->id_bandwidth)->first();

        return view('master.form.order-form', compact('data','paket','bandwidth'));
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
            'penanggung_jawab' => 'required',
            'email' => 'required',
        ]);  

        $listorder = ListOrder::find($id);
        // return $request->all();
        $listorder->update($request->all());  

        return redirect('/listorder');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $listorder = ListOrder::find($id);
        if (count($listorder) > 0) {
            $listorder->delete();
        }

        return redirect('/listorder');
    }

    // Display - Service Menu on User
    public function userServiceIndex()
    {
        return view('user.service');
    }

    // User Order Step 1, Display - Service Menu on User
    public function userOrderIndex()
    {
        $paket = Packet::whereNull('deleted_at')->get();

        return view('user.order', compact('paket'));
    }

    // User Order Step 2, onClick Cart
    public function userOrder2($id)
    {
        $paket = Packet::where('id',$id)->first();

        return view('user.order-cart', compact('paket'));
    }

    // User Order Step 3
    public function userOrder3(Request $request)
    {
        $bulanan = $request->harga;

        if ($request->service > 0) {
            $bulanan += $request->service;
        }

        $new_ppn = $bulanan * 10/100;

        return view('user.order-review', 
        [
            'id_paket' => $request->id_paket,
            'nama_paket' => $request->nama_paket,
            'harga' => $request->harga,
            'installasi' => $request->installasi,
            'service' => $request->service,
            'subtotal' => $request->total - $request->ppn,
            'ppn' => $request->ppn,
            'total' => $request->total,
            'bulanan' => $bulanan + $new_ppn,
            'start_date' => $request->start_date,
            'survey_date' => $request->survey_date,
            'jangka_waktu' => $request->jangka_waktu,
            'operating_system' => $request->operating_system,
        ]);
    }

    // User Order Step 4
    public function userOrder4(Request $request)
    {
        // return $request->all();

        return view('user.order-end');
    }
}
