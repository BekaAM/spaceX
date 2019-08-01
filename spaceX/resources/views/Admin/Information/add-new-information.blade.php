@extends('layouts_admin.app')
@section('content')

<script>
var room = 1;
    function Information_fields() {
     
        room++;
        var objTo = document.getElementById('Information_fields')
        var divtest = document.createElement("div");
        divtest.setAttribute("class", "form-group removeclass"+room);
        var rdiv = 'removeclass'+room;
        divtest.innerHTML = '<div class="form-group"> <label for="content">@lang('general.category') :</label>     <select name="category[]"  style="width:88%; display:inline;" required class="form-control"><option value="1">@lang('general.webName')</option><option value="2">@lang('general.urlMap')</option><option value="3">@lang('general.urlGmail')</option><option value="4">@lang('general.urlInstagram')</option><option value="5">@lang('general.urlFacebook')</option><option value="6">@lang('general.urlTwitter')</option><option value="7">@lang('general.phone')</option></select> <div class="input-group-btn" style="display:inline;">    <button  class="btn btn-danger" type="button"  onclick="remove_Information_fields('+ room +');"> <span class="fa fa-minus" aria-hidden="true"></span> </button></div><label for="content">@lang('general.content') :</label> <textarea  name="content" class="form-control" rows="4" placeholder="@lang('general.content')"></textarea>       </div> ';
 








          
       
   
  
      
        
        objTo.appendChild(divtest)
    }
       function remove_Information_fields(rid) {
           $('.removeclass'+rid).remove();
       }
</script>
<div class="row">
    <div class="col">
      <div class="card card-small mb-4">
        <div class="card-header border-bottom">
          <h6 class="m-0">@lang('general.InformationMng')</h6>
        </div>
        <div class="card-body">
                <div class="table-responsive">  
                    <form action="multi-Information-action" method="post">
                        {{ csrf_field() }}
      <table id="example" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                    
                    <th><i  class="material-icons">gamepad</i></th>
                    <th>@lang('general.category')</th>
                   
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
                    <th>@lang('general.category')</th>
                    
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
              <h5 class="modal-title" id="exampleModalLabel">@lang('general.information')</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form action="add-Information" method="post">
              @csrf
            <div class="modal-body">
             
                <label for="content">@lang('general.category') :</label>
                <select name="category[]"  style="width:88%; display:inline;" required class="form-control">

                    <option value="1">@lang('general.webName')</option>
                    <option value="2">@lang('general.urlMap')</option>
                    <option value="3">@lang('general.urlGmail')</option>
                    <option value="4">@lang('general.urlInstagram')</option>
                    <option value="5">@lang('general.urlFacebook')</option>
                    <option value="6">@lang('general.urlTwitter')</option>
                   {{--  <option value="7">@lang('general.phone')</option> --}}
                </select>
            
              <div class="input-group-btn" style="display:inline;">
                  <button  class="btn btn-success" type="button"  onclick="Information_fields();"> <span class="fa fa-plus" aria-hidden="true"></span> </button>
                </div>
                <label for="content[]">@lang('general.content') :</label>
            <textarea  name="content" class="form-control" rows="4" placeholder="@lang('general.content')"></textarea>
                <div style="margin-top:12px;" id="Information_fields">
                
                  </div>
                 
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">@lang('general.close')</button>
              <input type="submit" class="btn btn-primary"value="@lang('general.AddNewInformation')">            </div>
            </form>
          </div>
        </div>
      </div>
       <!--End Add Modal-->

      <!--Edit Modal-->
      @foreach ($Information as $item)
    <div class="modal fade" id="myModal{{$item->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">@lang('general.edit') @lang('general.information')</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
            <form action="edit-Information-{{$item->id}}" method="post">
                @csrf
              <div class="modal-body">
               
               <label for="category">@lang('general.category'): </label> 
               <select name="category"  required class="form-control">

                    <option value="1"{{ old('category',$item->category) == 1 ? 'selected' : '' }}>@lang('general.webName')</option>
                    <option value="2"{{ old('category',$item->category) == 2 ? 'selected' : '' }}>@lang('general.urlMap')</option>
                    <option value="3"{{ old('category',$item->category) == 3 ? 'selected' : '' }}>@lang('general.urlGmail')</option>
                    <option value="4"{{ old('category',$item->category) == 4 ? 'selected' : '' }}>@lang('general.urlInstagram')</option>
                    <option value="5"{{ old('category',$item->category) == 5 ? 'selected' : '' }}>@lang('general.urlFacebook')</option>
                    <option value="6" {{ old('category',$item->category) == 6 ? 'selected' : '' }}>@lang('general.urlTwitter')</option>
                   {{--  <option value="7" {{ old('category',$item->category) == 7 ? 'selected' : '' }}>@lang('general.phone')</option> --}}
                </select>
                   <label for="content">@lang('general.content') :</label>
                <textarea  name="content" class="form-control" rows="4" placeholder="@lang('general.content')">{{$item->content}}</textarea>
                  
                <label for="visibility"> @lang('general.visibility'):</label> 
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