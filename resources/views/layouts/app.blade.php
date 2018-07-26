<!DOCTYPE HTML>
<!--
	Verti by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
<head>
  <title>CoWorking</title>

  <meta charset="utf-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1"/>
  <!--JQUERY BASE FULL VESION -->
  <script src="https://code.jquery.com/jquery-3.1.0.js"
          integrity="sha256-slogkvB1K3VOkzAI8QITxV3VzpOnkeNVsKvtkYLMjfk="
          crossorigin="anonymous"></script>

  <!--SELECT2 PLUGIN -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet"/>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>

  <!-- UI JQUERY for DataPicker -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.11.3/jquery-ui.min.css" rel="stylesheet"/>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.11.3/jquery-ui.min.js"></script>

  <link rel="stylesheet" href="{{ asset('css/app.css') }}">


{{--<!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->--}}
{{--<link rel="stylesheet" href="{{ asset('assets/css/main.css') }}" />--}}
{{--<!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->--}}

<!--Swiper -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.3.3/css/swiper.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.3.3/css/swiper.min.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.3.3/js/swiper.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.3.3/js/swiper.min.js"></script>


{{--<!---->--}}
{{--<!-- Scripts -->--}}
{{--<script src="{{ asset('assets/js/jquery.min.js') }}"></script>--}}
{{--<script src="{{ asset('assets/js/jquery.mask.js') }}"></script>--}}
{{--<script src="{{ asset('assets/js/jquery.dropotron.min.js') }}"></script>--}}
{{--<script src="{{ asset('assets/js/skel.min.js') }}"></script>--}}
{{--<script src="{{ asset('assets/js/skel-layout.min.js') }}"></script>--}}
{{--<script src="{{ asset('assets/js/util.js') }}"></script>--}}
{{--<!--[if lte IE 8]><script src="assets/js/ie/respond.min.js"></script><![endif]-->--}}
{{--<script src="{{ asset('assets/js/main.js') }}"></script>--}}

{{--<!--Swiper -->--}}
{{--<script src="{{ asset('assets/js/swiper_place/swiper.min.js') }}"></script>--}}

<!---->

  <!--Latest compiled and minified CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
        integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
  <!-- Latest compiled and minified JavaScript -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"
          integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa"
          crossorigin="anonymous"></script>


  <!-- Optional theme -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css"
        integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">


  {{--<link rel="stylesheet" href="{{ asset('assets/css/NewDesignMain.css') }}" />--}}
  {{--<link rel="stylesheet" href="{{ asset('/assets/css/pricepage.css') }}"/>--}}
  {{--<link rel="stylesheet" href="{{ asset('/assets/css/pricepage.css') }}"/>--}}
  {{--<link rel="stylesheet" href="{{ asset('/assets/css/pricepage.css') }}"/>--}}


</head>
<body class="homepage">
@yield('Header')
@yield('Content')
@yield('Map')
@yield('Footer')
<script src= {{ asset("js/app.js") }}></script>
</body>
</html>
