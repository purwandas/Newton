@extends('layouts.app')

@section('content')
    <div class="page-content">
        <!-- BEGIN SAMPLE PORTLET CONFIGURATION MODAL FORM-->
        <div id="portlet-config" class="modal hide">
            <div class="modal-header">
                <button data-dismiss="modal" class="close" type="button"></button>
                <h3>Widget Settings</h3>
            </div>
            <div class="modal-body">Widget settings form goes here </div>
        </div>
        <div class="clearfix"></div>
        <div class="content">

            <div class="page-title">
                <h3>Review &amp; Check
                </h3>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="grid simple horizontal green" style="box-shadow: 0 -1px 0 #e5e5e5, 0 0 2px rgba(0, 0, 0, .12), 0 2px 4px rgba(0, 0, 0, .24);">
                        <div class="grid-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <table id="" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
                                                <th>Description</th>
                                                <th>Price</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>Colocation Server - <b>{{ $nama_paket }}</b></td>
                                                <td>IDR. {{ number_format($harga) }}</td>
                                            </tr>
                                            @if($installasi > 0)
                                            <tr>
                                                <td>Installasi Fees (1x) </b></td>
                                                <td>IDR. {{ number_format($installasi) }}</td>
                                            </tr>
                                            @endif
                                            @if($service > 0)
                                            <tr>
                                                <td>Service Fees (Monthly) </b></td>
                                                <td>IDR. {{ number_format($service) }}</td>
                                            </tr>
                                            @endif
                                        </tbody>
                                    </table>
                                    <div align="right">
                                        <table cellpadding="5" cellspacing="5">
                                            <tr>
                                                <th>SubTotal &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:
                                                </th>
                                                <th>IDR.
                                                {{ number_format($subtotal) }}
                                                </th>
                                            </tr>
                                            <tr>
                                                <th>PPn 10% &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:
                                                </th>
                                                <th>IDR.
                                                {{ number_format($ppn) }}
                                                </th>
                                            </tr>
                                            <tr>
                                                <th>Total Due Today :</th>
                                                <th>IDR.
                                                {{ number_format($total) }}
                                                </th>
                                            </tr>
                                            <tr>
                                                <th>Total Recurring &nbsp;:</th>
                                                <th>IDR.
                                                {{ number_format($bulanan) }}
                                                Monthly
                                                </th>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6"></div>
                <div class="col-md-6">
                    <div class="grid simple horizontal" style="box-shadow: 0 -1px 0 #e5e5e5, 0 0 2px rgba(0, 0, 0, .12), 0 2px 4px rgba(0, 0, 0, .24);">
                        <div class="grid-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <h3>
                                        Payment Method
                                    </h3>
                                    <form action="{{ url('user-order-end') }}" method="post">
                                        {{ csrf_field() }}
                                        <div class="form-group">
                                            <div class="col-sm-7 col-md-7">
                                                <div class="radio radio-primary">
                                                    <span id="payment">
                                                        <input id="payment" type="radio" checked="checked" name="payment" value="Bank Transfer">
                                                        <label for="payment">Bank Transfer</label>
                                                    </span>
                                                    <input type="hidden" name="id_paket" value="{{ @$id_paket }}">
                                                    <input type="hidden" name="nama_paket" value="{{ @$nama_paket }}">
                                                    <input type="hidden" name="harga" value="{{ @$harga }}">
                                                    <input type="hidden" name="installasi" value="{{ @$installasi }}">
                                                    <input type="hidden" name="service" value="{{ @$service }}">
                                                    <input type="hidden" name="subtotal" value="{{ @$subtotal }}">
                                                    <input type="hidden" name="ppn" value="{{ @$ppn }}">
                                                    <input type="hidden" name="total" value="{{ @$total }}">
                                                    <input type="hidden" name="bulanan" value="{{ @$bulanan }}">
                                                    <input type="hidden" name="start_date" value="{{ @$start_date }}">
                                                    <input type="hidden" name="survey_date" value="{{ @$survey_date }}">
                                                    <input type="hidden" name="jangka_waktu" value="{{ @$jangka_waktu }}">
                                                    <input type="hidden" name="operating_system" value="{{ @$operating_system }}">
                                                </div>
                                            </div>
                                        </div>
                                        <br />
                                        <br />
                                        <br />
                                        <div class="form-group">
                                            <div class="col-sm-8 col-md-8 col-sm-offset-2 col-md-offset-2" style="margin-bottom: 10px;">
                                            <input type="submit" name="Submit" id="Submit" value="Check Out" class="btn btn-success form-control"/>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <script type="text/javascript">
                    $(document).ready(function () {
                        $.ajaxSetup({
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            }
                        });
                        $('#TableEmployee').DataTable({
                            "pageLength": 10
                        });
                    });
                </script>

                <style type="text/css">
                    .dtr-data {
                        display: block;
                        margin-left: 150px;
                        margin-top: -20px;
                        white-space: normal;
                    }

                    .input-sm {
                        width: auto;
                    }
                </style>

                <!-- END PAGE -->
            </div>
        </div>
    </div>
@endsection