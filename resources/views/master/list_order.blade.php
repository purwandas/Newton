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

        <div class="page-title">    
        <h3><i class="fa fa-check-square-o" aria-hidden="true" style=" margin-top: -7px;"></i>Order</h3>     
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="grid simple horizontal green" style="box-shadow: 0 -1px 0 #e5e5e5, 0 0 2px rgba(0, 0, 0, .12), 0 2px 4px rgba(0, 0, 0, .24);">
                    <div class="grid-title">
                        <h4><i class="fa fa-check-square-o"></i>&nbsp; List of Order</h4>
                        <div style="float: right;">
                            <a href="{{ url('listorder-create') }}" type="button" class="btn btn-primary btn-sm btn-small" style="padding: 7px 12px;"><i class="fa fa-plus"></i>&nbsp; Add New</a>
                        </div>
                    </div>
                    <div class="grid-body">
                        <div class="row">
                            <div class="col-md-12">
                                <table id="ListOrderTable" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                                    <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Perusahaan</th>
                                        <th>Nama</th>
                                        <th>Jenis Layanan</th>
                                        <th>Rencana Pemasangan</th>
                                        <th>Rencana Survei</th>
                                        <th>Installasi</th>
                                        <th>Service</th>
                                        <th>Status</th>
                                        <th>Jabatan</th>
                                        <th>Alamat Perusahaan</th>
                                        <th style="width: 10%">Action</th>
                                    </tr>
                                    </thead>

                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- BEGIN PORTLET CONFIGURATION MODAL FORM-->
        <div class="modal fade"  tabindex="-1" role="dialog" aria-hidden="true" id="request-survey">
          <div class="modal-dialog">
            <div class="modal-content">
            <form id="request-form" method="POST" action="">
                {{ csrf_field() }}
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Date of Survey</h4>
              </div>
              <div class="modal-body">
                <input type="text" required="required" placeholder="Survey Date" name="date" id="date" class="form-control" />
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>
            </form>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->


        <script>
            $(document).ready(function () {     

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                // Set data for Data Table 
                var table = $('#ListOrderTable').dataTable({
                    "processing": true,
                    "serverSide": true,           
                    "ajax": {
                        url: "{{ route('datatable.listorder') }}",
                        type: 'POST',
                    },
                    "rowId": "id",
                    "columns": [
                        {data: 'id', name: 'id'},                
                        {data: 'nama_perusahaan', name: 'nama_perusahaan'},
                        {data: 'penanggung_jawab', name: 'penanggung_jawab'},
                        {data: 'jenis_layanan', name: 'jenis_layanan'},
                        {data: 'rencana_pemasangan', name: 'rencana_pemasangan'},
                        {data: 'rencana_survei', name: 'rencana_survei'},
                        {data: 'installasi', name: 'installasi'},
                        {data: 'service', name: 'service'},
                        {data: 'pembayaran', name: 'pembayaran'},
                        {data: 'jabatan_penanggung_jawab', name: 'jabatan_penanggung_jawab'},
                        {data: 'alamat_perusahaan', name: 'alamat_perusahaan'},
                        {data: 'action', name: 'action', searchable: false, sortable: false},                
                    ],
                    "columnDefs": [
                        {"className": "dt-center", "targets": [0]},
                        {"className": "dt-center", "targets": [1]},
                        {"className": "dt-center", "targets": [2]},
                        {"className": "dt-center", "targets": [4]},
                    ],
                    "order": [ [0, 'desc'] ],            
                });


                $(document).on("click", ".request-survey", function () {
                    
                    var id = $(this).data('id');

                    // Set action url form for add
                    var postDataUrl = "{{ url('new-survey') }}/"+id;
                    $("#request-form").attr("action", postDataUrl);

                });

                // Delete data with sweet alert
                $('#ListOrderTable').on('click', 'tr td button.deleteButton', function () {
                    var id = $(this).val();

                        swal({
                            title: "Are you sure?",
                            text: "You will not be able to recover data!",
                            type: "warning",
                            showCancelButton: true,
                            confirmButtonClass: "btn-danger",
                            confirmButtonText: "Yes, delete it",
                            cancelButtonText: "No, cancel",
                            closeOnConfirm: false,
                            closeOnCancel: false
                        },
                        function (isConfirm) {
                            if (isConfirm) {
                                $.ajaxSetup({
                                    headers: {
                                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                    }
                                })


                                $.ajax({

                                    type: "DELETE",
                                    url:  'quiz/' + id,
                                    success: function (data) {
                                        console.log(data);

                                        $("#"+id).remove();

                                    },
                                    error: function (data) {
                                        console.log('Error:', data);
                                    }
                                });                        

                                swal("Deleted!", "Data has been deleted.", "success");
                            } else {
                                swal("Cancelled", "Data is safe ", "success");
                            }
                        });
                });

            });

            // DatePicker
            $(document).ready(function () {
                var date_input = $('input[name="date"]'); //our date input has the name "date"
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


        <style type="text/css">
            .dtr-data {
            white-space: normal;
            display: block;
            margin-top: -20px;
            margin-left: 150px;
        }
        .input-sm
        {
            width:auto;    
        }
        </style>


        <!-- END PAGE -->
    </div>
</div>

@endsection