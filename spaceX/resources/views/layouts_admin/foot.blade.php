</div>
@include('layouts_admin.footer')
</main>
</div>
</div>

<script src="{{ asset('admin/scripts/jquery-3.3.1.min.js')}}" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
<script src="{{ asset('admin/scripts/popper.min.js')}}" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="{{ asset('admin/scripts/bootstrap.min.js')}}" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>


<script src="{{ asset('admin/scripts/Chart.min.js')}}"></script>
<script src="{{ asset('admin/scripts/app/app-blog-overview.1.1.0.js')}}"></script>
<script src="{{ asset('admin/scripts/shards.min.js')}}"></script>
<script src="{{ asset('admin/scripts/shards-dashboards.1.1.0.min.js')}}"></script>



<script src="{{ asset('admin/scripts/jquery.sharrre.min.js')}}"></script>
<script src="{{ asset('admin/scripts/extras.1.1.0.min.js')}}"></script>


@if (\Request::is('add-new-post','PostEdit/*'))

<script src="{{ asset('admin/scripts/quill.min.js')}}"></script>
<script src="{{ asset('admin/scripts/app/app-blog-new-post.1.1.0.js')}}"></script>


  <script>
    var route_prefix = "{{ url(config('lfm.url_prefix', config('lfm.prefix'))) }}";
   </script>
 
  
 
   <!-- TinyMCE init<script src="{{ asset('css/tinymce.min.js')}}"></script> -->
   <script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
   
   <script>
    var editor_config = {
      path_absolute : "/",
      selector: "textarea.my-editor",
      plugins: [
        "advlist autolink lists link image charmap print preview hr anchor pagebreak",
        "searchreplace wordcount visualblocks visualchars code fullscreen",
        "insertdatetime media nonbreaking save table contextmenu directionality",
        "emoticons template paste textcolor colorpicker textpattern"
      ],
      toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media",
      relative_urls: false,
      file_browser_callback : function(field_name, url, type, win) {
        var x = window.innerWidth || document.documentElement.clientWidth || document.getElementsByTagName('body')[0].clientWidth;
        var y = window.innerHeight|| document.documentElement.clientHeight|| document.getElementsByTagName('body')[0].clientHeight;
  
        var cmsURL = editor_config.path_absolute + 'laravel-filemanager?field_name=' + field_name;
        if (type == 'image') {
          cmsURL = cmsURL + "&type=Images";
        } else {
          cmsURL = cmsURL + "&type=Files";
        }
  
        tinyMCE.activeEditor.windowManager.open({
          file : cmsURL,
          title : 'Filemanager',
          width : x * 0.8,
          height : y * 0.8,
          resizable : "yes",
          close_previous : "no"
        });
      }
    };
  
    tinymce.init(editor_config);
  </script>
   <script>
     {!! \File::get(base_path('vendor/unisharp/laravel-filemanager/public/js/lfm.js')) !!}
   </script>
   <script>
     $('#lfm').filemanager('image', {prefix: route_prefix});
    // insert id for powerfull button team $('#lfm1').filemanager('image', {prefix: route_prefix});
     $('#lfm2').filemanager('file', {prefix: route_prefix});
   </script>

 
  
  
  

  
@endif
@if (\Request::is('add-new-about'))




  <script>
    var route_prefix = "{{ url(config('lfm.url_prefix', config('lfm.prefix'))) }}";
   </script>
 
  
 
   <!-- TinyMCE init<script src="{{ asset('css/tinymce.min.js')}}"></script> -->
   <script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
   
   
   <script>
     {!! \File::get(base_path('vendor/unisharp/laravel-filemanager/public/js/lfm.js')) !!}
     $('#lfm').filemanager('image', {prefix: route_prefix});
   </script>
 @foreach ($About as $item)
     

   <script>
    
     
     $('#lfm{{$item->id}}').filemanager('image', {prefix: route_prefix});
    // insert id for powerfull button team $('#lfm1').filemanager('image', {prefix: route_prefix});
   
   </script>
 @endforeach
 
  
  
  

  
@endif
@if (\Request::is('add-new-team'))

<script src="{{ asset('admin/scripts/quill.min.js')}}"></script>



  <script>
    var route_prefix = "{{ url(config('lfm.url_prefix', config('lfm.prefix'))) }}";
   </script>
 
  
 
   <!-- TinyMCE init<script src="{{ asset('css/tinymce.min.js')}}"></script> -->
   <script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
   
   
   <script>
     {!! \File::get(base_path('vendor/unisharp/laravel-filemanager/public/js/lfm.js')) !!}
     $('#lfm').filemanager('image', {prefix: route_prefix});
   </script>
 @foreach ($Team as $item)
     

   <script>
    
     
     $('#lfm{{$item->id}}').filemanager('image', {prefix: route_prefix});
    // insert id for powerfull button team $('#lfm1').filemanager('image', {prefix: route_prefix});
   
   </script>
 @endforeach
 
  
  
  

  
@endif

<script src="{{ asset('dataTables/jquery.dataTables.min.js')}}"></script>
<script src="{{ asset('dataTables/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{ asset('dataTables/dataTables.buttons.min.js')}}"></script>
<script src="{{ asset('dataTables/buttons.bootstrap4.min.js')}}"></script>
<script src="{{ asset('dataTables/jszip.min.js')}}"></script>
<script src="{{ asset('dataTables/pdfmake.min.js')}}"></script>
<script src="{{ asset('dataTables/vfs_fonts.js')}}"></script>
<script src="{{ asset('dataTables/buttons.html5.min.js')}}"></script>
<script src="{{ asset('dataTables/buttons.print.min.js')}}"></script>
<script src="{{ asset('dataTables/buttons.colVis.min.js')}}"></script>
<script src="{{ asset('dataTables/dataTables.select.min.js')}}"></script>
@include('datatables.post-table')
@include('datatables.gallery-table')
@include('datatables.category-table')
@include('datatables.team-table')
@include('datatables.faq-table')
@include('datatables.about-table')
@include('datatables.service-table')
@include('datatables.information-table')
@include('datatables.subscribe-table')
@include('datatables.message-table')
@include('datatables.user-table')
<script>
           $(document).ready(function() {
$("#checkedAll").change(function() {
 if (this.checked) {
     $(".student_checkbox").each(function() {
         this.checked=true;
     });
 } else {
     $(".student_checkbox").each(function() {
         this.checked=false;
     });
 }
});

$(".student_checkbox").click(function () {
 if ($(this).is(":checked")) {
     var isAllChecked = 0;

     $(".student_checkbox").each(function() {
         if (!this.checked)
             isAllChecked = 1;
     });

     if (isAllChecked == 0) {
         $("#checkedAll").prop("checked", true);
     }     
 }
 else {
     $("#checkedAll").prop("checked", false);
 }
});
});
        </script>
</body>
</html>