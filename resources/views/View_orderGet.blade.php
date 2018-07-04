@extends('layouts.main_lay')

@section('Header')
    @include('/main/header')
@endsection

@section('Content')
    @include('/View_order/orderGet')
@endsection

@section('Footer')
    @include('/main/footer')
@endsection
