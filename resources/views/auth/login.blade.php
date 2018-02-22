<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" name="viewport"/>

    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>

    <!-- Favicons -->
    <link href="{{ asset('/img/logo2nd.png') }}" rel="shortcut icon" type="image/x-icon"/>

    <title>
        Login &#45; Newton Cipta Informatika
    </title>


    <!-- Fonts and icons -->
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons"/>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css"/>


    <link rel="stylesheet" href="{{ asset('/css/assets/css/material-kit.css') }}">

</head>
<body class="login-page ">
<nav class="navbar navbar-color-on-scroll navbar-transparent fixed-top navbar-expand-lg " color-on-scroll="100" id="sectionsNav">

    <div class="container">
        <div class="navbar-translate">
            <a class="navbar-brand" href="{{ url('/') }}">Newton Cipta Informatika</a>
        </div>
    </div>
</nav>


<div class="page-header header-filter" style="background-image: url(&apos;{{ asset('/img/background.jpg') }}&apos;); background-size: cover; background-position: top center;">
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-sm-6 ml-auto mr-auto">
                <div class="card card-signup">
                    <form class="form" method="post" action="{{ route('login') }}">
                        {{ csrf_field() }}
                        <div class="card-header card-header-info text-center">
                            <h4 class="card-title">Sign In</h4>
                        </div>
                        <p class="description text-center"></p><br/>
                        <div class="card-body">
                                @if(Session::has('status'))
                                <div class="alert alert-info">
                                  {{ Session::get('status') }}
                                </div>
                                @endif
                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="material-icons">email</i>
                                </span>
                                <input type="email" name="email" value="{{ old('email') }}" class="form-control form-control-success {{ $errors->has('email') ? ' has-error' : '' }}" placeholder="Email..." required="required">
                                
                            </div>

                            <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="material-icons">lock_outline</i>
                                </span>
                                <input type="password" name="password" class="form-control {{ $errors->has('password') ? ' has-error' : '' }}" placeholder="Password..." required="required">
                                
                            </div>

                            <!-- If you want to add a checkbox to this form, uncomment this code

                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" name="optionsCheckboxes" checked>
                                    Subscribe to newsletter
                                </label>
                            </div> -->
                        </div><br/>
                        <div class="footer text-center">
                            <button type="submit" class="btn btn-primary btn-link btn-wd btn-lg">Sign In</button> 
                        </div>

                        <div class="input-group">
                            <label>
                                &nbsp;&nbsp;&nbsp;&nbsp;don't have an account? <a href="{{ route('register') }}">here</a>
                            </label>
                        </div><br/>
                    </form>
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
<script src="{{ asset('/css/assets/js/jquery.min.js') }}"></script>
<script src="{{ asset('/css/assets/js/popper.min.js') }}"></script>


<script src="{{ asset('/css/assets/js/bootstrap-material-design.min.js') }}"></script>

<!-- Plugin for Date Time Picker and Full Calendar Plugin -->
<script src="{{ asset('/css/assets/js/moment.min.js') }}"></script>

<!-- Plugin for the Datepicker, full documentation here: https://github.com/Eonasdan/bootstrap-datetimepicker -->
<script src="{{ asset('/css/assets/js/bootstrap-datetimepicker.min.js') }}"></script>

<!-- Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
<script src="{{ asset('/css/assets/js/nouislider.min.js') }}"></script>


<!-- Plugin for Select, full documentation here: http://silviomoreto.github.io/bootstrap-select -->
<script src="{{ asset('/css/assets/js/bootstrap-selectpicker.js') }}"></script>

<!-- Plugin for Tags, full documentation here: http://xoxco.com/projects/code/tagsinput/ -->
<script src="{{ asset('/css/assets/js/bootstrap-tagsinput.js') }}"></script>

<!-- Plugin for Fileupload, full documentation here: http://www.jasny.net/bootstrap/javascript/#fileinput -->
<script src="{{ asset('/css/assets/js/jasny-bootstrap.min.js') }}"></script>

<!-- Plugin for Small Gallery in Product Page -->
<script src="{{ asset('/css/assets/js/jquery.flexisel.js') }}"></script>

<!-- Plugins for presentation and navigation -->
<script src="{{ asset('/css/assets/js/modernizr.js') }}"></script>
<script src="{{ asset('/css/assets/js/vertical-nav.js') }}"></script>


<!-- Material Kit Core initialisations of plugins and Bootstrap Material Design Library -->

<script src="{{ asset('/css/assets/js/material-kit.js') }}"></script>
<!-- Sharrre libray -->
<script src="{{ asset('/css/assets/js/jquery.sharrre.js') }}"></script>
</body>

</html>
