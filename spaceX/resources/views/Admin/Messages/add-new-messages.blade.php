@extends('layouts_admin.app')
@section('content')


<div class="row">
    <div class="col">
      <div class="card card-small mb-4">
        <div class="card-header border-bottom">
          <h6 class="m-0">@lang('general.messagesMng')</h6>
        </div>
        <div class="card-body">
                <div class="table-responsive">  
                    <form action="multi-messages-action" method="post">
                        {{ csrf_field() }}
      <table id="example" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                    
                    <th><i  class="material-icons">gamepad</i></th>
                    <th>@lang('general.email')</th>
                    <th>@lang('general.name')</th>
                    <th>@lang('general.lastname')</th>
                   
             
                    <th>@lang('general.created_at')</th>
                
                  
                    <th>@lang('general.action')</th>
            
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
                <th>@lang('general.lastname')</th>
               
                   
                    <th>@lang('general.created_at')</th>
                
                   
                    <th colspan="2">
                       <select name="action" class="form-control" style="display:inline; width:60%;" id="">
                        <option value="3">@lang('general.action')</option>
                      
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


    
  @foreach ($Messages as $item)
       <div class="modal fade" id="myModalShow{{$item->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
             <div class="modal-dialog" role="document">
               <div class="modal-content">
                 <div class="modal-header">
                   <h5 class="modal-title" id="exampleModalLabel">@lang('general.show') @lang('general.messages')</h5>
                   <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                   </button>
                 </div>
               
                   @csrf
                 <div class="modal-body">
                   
                 <label for="name">@lang('general.name'): <b>{{$item->name}}</b> </label> <br>
                 <label for="lastname">@lang('general.lastname'):<b> {{$item->lastname}}</b> </label> <br>
                 <label for="phone">@lang('general.phone'):<b> {{$item->phone}}</b> </label> <br>
                 <label for="email">@lang('general.email'):<b> {{$item->email}}</b> </label> <br>
               
                 
                 
                
              
                <label for="description">@lang('general.description'):<b> {{$item->description}}  </b></label><br>
               
                   
                
             
                    
                      
                 </div>
                 <div class="modal-footer">
                  </div>
                </div>
             </div>
           </div>
           @endforeach
        
  @endsection