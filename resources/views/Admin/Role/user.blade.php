@extends('layouts_admin.app')
@section('content')


<div class="row">
    <div class="col">
      <div class="card card-small mb-4">
        <div class="card-header border-bottom">
          <h6 class="m-0">@lang('general.userMng')</h6>
        </div>
        <div class="card-body">
                <div class="table-responsive">  
                    <form action="multi-user-action" method="post">
                        {{ csrf_field() }}
      <table id="example" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                    
                    <th><i  class="material-icons">gamepad</i></th>
                    <th>@lang('general.email')</th>
                    <th>@lang('general.name')</th>
                 
                   
                    <th>@lang('general.updated_at')</th>
                        <th>@lang('general.created_at')</th>
                      
                    <th>@lang('general.action')</th>
                    <th>@lang('general.role')</th>
                    <th>@lang('general.CheckAll') <input type="checkbox" name="bulk_delete" id="checkedAll" /></th>
             
               

               
            </tr>
        </thead>
        <tbody id="tablecontents">
          
         
          
           
        </tbody>
        <tfoot>
            <tr>
                <th><i  class="material-icons">gamepad</i></th>
                <th>@lang('general.email')</th>
                <th>@lang('general.name')</th>
             
               
                <th>@lang('general.updated_at')</th>
                    <th>@lang('general.created_at')</th>
                  
                   
                    <th colspan="3">
                       <select name="action" class="form-control" style="display:inline; width:60%;" id="">
                        <option value="3">@lang('general.action')</option>
                        <option value="0">@lang('general.process')</option>
                        <option value="1">@lang('general.admin')</option>
                      
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