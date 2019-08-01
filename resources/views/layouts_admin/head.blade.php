<!doctype html>
<html class="no-js h-100" lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="_token" content="{{csrf_token()}}" />
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>@lang('general.webName')</title>
    <meta name="description" content="A high-quality &amp; free Bootstrap admin dashboard template pack that comes with lots of templates and components.">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('admin/styles/icon.css') }}"> 
<link rel="stylesheet" href="{{ asset('dataTables/dataTables.bootstrap4.min.css') }}"> 
<link rel="stylesheet" href="{{ asset('dataTables/select.dataTables.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/styles/bootstrap.min.css') }}" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" id="main-stylesheet" data-version="1.1.0" href="{{ asset('admin/styles/shards-dashboards.1.1.0.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/styles/extras.1.1.0.min.css') }}">
    <script async defer src="{{ asset('admin/scripts/buttons.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('admin/styles/quill.snow.css') }}"> 
	</head>
  <body class="h-100">

    <div class="container-fluid">
      <div class="row">
        <!-- Main Sidebar -->
       @include('layouts_admin.sidebar')
        <!-- End Main Sidebar -->
        <main class="main-content col-lg-10 col-md-9 col-sm-12 p-0 offset-lg-2 offset-md-3">
          @include('layouts_admin.navbar')
          <!-- / .main-navbar -->
             <!-- alerts -->
             @include('admin_alerts.alerts')
             <!-- alerts -->
          <div class="main-content-container container-fluid px-4">
           
            <!-- Page Header -->
            <div class="page-header row no-gutters py-4">
              <div class="col-12 col-sm-4 text-center text-sm-left mb-0">
                <span class="text-uppercase page-subtitle">@lang('general.components')</span>

               
                @if (\Request::is('dashboard')) 
                <h3 class="page-title">@lang('general.dashboard')</h3>  
                @endif
                @if (\Request::is('user-profile-lite')) 
                <h3 class="page-title"> User Profile</h3>  
                @endif

                @if (\Request::is('add-new-information')) 
                <h3 class="page-title"> @lang('general.information') </h3>  
                @endif
                @if (\Request::is('add-new-category')) 
                <h3 class="page-title">@lang('general.category') @lang('general.posts')</h3>  
                @endif
                @if (\Request::is('add-new-post')) 
                <h3 class="page-title">@lang('general.blogPost') </h3>  
                @endif
                @if (\Request::is('PostEdit/*')) 
                <h3 class="page-title">@lang('general.edit') @lang('general.posts')</h3>  
                @endif
                @if (\Request::is('components-blog-posts')) 
                <h3 class="page-title"> @lang('general.blogArticle')</h3>  
                @endif
                @if (\Request::is('blog-posts','table-post')) 
                <h3 class="page-title"> @lang('general.blogArticle')</h3>  
                @endif
                @if (\Request::is('add-new-team')) 
                <h3 class="page-title"> @lang('general.team')</h3>  
                @endif
                @if (\Request::is('add-new-about')) 
                <h3 class="page-title"> @lang('general.aboutUs')</h3>  
                @endif
                @if (\Request::is('add-new-faq')) 
                <h3 class="page-title"> @lang('general.faq')</h3>  
                @endif
                @if (\Request::is('add-new-gallery')) 
                <h3 class="page-title">@lang('general.gallery')</h3>  
                @endif
                @if (\Request::is('add-new-messages')) 
                <h3 class="page-title">@lang('general.messages')</h3>  
                @endif
                @if (\Request::is('add-new-subscribe')) 
                <h3 class="page-title">@lang('general.subscripe')</h3>  
                @endif
                @if (\Request::is('user')) 
                <h3 class="page-title">@lang('general.user')</h3>  
                @endif
                @if (\Request::is('add-new-service')) 
                <h3 class="page-title">@lang('general.service')</h3>  
                @endif
               
               
              
              
               
              </div>
            </div>
            <!-- End Page Header -->