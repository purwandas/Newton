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
                <h3><i class="fa fa-file-text" aria-hidden="true" style="margin-top: -7px;"></i>Invoices
                </h3>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="grid simple horizontal green" style="box-shadow: 0 -1px 0 #e5e5e5, 0 0 2px rgba(0, 0, 0, .12), 0 2px 4px rgba(0, 0, 0, .24);">
                        <div class="grid-title">
                            <h4><i class="fa fa-file-text"></i>&nbsp; List of Invoices</h4>
                        </div>
                        <div class="grid-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <table id="ListInvoiceTable" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                                        <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Invoice Number</th>
                                            <th>Invoice Date</th>
                                            <th>Due Due</th>
                                            <th>Period</th>
                                            <th>Total</th>
                                            <th>Status</th>
                                            <th align="center">File</th>
                                            <th>Acion</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td>
                                                <a href='#grid-config' data-toggle='modal' class='config' class='btn-social'>
                                                    <i class='fa fa-clock-o'></i>
                                                    <i class='fa fa-image'></i>
                                                </a>
                                            </td>
                                            <td></td>
                                            <td align="center">
                                                    <a href="#" class="btn-social">
                                                        <i class="fa fa-download"></i>
                                                    </a>
                                            </td>
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

    <!-- BEGIN SAMPLE PORTLET CONFIGURATION MODAL FORM-->
    <div class="modal fade"  tabindex="-1" role="dialog" aria-hidden="true" id="upload">
      <div class="modal-dialog">
        <div class="modal-content">
        <form id="form" method="POST" action="{{ url('invoice-verification') }}" enctype="multipart/form-data">
            {{ csrf_field() }}
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title">Select Verivication Image</h4>
          </div>
          <div class="modal-body">
            <div id="verification-image" class="text-center">
                
            </div>
             <input type="file" accept=".jpg,.jpeg,.png,.gif,.svg" required="required" placeholder="Transfer Evidence" name="verification_file" id="verification_file" class="form-control" />
             <input type="hidden" name="invoice_id" id="invoice_id">
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

    <!-- BEGIN SAMPLE PORTLET CONFIGURATION MODAL FORM-->
    <div class="modal fade"  tabindex="-1" role="dialog" aria-hidden="true" id="grid-config">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title">Date of Survey</h4>
          </div>
          <div class="modal-body">
            <input type="text" required="required" placeholder="Survey Date" name="dates" id="dates" class="form-control" />
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary">Submit</button>
          </div>
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
            var table = $('#ListInvoiceTable').dataTable({
                "processing": true,
                "serverSide": true,           
                "ajax": {
                    url: "{{ route('datatable.userinvoice') }}",
                    type: 'POST',
                },
                "rowId": "id",
                "columns": [
                    {data: 'id', name: 'id'},                
                    {data: 'invoice_number', name: 'invoice_number'},
                    {data: 'issue_date', name: 'issue_date'},
                    {data: 'due_date', name: 'due_date'},
                    {data: 'period', name: 'period'},
                    {data: 'total', name: 'total'},
                    {data: 'paid_status', name: 'paid_status'},
                    {data: 'file', name: 'file'},
                    {data: 'action', name: 'action'},
                ],
                "columnDefs": [
                    {"className": "dt-center", "targets": [0]},
                    {"className": "dt-center", "targets": [1]},
                    {"className": "dt-center", "targets": [2]},
                ],
                "order": [ [0, 'desc'] ],            
            });

        });
        // DatePicker
        $(document).ready(function () {
            var date_input = $('input[name="dates"]'); //our date input has the name "date"
            var container = $(".bootstrap-iso form").length > 0 ? $(".bootstrap-iso form").parent() : "body";
            var options = {
                format: "yyyy/mm/dd",
                container: container,
                todayHighlight: true,
                autoclose: true
            };
            date_input.datepicker(options);
        });

        // Init add form
        $(document).on("click", ".add-verification", function () {       
            
            var id = $(this).data('id');            
            $('#verification_file').val('');
            $('#invoice_id').val(id);
            var verificationImage = document.getElementById('verification-image');
            verificationImage.innerHTML = '';

            // Set action url form for add
            var postDataUrl = "{{ url('invoice-verification-add') }}";    
            $("#form").attr("action", postDataUrl);

            // Delete Patch Method if Exist
            if($('input[name=_method]').length){
                $('input[name=_method]').remove();
            }

        });

        // For editing data
        $(document).on("click", ".change-verification", function () {

            var id = $(this).data('id');
            var getDataUrl = "{{ url('invoice-verification-edit/') }}";
            var postDataUrl = "{{ url('invoice-verification-change') }}";

            // Set action url form for update        
            $("#form").attr("action", postDataUrl);

            // Set Patch Method
            if(!$('input[name=_method]').length){
                $("#form").append("<input type='hidden' name='_method' value='PATCH'>");
            }

            $.get(getDataUrl + '/' + id, function (data) {

                $('#invoice_id').val(id);
                $('#verification_file').val();
                var verificationImage = document.getElementById('verification-image');
                verificationImage.innerHTML = '<img height="250px" src="'+data.verification_file+'" onError="this.onerror=null;this.src='+"'{{ asset('image/missing.png') }}'"+';" style="border:1px solid grey"> <hr>';

            })

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

@endsection