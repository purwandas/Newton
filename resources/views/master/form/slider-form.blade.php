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
                        <h4>Form<span class="semi-bold"> Slider </span></h4>
                        <div class="tools">
                            <a href="javascript:;" class="collapse"></a>
                        </div>
                    </div>
                    <div class="grid-body no-border">
                        <br>
                        <div class="row">
                            <form class="form-horizontal" id="formGlasses" name="formGlasses" action="{{ url('slider', @$data->id) }}" method="post" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                @if (!empty($data))
                                  {{ method_field('PATCH') }}
                                @endif
                                
                                @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                                <div class="form-group" id="groupBenefit">
                                    <label class="col-sm-3 col-md-3 control-label">
                                        Title :
                                    </label>
                                    <div class="col-sm-7 col-md-7">
                                        <input type="text" name="judul" id="title" class="form-control" required placeholder="Title" value="{{ @$data->judul }}" />
                                    </div>
                                </div>
                                <div class="form-group" id="groupBenefit">
                                    <label class="col-sm-3 col-md-3 control-label">
                                        Description :
                                    </label>
                                    <div class="col-sm-7 col-md-7">
                                        <input type="text" name="deskripsi" id="description" class="form-control" required placeholder="Description" value="{{ @$data->deskripsi }}" />
                                    </div>
                                </div>

                                <!-- View for old image * PHOTO * -->
                @if (!empty($data))                         
                    <div class="form-group">
                        <label class="col-sm-3 col-md-3 control-label">Image</label>
                        <div class="col-sm-7 col-md-7">                          
                            <img width="90px" height="90px" src="{{ @$data->gambar }}" onError="this.onerror=null;this.src='{{ asset('image/missing.png') }}';">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 col-md-3 control-label">Image URL</label>
                        <div class="col-sm-7 col-md-7">                          
                            <input type="text" class="form-control" value="{{ @$data->gambar }}" disabled="disabled" />
                        </div>
                    </div>
                @endif
                                <div class="form-group" id="groupBenefit">
                                    <label class="col-sm-3 col-md-3 control-label">
                                        {{ (!empty($data)) ? 'New ' : ' ' }}Image :
                                    </label>
                                    <div class="col-sm-7 col-md-7">
                                        <input type="file" accept=".jpg,.jpeg,.png,.gif,.svg" name="image" id="image" class="form-control" 
                                        @if (empty($data)) required @endif placeholder="Image"/>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-sm-2 col-md-2 col-sm-offset-3 col-md-offset-3" style="margin-bottom: 10px;">
                                        <input type="submit" name="Submit" id="Submit" value="Submit" class="btn btn-primary form-control "/>
                                    </div>
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

    <script type="text/javascript">
        
        $(document).ready(function () {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
        });
    </script>

        <!-- END PAGE -->
    </div>
</div>

@endsection