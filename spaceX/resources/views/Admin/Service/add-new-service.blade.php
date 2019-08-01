@extends('layouts_admin.app')
@section('content')

<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css" rel="stylesheet"/>
<style>select {
     font-family: 'FontAwesome', 'Second Font name'
   }</style>

<div class="row">
    <div class="col">
      <div class="card card-small mb-4">
        <div class="card-header border-bottom">
          <h6 class="m-0">@lang('general.ServiceMng')</h6>
        </div>
        <div class="card-body">
                <div class="table-responsive">  
                    <form action="multi-service-action" method="post">
                        {{ csrf_field() }}
      <table id="example" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                    
                    <th><i  class="material-icons">gamepad</i></th>
              
                    <th>@lang('general.title')</th>
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
                    <th>@lang('general.title')</th>
                 
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
              <h5 class="modal-title" id="exampleModalLabel">@lang('general.service')</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form action="add-service" method="post">
              @csrf
            <div class="modal-body">
             
              <label for="title">@lang('general.title'): </label> 
              <input type="text" name="title" style="width:100%; display:inline;" required class="form-control" placeholder="@lang('general.title')">
             <label for="description">@lang('general.description'): </label>
              <textarea rows="3" name="description" class="form-control"  placeholder="@lang('general.ShortDescription')" maxlength="300"></textarea> 
              <label for="status"> @lang('general.class'):</label> 
      
              <select class="form-control" name="class" style="width:100%;" >
              
            
                     <option value="fa fa-line-chart">&#xf201;</option>
                    <option value="fa fa-usd">&#xf155;</option>
               <option value="fa fa-lightbulb-o">&#xf0eb;</option>
             
               <option value="fa fa-folder-open">&#xf115;</option>
             
               <option value="fa fa fa-eye">&#xf06e;</option>
               <option value="fa fa-handshake-o">&#xf0a4;</option>
                 </select>
              <label for="status"> @lang('general.visibility'):</label> 
              <select class="form-control" name="status" style="width:100%;" >
              

                     <option value="1">@lang('general.public')</option>
                     <option value="0">@lang('general.privat')</option>
               
                 </select>
             
                 
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">@lang('general.close')</button>
              <input type="submit" class="btn btn-primary"value="@lang('general.AddNewService')">     
            </div>
            </form>
          </div>
        </div>
      </div>
       <!--End Add Modal-->
       @foreach ($Service as $item)
       <div class="modal fade" id="myModalShow{{$item->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
             <div class="modal-dialog" role="document">
               <div class="modal-content">
                 <div class="modal-header">
                   <h5 class="modal-title" id="exampleModalLabel">@lang('general.show') @lang('general.service')</h5>
                   <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                   </button>
                 </div>
               
                   @csrf
                 <div class="modal-body">
                   
                 <label for="name">@lang('general.title'): <b>{{$item->title}}</b> </label> <br>
                
              
                <label for="description">@lang('general.description'):<b> {{$item->description}}  </b></label><br>
                <label for="class">@lang('general.class'): <i class="{{$item->class}}"></i></label> 
                   
                
             
                    
                      
                 </div>
                 <div class="modal-footer">
                  </div>
                </div>
             </div>
           </div>
           @endforeach
      <!--Edit Modal-->
      @foreach ($Service as $item)
    <div class="modal fade" id="myModal{{$item->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">@lang('general.edit') @lang('general.service')</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
            <form action="edit-service-{{$item->id}}" method="post">
                @csrf
              <div class="modal-body">
                
              <label for="name">@lang('general.title'): </label> 
              <input type="text" name="title" value="{{$item->title}}" style="width:100%; display:inline;" required class="form-control" placeholder="@lang('general.name')">
            
              
              
            <label for="description">@lang('general.description'): </label>
              <textarea rows="3"  name="description" class="form-control"  placeholder="@lang('general.ShortDescription')" maxlength="200">{{$item->description}}</textarea> 
              <label for="status"> @lang('general.class'):</label> 
              <select class="form-control" name="class" style="width:100%;" >
                <option {{ old('class',$item->class) == 'fa fa-line-chart' ? 'selected' : '' }} value="fa fa-line-chart">&#xf201;</option>
                    <option  {{ old('class',$item->class) == 'fa fa-usd' ? 'selected' : '' }} value="fa fa-usd">&#xf155;</option>
               <option  {{ old('class',$item->class) == 'fa fa-lightbulb-o' ? 'selected' : '' }} value="fa fa-lightbulb-o">&#xf0eb;</option>
             
               <option {{ old('class',$item->class) == 'fa fa-folder-open' ? 'selected' : '' }} value="fa fa-folder-open">&#xf115;</option>
             
               <option {{ old('class',$item->class) == 'fa fa fa-eye' ? 'selected' : '' }} value="fa fa fa-eye">&#xf06e;</option>
               <option {{ old('class',$item->class) == 'fa fa-handshake-o' ? 'selected' : '' }} value="fa fa-handshake-o">&#xf0a4;</option>
                </select>
             
            <label for="status"> @lang('general.visibility'):</label> 
                <select class="form-control" name="status" style="width:100%;" >
                  <option value="1" {{ old('status',$item->status) == 1 ? 'selected' : '' }}>@lang('general.public')</option>
                        <option value="0" {{ old('status',$item->status) == 0 ? 'selected' : '' }}>@lang('general.privat')</option>
                
                 
    
                       
                  
                
                   
                 
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