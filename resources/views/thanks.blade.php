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
                  <h3><i class="fa fa-home" aria-hidden="true" style=" margin-top: -7px;"></i> Home </h3>   
                </div>
            <div class="row spacing-bottom 2col"> 
                <div class="col-md-12">
                    <div class="grid simple horizontal green" style="box-shadow: 0 -1px 0 #e5e5e5, 0 0 2px rgba(0, 0, 0, .12), 0 2px 4px rgba(0, 0, 0, .24);">
                        <div class="grid-title">
                             Mohon Maaf, Anda belum mendapat persetujuan Admin.
                        </div>
                    </div>
                </div>
              
            </div>  
            <!-- END PAGE -->
        </div>
    </div>

@endsection