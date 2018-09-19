@extends('layouts.app')

@section('Header')
    @include('/main/header')
@endsection

@section('Content')
	@include('/View_booking/booking')
@endsection

@section('Footer')
    @include('/main/footer')
@endsection
