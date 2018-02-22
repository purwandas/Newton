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

<div class="page-header header-filter header-small" data-parallax="true" style="background-image: url(&apos;{{ asset('assets/img/bg2.jpg') }}&apos;);">
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
    <div class="container">
        <div class="pricing-2">
            <div class="row">
                <div class="col-md-6 ml-auto mr-auto text-center">
                    <ul class="nav nav-pills nav-pills-rose">
                        <li class="nav-item">
                            <a class="nav-link active" href="#pill1" data-toggle="tab">Monthly</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#pill2" data-toggle="tab">Yearly</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="row">

                <div class="col-md-4">
                    <div class="card card-pricing card-plain">
                        <div class="card-body">
                            <h6 class="card-category text-info">Free</h6>
                            <h1 class="card-title"><small>$</small>0<small>/mo</small>
                            </h1>
                            <ul>
                                <li><b>1</b> Project</li>
                                <li><b>5</b> Team Members</li>
                                <li><b>55</b> Personal Contacts</li>
                                <li><b>5.000</b> Messages</li>
                            </ul>
                            <a href="#pablo" class="btn btn-rose btn-raised btn-round">
                                Get Started
                            </a>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card card-pricing card-raised bg-rose">
                        <div class="card-body">
                            <h6 class="card-category text-info">Premium</h6>
                            <h1 class="card-title"><small>$</small>89<small>/mo</small>
                            </h1>
                            <ul>
                                <li><b>500</b> Projects</li>
                                <li><b>50</b> Team Members</li>
                                <li><b>125</b> Personal Contacts</li>
                                <li><b>15.000</b> Messages</li>
                            </ul>
                            <a href="#pablo" class="btn btn-white btn-raised btn-round">
                                Get Started
                            </a>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card card-pricing card-plain">
                        <div class="card-body">
                            <h6 class="card-category text-info">Platinum</h6>
                            <h1 class="card-title"><small>$</small>199<small>/mo</small>
                            </h1>
                            <ul>
                                <li><b>1000</b> Projects</li>
                                <li><b>100</b> Team Members</li>
                                <li><b>550</b> Personal Contacts</li>
                                <li><b>50.000</b> Messages</li>
                            </ul>
                            <a href="#pablo" class="btn btn-rose btn-raised btn-round">
                                Get Started
                            </a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <hr>
        <div class="features-2">
            <div class="text-center">
                <h3 class="title">Frequently Asked Questions</h3>
            </div>
            <div class="row">
                <div class="col-md-4 ml-auto">
                    <div class="info info-horizontal">
                        <div class="icon icon-info">
                            <i class="material-icons">card_membership</i>
                        </div>
                        <div class="description">
                            <h4 class="info-title">Can I cancel my subscription?</h4>
                            <p>Yes, you can cancel and perform other actions on your subscriptions via the My Account page. </p>
                        </div>
                    </div>

                </div>

                <div class="col-md-4 mr-auto">
                    <div class="info info-horizontal">
                        <div class="icon icon-success">
                            <i class="material-icons">card_giftcard</i>
                        </div>
                        <div class="description">
                            <h4 class="info-title">Is there any discount for an annual subscription?</h4>
                            <p>Yes, we offer a 40% discount if you choose annual subscription for any plan.</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4 ml-auto">
                    <div class="info info-horizontal">
                        <div class="icon icon-success">
                            <i class="material-icons">attach_money</i>
                        </div>
                        <div class="description">
                            <h4 class="info-title">Which payment methods do you take?</h4>
                            <p>WooCommerce comes bundled with PayPal (for accepting credit card and PayPal account payments), BACS, and cash on delivery for accepting payments. </p>
                        </div>
                    </div>

                </div>

                <div class="col-md-4 mr-auto">
                    <div class="info info-horizontal">
                        <div class="icon icon-rose">
                            <i class="material-icons">question_answer</i>
                        </div>
                        <div class="description">
                            <h4 class="info-title">Any other questions we can answer?</h4>
                            <p>We are happy to help you. Contact us.</p>
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
                            About Us
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
