@extends('layouts.app')

@section('header')
	@include('/gallery/headerGallery')
@endsection

@section('content')
	@include('/gallery/contentGallery')
@endsection

@section('Footer')
  @include('/main/footer');
@endsection

