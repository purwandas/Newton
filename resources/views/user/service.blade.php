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
                                    <table id="TableEmployee" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                                        <thead>
                                        <tr>
                                            <th>Description</th>
                                            <th>Date</th>
                                            <th>Invalid Date</th>
                                            <th>Price</th>
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

            <script type="text/javascript">
                $(document).ready(function() {
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

                .input-sm { width: auto; }
            </style>


            <!-- END PAGE -->
        </div>
    </div>

@endsection