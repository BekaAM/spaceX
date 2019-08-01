@if (\Request::is('add-new-information')) 
<script type="text/javascript"  src="{{ asset('dataTables/jquery-ui.js') }}" ></script>
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
        text: "@lang('general.AddNewInformation') <i class='material-icons'>add</i>",
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
        
              
            
                ajax: '{!! route('information.data') !!}',
                columns: [
                    { "data": "arrows", orderable:false, searchable: false},
               
                    { data: 'category', name: 'category' },
                 
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
  url: "{{ url('Information_sort') }}",
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
@endif