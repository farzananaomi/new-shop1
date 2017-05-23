<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8" />

    <link rel="apple-touch-icon" sizes="57x57" href="{{ asset('img/fbcci.jpg') }}">
    <link rel="apple-touch-icon" sizes="60x60" href="{{ asset('img/fbcci.jpg') }}">
    <link rel="apple-touch-icon" sizes="72x72" href="{{ asset('img/fbcci.jpg') }}">
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('img/fbcci.jpg') }}">
    <link rel="apple-touch-icon" sizes="114x114" href="{{ asset('img/fbcci.jpg') }}">
    <link rel="apple-touch-icon" sizes="120x120" href="{{ asset('img/fbcci.jpg') }}">
    <link rel="apple-touch-icon" sizes="144x144" href="{{ asset('img/fbcci.jpg') }}">
    <link rel="apple-touch-icon" sizes="152x152" href="{{ asset('img/fbcci.jpg') }}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('img/fbcci.jpg') }}">
    <link rel="icon" type="image/png" sizes="192x192" href="{{ asset('img/fbcci.jpg') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('img/fbcci.jpg') }}">
    <link rel="icon" type="image/png" sizes="96x96" href="{{ asset('img/fbcci.jpg') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('img/fbcci.jpg') }}">
    <link rel="manifest" href="{{ asset('img/favicon/manifest.json') }}">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">

    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

    <title>Company Name</title>

    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />

    {{-- Bootstrap core CSS     --}}
    <link href={{ asset('theme/css/bootstrap.min.css') }} rel="stylesheet" />

    {{--  Light Bootstrap Dashboard core CSS    --}}
    <link href={{ asset('theme/css/light-bootstrap-dashboard.css') }} rel="stylesheet"/>

    {{--  CSS for Demo Purpose, don't include it in your project     --}}
    <link href={{ asset('theme/css/demo.css') }} rel="stylesheet" />


    {{--     Fonts and icons     --}}
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>
    <link href={{ asset('theme/css/pe-icon-7-stroke.css') }} rel="stylesheet" />

    <style>
        .footer .copyright {
            margin-top: 0;
            margin-bottom: 0;
        }
        .singularity-credit-logo {
            width: 300px;
        }

        .batb-logo {
            height: 70px;
            margin-top: -25px;
        }
    </style>
</head>
<body>

<nav class="navbar navbar-transparent navbar-absolute">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation-example-2">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">
            </a>
        </div>
        <div class="collapse navbar-collapse">

            <ul class="nav navbar-nav navbar-right">

            </ul>
        </div>
    </div>
</nav>


<div class="wrapper wrapper-full-page">
    <div class="full-page login-page" data-color="red" data-image="{{ asset('theme/img/background.jpg') }}">

        <!--   you can change the color of the filter page using: data-color="blue | azure | green | orange | red | purple" -->
        <div class="content">
            <div class="container">
                <div class="row">
                    <div class="col-md-4 col-sm-6 col-md-offset-4 col-sm-offset-3">
                        <form method="POST" action="{{ route('auth.check') }}">
                            {!! csrf_field() !!}
                            <!--   if you want to have the card without animation please remove the ".card-hidden" class   -->
                            <div class="card card-hidden">
                                <div class="header text-center" style="padding-bottom: 5px;">
                                    <img src="{{ asset('img/blog.png') }}" alt="Harmony - Easy EHS" style="height: 40px;margin-right: 10px;">
                                    <span style="font-size: 28px;">Company Name</span>
                                </div>
                                <div class="content">
                                    <div class="form-group">
                                        <label>Username</label>
                                        <input type="text" name="name" placeholder="name" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label>Password</label>
                                        <input type="password" name="password" placeholder="password" class="form-control">
                                    </div>
                                </div>
                                <div class="footer text-center">
                                    <button type="submit" class="btn btn-fill btn-danger btn-wd">Login</button>
                                </div>
                            </div>

                        </form>

                    </div>
                </div>
            </div>
        </div>

        <footer class="footer footer-transparent">
            <div class="container">
                <p class="copyright pull-left">
                    <a href="http://www.singularitybd.com">
                        <img class="batb-logo" src="{{ asset('img/blog.png') }}"
                             alt="British American Tobacco, Bangladesh">
                    </a>
                </p>
                <p class="copyright pull-right">
                    <a href="http://www.singularitybd.com">
                        <img class="singularity-credit-logo" src="{{ asset('img/singularity-credit-white.png') }}"
                             alt="Singularity Interactive Ltd., Apps &amp; Software">
                    </a>
                </p>
            </div>
        </footer>
    </div>

</div>


</body>

{{--   Core JS Files and PerfectScrollbar library inside jquery.ui   --}}
<script src={{ asset('theme/js/jquery.min.js') }} type="text/javascript"></script>
<script src={{ asset('theme/js/jquery-ui.min.js') }} type="text/javascript"></script>
<script src={{ asset('theme/js/bootstrap.min.js') }} type="text/javascript"></script>


{{--  Forms Validations Plugin --}}
<script src={{ asset('theme/js/jquery.validate.min.js') }}></script>

{{--  Plugin for Date Time Picker and Full Calendar Plugin--}}
<script src={{ asset('theme/js/moment.min.js') }}></script>

{{--  Date Time Picker Plugin is included in this js file --}}
<script src={{ asset('theme/js/bootstrap-datetimepicker.js') }}></script>

{{--  Select Picker Plugin --}}
<script src={{ asset('theme/js/bootstrap-selectpicker.js') }}></script>

{{--  Checkbox, Radio, Switch and Tags Input Plugins --}}
<script src={{ asset('theme/js/bootstrap-checkbox-radio-switch-tags.js') }}></script>

{{--  Charts Plugin --}}
<script src={{ asset('theme/js/chartist.min.js') }}></script>

{{--  Notifications Plugin    --}}
<script src={{ asset('theme/js/bootstrap-notify.js') }}></script>

{{-- Sweet Alert 2 plugin --}}
<script src={{ asset('theme/js/sweetalert2.js') }}></script>

{{-- Vector Map plugin --}}
<script src={{ asset('theme/js/jquery-jvectormap.js') }}></script>

{{--  Google Maps Plugin    --}}
<script src="https://maps.googleapis.com/maps/api/js"></script>

{{-- Wizard Plugin    --}}
<script src={{ asset('theme/js/jquery.bootstrap.wizard.min.js') }}></script>

{{--  bootstrap Table Plugin    --}}
<script src={{ asset('theme/js/bootstrap-table.js') }}></script>

{{--  Plugin for DataTables.net  --}}
<script src={{ asset('theme/js/jquery.datatables.js') }}></script>


{{--  Full Calendar Plugin    --}}
<script src={{ asset('theme/js/fullcalendar.min.js') }}></script>

{{-- Light Bootstrap Dashboard Core javascript and methods --}}
<script src={{ asset('theme/js/light-bootstrap-dashboard.js') }}></script>


<!-- Light Bootstrap Dashboard DEMO methods, don't include it in your project! -->
{{--<script src="../../assets/js/demo.js"></script>--}}

<script type="text/javascript">
    $().ready(function(){
        lbd.checkFullPageBackgroundImage();

        setTimeout(function(){
            // after 1000 ms we add the class animated to the login/register card
            $('.card').removeClass('card-hidden');
        }, 700)
    });
</script>

</html>