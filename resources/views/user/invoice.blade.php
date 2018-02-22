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
                                    <table id="TableEmployee" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                                        <thead>
                                        <tr>
                                            <th>Invoice</th>
                                            <th>Invoice Date</th>
                                            <th>Due Due</th>
                                            <th>Total</th>
                                            <th>Survey</th>
                                            <th>Status</th>
                                            <th style="width: 10%" align="center">Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td>
                                                <a href="#grid-config" data-toggle="modal" class="config" class="btn-social">
                                                    <i class="fa fa-clock-o"></i>
                                                </a>
                                            </td>
                                            </td>
                                            <td></td>
                                            <td align="center">
                                                    <a href="#" class="btn-social">
                                                        <i class="fa fa-download"></i>
                                                    </a>
                                            </td>
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
                    $('#TableEmployee').DataTable({
                        "pageLength": 10
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