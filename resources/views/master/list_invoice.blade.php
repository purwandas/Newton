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
        <h3><i class="fa fa-file-text" aria-hidden="true" style=" margin-top: -7px;"></i>Invoice</h3>        
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="grid simple horizontal green" style="box-shadow: 0 -1px 0 #e5e5e5, 0 0 2px rgba(0, 0, 0, .12), 0 2px 4px rgba(0, 0, 0, .24);">
                    <div class="grid-title">
                        <h4><i class="fa fa-file-text"></i>&nbsp; List of Invoice</h4>
                        
                    </div>
                    <div class="grid-body">
                        <div class="row">
                            <div class="col-md-12">
                                <table id="ListInvoiceTable" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                                    <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Invoice No</th>
                                        <th>Issued Date</th>
                                        <th>Invoice Period</th>
                                        <!-- <th>Due Date</th> -->
                                        <th>Perusahaan</th>
                                        <th>File</th>
                                        <th>Status</th>
                                        <th>Verification Image</th>
                                    </tr>
                                    </thead>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- BEGIN SAMPLE PORTLET CONFIGURATION MODAL FORM-->
        <div class="modal fade"  tabindex="-1" role="dialog" aria-hidden="true" id="verification-image">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Verivication Image</h4>
              </div>
              <div class="modal-body">
                <div id="verification-image" class="text-center">
                    <img id="image" height="250px" onError="this.onerror=null;this.src='{{ asset('image/missing.png') }}';" style="border:1px solid grey"> 
                    <hr>
                </div>
              </div>
              <div class="modal-footer">
                <div class="text-center">
                    <a href="" id="confirm" class="btn btn-success text-left">Confirm</a>
                    <a href="" id="reject" class="btn btn-danger text-left">Reject</a>
                </div>
                <button type="button" class="btn btn-default text-right" data-dismiss="modal">Close</button>
              </div>
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
                var table = $('#ListInvoiceTable').dataTable({
                    "processing": true,
                    "serverSide": true,           
                    "ajax": {
                        url: "{{ route('datatable.invoice') }}",
                        type: 'POST',
                    },
                    "rowId": "id",
                    "columns": [
                        {data: 'id', name: 'id'},                
                        {data: 'invoice_number', name: 'invoice_number'},
                        {data: 'issue_date', name: 'issue_date'},
                        {data: 'period', name: 'period'},
                        // {data: 'due_date', name: 'due_date'},
                        {data: 'order', name: 'order'},
                        {data: 'file', name: 'file'},
                        {data: 'paid_status', name: 'paid_status'},
                        {data: 'verification', name: 'verification'},
                        
                    ],
                    "columnDefs": [
                        {"className": "dt-center", "targets": [0]},
                        {"className": "dt-center", "targets": [1]},
                        {"className": "dt-center", "targets": [2]},
                    ],
                    "order": [ [0, 'desc'] ],            
                });


                // Delete data with sweet alert
                $('#ListInvoiceTable').on('click', 'tr td button.deleteButton', function () {
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

        // Init add form
        $(document).on("click", ".image-confirmation", function () {       
            
            var id = $(this).data('id');
            var image = $(this).data('verification');

            $('#confirm').removeAttr("href");
            $('#confirm').attr("href", "{{ url('confirm-invoice') }}/"+id);
            $('#reject').removeAttr("href");
            $('#reject').attr("href", "{{ url('reject-invoice') }}/"+id);
            
            $('#image').removeAttr("src");
            $('#image').attr("src", image);

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