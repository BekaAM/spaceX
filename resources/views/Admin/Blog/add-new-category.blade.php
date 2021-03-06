@extends('layouts_admin.app')
@section('content')

<script>
var room = 1;
    function category_fields() {
     
        room++;
        var objTo = document.getElementById('category_fields')
        var divtest = document.createElement("div");
        divtest.setAttribute("class", "form-group removeclass"+room);
        var rdiv = 'removeclass'+room;
        divtest.innerHTML = '<div class="form-group"><input type="text" name="category_name[]" style="width:88%; display:inline;"  class="form-control" placeholder="@lang('general.categoryName')">  <div class="input-group-btn" style="display:inline;">    <button  class="btn btn-danger" type="button"  onclick="remove_category_fields('+ room +');"> <span class="fa fa-minus" aria-hidden="true"></span> </button></div></div>';
       
   
  
      
        
        objTo.appendChild(divtest)
    }
       function remove_category_fields(rid) {
           $('.removeclass'+rid).remove();
       }
</script>
<div class="row">
    <div class="col">
      <div class="card card-small mb-4">
        <div class="card-header border-bottom">
          <h6 class="m-0">@lang('general.categoryMng')</h6>
        </div>
        <div class="card-body">
                <div class="table-responsive">  
                    <form action="multi-category-action" method="post">
                        {{ csrf_field() }}
      <table id="example" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                    
                    <th><i  class="material-icons">gamepad</i></th>
                    <th>@lang('general.categoryName')</th>
                    <th>@lang('general.created_at')</th>
                    <th>@lang('general.updated_at')</th>
                  
                    <th>@lang('general.action')</th>
                    <th>@lang('general.visibility')</th>
                    <th>@lang('general.CheckAll') <input type="checkbox" name="bulk_delete" id="checkedAll" /></th>
             
               

               
            </tr>
        </thead>
        <tbody id="tablecontents">
          
         
          
           
        </tbody>
        <tfoot>
            <tr>
                <th><i  class="material-icons">gamepad</i></th>
                    <th>@lang('general.categoryName')</th>
                    <th>@lang('general.created_at')</th>
                    <th>@lang('general.updated_at')</th>
                    
                   
                    <th colspan="3">
                       <select name="action" class="form-control" style="display:inline; width:60%;" id="">
                        <option value="3">@lang('general.action')</option>
                        <option value="1">@lang('general.visibility'): @lang('general.public')</option>
                <option value="0">@lang('general.visibility'): @lang('general.privat')</option>
              
                <option value="delete">@lang('general.delete')</option>
                   </select>
                  
                   <input type="submit" class="btn btn-primary" onclick="return confirm('{{trans('general.alertActionConfirme')}}') " style="width:35%" value="@lang('general.action')" >
                </th>
           
              
            </tr>
        </tfoot>
    </table>
                    </form>
</div>
        </div>
      </div>
    </div>
  </div>

 <!--Add Modal-->
  <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">@lang('general.category')</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form action="add-category" method="post">
              @csrf
            <div class="modal-body">
             
               
              <input type="text" name="category_name[]" style="width:88%; display:inline;" required class="form-control" placeholder="@lang('general.categoryName')">
              <div class="input-group-btn" style="display:inline;">
                  <button  class="btn btn-success" type="button"  onclick="category_fields();"> <span class="fa fa-plus" aria-hidden="true"></span> </button>
                </div>
                
                <div style="margin-top:12px;" id="category_fields">
                
                  </div>
                 
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">@lang('general.close')</button>
              <input type="submit" class="btn btn-primary"value="@lang('general.AddNewCategory')">            </div>
            </form>
          </div>
        </div>
      </div>
       <!--End Add Modal-->

      <!--Edit Modal-->
      @foreach ($Category as $item)
    <div class="modal fade" id="myModal{{$item->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">@lang('general.edit') @lang('general.category')</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
            <form action="edit-category-{{$item->id}}" method="post">
                @csrf
              <div class="modal-body">
               
               <label for="categoryName">@lang('general.categoryName'): </label> 
                <input type="text" name="category_name" value="{{$item->category_name}}" style="width:100%;" required class="form-control" placeholder="@lang('general.categoryName')">
                <label for="visibility"> @lang('general.visibility'):</label> 
                <select class="form-control" name="status" style="width:100%;" >
                   @if ($item->status == 1)

                       <option value="1">@lang('general.public')</option>
                       <option value="0">@lang('general.privat')</option>
                   @else
                   <option value="0">@lang('general.privat')</option>
                   <option value="1">@lang('general.public')</option>
                   
                   @endif
                 
    
                       
                  
                
                   
                 
                      </select>
                 
                   
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">@lang('general.close')</button>
                <input type="submit" class="btn btn-primary"value="@lang('general.saveChanges')">            </div>
              </form>
            </div>
          </div>
        </div>
        @endforeach
        <!--End Edit Modal-->
  @endsection