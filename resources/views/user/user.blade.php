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
                            <h4>Form<span class="semi-bold"> User Profile </span></h4>
                            <div class="tools">
                                <a href="javascript:;" class="collapse"></a>
                            </div>
                        </div>
                        <div class="grid-body no-border">
                            <br>
                            <div class="row">
                                <div style="display: none;">
                                    @if (!empty($data))
                                      {{ @$update = '1' }}
                                    @endif
                                </div>
                                <form class="form-horizontal" id="formGlasses" name="formGlasses" action="{{ url('user-profile-update', @$data->id) }}" method="post">
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
                                    <div class="form-group">
                                        <label class="col-sm-3 col-md-3 control-label">
                                            Nama Depan :
                                        </label>
                                        <div class="col-sm-7 col-md-7">
                                            <input type="text" name="name" id="name" class="form-control" value="{{ @$data->name }}"/>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-3 col-md-3 control-label">
                                            Nama Belakang :
                                        </label>
                                        <div class="col-sm-7 col-md-7">
                                            <input type="text" name="lastname" id="lastname" class="form-control" value="{{ @$data->lastname }}"/>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-3 col-md-3 control-label">
                                            Alamat Email :
                                        </label>
                                        <div class="col-sm-7 col-md-7">
                                            <input type="email" name="email" id="email" class="form-control" value="{{ @$data->email }}"/>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-3 col-md-3 control-label">
                                            Nomor Telephone :
                                        </label>
                                        <div class="col-sm-7 col-md-7">
                                            <input type="text" name="phone" id="phone" class="form-control" value="{{ @$data->phone }}"/>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-3 col-md-3 control-label">
                                            Nama Perusahaan :
                                        </label>
                                        <div class="col-sm-7 col-md-7">
                                            <input type="text" name="company" id="company" class="form-control" value="{{ @$data->company }}"/>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-3 col-md-3 control-label">
                                            Alamat :
                                        </label>
                                        <div class="col-sm-7 col-md-7">
                                            <input type="text" name="address" id="address" class="form-control" value="{{ @$data->address }}"/>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-3 col-md-3 control-label">
                                            Kota :
                                        </label>
                                        <div class="col-sm-7 col-md-7">
                                            <input type="text" name="city" id="city" class="form-control" value="{{ @$data->city }}"/>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-3 col-md-3 control-label">
                                            Kode Pos :
                                        </label>
                                        <div class="col-sm-7 col-md-7">
                                            <input type="text" name="postcode" id="postcode" class="form-control" value="{{ @$data->postcode }}"/>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-3 col-md-3 control-label">
                                            Provinsi :
                                        </label>
                                        <div class="col-sm-7 col-md-7">
                                            <input type="text" name="state" id="state" class="form-control" value="{{ @$data->state }}"/>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-3 col-md-3 control-label">
                                            Negara :
                                        </label>
                                        <div class="col-sm-7 col-md-7">
                                            <input type="text" name="country" id="country" class="form-control" value="{{ @$data->country }}"/>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-3 col-md-3 control-label">
                                            Password :
                                        </label>
                                        <div class="col-sm-7 col-md-7">
                                            <input type="password" name="password" id="password" class="form-control required"/>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-3 col-md-3 control-label">
                                            Ulang Password :
                                        </label>
                                        <div class="col-sm-7 col-md-7">
                                            <input type="password" name="password_confirmation" id="password-confirm" class="form-control required"/>
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
            function limit(element)
            {
                var max_chars = 2;

                if(element.value.length > max_chars) {
                    element.value = element.value.substr(0, max_chars);
                }
            }
        </script>

            <!-- END PAGE -->
        </div>
    </div>

@endsection