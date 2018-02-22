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
              <div class="col-md-4 col-sm-6 spacing-bottom-sm spacing-bottom">  
                <div id="eProfile" class="tiles blue added-margin">
                  <div class="tiles-body">
                  <div class="controller">                
                    <a onclick="javascript:Notifications();" href="javascript:;" class="reloadData"></a>
                    <a href="javascript:;" class="remove"></a>    
                  </div>    
                  <div class="tiles-title">
                    Services
                  </div>  
                  <div class="heading">
                            <i class="fa fa-cube" aria-hidden="true"></i>&nbsp;
                      <span id="" class="animate-number" data-value="0" data-animation-duration="1200">0</span>
                                  
                  </div>      
                  </div>  
                    <div style="display:block; padding: 12px 18px 12px 24px; background-color: rgba(0, 0, 0, 0.28);"><a href="List_service_user.html" class="text-white mini-description "><i class="fa fa-search" aria-hidden="true"></i>&nbsp;Click here to view detail</a></div>
                    </div>
              </div>
              <div class="col-md-4 col-sm-6 spacing-bottom">
                <div id="ePermit" class="tiles red added-margin">
                <div class="tiles-body">
                  <div class="controller">                
                    <a onclick="javascript:Notifications();" href="javascript:;" class="reloadData"></a>
                    <a href="javascript:;" class="remove"></a>    
                  </div>    
                  <div class="tiles-title">
                    Invoices
                  </div>  
                  <div class="heading">
                            <i class="fa fa-file-text" aria-hidden="true"></i>&nbsp;
                      <span id="" class="animate-number" data-value="0" data-animation-duration="1200">0</span>
                                  
                  </div>      
                  </div>  
                    <div style="display:block; padding: 12px 18px 12px 24px; background-color: rgba(0, 0, 0, 0.28);"><a  href="List_invoice_user.html" class="text-white mini-description "><i class="fa fa-search" aria-hidden="true"></i>&nbsp;Click here to view detail</a></div>
             
                </div>
                
              </div> 
            </div>  

            <!-- Modal dialog Loading-->
            <div class="modal fade " id="myModal" aria-hidden="true" style="z-index:9999999999999">
                <div class="modal-dialog" style="z-index:9999999999999">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h3 class="modal-title" id="myModalLabel">
                                Processing...</h3>
                        </div>
                        <div class="modal-body" style="text-align:center;">
                            <div class="progress progress-striped active progress-large">
                                <div data-percentage="0%" style="width: 100%;" class="progress-bar progress-bar-success"></div>
                            </div>
                        </div>
                    </div>
                    <!-- /.modal-content -->
                </div>
            </div>
            <!-- /.modal dialog Loading -->

            <!-- END PAGE -->
        </div>
    </div>

@endsection