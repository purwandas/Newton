<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
    <meta charset="utf-8" />
    <title>Admin</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <meta content="" name="description" />
    <meta content="" name="author" />
    <link href="{{ asset('img/logo2nd.png') }}" rel="shortcut icon" type="image/x-icon"/>

    <title> ADMIN </title>
    <link href="#" rel="shortcut icon" type="image/x-icon" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <link href="{{ asset('css/login/style.css') }}" rel="stylesheet">
    <script src="{{ asset('css/login/modernizr.js') }}"></script>
    <link href="http://fonts.googleapis.com/css?family=Roboto:400,300" rel="stylesheet"type="text/css">
</head>
<body class="eternity-form scroll-animations-activated">

    <section class="SectionForm" id="demo1" data-panel="first">

        <div class=" container">

            <div class="login-form-section">
                <div class="login-content  animated bounceIn" data-animation="bounceIn">
                    @yield('content')
                </div>
            </div>
        </div>
    </section>

    <script type="text/javascript" src="{{ asset('css/login/jquery-1.9.1.js') }}"></script>
    <script type="text/javascript" src="{{ asset('css/login/bootstrap.js') }}"></script>
    <script type="text/javascript" src="{{ asset('css/login/respond.src.js') }}"></script>
    <script type="text/javascript" src="{{ asset('css/login/jquery.icheck.js') }}"></script>
    <script type="text/javascript" src="{{ asset('css/login/placeholders.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('css/login/waypoints.min.js') }}"></script>
    <script type="text/javascript">
        $(function () {
            $(".form-control").focus(function () {
                $(this).closest(".textbox-wrap").addClass("focused");
            }).blur(function () {
                $(this).closest(".textbox-wrap").removeClass("focused");
            });

            $("#email").focus(); 
        });
    </script>
</body>
</html>