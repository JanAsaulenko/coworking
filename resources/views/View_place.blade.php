@extends('layouts.app')

@section('Header')
    @include('/main/header')
@endsection

@section('Content')
    @include('places.content')
    <div class="empty__block"></div>
@endsection

@section('Footer')
 @include('/main/footer')
@endsection