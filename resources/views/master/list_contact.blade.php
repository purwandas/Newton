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
        <h3><i class="fa fa-users" aria-hidden="true" style=" margin-top: -7px;"></i>Contact</h3>        
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="grid simple horizontal green" style="box-shadow: 0 -1px 0 #e5e5e5, 0 0 2px rgba(0, 0, 0, .12), 0 2px 4px rgba(0, 0, 0, .24);">
                    <div class="grid-title">
                        <h4><i class="fa fa-users"></i>&nbsp; List of Contact</h4>
                    </div>
                    <div class="grid-body">
                        <div class="row">
                            <div class="col-md-12">
                                <table id="ListContactTable" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                                    <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Phone Number</th>
                                        <th>Message</th>
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

        <script>
            $(document).ready(function () {     

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                // Set data for Data Table 
                var table = $('#ListContactTable').dataTable({
                    "processing": true,
                    "serverSide": true,           
                    "ajax": {
                        url: "{{ route('datatable.contact') }}",
                        type: 'POST',
                    },
                    "rowId": "id",
                    "columns": [
                        {data: 'id', name: 'id'},                
                        {data: 'name', name: 'name'},
                        {data: 'email', name: 'email'},
                        {data: 'phone', name: 'phone'},
                        {data: 'message', name: 'message'},
                        {data: 'action', name: 'action', searchable: false, sortable: false},                
                    ],
                    "columnDefs": [
                        {"className": "dt-center", "targets": [0]},
                        {"className": "dt-center", "targets": [1]},
                        {"className": "dt-center", "targets": [2]},
                    ],
                    "order": [ [0, 'desc'] ],            
                });


                // Delete data with sweet alert
                $('#ListContactTable').on('click', 'tr td button.deleteButton', function () {
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