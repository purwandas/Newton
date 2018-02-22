@extends('layouts.app')

@section('content')
<div class="page-content">
    <!-- BEGIN SAMPLE PORTLET CONFIGURATION MODAL FORM-->
    <div class="clearfix"></div>
    <div class="content">
        <div class="page-title">
            <i class="fa fa-shopping-cart"></i>
            <h3> Colocation <span class="semi-bold">Server</span>
            </h3 >
        </div>
        <div class="row">
            @foreach($paket as $value)
            <div class="col-md-6">
                <div class="grid solid blue">
                    <div class="grid-title">
                        <h4>IDR. {!! number_format($value->harga) !!} Monthly</h4>
                        <div class="tools">
                            <a href="javascript:;" class="collapse"></a>
                        </div>
                    </div>
                    <div class="grid-body">
                        <h3>
                            {{ @$value->nama_paket}}
                        </h3>
                        <p>
                            {{ @$value->alamat}} <br />
                            {{ @$value->ip_public}} Dedicated IP Publik <br />
                            {{ @$value->kecepatan_lokal }} <br/>
                            {{ @$value->kecepatan_internasional }} Internasional <br />
                            Max {{ @$value->size_server }} Size Server <br />
                            Max {{ @$value->power }} Power <br />
                            IDR {!! number_format($value->installasi) !!} <br />
                            IDR {!! number_format($value->service) !!} <br />
                            Vat 10% Exclude <br />
                        </p>
                        <div style="float: right;">
                            <a href="{!! url('user-order-cart/'.$value->id) !!}" type="button" class="btn btn-danger btn-sm btn-small" style="padding: 7px 12px;"><i class="fa fa-shopping-cart">
                                </i>&nbsp; Order Now
                            </a>
                        </div><br/>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>

@endsection