@extends('layouts.main_lay')

@section('Header')
    @include('/main/header')
@endsection

@section('Content')
    @include('/order/print')
@endsection

@section('Footer')
    @include('/main/footer')
@endsection
