@extends('layouts.app')
@section('content')
<!-- banner -->
<div class="banner_w3lspvt-2">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/" class="font-weight-bold">@lang('general.home')</a></li>
        <li class="breadcrumb-item" aria-current="page">@lang('general.faqs')</li>
    
    </ol>
</div>
<!-- //banner -->
</div>
<!-- //main banner -->

<!-- faq -->
<div class="about-inner py-5">
<div class="container pb-xl-5 pb-lg-3">
  
    <!-- accordions -->
    <ul class="accordion css-accordion mt-5">
        @foreach ($Faq as $item)
            
     
        <li class="accordion-item">
            <input class="accordion-item-input" type="checkbox" name="accordion" id="item{{$item->id}}" />
        <label for="item{{$item->id}}" class="accordion-item-hd">{{$item->question}}<span
                 class="accordion-item-hd-cta">&#9650;</span></label>
            <div class="accordion-item-bd">
               
                <p>{{$item->answers}}</p>
            </div>
        </li>
        @endforeach
    </ul>
    <!-- //accordions -->
</div>
</div>
<!-- //faq -->
@endsection