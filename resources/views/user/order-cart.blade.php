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
                <form class="form-horizontal" action="{{ url('user-order-review') }}" method="post">
                    {{ csrf_field() }}
                    <div class="col-md-6 col-md-6">
                    <div class="grid simple">
                        <div class="grid-title no-border">
                            <h4>Form<span class="semi-bold"> Configuration </span></h4>
                            <div class="tools">
                                <a href="javascript:;" class="collapse"></a>
                            </div>
                        </div>
                        <div class="grid-body no-border">
                            <br>
                            <div class="row">
                                    <div class="form-group">
                                        <label class="col-sm-3 col-md-3 control-label">
                                            Start Date
                                        </label>
                                        <div class="col-sm-7 col-md-7">
                                            <input type="text" required="required" placeholder="Start Date" name="start_date" id="start_date" class="form-control" />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-3 col-md-3 control-label">
                                            Duration
                                        </label>
                                        <div class="col-sm-7 col-md-6">
                                            <input type="number" required="required" name="jangka_waktu" id="jangka_waktu" onkeydown="limit(this);" onkeyup="limit(this);" min="0" pattern="[0-12]" class="form-control required" value="1" />
                                        </div>

                                        <label class="col-sm-1 col-md-1 control-label">
                                            Month
                                        </label>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-3 col-md-3 control-label">
                                            Survey Date
                                        </label>
                                        <div class="col-sm-7 col-md-7">
                                            <input type="text" required="required" placeholder="Survey Date" name="survey_date" id="survey_date" class="form-control" />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-3 col-md-3 control-label">
                                            Setup / Instalation
                                        </label>
                                        <div class="col-sm-7 col-md-7">
                                            <div class="radio radio-primary">
                                                <span id="instalation">
                                                    <input id="setup_yes" type="radio" name="setup" value="">
                                                    <label for="setup_yes">Yes</label>
                                                    <input id="setup_no" type="radio" name="setup" value="0">
                                                    <label for="setup_no">No</label>
                                                </span>
                                                <p>
                                                    Jasa Pemasangan Blue Collocation Server
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-3 col-md-3 control-label">
                                            Service (Monthly)
                                        </label>
                                        <div class="col-sm-7 col-md-7">
                                            <div class="radio radio-primary">
                                                <span id="services">
                                                    <input id="service_yes" type="radio" name="services" value="">
                                                    <label for="service_yes">Yes</label>
                                                    <input id="service_no" type="radio" name="services" value="0">
                                                    <label for="service_no">No</label>
                                                </span>
                                                <p>
                                                    Jasa Pemeliharaan / Troubleshooting Aplikasi & Sistem SPSE dilakukan 24x7 agar sistem SPSE yang dikeluarkan oleh lkpp dan digunakan oleh LPSE berjalan sebagaimana mestinya.
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group" id="groupBenefit">
                                        <label class="col-sm-3 col-md-3 control-label">
                                            Operating System
                                        </label>
                                        <div class="col-sm-7 col-md-7">
                                            <select id="operating_system" name="operating_system" style="width: 100%" required="required">
                                                <option value=""></option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-md-6">
                        <div class="grid simple">
                            <div class="grid-title no-border">
                                <h4>Order<span class="semi-bold"> Summary </span></h4>
                                <div class="tools">
                                    <a href="javascript:;" class="collapse"></a>
                                </div>
                            </div>
                            <div class="grid-body no-border">
                                <h5>Colocation Server - <span class="semi-bold"> {{ @$paket->nama_paket }} </span></h5>
                                <br />
                                <div class="row">
                                    <div class="form-group"  style="padding-left: 10%;">
                                    <div class="form-group">
                                        <label class="col-sm-5 col-md-5 control-label text-left">
                                            Packet Fees
                                        </label>
                                        <div class="col-sm-7 col-md-7">
                                            <input type="hidden" readonly="readonly" required="required" name="harga" id="harga" class="form-control" value="{{ @$paket->harga }}">
                                            <label id="harga_l">0</label>
                                            <input type="hidden" name="id_paket" value="{{ @$paket->id }}">
                                            <input type="hidden" name="nama_paket" value="{{ @$paket->nama_paket }}">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-5 col-md-5 control-label text-left">
                                            Setup Fees
                                        </label>
                                        <div class="col-sm-7 col-md-7">
                                            <input type="hidden" readonly="readonly" required="required" name="installasi" id="installasi" class="form-control" value="0" />
                                            <label id="installasi_l">0</label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-5 col-md-5 control-label text-left">
                                            Service Monthly
                                        </label>
                                        <div class="col-sm-7 col-md-7">
                                            <input type="hidden" readonly="readonly" required="required" name="service" id="service" class="form-control" value="0"/>
                                            <label id="service_l">0</label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-5 col-md-5 control-label text-left">
                                            PPn 10 %
                                        </label>
                                        <div class="col-sm-7 col-md-7">
                                            <input type="hidden" readonly="readonly" required="required" name="ppn" id="ppn" class="form-control"/>
                                            <label id="ppn_l">0</label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-5 col-md-5 control-label text-left">
                                             Total Due Today
                                        </label>
                                        <div class="col-sm-7 col-md-7">
                                            <input type="hidden" readonly="readonly" required="required" name="total" id="total" class="form-control"/>
                                            <label id="total_l">0</label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-5 col-md-5 col-sm-offset-5 col-md-offset-5" style="margin-bottom: 10px;">
                                            <input type="submit" name="Submit" id="Submit" value="Continue" class="btn btn-success form-control"/>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
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

        
        <script type="text/javascript">
            function number_format(n) {
                 return n.toFixed(2).replace(/./g, function(c, i, a) {
                    return i > 0 && c !== "." && (a.length - i) % 3 === 0 ? "," + c : c;
                });
            }

            function limit(element)
            {
                var max_chars = 2;

                if(element.value.length > max_chars) {
                    element.value = element.value.substr(0, max_chars);
                }
            }

            $(document).ready(function () {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                //Dropdownlist
                $('#operating_system').select2(setOptions('{{ route("data.operatingsystem") }}', 'Sistem Operasi', function (params) {
                    return filterData('name', params.term);
                }, function (data, params) {
                    return {
                        results: $.map(data, function (obj) {
                            return {id: obj.id, text: obj.operating_system }
                        })
                    }
                }));

                var paket = {{ @$paket->harga }};
                var akumulasi_paket = paket * 1;
                var installasi = {{ @$paket->installasi }};
                var service = {{ @$paket->service }};
                var have_installasi = 0;
                var have_service = 0;
                var total = akumulasi_paket;
                var ppn = total*10/100;


                $("#harga_l").html(number_format(paket));
                $("#installasi_l").html(number_format(have_installasi));
                $("#service_l").html(number_format(have_service));
                $("#ppn_l").html(number_format(ppn));
                $("#total_l").html(number_format(total+ppn));

                $('#ppn').prop('value', ppn);
                $('#total').prop('value', total+ppn);

                $('input[type=radio][name=setup]').change(function() {
                    if (this.value == '0') {
                        $('#installasi').removeAttr('value');
                        $('#installasi').prop('value', 0);
                        
                        if (have_installasi > 0) {
                            have_installasi = -(installasi);
                        } else {
                            have_installasi = 0;
                        }

                        total += have_installasi;
                        ppn = total*10/100;
                        $('#ppn').removeAttr('value');
                        $('#ppn').prop('value', ppn);

                        $('#total').removeAttr('value');
                        $('#total').prop('value', total+ppn);
                    } else {
                        $('#installasi').removeAttr('value');
                        $('#installasi').prop('value', installasi);
                        
                        have_installasi = installasi;
                        total += have_installasi;
                        ppn = total*10/100;

                        $('#ppn').removeAttr('value');
                        $('#ppn').prop('value', ppn);

                        $('#total').removeAttr('value');
                        $('#total').prop('value', total+ppn);
                    }

                    if (have_installasi > 0) {
                        $("#installasi_l").html(number_format(have_installasi));
                    } else {
                        $("#installasi_l").html(number_format(0));
                    }

                    $("#ppn_l").html(number_format(ppn));
                    $("#total_l").html(number_format(total+ppn));
                    
                });

                $('input[type=radio][name=services]').change(function() {
                    if (this.value == '0') {
                        $('#service').removeAttr('value');
                        $('#service').prop('value', 0);

                        if (have_service > 0) {
                            have_service = -(service);
                        } else {
                            have_service = 0;
                        }
                        
                        total += have_service;
                        ppn = total*10/100;
                        $('#ppn').removeAttr('value');
                        $('#ppn').prop('value', ppn);

                        $('#total').removeAttr('value');
                        $('#total').prop('value', total+ppn); 

                    } else {
                        $('#service').removeAttr('value');
                        $('#service').prop('value', service);
                        
                        have_service = service;
                        total += have_service;
                        ppn = total*10/100;
                        $('#ppn').removeAttr('value');
                        $('#ppn').prop('value', ppn);

                        $('#total').removeAttr('value');
                        $('#total').prop('value', total+ppn); 
                    }

                    if (have_service > 0) {
                        $("#service_l").html(number_format(have_service));
                    } else {
                        $("#service_l").html(number_format(0));
                    }

                    $("#ppn_l").html(number_format(ppn));
                    $("#total_l").html(number_format(total+ppn));

                });

                $('input[name=jangka_waktu]').change(function() {
                    var jangka_waktu = $('#jangka_waktu').val();

                    if (jangka_waktu > 0) {
                        akumulasi_paket = paket * jangka_waktu;
                        total = akumulasi_paket + have_installasi + have_service;
                        ppn = total*10/100;

                        $('#ppn').removeAttr('value');
                        $('#ppn').prop('value', ppn);

                        $('#total').removeAttr('value');
                        $('#total').prop('value', total+ppn);

                        $("#ppn_l").html(number_format(ppn));
                        $("#total_l").html(number_format(total+ppn));

                    }
                });

            });

            // DatePicker
            $(document).ready(function () {
                var date_input = $('input[name="start_date"]'); //our date input has the name "date"
                var container = $(".bootstrap-iso form").length > 0 ? $(".bootstrap-iso form").parent() : "body";
                var options = {
                    format: "yyyy-mm-dd",
                    container: container,
                    todayHighlight: true,
                    autoclose: true
                };
                date_input.datepicker(options);

                date_input = $('input[name="survey_date"]'); //our date input has the name "date"
                container = $(".bootstrap-iso form").length > 0 ? $(".bootstrap-iso form").parent() : "body";
                options = {
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