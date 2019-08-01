@extends('layouts.app')
@section('content')
		<!-- banner -->
		<div class="banner_w3lspvt-2">
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="/" class="font-weight-bold">@lang('general.home')</a></li>
				<li class="breadcrumb-item" aria-current="page">@lang('general.aboutUs')</li>
			</ol>
		</div>
		<!-- //banner -->
	</div>
	<!-- //main banner -->
@foreach ($About as $item)

	<!-- about -->
	<div class="about-inner py-5">
		<div class="container pb-xl-5 pb-lg-3">
			<div class="row py-xl-4">
				<div class="col-lg-5 about-right-faq pr-5">
					
				<h3 class="mt-2 mb-3">{!!$item->title!!}</h3>
					<p>{{$item->description}}</p>
				
					
				</div>
				<div class="col-lg-7 welcome-right text-center mt-lg-0 mt-5">
					<img   src="{{ asset(''.$item->cover_images.'') }}" alt="" class="img-fluid" />
				</div>
			</div>
		</div>
	</div>
	<!-- //about -->
	
	@endforeach
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

	<!-- team -->
	<section class="team bg-li py-5" id="team">
		<div class="container py-xl-5 py-lg-3">
			<h3 class="tittle text-center font-weight-bold">@lang('general.OurAwesomeTeam')</h3>
			
			<div class="row ab-info second pt-lg-4">
				
					@foreach ($Team as $item)
				<div class="col-lg-4 col-sm-6 ab-content text-center mt-lg-0 mt-4">
					<div class="ab-content-inner">
						<img  src="{{ asset(''.$item->cover_images.'') }}" style="max-width:120px" alt="news image" class="img-fluid">
						<div class="ab-info-con">
							<h4 class="text-team-w3">{{$item->name}} {{$item->lastname}}</h4>
							<p>{{$item->profession}}</p>
							<ul class="list-unstyled team-socil-w3pvts">
								<li class="d-inline">
								<a href="{{$item->url_facebook}}"><span class="fa fa-facebook"></span></a>
								</li>
								<li class="d-inline">
									<a href="{{$item->url_twitter}}"><span class="fa fa-twitter"></span></a>
								</li>
								<li class="d-inline">
									<a href="{{$item->url_facebook}}"><span class="fa fa-google-plus"></span></a>
								</li>
							</ul>
						</div>
					</div>
				</div>
		@endforeach

			</div>
		</div>
	</section>
	<!-- //team -->

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