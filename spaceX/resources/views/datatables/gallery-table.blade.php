@if (\Request::is('add-new-gallery')) 
<script type="text/javascript"  src="{{ asset('dataTables/jquery-ui.js') }}" ></script>
<script type="text/javascript">
    Dropzone.options.dropzone =
     {
        maxFilesize: 12,
        renameFile: function(file) {
            var dt = new Date();
            var time = dt.getTime();
           return time+file.name;
        },
        acceptedFiles: ".jpeg,.jpg,.png,.gif",
        addRemoveLinks: true,
        timeout: 50000,
        removedfile: function(file) 
        {
            var name = file.upload.filename;
            $.ajax({
                headers: {
                            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                        },
                type: 'POST',
                url: '{{ url("image/delete") }}',
                data: {filename: name},
                success: function (data){
                  //  console.log("File has been successfully removed!!");
                    $('#example').DataTable().ajax.reload()
                },
                error: function(e) {
                    console.log(e);
                }});
                var fileRef;
                return (fileRef = file.previewElement) != null ? 
                fileRef.parentNode.removeChild(file.previewElement) : void 0;
        },
   
        success: function(file, response) 
        {
          //  console.log(response);
            $('#example').DataTable().ajax.reload()
        },
        error: function(file, response)
        {
           return false;
        }
};
</script>
<script>
$(document).ready(function() {
    var table = $('#example').DataTable( {
        lengthChange: true,
        rowReorder: true,
        select: true,
        dom: 'Bfrtip',
                rowId:'id',
                responsive: true,
                processing: true,
                serverSide: true,
                createdRow: function( row, data, dataIndex ) {
        $(row).addClass('row1');
    },
        
    lengthMenu: [
        [  25, 50, -1 ],
        [  '25', '50', 'Show all' ]
    ],
       
    buttons: [
             
            {
        text: "@lang('general.AddNewGallery') <i class='material-icons'>add</i>",
                action: function (e, node, config){
                $('#myModal').modal('show')
                }
           
        },   
            {
                extend: 'copyHtml5',
                exportOptions: {
                    columns: ':visible'
                }
            },
              {
                extend: 'csvHtml5',
                exportOptions: {
                    columns: ':visible'
                }
            },
            {
                extend: 'excelHtml5',
                exportOptions: {
                    columns: ':visible'
                }
            },
            {
                extend: 'pdfHtml5',
                exportOptions: {
                    columns: ':visible'
                }
            },
            'colvis',
            {
                extend: 'pageLength',
               
            },
        ],
        
              
            
                ajax: '{!! route('gallery.data') !!}',
                columns: [
                    { "data": "arrows", orderable:false, searchable: false},
                    { data: 'filename', name: 'filename' },
                  
                    { data: 'created_at', name: 'created_at' },
                    { data: 'updated_at', name: 'updated_at' },

                    { "data": "EditDelete", orderable:false, searchable: false},
                    { "data": "active", orderable:true, searchable: true},
                    { "data": "action", orderable:false, searchable: false}
                ]
   
  
        
    } );

  
  


    table.buttons().container()
        .appendTo( '#example_wrapper .col-md-6:eq(0)' );
       
      
} );


  $( "#tablecontents" ).sortable({
      items: "tr",
      cursor: 'move',
      opacity: 0.6,
      update: function() {
          sendOrderToServer();
      }
    });
    function sendOrderToServer() {

var order = [];
$('tr.row1').each(function(index,element) {
  order.push({
    id: $(this).attr('id'),
    position: index+1
  });
 
});

$.ajax({
  type: "POST", 
  dataType: "json", 
  url: "{{ url('gallery_sort') }}",
  data: {
    order:order,
    _token: '{{csrf_token()}}'
  },
  success: function(response) {
      if (response.status == "success") {
        
        console.log(response);
       
      } else {
        console.log(response);
      }
  }
});

}

</script>

  <!--Show function
  $(document).on('click', '.show-modal', function() {
  $('#show').modal('show');
  $('#i').text($(this).data('id'));
  $('#filename').text($(this).data('filename'));

  $('.modal-title').text('Show Post');
  });-->
@endif