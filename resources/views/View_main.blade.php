@extends('layouts.main_lay')

@section('Header')
	@include('/main/header')
@endsection

@section('Content')
    <div class="main">
	@include('/main/order')


  {{--@include('/main/place')--}}

    {{--<div class="taryf">--}}
        {{--<div class="col-sm-12">--}}
            {{--<h3>ТАРИФНІ ПЛАНИ</h3>--}}
            {{--<p><img src="{{ asset('/assets/css/4taryfy/line.png') }}" alt=""></p>--}}
            {{--<p>Ми пропонуємо гнучку систему в залежності від потреб та можливоcтей</p>--}}
        {{--</div>--}}
	    {{--@include('price.priceList', ['prices' => $prices])--}}
    {{--</div>--}}

{{--@endsection--}}

{{--@section('Map')--}}
    {{--<div class="map-top">--}}
        {{--<div class="container">--}}
            {{--<div class="main">--}}
                {{--<h2 class="main-tittle">МИ НА КАРТІ</h2>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</div>--}}
    {{--<div class="map__wrapper">--}}
        {{--@include('/main/map')--}}
    {{--</div>--}}
@endsection
    </div>
@section('Footer')
	@include('/main/footer')
@endsection
