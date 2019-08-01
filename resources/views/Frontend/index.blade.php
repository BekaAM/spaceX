@extends('layouts.app')
@section('content')


@foreach ($About as $item)
		<!-- banner -->
	<div class="banner_w3lspvt position-relative">
			<div class="container">
				<div class="d-md-flex">
					<div class="w3ls_banner_txt">
						<h3 class="w3ls_pvt-title">{!!$item->title!!}</h3>
						<p class="text-sty-banner">{{$item->description}}</p>
						<a href="about" class="btn button-style mt-md-5 mt-4">Read More</a>
					</div>
					<div class="banner-img">
						<img  src="{{$item->cover_images}}" alt="" class="img-fluid">
					</div>
				</div>
			</div>
			<!-- animations effects -->
			<div class="icon-effects-w3l">
				<img  src="{{ asset('frontend/images/shape1.png') }}" alt="" class="img-fluid shape-wthree shape-w3-one">
				<img  src="{{ asset('frontend/images/shape2.png') }}" alt="" class="img-fluid shape-wthree shape-w3-two">
				<img  src="{{ asset('frontend/images/shape3.png') }}" alt="" class="img-fluid shape-wthree shape-w3-three">
				<img  src="{{ asset('frontend/images/shape5.png') }}" alt="" class="img-fluid shape-wthree shape-w3-four">
				<img  src="{{ asset('frontend/images/shape4.png') }}" alt="" class="img-fluid shape-wthree shape-w3-five">
				<img  src="{{ asset('frontend/images/shape6.png') }}" alt="" class="img-fluid shape-wthree shape-w3-six">
			</div>
			<!-- //animations effects -->
		</div>
		<!-- //banner -->
		@endforeach
	</div>
	<!-- //main banner -->


	<!-- services -->
	<section class="banner-bottom-w3layouts bg-li py-5" id="services">
		<div class="container py-xl-5 py-lg-3">
			<h3 class="tittle text-center font-weight-bold">@lang('general.ourServices')</h3>
			
			<div class="row pt-lg-4">
					@foreach ($Service as $item)
				<div class="col-lg-4 about-in text-center">
					<div class="card">
						<div class="card-body">
							<div class="bg-clr-w3l">
								<span class="{{$item->class}}"></span>
							</div>
							<h5 class="card-title mt-4 mb-3">{{$item->title}}</h5>
							<p class="card-text">{{$item->description}}</p>
						</div>
					</div>
				</div>
				@endforeach
			</div>
		</div>
	</section>
	<!-- //services -->
@foreach ($Feauter as $item)
	

	<!-- stats -->
	<section class="bottom-count py-5" id="stats">
		<div class="container py-xl-5 py-lg-3">
			<div class="row">
				<div class="col-lg-5 left-img-w3ls">
					<img  src="{{$item->cover_images}}" alt="" class="img-fluid" />
				</div>
				<div class="col-lg-7 right-img-w3ls pl-lg-4 mt-lg-2 mt-4">
					<div class="bott-w3ls mr-xl-5">
						<h3 class="title-w3 text-bl mb-3 font-weight-bold">{!!$item->title!!}</h3>
					
						<p>{{$item->description}}</p>
					</div>
			
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- //stats -->
	@endforeach
	<!-- partners -->
	<section class="partners py-5" id="partners">
		<div class="container py-xl-5 py-lg-3">
			<h3 class="tittle text-center font-weight-bold">@lang('general.ourPartners')</h3>
<br>
			<div class="row grid-part text-center pt-4">
					@foreach ($Gallery as $item)
				<div class="col-md-2 col-4">
					<div class="parts-w3ls">
							<img  src="{{ asset('photos/gallery/'.$item->filename.'') }}" style="max-width:80px;" alt="" class="img-fluid" />
							
					</div>
					
				</div>
				@endforeach
			</div>
		</div>
	</section>
	<!-- //partners -->

@endsection