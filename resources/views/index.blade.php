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
    <!-- Carousel Card -->
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
            @php
            $index = 0
            @endphp
            @foreach($data as $value)
                <div class="carousel-item 
                    @if($index == 0)
                    active
                    @endif
                ">
                    <div class="page-header header-filter" style="background-image: url(&apos;{{ $value->gambar }}&apos;);">

                        <div class="container">
                            <div class="row">
                                <div class="col-md-6 text-left">
                                    <h1 class="title">{{ $value->judul }}</h1>
                                    <h4>{{ $value->deskripsi }}</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @php
                $index++
                @endphp
            @endforeach

        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <i class="material-icons">keyboard_arrow_left</i>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <i class="material-icons">keyboard_arrow_right</i>
            <span class="sr-only">Next</span>
        </a>
    </div>
    <!-- End Carousel Card -->

    <div class="main">
        <div class="section-space"></div>

        <div class="cd-section" id="features">

            <div class="container">

                <!-- ********* FEATURES 1 ********* -->

                <div class="features-1">
                    <div class="row">
                        <div class="col-md-8 ml-auto mr-auto">
                            <h2 class="title">Why our product is the best</h2>
                            <h5 class="description">This is the paragraph where you can write more details about your product. Keep you user engaged by providing meaningful information. Remember that by this time, the user is curious, otherwise he wouldn&apos;t scroll to get here. Add a button if you want the user to see more.</h5>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-4">
                            <div class="info">
                                <div class="icon icon-info">
                                    <i class="material-icons">security</i>
                                </div>
                                <h4 class="info-title">Free Chat</h4>
                                <p>Divide details about your product or agency work into parts. Write a few lines about each one. A paragraph describing a feature will be enough.</p>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="info">
                                <div class="icon icon-success">
                                    <i class="material-icons">verified_user</i>
                                </div>
                                <h4 class="info-title">Verified Users</h4>
                                <p>Divide details about your product or agency work into parts. Write a few lines about each one. A paragraph describing a feature will be enough.</p>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="info">
                                <div class="icon icon-danger">
                                    <i class="material-icons">data_usage</i>
                                </div>
                                <h4 class="info-title">Data</h4>
                                <p>Divide details about your product or agency work into parts. Write a few lines about each one. A paragraph describing a feature will be enough.</p>
                            </div>
                        </div>
                    </div>

                </div>

                <!-- ********* END FEATURES 1 ********* -->

                <!-- ********* FEATURES 4 ********* -->

                <div class="features-4">
                    <div class="row">
                        <div class="col-md-8 ml-auto mr-auto text-center">
                            <h2 class="title">Your life will be much easier</h2>
                            <h5 class="description">This is the paragraph where you can write more details about your product. Keep you user engaged by providing meaningful information.</h5>
                        </div>
                    </div>

                    <div class="row">

                        <div class="col-lg-3 col-md-12 ml-auto">
                            <div class="info info-horizontal">
                                <div class="icon icon-info">
                                    <i class="material-icons">code</i>
                                </div>
                                <div class="description">
                                    <h4 class="info-title">For Developers</h4>
                                    <p>The moment you use Material Kit, you know you&#x2019;ve never felt anything like it. With a single use, this powerfull UI Kit lets you do more than ever before. </p>
                                </div>
                            </div>

                            <div class="info info-horizontal">
                                <div class="icon icon-danger">
                                    <i class="material-icons">format_paint</i>
                                </div>
                                <div class="description">
                                    <h4 class="info-title">For Designers</h4>
                                    <p>Divide details about your product or agency work into parts. Write a few lines about each one. A paragraph describing a feature will be enough.</p>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-12">
                            <div class="phone-container">
                                <img width="260px" height="538px" src="{{ asset('img/others/server.png') }}">
                            </div>
                        </div>

                        <div class="col-lg-3 col-md-12 mr-auto">
                            <div class="info info-horizontal">
                                <div class="icon icon-primary">
                                    <i class="material-icons">dashboard</i>
                                </div>
                                <div class="description">
                                    <h4 class="info-title">Bootstrap Grid</h4>
                                    <p>Divide details about your product or agency work into parts. Write a few lines about each one. A paragraph describing a feature will be enough.</p>
                                </div>
                            </div>

                            <div class="info info-horizontal">
                                <div class="icon icon-success">
                                    <i class="material-icons">view_carousel</i>
                                </div>
                                <div class="description">
                                    <h4 class="info-title">Example Pages Included</h4>
                                    <p>Divide details about your product or agency work into parts. Write a few lines about each one. A paragraph describing a feature will be enough.</p>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

                <!-- ********* END FEATURES 4 ********* -->

                <!-- ********* PROJECTS 2 ********* -->

                <div class="projects-2" id="projects-2">

                    <div class="container">
                        <div class="row">
                            <div class="col-md-8 ml-auto mr-auto text-center">
                                <h6 class="text-muted">Our work</h6>
                                <h2 class="title">Some of Our Awesome Products</h2>
                                <h5 class="description">This is the paragraph where you can write more details about your projects. Keep you user engaged by providing meaningful information.</h5>
                                <div class="section-space"></div>
                            </div>
                        </div>

                        <div class="row">
                            @foreach($paket as $value)
                            <div class="col-md-6">
                                <div class="card card-plain">
                                    <a href="#" target="_blank">
                                        <div class="card-header card-header-image">
                                            <img src="{{ asset('img/others/colocation.jpg') }}">
                                        </div>
                                    </a>
                                    <div class="card-body ">
                                        <a href="#" target="_blank">
                                            <h4 class="card-title">{{ @$value->nama_paket }}</h4>
                                        </a>
                                        <h5 class="card-category">IDR <b>{!! number_format($value->harga) !!}</b></h5>
                                        <p class="card-description">
                                            Server Size: <b>{{ @$value->size_server }}</b><br>
                                            Server (max) Power: <b>{{ @$value->power }}</b><br>
                                            Local (max) Speed: <b>{{ @$value->kecepatan_lokal }}</b><br>
                                            International (max) Speed: <b>{{ @$value->kecepatan_internasional }}</b><br>
                                            IP Public: <b>{{ @$value->ip_public }}</b><br>

                                        </p>

                                    </div>
                                </div>
                            </div>
                            @endforeach

                            

                        </div>

                    </div>
                </div>

                <!-- ********* END PROJECTS 2 ********* -->

                <!-- ********* TESTIMONIALS 3 ********* -->

                <div class="testimonials-3">

                    <div class="container">
                        <div class="row">
                            <div class="col-md-6 ml-auto mr-auto text-center">
                                <h2 class="title">What Clients Say</h2>

                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4">
                                <div class="card card-testimonial card-plain">
                                    <div class="card-avatar">
                                        <a href="#pablo">
                                            <img class="img" src="{{ asset('img/others/default.png') }}">
                                        </a>
                                    </div>
                                    <div class="card-body ">
                                        <h4 class="card-title">Mike Andrew</h4>
                                        <h6 class="card-category text-muted">CEO @ LPSE.</h6>
                                        <h5 class="card-description">
                                            &quot;I speak yell scream directly at the old guard on behalf of the future. I gotta say at that time I&#x2019;d like to meet Kanye I speak yell scream directly at the old guard on behalf of the future.&quot;
                                        </h5>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="card card-testimonial card-plain">
                                    <div class="card-avatar">
                                        <a href="#pablo">
                                            <img class="img" src="{{ asset('img/others/default.png') }}">
                                        </a>
                                    </div>
                                    <div class="card-body">
                                        <h4 class="card-title">Tina Thompson</h4>
                                        <h6 class="card-category text-muted">Marketing @ LPSE.</h6>
                                        <h5 class="card-description">
                                            &quot;I promise I will never let the people down. I want a better life for all!!! Pablo Pablo Pablo Pablo! Thank you Anna for the invite thank you to the whole Vogue team It wasn&#x2019;t any Kanyes I love Rick Owens&#x2019; bed design but the back is too high for the beams and angle of the ceiling&quot;
                                        </h5>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="card card-testimonial card-plain">
                                    <div class="card-avatar">
                                        <a href="#pablo">
                                            <img class="img" src="{{ asset('img/others/default.png') }}">
                                        </a>
                                    </div>
                                    <div class="card-body ">
                                        <h4 class="card-title">Gina West</h4>
                                        <h6 class="card-category text-muted">CFO @ LPSE.</h6>
                                        <h5 class="card-description">
                                            &quot;I&apos;ve been trying to figure out the bed design for the master bedroom at our Hidden Hills compound... Roy&#xE8;re doesn&apos;t make a Polar bear bed but the Polar bear. This is a very nice testimonial about this company.&quot;
                                        </h5>

                                    </div>
                                </div>
                            </div>

                        </div>

                    </div>
                </div>

                <!-- ********* END TESTIMONIALS 3 ********* -->
            </div>
        </div>
    </div>
    <footer class="footer footer-black footer-big">
    <div class="container">

        <div class="content">
            <div class="row">
                <div class="col-md-4">
                    <h5>About Us</h5>
                    <p>That make the web development process faster and easier. </p> <p>We love the web and care deeply for how users interact with a digital product. We power businesses and individuals to create better looking web projects around the world. </p>
                </div>

                <div class="col-md-4">
                    <h5>Social Feed</h5>
                    <div class="social-feed">
                        <div class="feed-line">
                            <i class="fa fa-twitter"></i>
                            <p>How to handle ethical disagreements with your clients.</p>
                        </div>
                        <div class="feed-line">
                            <i class="fa fa-twitter"></i>
                            <p>The tangible benefits of designing at 1x pixel density.</p>
                        </div>
                        <div class="feed-line">
                            <i class="fa fa-facebook-square"></i>
                            <p>A collection of 25 stunning sites that you can use for inspiration.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <hr>

        <div class="copyright float-right">
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
