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
          <h6 class="m-0">@lang('general.postMng')</h6>
        </div>
        <div class="card-body">
                <div class="table-responsive">  
                    <form action="multi-post-action" method="post">
                        {{ csrf_field() }}
      <table id="example" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                    
                <th>@lang('general.id')</th>
                    <th>@lang('general.title')</th>
                    <th>@lang('general.created_at')</th>
                  
                    <th>@lang('general.action')</th>
                    <th>@lang('general.visibility')</th>
                    <th>@lang('general.CheckAll') <input type="checkbox" name="bulk_delete" id="checkedAll" /></th>
             
               

               
            </tr>
        </thead>
        <tbody id="tablecontents">
          
         
          
           
        </tbody>
        <tfoot>
            <tr>
                <th>@lang('general.id')</th>
                    <th>@lang('general.title')</th>
                    <th>@lang('general.created_at')</th>
                  

                   
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

 
    
  @endsection