@extends('layouts.app')

@section('content')

<div class="page-content">
    <!-- BEGIN SAMPLE PORTLET CONFIGURATION MODAL FORM-->
    <div id="portlet-config" class="modal hide">
        <div class="modal-header">
            <button data-dismiss="modal" class="close" type="button"></button>
            <h3>Widget Settings</h3>
        </div>
        <div class="modal-body"> Widget settings form goes here </div>
    </div>
    <div class="clearfix"></div>
    <div class="content">

    <!-- BEGIN FORM -->
        <div class="row" style="margin-top: 15px;">
            <div class="col-md-12 col-md-12">
                <div class="col-md-12 col-md-12">
                    <div class="grid simple">
                        <div class="grid-title no-border">
                            <h4>Form<span class="semi-bold"> Paket </span></h4>
                            <div class="tools">
                                <a href="javascript:;" class="collapse"></a>
                            </div>
                        </div>
                        <div class="grid-body no-border">
                            <br>
                            <div class="row">
                                <form class="form-horizontal" id="form_paket" name="formGlasses" action="{{ url('paket-add', @$data->id) }}" method="POST">
                                    {{ csrf_field() }}
                                    @if (!empty($data))
                                      {{ method_field('PATCH') }}
                                    @endif
                                    
                                    @if ($errors->any())
                                        <div class="alert alert-danger">
                                            <ul>
                                                @foreach ($errors->all() as $error)
                                                    <li>{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif
                                    <div class="form-group">
                                        <label class="col-sm-3 col-md-3 control-label">
                                            Paket :
                                        </label>
                                        <div class="col-sm-7 col-md-7">
                                            <input type="text" name="nama_paket" id="paket" class="form-control" required value="{{ @$data->nama_paket }}" placeholder="ex: Blue Colocation" />
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-sm-3 col-md-3 control-label">
                                            Harga Paket :
                                        </label>
                                        <div class="col-sm-7 col-md-7">
                                            <input type="text" name="harga" id="harga" class="form-control" required value="{{ @$data->harga }}" placeholder="ex: 4300000" />
                                            <input type="hidden" name="tax" id="tax" class="form-control" value="10%" />
                                            <input type="hidden" name="alamat" id="alamat" class="form-control" value="Datacenter Indonesia" />
                                        </div>
                                    </div>
                                     <div class="form-group">
                                        <label class="col-sm-3 col-md-3 control-label">
                                            Harga Instalasi :
                                        </label>
                                        <div class="col-sm-7 col-md-7">
                                            <input type="text" name="installasi" id="installasi" class="form-control" required value="{{ @$data->installasi }}" placeholder="ex: 1500000" />
                                        </div>
                                    </div>
                                     <div class="form-group">
                                        <label class="col-sm-3 col-md-3 control-label">
                                            Harga Service :
                                        </label>
                                        <div class="col-sm-7 col-md-7">
                                            <input type="text" name="service" id="service" class="form-control" required value="{{ @$data->service }}" placeholder="ex: 600000" />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-3 col-md-3 control-label">
                                            Dedicated IP Public :
                                        </label>
                                        <div class="col-sm-7 col-md-7">
                                            <input type="number" name="ip_public" id="ip_public" class="form-control" required value="{{ @$data->ip_public }}" placeholder="ex: 1" />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-3 col-md-3 control-label">
                                            Kecepatan Lokal :
                                        </label>
                                        <div class="col-sm-7 col-md-7">
                                            <input type="text" name="kecepatan_lokal" id="kecepatan_lokal" class="form-control" required value="{{ @$data->kecepatan_lokal }}" placeholder="ex: 100 MBPS IIX" />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-3 col-md-3 control-label">
                                            Kecepatan Internasional :
                                        </label>
                                        <div class="col-sm-7 col-md-7">
                                            <input type="text" name="kecepatan_internasional" id="kecepatan_internasional" class="form-control" required value="{{ @$data->kecepatan_internasional }}" placeholder="ex: 15 MBPS" />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-3 col-md-3 control-label">
                                            Max Power :
                                        </label>
                                        <div class="col-sm-7 col-md-7">
                                            <input type="text" name="power" id="power" class="form-control" required value="{{ @$data->power }}" placeholder="ex: 600 Watt" />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-3 col-md-3 control-label">
                                            Ukuran Server :
                                        </label>
                                        <div class="col-sm-7 col-md-7">
                                            <input type="text" name="size_server" id="size_server" class="form-control" required value="{{ @$data->size_server }}" placeholder="ex: 2U" />
                                        </div>
                                    </div>
                                    
                                    
                                    <div class="form-group">
                                        <div class="col-sm-2 col-md-2 col-sm-offset-3 col-md-offset-3" style="margin-bottom: 10px;">
                                            <input type="submit" name="Submit" id="Submit" value="Submit" class="btn btn-primary form-control "/>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END FORM -->

    <style>
        /*Form-Button CSS*/
        .btn-primary { background-color: #26A69A; }

        .left-side { float: left; }
    </style>

    <script type="text/javascript">
        $(document).ready(function () {
            //Dropdownlist
            $("#jenisPaket").select2();
        });
    </script>

        <!-- END PAGE -->
    </div>
</div>
@endsection