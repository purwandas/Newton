<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" name="viewport"/>

    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>

    <!-- Favicons -->
    <link href="{{ asset('img/logo2nd.png') }}" rel="shortcut icon" type="image/x-icon"/>

    <title>
        Register &#45; Newton Cipta Informatika
    </title>


    <!-- Fonts and icons -->
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons"/>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css"/>


    <link rel="stylesheet" href="{{ asset('css/assets/css/material-kit.css') }}">

</head>
<body class="login-page ">
<nav class="navbar navbar-transparent fixed-top  navbar-expand-lg " color-on-scroll="100" id="sectionsNav">

    <div class="container">
        <div class="navbar-translate">
            <a class="navbar-brand" href="{{ url('/') }}">Newton Cipta Informatika </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                <span class="navbar-toggler-icon"></span>
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>

        <div class="collapse navbar-collapse">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a href="{{ url('login') }}" class="nav-link">
                        <i class="material-icons">https</i> Login
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>


<div class="page-header header-filter" style="background-image: url(&apos;{{ asset('img/background.jpg') }}&apos;); background-size: cover; background-position: top center;">
    <div class="container">
        <div class="row">
            <div class="col-md-10 ml-auto mr-auto">
                <div class="card card-signup">
                    <h2 class="card-title text-center">Register</h2>
                    <div class="card-body">
                        <form method="POST" action="{{ route('register') }}">
                            {{ csrf_field() }}
                            <div class="row">
                                @if ($errors->has('name'))
                                    <span class="alert alert-danger col-md-12">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                                @if ($errors->has('email'))
                                    <span class="alert alert-danger col-md-12">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                                @if ($errors->has('password'))
                                    <span class="alert alert-danger col-md-12">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                                <div class="col-md-5 ml-auto">
                                    <div class="form-group">
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="material-icons">face</i>
                                            </span>
                                            <input type="text" required="required" class="form-control {{ $errors->has('name') ? ' has-error' : '' }}" name="name" placeholder="Nama Depan ...">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="material-icons">email</i>
                                            </span>
                                            <input type="email" required="required" class="form-control {{ $errors->has('email') ? ' has-error' : '' }}" name="email" placeholder="Alamat Email ...">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-5 mr-auto">
                                    <div class="form-group">
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="material-icons">face</i>
                                            </span>
                                            <input type="text" required="required" class="form-control {{ $errors->has('lastname') ? ' has-error' : '' }}" name="lastname" placeholder="Nama Belakang ...">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="material-icons">phone</i>
                                            </span>
                                            <input type="number" required="required" class="form-control {{ $errors->has('phone') ? ' has-error' : '' }}" name="phone" placeholder="Nomor Telepon ...">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-10 mr-auto ml-auto">
                                    <div class="form-group">
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="material-icons">business</i>
                                            </span>
                                            <input type="text" class="form-control {{ $errors->has('company') ? ' has-error' : '' }}" name="company" placeholder="Nama Perusahaan (Optional) ...">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="material-icons">place</i>
                                            </span>
                                            <textarea type="text" required="required" class="form-control {{ $errors->has('address') ? ' has-error' : '' }}" name="address" placeholder="Alamat ..."></textarea>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-5 ml-auto">
                                    <div class="form-group">
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="material-icons">location_city</i>
                                            </span>
                                            <input type="text" required="required" class="form-control {{ $errors->has('city') ? ' has-error' : '' }}" name="city" placeholder="Kota ...">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="material-icons">flag</i>
                                            </span>
                                            <input type="text" required="required" class="form-control {{ $errors->has('state') ? ' has-error' : '' }}" name="state" placeholder="Provinsi ...">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-5 mr-auto">
                                    <div class="form-group">
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="material-icons">mail_outline</i>
                                            </span>
                                            <input type="text" required="required" class="form-control {{ $errors->has('postcode') ? ' has-error' : '' }}" name="postcode" placeholder="Kode Pos ...">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="material-icons">public</i>
                                            </span>
                                            <input type="text" required="required" class="form-control {{ $errors->has('country') ? ' has-error' : '' }}" name="country" placeholder="Indonesia ...">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-5 ml-auto">
                                    <div class="form-group">
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="material-icons">lock_outline</i>
                                            </span>
                                            <input type="password" required="required" class="form-control {{ $errors->has('password') ? ' has-error' : '' }}" name="password" placeholder="Password ...">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-5 mr-auto">
                                    <div class="form-group">
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="material-icons">lock_outline</i>
                                            </span>
                                            <input  id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="Ulang Password ...">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="footer text-center">
                                <button type="submit" class="btn btn-primary btn-link btn-wd btn-lg">Register</button> 
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <footer class="footer">
        <div class="container">
            <nav class="float-left">
                <ul>
                    <li>
                        <a href="{{ url('product') }}">
                            Our Product
                        </a>
                    </li>
                    <li>
                        <a href="{{ url('contact') }}">
                            Contact Us
                        </a>
                    </li>
                </ul>
            </nav>
            <div class="copyright float-right">
                &#xA9; <script>document.write(new Date().getFullYear())</script>, Created by <a href="">Newton Cipta Informatika</a>
            </div>
        </div>
    </footer>

</div>


<!-- Core JS Files -->
<script src="{{ asset('css/assets/js/jquery.min.js') }}"></script>
<script src="{{ asset('css/assets/js/popper.min.js') }}"></script>


<script src="{{ asset('css/assets/js/bootstrap-material-design.min.js') }}"></script>

<!-- Plugin for Date Time Picker and Full Calendar Plugin -->
<script src="{{ asset('css/assets/js/moment.min.js') }}"></script>

<!-- Plugin for the Datepicker, full documentation here: https://github.com/Eonasdan/bootstrap-datetimepicker -->
<script src="{{ asset('css/assets/js/bootstrap-datetimepicker.min.js') }}"></script>

<!-- Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
<script src="{{ asset('css/assets/js/nouislider.min.js') }}"></script>


<!-- Plugin for Select, full documentation here: http://silviomoreto.github.io/bootstrap-select -->
<script src="{{ asset('css/assets/js/bootstrap-selectpicker.js') }}"></script>

<!-- Plugin for Tags, full documentation here: http://xoxco.com/projects/code/tagsinput/ -->
<script src="{{ asset('css/assets/js/bootstrap-tagsinput.js') }}"></script>

<!-- Plugin for Fileupload, full documentation here: http://www.jasny.net/bootstrap/javascript/#fileinput -->
<script src="{{ asset('css/assets/js/jasny-bootstrap.min.js') }}"></script>

<!-- Plugin for Small Gallery in Product Page -->
<script src="{{ asset('css/assets/js/jquery.flexisel.js') }}"></script>

<!-- Plugins for presentation and navigation -->
<script src="{{ asset('css/assets/js/modernizr.js') }}"></script>
<script src="{{ asset('css/assets/js/vertical-nav.js') }}"></script>


<!-- Material Kit Core initialisations of plugins and Bootstrap Material Design Library -->

<script src="{{ asset('css/assets/js/material-kit.js') }}"></script>
<!-- Sharrre libray -->
<script src="{{ asset('css/assets/js/jquery.sharrre.js') }}"></script>
</body>

</html>