<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href=" {{ asset('assets/img/apple-icon.png') }} ">
    <link rel="icon" type="image/png" href="{{asset('assets/img/favicon.png')}}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>MUC Ticket</title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet" />
</head>
<body class="">
    <div class="wrapper">
        @dd( assets('assets/css/bootstrap.min.css') );
        <div class="sidebar" data-color="white" data-active-color="danger">
            @include('layouts.logo')

            @include('layouts.menu')
        </div>
        <div class="main-panel" style="height: 100vh;">
            <!-- Navbar -->
            @include('layouts.nav')
            <!-- End Navbar -->
            @yield('contact')
            <div class="footer bg-dark text-white">
                @include('layouts.footer')
            </div>
        </div>
    </div>
<!--   Core JS Files   -->
<script src="{{ asset('assets/js/core/jquery.min.js')}}}"></script>
<script src="{{ asset('assets/js/core/popper.min.js') }}"></script>
<script src="{{ asset('assets/js/core/bootstrap.min.js')}} "></script>
<script src="{{ asset('assets/js/plugins/perfect-scrollbar.jquery.min.js')}}"></script>
<!--  Google Maps Plugin    -->
<script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
    <!-- Chart JS -->
<script src="{{ asset('assets/js/plugins/chartjs.min.js') }}"></script>
<!--  Notifications Plugin    -->
<script src="{{ asset('assets/js/plugins/bootstrap-notify.js')}}"></script>
<!-- Control Center for Now Ui Dashboard: parallax effects, scripts for the example pages etc -->
<script src="{{ asset('assets/js/paper-dashboard.min.js?v=2.0.1')}}" type="text/javascript"></script>
@yield('js')
</body>
</html>