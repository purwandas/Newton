@extends('layouts.app')

@section('content')
    <div class="page-content">
        <div class="clearfix"></div>
        <div class="content">

            <div class="page-title">
                <h3><i class="fa fa-cube" aria-hidden="true" style="margin-top: -7px;"></i>Services
                </h3>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="grid simple horizontal green" style="box-shadow: 0 -1px 0 #e5e5e5, 0 0 2px rgba(0, 0, 0, .12), 0 2px 4px rgba(0, 0, 0, .24);">
                        <div class="grid-title">
                            <h4><i class="fa fa-cube"></i>&nbsp; List of Services</h4>
                        </div>
                        <div class="grid-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <table id="serviceTable" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                                        <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Description</th>
                                            <th>Invalid Date</th>
                                            <th>Survei</th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                        </tbody>
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

            <!-- BEGIN PORTLET CONFIGURATION MODAL FORM-->
            <div class="modal fade"  tabindex="-1" role="dialog" aria-hidden="true" id="payment">
              <div class="modal-dialog">
                <div class="modal-content">
                <form id="payment-form" method="POST" action="">
                    {{ csrf_field() }}
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">New Invoice</h4>
                  </div>
                  <div class="modal-body">
                    <input type="number" required="required" placeholder="Duration in month (ex: 5)" name="duration" id="duration" class="form-control" />
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" id="payment-submit" class="btn btn-primary">Submit</button>
                  </div>
                </form>
                </div>
                <!-- /.modal-content -->
              </div>
              <!-- /.modal-dialog -->
            </div>
            <!-- /.modal -->

            <script type="text/javascript">
                $(document).ready(function() {
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });

                    // Set data for Data Table 
                    var table = $('#serviceTable').dataTable({
                        "processing": true,
                        "serverSide": true,           
                        "ajax": {
                            url: "{{ route('datatable.userservice') }}",
                            type: 'POST',
                        },
                        "rowId": "id",
                        "columns": [
                            {data: 'id', name: 'id'},                
                            {data: 'nama_paket', name: 'nama_paket'},
                            {data: 'invalid_date', name: 'invalid_date'},
                            {data: 'survey', name: 'survey'},
                            {data: 'action', name: 'action'},
                        ],
                        "columnDefs": [
                            {"className": "text-center", "targets": [2]},
                            {"className": "text-center", "targets": [3]},
                            {"className": "text-center", "targets": [4]},
                        ],
                        "order": [ [0, 'desc'] ],            
                    });

                });

                $(document).on("click", ".request-survey", function () {
                    
                    var id = $(this).data('id');
                    $('#date').val('');

                    // Set action url form for add
                    var postDataUrl = "{{ url('user-new-survey') }}/"+id;
                    $("#request-form").attr("action", postDataUrl);

                });

                $(document).on("click", ".new-payment", function () {
                    
                    var id = $(this).data('id');
                    $('#duration').val('');

                    // Set action url form for add
                    var postDataUrl = "{{ url('user-new-payment') }}/"+id;
                    $("#payment-form").attr("action", postDataUrl);

                });

                $(document).on("click", "#payment-submit", function () {
                    
                    $("#payment").attr("style", 'display:none');
                    alert('please wait!');

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
                    display: block;
                    margin-left: 150px;
                    margin-top: -20px;
                    white-space: normal;
                }

                .input-sm { width: auto; }
            </style>


            <!-- END PAGE -->
        </div>
    </div>

@endsection