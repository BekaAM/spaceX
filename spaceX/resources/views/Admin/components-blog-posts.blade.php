@extends('layouts_admin.app')

@section('content')
@if (\Request::is('blog-posts'))
@if (count ( $Posts ) > 0)
            <div class="row">
       
         @foreach ($Posts as $item)
             
      
              <div class="col-lg-3 col-md-6 col-sm-12 mb-4">
                <div class="card card-small card-post h-100">
             
                  <div class="card-post__image" style="background-image: url('{{$item->cover_images}}');"></div>
                  <div class="card-body">
                  
                  <p class="card-text">   <a class="text-fiord-blue" href="PostShow/{{$item->id}}">{{$item->title}}</a></p>
                  </div>
                  <div class="card-footer text-muted border-top py-3">
                    <span class="d-inline-block">@lang('general.date') :
                      <a class="text-fiord-blue" href="#">{{$item->created_at}}</a>
                     
                    </span>
                  </div>
                </div>
              </div>
              @endforeach

            </div>
        
            @else
            <div class="error">
                <div class="error__content">
                  <h2>404</h2>
                  <h3>@lang('general.PostNotFound')</h3>
                 
                  <a href="{{ URL::previous() }} " class="btn btn-accent btn-pill">&larr;  @lang('general.goBack')</a>
                </div>
                <!-- / .error_content -->
              </div>
            @endif
            @endif




            @if (\Request::is('components-blog-posts'))
@if (count ( $Posts ) > 0)
            <div class="row">
       
         @foreach ($Posts as $item)
             
      
              <div class="col-lg-3 col-md-6 col-sm-12 mb-4">
                <div class="card card-small card-post h-100">
             
                  <div class="card-post__image" style="background-image: url('{{$item->cover_images}}');"></div>
                  <div class="card-body">
                  
                  <p class="card-text">   <a class="text-fiord-blue" href="PostShow/{{$item->id}}">{{$item->title}}</a></p>
                  </div>
                  <div class="card-footer text-muted border-top py-3">
                    <span class="d-inline-block">@lang('general.date') :
                      <a class="text-fiord-blue" href="#">{{$item->created_at}}</a>
                     
                    </span>
                  </div>
                </div>
              </div>
              @endforeach

            </div>
            {{ $Posts->links() }}
            @else
            <div class="error">
                <div class="error__content">
                
                  <h2>@lang('general.NoDataAvailableInPages')</h2>
                 
                  <a href="{{ URL::previous() }} " class="btn btn-accent btn-pill">&larr; @lang('general.goBack')</a>
                </div>
                <!-- / .error_content -->
              </div>
            @endif
            @endif
         
          @endsection