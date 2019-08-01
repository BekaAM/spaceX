<script src="{{ asset('js/app.js')}}"></script>
<!-- footer -->
<footer class="bg-li py-5">
    <div class="container py-xl-5 py-lg-3">
        <!-- subscribe -->
        <div class="subscribe mx-auto">
            <div class="icon-effect-w3">
                <span class="fa fa-envelope"></span>
            </div>
            <h2 class="tittle text-center font-weight-bold">@lang('general.stayUpdated')</h2>
            <br>
            @if(session('successSubs'))

  

                        <div class="alert alert-success alert-block">
                            <button type="button" class="close" data-dismiss="alert">×</button>	
                                <strong> {{session('successSubs')}}</strong>
                        </div>
                        
                    @endif   
                    <br>
                    @if($errors->has('subscribe')) 
                    <div class="alert alert-danger alert-block">
                            <button type="button" class="close" data-dismiss="alert">×</button>	
                                <strong> {{ $errors->first('subscribe') }} </strong>
                        </div>
                        
                    @endif
       
            <form action="add-new-subscribe" method="post" class="subscribe-wthree pt-2">
                @csrf
                <div class="d-flex subscribe-wthree-field">
                        
                    <input class="form-control" type="email" placeholder="@lang('general.email')..." name="subscribe" required="">
                    <button class="btn form-control w-50" type="submit">@lang('general.subscripe')</button>
                </div>
            </form>
        </div>
        <!-- //subscribe -->
    </div>
</footer>
<!-- //footer -->
<?php   

        $webName = DB::table('information')->where([  ['category', '=', '1'] ,['status', '=', '1']])->orderBy('id','desc')->take(1)->get();
		$map = DB::table('information')->where([  ['category', '=', '2'],['status', '=', '1'] ])->orderBy('id','desc')->take(1)->get();
        $gmail = DB::table('information')->where([  ['category', '=', '3'] ,['status', '=', '1']])->orderBy('id','desc')->take(1)->get();
        $instagram = DB::table('information')->where([  ['category', '=', '4'] ,['status', '=', '1']])->orderBy('id','desc')->take(1)->get();
        $facebook = DB::table('information')->where([  ['category', '=', '5'],['status', '=', '1'] ])->orderBy('id','desc')->take(1)->get();
        $twitter = DB::table('information')->where([  ['category', '=', '6'],['status', '=', '1'] ])->orderBy('id','desc')->take(1)->get();
	//	$phone = DB::table('information')->where([  ['category', '=', '7'] ,['status', '=', '1']])->orderBy('id','desc')->take(1)->get();
		 
	   ?>
<!-- copyright bottom -->
<div class="copy-bottom bg-li py-4 border-top">
    <div class="container-fluid">
        <div class="d-md-flex px-md-3 position-relative text-center">
            <!-- footer social icons -->
            <div class="social-icons-footer mb-md-0 mb-3">
                <ul class="list-unstyled">
                   @foreach ($facebook as $item)
                       
                  
                    <li>
                            <a href="{{$item->content}}">
                            <span class="fa fa-facebook"></span>
                        </a>
                    </li>
                    @endforeach
                    @foreach ($twitter as $item)
                    <li>
                            <a href="{{$item->content}}">
                            <span class="fa fa-twitter"></span>
                        </a>
                    </li>
                    @endforeach
                    @foreach ($gmail as $item)
                    <li>
                            <a href="{{$item->content}}">
                            <span class="fa fa-google-plus"></span>
                        </a>
                    </li>
                    @endforeach
                    @foreach ($instagram as $item)
                    <li>
                        <a href="{{$item->content}}">
                            <span class="fa fa-instagram"></span>
                        </a>
                    </li>
                    @endforeach
                   {{--  @foreach ($phone as $item)
                    <li>
                        <label for="phone">{{$item->content}}</label>
                    </li>
                    @endforeach --}}
                   </ul>
            </div>
            <!-- //footer social icons -->
            <!-- copyright -->
            <div class="copy_right mx-md-auto mb-md-0 mb-3">
                    @foreach ($webName as $item)
                <p class="text-bl let"> {{$item->content}} </p>
                   
               
                @endforeach
            </div>
            <!-- //copyright -->
            <!-- move top icon -->
            <a href="#home" class="move-top text-center">
                <span class="fa fa-level-up" aria-hidden="true"></span>
            </a>
            <!-- //move top icon -->
        </div>
    </div>
</div>
<!-- //copyright bottom -->

</body>

</html>