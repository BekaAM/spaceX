@if (\Request::is('table-post')) 

<script>
$(document).ready(function() {
    var table = $('#example').DataTable( {
        lengthChange: true,
       
        select: true,
        dom: 'Bfrtip',
               
                responsive: true,
                processing: true,
                serverSide: true,
              
        
    lengthMenu: [
        [  25, 50, -1 ],
        [  '25', '50', 'Show all' ]
    ],
       
    buttons: [
             
            {
        text: "@lang('general.AddNewPost') <i class='material-icons'>add</i>",
                action: function (e, node, config){
                    window.location = 'add-new-post';
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
        
              
            
                ajax: '{!! route('post.data') !!}',
                columns: [
                  { data: 'id', name: 'id' },
                    { data: 'title', name: 'title' },
               
                    { data: 'created_at', name: 'created_at' },

                    { "data": "EditDelete", orderable:false, searchable: false},
                    { "data": "active", orderable:true, searchable: true},
                    { "data": "action", orderable:false, searchable: false}
                ]
   
  
        
    } );

  
  


    table.buttons().container()
        .appendTo( '#example_wrapper .col-md-6:eq(0)' );
       
      
} );


 





</script>
@endif