
@extends('layouts.app')

@section('Header')
    @include('/main/header')
@endsection

@section('Content')
    @include('/View_order/print')
@endsection

@section('Footer')
    @include('/main/footer')
@endsection
