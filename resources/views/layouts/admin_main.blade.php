<!DOCTYPE HTML>
<html>
<head>
    <title>Admin</title>
    <meta http-equiv="content-type" content="text/html; charset=utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="shortcut icon" href="{{ asset('favicon.ico') }}">

    <script src="{{ asset('assets/js/app.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.dropotron.min.js') }}"></script>
    <script src="{{ asset('assets/js/util.js') }}"></script>

    <script src="https://code.jquery.com/jquery-3.2.1.min.js"
            integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
            crossorigin="anonymous"></script>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
          integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"
            integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa"
            crossorigin="anonymous"></script>

    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet"/>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>

    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.0.3/dist/leaflet.css"/>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.0.3/leaflet.js"></script>

    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.13/css/jquery.dataTables.min.css">
    <script src="https://cdn.datatables.net/1.10.13/js/jquery.dataTables.min.js"></script>

    <link rel="stylesheet" href="{{ asset('assets/css/admin.css') }}"/>
    <link rel="stylesheet" href="{{ asset('assets/css/operator.css') }}">
    <script src="{{ asset('assets/js/operator.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('assets/css/admin.css') }}"/>
    <!-- Bootstrap -->
    <link rel="stylesheet" href="{{ asset('gentelella_m/vendors/bootstrap/dist/css/bootstrap.min.css') }}"/>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('gentelella_m/vendors/font-awesome/css/font-awesome.min.css') }}"/>
    <!-- NProgress -->
    <link rel="stylesheet" href="{{ asset('gentelella_m/vendors/nprogress/nprogress.css') }}"/>
    <!-- iCheck -->
    <link rel="stylesheet" href="{{ asset('gentelella_m/vendors/iCheck/skins/flat/green.css') }}"/>
    <!-- bootstrap-progressbar -->
    <link rel="stylesheet"
          href="{{ asset('gentelella_m/vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css') }}"/>
    <!-- JQVMap -->
    <link rel="stylesheet" href="{{ asset('gentelella_m/vendors/jqvmap/dist/jqvmap.min.css') }}"/>
    <!-- bootstrap-daterangepicker -->
    <link rel="stylesheet" href="{{ asset('gentelella_m/vendors/bootstrap-daterangepicker/daterangepicker.css') }}"/>
    <!-- Custom Theme Style -->
    <link rel="stylesheet" href="{{ asset('gentelella_m/build/css/custom.css') }}"/>
</head>
<body class="nav-md" style="background: none;">
<div class="container body">
    <div class="main_container">
        <div class="col-md-3 left_col">
            <div class="left_col scroll-view">
                @include('admin.menu.sidebar_left')
            </div>
        </div>


        <!-- top navigation -->
        <div class="top_nav">
            <div class="nav_menu">
                <nav>
                    <div class="nav toggle" style="padding: 5px">
                        <a id="menu_toggle"><i class="fa fa-bars"></i></a>
                    </div>
                </nav>
                <div class="exit" >
                    <a   class="exit_a"  href="{{ url('/logout') }}"
                           onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="fa fa-clone"></i>Вихід</a>
                        <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>
                </div>
            </div>
        </div>
        <!-- /top navigation -->
        <!-- page content -->
        <div class="right_col" role="main">
            <div class="row">
                @yield('content')
            </div>
        </div>
        <!-- /page content -->
    </div>
</div>
<!-- jQuery -->

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
<script src="{{ asset('gentelella_m/vendors/jquery/dist/jquery.min.js') }}"></script>
<!-- Bootstrap -->
<script src="{{ asset('gentelella_m/vendors/bootstrap/dist/js/bootstrap.min.js') }}"></script>
<!-- FastClick -->
<script src="{{ asset('gentelella_m/vendors/fastclick/lib/fastclick.js') }}"></script>
<!-- NProgress -->
<script src="{{ asset('gentelella_m/vendors/nprogress/nprogress.js') }}"></script>
<!-- Chart.js -->
<script src="{{ asset('gentelella_m/vendors/Chart.js/dist/Chart.min.js') }}"></script>
<!-- gauge.js -->
<script src="{{ asset('gentelella_m/vendors/gauge.js/dist/gauge.min.js') }}"></script>
<!-- bootstrap-progressbar -->
<script src="{{ asset('gentelella_m/vendors/bootstrap-progressbar/bootstrap-progressbar.min.js') }}"></script>
<!-- iCheck -->
<script src="{{ asset('gentelella_m/vendors/iCheck/icheck.min.js') }}"></script>
<!-- Skycons -->
<script src="{{ asset('gentelella_m/vendors/skycons/skycons.js') }}"></script>
<!-- Flot -->
<script src="{{ asset('gentelella_m/vendors/Flot/jquery.flot.js') }}"></script>
<script src="{{ asset('gentelella_m/vendors/Flot/jquery.flot.pie.js') }}"></script>
<script src="{{ asset('gentelella_m/vendors/Flot/jquery.flot.time.js') }}"></script>
<script src="{{ asset('gentelella_m/vendors/Flot/jquery.flot.stack.js') }}"></script>
<script src="{{ asset('gentelella_m/vendors/Flot/jquery.flot.resize.js') }}"></script>
<!-- Flot plugins -->
<script src="{{ asset('gentelella_m/vendors/flot.orderbars/js/jquery.flot.orderBars.js') }}"></script>
<script src="{{ asset('gentelella_m/vendors/flot-spline/js/jquery.flot.spline.min.js') }}"></script>
<script src="{{ asset('gentelella_m/vendors/flot.curvedlines/curvedLines.js') }}"></script>
<!-- DateJS -->
<script src="{{ asset('gentelella_m/vendors/DateJS/build/date.js') }}"></script>
<!-- JQVMap -->
<script src="{{ asset('gentelella_m/vendors/jqvmap/dist/jquery.vmap.js') }}"></script>
<script src="{{ asset('gentelella_m/vendors/jqvmap/dist/maps/jquery.vmap.world.js') }}"></script>
<script src="{{ asset('gentelella_m/vendors/jqvmap/examples/js/jquery.vmap.sampledata.js') }}"></script>
<!-- bootstrap-daterangepicker -->
<script src="{{ asset('gentelella_m/vendors/moment/min/moment.min.js') }}"></script>
<script src="{{ asset('gentelella_m/vendors/bootstrap-daterangepicker/daterangepicker.js') }}"></script>
<!-- Custom Theme Scripts -->
<script src="{{ asset('gentelella_m/build/js/custom.min.js') }}"></script>
</body>
</html>