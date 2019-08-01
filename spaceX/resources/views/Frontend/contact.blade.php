@extends('layouts.app')
@section('content')

<!-- banner -->
<div class="banner_w3lspvt-2">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/" class="font-weight-bold">@lang('general.home')</a></li>
        <li class="breadcrumb-item" aria-current="page">@lang('general.contactUs')</li>
     </ol>
</div>
<!-- //banner -->
</div>
<!-- //main banner -->

<!-- contact -->
<div class="contact py-5" id="contact">
<div class="container pb-xl-5 pb-lg-3">
    <div class="row">
        <div class="col-lg-6">
            <img  src="{{ asset('frontend/images/b2.png') }}" alt="image" class="img-fluid" />
        </div>
        <div class="col-lg-6 mt-lg-0 mt-5">
            <!-- contact form grid -->
            <div class="contact-top1">
                    @if($errors->has('subscribe')) 
                    @else
                    @include('alerts.alert')
                    @endif
                <form action="add-new-message" method="post" class="contact-wthree-do">
                    @csrf
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-6">
                                <label>
                                        @lang('general.firstname')
                                </label>
                                <input class="form-control" type="text" placeholder="@lang('general.name')" name="name" required="">
                            </div>
                            <div class="col-md-6 mt-md-0 mt-4">
                                <label>
                                        @lang('general.lastname')
                                </label>
                                <input class="form-control" type="text" placeholder="@lang('general.lastname')" name="lastname" required="">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-6">
                                <label>
                                      @lang('general.phone')
                                </label>
                                <input class="form-control" type="text" placeholder="xxxx xxxx xx" name="phone" required="">
                            </div>
                            <div class="col-md-6 mt-md-0 mt-4">
                                <label>
                                        @lang('general.email')
                                </label>
                                <input class="form-control" type="email" placeholder="example@mail.com" name="email" required="">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-12">
                                <label>
                                        @lang('general.description')
                                </label>
                                <textarea placeholder="@lang('general.description')" name="description" class="form-control"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-12">
                            <button type="submit" class="btn btn-cont-w3 btn-block mt-4">@lang('general.send')</button>
                        </div>
                    </div>
                </form>
            </div>
            <!-- //contact form grid ends here -->
        </div>
    </div>
</div>
</div>
<!-- //contact-->
<?php   

      	$map = DB::table('information')->where([  ['category', '=', '2'] ,['status', '=', '1'] ])->orderBy('id','desc')->take(1)->get();
      
	   ?>
<!-- map -->
<div class="w3l-map p-4">
    @foreach ($map as $item)
        

<iframe src="{{$item->content}}"></iframe>
@endforeach
</div>
<!-- //map -->
@endsection