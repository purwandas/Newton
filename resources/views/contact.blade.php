<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" name="viewport"/>

    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>

    <!-- Favicons -->
    <link href="{{ asset('img/logo2nd.png') }}" rel="shortcut icon" type="image/x-icon"/>

    <title>
        Home &#45; Newton Cipta Informatika
    </title>


    <!-- Fonts and icons -->
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons"/>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css"/>


    <link rel="stylesheet" href="{{ asset('css/assets/css/material-kit.css') }}">

</head>
<body>
    <nav class="navbar navbar-transparent navbar-absolute navbar-expand-lg">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-translate">
                <a class="navbar-brand" href="#">Newton Cipta Informatika</a>
                <button type="button" class="ml-auto navbar-toggler" data-toggle="collapse" data-target="#navigation-example3">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="navbar-toggler-icon"></span>
                    <span class="navbar-toggler-icon"></span>
                    <span class="navbar-toggler-icon"></span>
                </button>
            </div>

            <div class="collapse navbar-collapse" id="navigation-example3">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a href="{{ url('/') }}" class="nav-link">
                            Home
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ url('product') }}" class="nav-link">
                            Products
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ url('contact') }}" class="nav-link">
                            Contact Us
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ url('login') }}" class="btn btn-info btn-round">
                            <i class="material-icons">lock_open</i> Sign In
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="page-header header-filter header-small" data-parallax="true" style="background-image: url(&{{ asset('assets/img/bg2.jpg') }}&apos;);">
    <div class="container">
        <div class="row">
            <div class="col-md-8 ml-auto mr-auto text-center">
                <h1 class="title">Let&apos;s get started</h1>
                <h4>To get started, you will need to choose a plan for your needs. You can opt in for the monthly of annual options and go with one fo the three listed below.</h4>
            </div>
        </div>
    </div>
</div>

                <div class="main main-raised">
                    <div class="contact-content">
                        <div class="container">
                            <h2 class="title">Send us a message</h2>
                            @if (!empty($data))
                                <p class="alert alert-success">Your Message has been Sent!</p>
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
                            <div class="row">
                                <div class="col-md-6">
                                    <p class="description">
                                        You can contact us with anything related to our Products. We&apos;ll get in touch with you as soon as possible.<br><br>
                                    </p>
                                    <form role="form" id="contact-form" method="post" action="{{ url('contact') }}">
                                        {{ csrf_field() }}
                                        <div class="form-group">
                                            <label for="name" class="bmd-label-floating">Your name</label>
                                            <input type="text" class="form-control" name="name" id="name">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmails" class="bmd-label-floating">Email address</label>
                                            <input type="email" class="form-control" name="email" id="exampleInputEmails">
                                            <span class="bmd-help">We'll never share your email with anyone else.</span>
                                        </div>
                                        <div class="form-group">
                                            <label for="phone" class="bmd-label-floating">Phone</label>
                                            <input type="text" class="form-control" id="phone" name="phone">
                                        </div>
                                        <div class="form-group label-floating">
                                            <label class="form-control-label bmd-label-floating" for="message"> Your message</label>
                                            <textarea class="form-control" rows="6" name="message" id="message"></textarea>
                                        </div>
                                        <div class="submit text-center">
                                            <input type="submit" class="btn btn-info btn-raised btn-round" value="Contact Us">
                                        </div>
                                    </form>
                                </div>
                                <div class="col-md-4 ml-auto">
                                    <div class="info info-horizontal">
                                        <div class="icon icon-primary">
                                            <i class="material-icons">pin_drop</i>
                                        </div>
                                        <div class="description">
                                            <h4 class="info-title">Find us at the office</h4>
                                            <p>
                                                Bld Mihail Kogalniceanu, nr. 8,<br>
                                                7652 Bucharest,<br>
                                                Romania
                                            </p>
                                        </div>
                                    </div>
                                    <div class="info info-horizontal">
                                        <div class="icon icon-primary">
                                            <i class="material-icons">phone</i>
                                        </div>
                                        <div class="description">
                                            <h4 class="info-title">Give us a ring</h4>
                                            <p>
                                                Michael Jordan<br>
                                                +40 762 321 762<br>
                                                Mon - Fri, 8:00-22:00
                                            </p>
                                        </div>
                                    </div>
                                    <div class="info info-horizontal">
                                        <div class="icon icon-primary">
                                            <i class="material-icons">business_center</i>
                                        </div>
                                        <div class="description">
                                            <h4 class="info-title">Legal Information</h4>
                                            <p>
                                                PT. Newton Cipta Informatika<br>
                                                VAT &#xB7; EN2341241<br>
                                                IBAN &#xB7; EN8732ENGB2300099123<br>
                                                Bank &#xB7; Ind.
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
          
    <footer class="footer ">
    
        <div class="container">
            <nav class="pull-left">
                <ul>
                    <li>
                        <a href="#">
                            Abous Us
                        </a>
                    </li>
                </ul>
            </nav>
            <div class="copyright pull-right">
                Copyright &#xA9; <script>document.write(new Date().getFullYear())</script> PT. Newton Cipta Teknologi.
            </div>
        </div>
    </footer>


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
