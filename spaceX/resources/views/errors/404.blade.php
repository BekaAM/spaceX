@extends('layouts.app')
@section('content')
    <!-- 404 -->
	<div class="error pb-5 pt-2 text-center" id="price">
		<div class="container pb-xl-5 pb-lg-3">
			<img  src="{{ asset('frontend/images/error.png') }}" alt="" class="img-fluid" />
			<h3 class="title-w3 text-bl my-3 font-weight-bold text-capitalize">Oops! This page can’t be found.</h3>
	
			<a href="{{ URL::previous() }}" class="btn button-style mt-5">Back To Home</a>
		</div>
	</div>
    <!-- //404 -->
    @endsection
