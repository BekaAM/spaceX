<!DOCTYPE html>
<html lang="zxx">

<head>
	<title>@lang('general.webName')</title>
	<!-- Meta tag Keywords -->
	
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<meta charset="UTF-8" />
	<meta name="keywords" content="Startup Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
	<script>
		addEventListener("load", function () {
			setTimeout(hideURLbar, 0);
		}, false);

		function hideURLbar() {
			window.scrollTo(0, 1);
		}
	</script>
	<!-- //Meta tag Keywords -->

	<!-- Custom-Files -->
	<link rel="stylesheet"  href="{{ asset('frontend/css/bootstrap.css') }}">
	<!-- Bootstrap-Core-CSS -->
	<link rel="stylesheet"  href="{{ asset('frontend/css/style.css') }}" type="text/css" media="all" />
	<!-- Style-CSS -->
	<link  href="{{ asset('frontend/css/font-awesome.min.css') }}" rel="stylesheet">
	<!-- Font-Awesome-Icons-CSS -->
	<!-- //Custom-Files -->

	<!-- Web-Fonts -->
	<link href="//fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&amp;subset=devanagari,latin-ext"
	 rel="stylesheet">
	<!-- //Web-Fonts -->
</head>

<body>
	<!-- main banner -->
	<div class="main-top" id="home">
		<!-- header -->
		<header>
			<div class="container-fluid">
				<div class="header d-lg-flex justify-content-between align-items-center py-3 px-sm-3">
					<!-- logo -->
					<div id="logo">
						<h1><a href="/"><span class="fa fa-linode mr-2"></span>@lang('general.webName')</a></h1>
					</div>
					<!-- //logo -->
					<!-- nav -->
					<div class="nav_w3ls">
						<nav>
							<label for="drop" class="toggle">@lang('general.menu')</label>
							<input type="checkbox" id="drop" />
							<ul class="menu">
								<li><a href="/">@lang('general.home')</a></li>
								<li><a href="about" >@lang('general.aboutUs')</a></li>
								<li><a href="faq">@lang('general.faq')</a></li>
								
								
								<li><a href="contact">@lang('general.contactUs')</a></li>
								@if (Auth::guest())
							
								@elseif( Auth::user()->status == 1 ) 
								
								<a href="/dashboard">@lang('general.dashboard')</a>
						        @else
								@endif
								
		
							</ul>
						</nav>
					</div>
					<!-- //nav -->
					
				</div>
			</div>
		</header>
	
		<!-- //header -->