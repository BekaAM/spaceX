<footer class="main-footer d-flex p-2 px-3 bg-white border-top">
    <?php   

        $webName = DB::table('information')->where([  ['category', '=', '1'] ,['status', '=', '1']])->orderBy('id','desc')->take(1)->get();
		?>
    <span class="copyright ml-auto my-auto mr-2">
        @foreach ($webName as $item)
       {{$item->content}} 
           
       
        @endforeach
    </span>
  </footer>