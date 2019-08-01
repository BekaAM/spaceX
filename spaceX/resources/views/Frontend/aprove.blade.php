

@if (Auth::guest())
							
 




<script type="text/javascript"> window.location = "/login"  </script>
@elseif( Auth::user()->status == 0 )
@extends('layouts.app')
@section('content')

<!-- banner -->
<div class="banner_w3lspvt-2">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/" class="font-weight-bold">@lang('general.home')</a></li>
        <li class="breadcrumb-item" aria-current="page">@lang('general.aprove')</li>
    
    </ol>
</div>
<!-- //banner -->
</div>
<!-- //main banner -->

<!-- faq -->
<div class="about-inner py-5">
<div class="container pb-xl-5 pb-lg-3">
  
<div class="error pb-5 pt-2 text-center" id="price">
    <div class="container pb-xl-5 pb-lg-3">
       
       
    
     
       <h3 class="title-w3 text-bl my-3 font-weight-bold text-capitalize">@lang('general.WaitforAnApprova')</h3>
      <a  href="{{ route('logout') }}"   onclick="event.preventDefault();
      document.getElementById('logout-form').submit();" class="btn button-style mt-5">@lang('general.logout')</a>
      <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
          {{ csrf_field() }}
      </form>
    

     
     
    </div>
</div>
<!-- //404 -->
</div>
</div>
<!-- //faq -->

@endsection
@else

<script type="text/javascript"> window.location = "/dashboard"  </script>
@endif