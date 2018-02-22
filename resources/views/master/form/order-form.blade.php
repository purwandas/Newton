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
                        <h4>Form<span class="semi-bold"> Order </span></h4>
                        <div class="tools">
                            <a href="javascript:;" class="collapse"></a>
                        </div>
                    </div>
                    <div class="grid-body no-border">
                        <br>
                        <div class="row">
                            <form class="form-horizontal" id="form_order" name="form_order" action="
                            {{ url('listorder', @$data->id) }}
                            " method="post" >
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
                                        Tipe Pelanggan :
                                    </label>
                                    <div class="col-sm-7 col-md-7">
                                        <div class="radio radio-primary">
                                            <span id="TipePelanggan">
                                                <input id="Individu" type="radio" name="tipe_pelanggan" value="Individu" {{ (@$data->tipe_pelanggan == 'Individu') ? "checked" : "" }}>
                                                <label for="Individu">Individu</label>
                                                <input id="Perusahaan" type="radio" name="tipe_pelanggan" value="Perusahaan" {{ (@$data->tipe_pelanggan == 'Perusahaan') ? "checked" : "" }}>
                                                <label for="Perusahaan">Perusahaan</label>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 col-md-3 control-label">
                                        Nama Perusahaan :
                                    </label>
                                    <div class="col-sm-7 col-md-7">
                                        <input type="text" name="nama_perusahaan" id="nama_perusahaan" class="form-control" required value="{{ @$data->nama_perusahaan }}" />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 col-md-3 control-label">
                                        Propinsi (Perusahaan) :
                                    </label>
                                    <div class="col-sm-7 col-md-7">
                                        <input type="text" name="provinsi" id="provinsi" class="form-control" required value="{{ @$data->provinsi }}" />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 col-md-3 control-label">
                                        Kode Pos (Perusahaan) :
                                    </label>
                                    <div class="col-sm-7 col-md-7">
                                        <input type="text" name="kode_pos" id="kode_pos" class="form-control" required value="{{ @$data->kode_pos }}" />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 col-md-3 control-label">
                                        Alamat (Perusahaan) :
                                    </label>
                                    <div class="col-sm-7 col-md-7">
                                        <input type="text" name="alamat_perusahaan" id="alamat_perusahaan" class="form-control" required value="{{ @$data->alamat_perusahaan }}" />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 col-md-3 control-label">
                                        Nama Penanggung Jawab :
                                    </label>
                                    <div class="col-sm-7 col-md-7">
                                        <input type="text" name="penanggung_jawab" id="penanggung_jawab" class="form-control" required value="{{ @$data->penanggung_jawab }}" />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 col-md-3 control-label">
                                        Jabatan Penanggung Jawab :
                                    </label>
                                    <div class="col-sm-7 col-md-7">
                                        <input type="text" name="jabatan_penanggung_jawab" id="jabatan_penanggung_jawab" class="form-control" required value="{{ @$data->jabatan_penanggung_jawab }}" />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 col-md-3 control-label">
                                        NIP Penanggung Jawab :
                                    </label>
                                    <div class="col-sm-7 col-md-7">
                                        <input type="text" name="nip_penanggung_jawab" id="nip_penanggung_jawab" class="form-control" required value="{{ @$data->nip_penanggung_jawab }}" />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 col-md-3 control-label">
                                        HP :
                                    </label>
                                    <div class="col-sm-7 col-md-7">
                                        <input type="text" name="hp_penanggung_jawab" id="hp_penanggung_jawab" class="form-control" required value="{{ @$data->hp_penanggung_jawab }}" />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 col-md-3 control-label">
                                        Telp / Fax :
                                    </label>
                                    <div class="col-sm-7 col-md-7">
                                        <input type="text" name="telp" id="telp" class="form-control" required value="{{ @$data->telp }}" />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 col-md-3 control-label">
                                        Email :
                                    </label>
                                    <div class="col-sm-7 col-md-7">
                                        <input type="text" name="email" id="email" class="form-control" required value="{{ @$data->email }}" />
                                    </div>
                                </div>
                                <div class="form-group" id="groupBenefit">
                                    <label class="col-sm-3 col-md-3 control-label">
                                        Jenis Layanan :
                                    </label>
                                    <div class="col-sm-7 col-md-7">
                                        <select class="select2select" name="id_paket" id="selectJenisLayanan" required="required"></select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 col-md-3 control-label">
                                        Durasi Layanan :
                                    </label>
                                    <div class="col-sm-6 col-md-6">
                                        <input type="number" name="jangka_waktu" id="volume" pattern="[0-12]" class="form-control" required value="{{ @$data->jangka_waktu }}" />
                                    </div>

                                    <label class="col-sm-1 col-md-1 control-label">
                                        Bulan
                                    </label>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-3 col-md-3 control-label">
                                        Rencana Pemasangan :
                                    </label>
                                    <div class="col-sm-7 col-md-7">
                                       <input type="text" placeholder="Tanggal Pemasangan" name="rencana_pemasangan" id="date_start" class="form-control" required value="{{ @$data->rencana_pemasangan }}" />
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-3 col-md-3 control-label">
                                        Rencana Survei :
                                    </label>
                                    <div class="col-sm-7 col-md-7">
                                       <input type="text" placeholder="Tanggal Survei" name="rencana_survei" id="date_start2" class="form-control" required value="{{ @$data->rencana_survei }}" />
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-3 col-md-3 control-label">
                                        Service & Troubleshooting :
                                    </label>
                                    <div class="col-sm-7 col-md-7">
                                        <div class="radio radio-primary">
                                            <span id="Setup">
                                                <input id="ya" type="radio" name="service" value="Y" {{ (@$data->service == 'Y') ? "checked" : "" }}>
                                                <label for="ya">Ya</label>
                                                <input id="tidak" type="radio" name="service" value="N" {{ (@$data->service == 'N') ? "checked" : "" }}>
                                                <label for="tidak">Tidak</label>
                                            </span>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-3 col-md-3 control-label">
                                        Setup / Instalasi :
                                    </label>
                                    <div class="col-sm-7 col-md-7">
                                        <div class="radio radio-primary">
                                            <span id="UkuranServer">
                                                <input id="yaa" type="radio" name="installasi" value="Y" {{ (@$data->installasi == 'Y') ? "checked" : "" }}>
                                                <label for="yaa">Ya</label>
                                                <input id="tidaka" type="radio" name="installasi" value="N" {{ (@$data->installasi == 'N') ? "checked" : "" }}>
                                                <label for="tidaka">Tidak</label>
                                            </span>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-sm-2 col-md-2 col-sm-offset-3 col-md-offset-3" style="margin-bottom: 10px;">
                                        <input type="submit" id="Submit" value="Submit" class="btn btn-primary form-control "/>
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

    <!-- BEGIN SELECT2 SCRIPTS -->
    <script src="{{ asset('js/select2/select2-handler.js') }}" type="text/javascript"></script>
    <!-- END SELECT2 SCRIPTS -->

    <!-- BEGIN PAGE VALIDATION SCRIPTS -->
    <script src="{{ asset('js/handler/order-handler.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/handler/jquery.validate.min.js') }}" type="text/javascript"></script>
    <!-- END PAGE VALIDATION SCRIPTS -->

    <script type="text/javascript">
        
        $(document).ready(function () {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $('#selectJenisLayanan').select2(setOptions('{{ route("data.paket") }}', 'Jenis Layanan', function (params) {
                return filterData('name', params.term);
            }, function (data, params) {
                return {
                    results: $.map(data, function (obj) {
                        return {id: obj.id, text: obj.nama_paket + " - " + obj.harga }
                    })
                }
            }));
            setSelect2IfPatch($("#selectJenisLayanan"), "{{ @$data->id_paket }}", "{{ @$paket->nama_paket }} - {{ @$paket->harga_satuan}}");
            $("#selectJenisLayanan").attr("style","border: 1px solid #e5e9ec;");

            $('#selectBandwidth').select2(setOptions('{{ route("data.bandwidth") }}', 'Bandwidth', function (params) {
                return filterData('name', params.term);
            }, function (data, params) {
                return {
                    results: $.map(data, function (obj) {
                        return {id: obj.id, text: obj.bandwidth }
                    })
                }
            }));
            setSelect2IfPatch($("#selectBandwidth"), "{{ @$data->id_bandwidth }}", "{{ @$bandwidth->bandwidth }}");
            $("#selectBandwidth").attr("style","border: 1px solid #e5e9ec;");
        });

        $(document).ready(function () {
            // DatePicker
            var date_input = $('input[name="rencana_pemasangan"]'); //our date input has the name "date"
            var container = $(".bootstrap-iso form").length > 0 ? $(".bootstrap-iso form").parent() : "body";
            var options = {
                format: "yyyy-mm-dd",
                container: container,
                todayHighlight: true,
                autoclose: true
            };
            date_input.datepicker(options);

            var date_input = $('input[name="rencana_survei"]'); //our date input has the name "date"
            var container = $(".bootstrap-iso form").length > 0 ? $(".bootstrap-iso form").parent() : "body";
            var options = {
                format: "yyyy-mm-dd",
                container: container,
                todayHighlight: true,
                autoclose: true
            };
            date_input.datepicker(options);
            
        });
    </script>


        <!-- END PAGE -->
    </div>
</div>

@endsection