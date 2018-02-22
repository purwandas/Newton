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

        <!-- BEGIN FORM -->
        <div class="row" style="margin-top: 15px;">
            <div class="col-md-12 col-md-12">
                <div class="col-md-12 col-md-12">
                    <div class="grid simple">
                        <div class="grid-title no-border">
                            <h4>Order<span class="semi-bold"> Confirmation </span></h4>
                        </div>
                        <div class="grid-body no-border">
                        <br>
                            <div class="row">
                                <form class="form-horizontal" id="formGlasses" name="formGlasses" action="" method="post">
                                    <div class="form-group">
                                        <label class="col-md-9 col-md-10 control-label">
                                            Thank you for your order. You will receive a confirmation email shortly. <br />
                                        </label>
                                        <label class="col-md-8 col-md-8 control-label">
                                            <span class="semi-bold">Your Order Number is: {{ @$order_number }} <br /></span>
                                        </label>
                                        <label class="col-md-11 col-md-11 control-label">
                                            If you have any questions about your order, please open a support ticket from your client area and quote your order number. <br />
                                        </label>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-10 col-md-10 control-label">
                                            <div style="color: red">
                                                Attention! Your order has been completed but you have not yet paid for it so it will not be activated. <br />
                                            </div>
                                        </label>
                                        <label class="col-md-9 col-md-9 control-label">
                                            <div style="color: red">
                                                Click on the link below to go to your invoice to make payment. <br />
                                            </div>
                                        </label>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-7 col-md-7 control-label">
                                            <!-- Nanti di looping, kirim invoicenya aja -->
                                            @foreach($invoice as $value)
                                            <a  style="color: blue" href="{{ @$value->file }}">Invoice {{ @$value->number }}</a><br />
                                            @endforeach
                                        </label>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END FORM -->

        <style>
            /*Form-Button CSS*/
            .btn-primary { background-color: #26A69A; }

            .left-side { float: left; }
        </style>
            <!-- END PAGE -->
        </div>
    </div>
@endsection