@extends('layouts.main_lay')

@section('Header')
    @include('/main/header')
@endsection

@section('Content')
    <div class="container" style="margin: 50px auto">
        <div class="row">
            <div class="col-md-offset-5 col-md-2">
                <h3 class="text-center">ВАРТІСТЬ</h3>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Головна</a></li>
                    <li class="breadcrumb-item active">Вартість</li>
                </ol>
            </div>
        </div>
    </div>
    @include('/price/priceList')

    {{--<div class="empty__block"></div>--}}
@endsection

@section('Footer')
    @include('/main/footer')
@endsection
