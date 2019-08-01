@extends('layouts_admin.app')
@section('content')

<link rel="stylesheet" href="{{ asset('dropzone/dropzone.min.css') }}"> 
<script type="text/javascript"  src="{{ asset('dropzone/dropzone.js') }}" ></script>

<div class="row">
    <div class="col">
      <div class="card card-small mb-4">
        <div class="card-header border-bottom">
          <h6 class="m-0">@lang('general.galleryMng')</h6>
        </div>
        <div class="card-body">
                <div class="table-responsive">  
                        <form method="post" action="{{url('image/upload/store')}}" enctype="multipart/form-data" 
                  class="dropzone" id="dropzone" style="margin-bottom:10px;">
    @csrf
</form>
                    <form action="multi-gallery-action" method="post">
                        {{ csrf_field() }}
      <table id="example" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                    
                    <th><i  class="material-icons">gamepad</i></th>
       
                    <th>@lang('general.gallery')</th>
                  
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
                <th><i  class="material-icons">    <form method="post" action="{{url('image/upload/store')}}" enctype="multipart/form-data" 
                  class="dropzone" id="dropzone">
    @csrf
</form>gamepad</i></th>

                    <th>@lang('general.gallery')</th>
                  
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

 

      <!--Edit Modal
      @foreach ($Gallery as $item)
    <div class="modal fade" id="myModal{{$item->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">@lang('general.show') @lang('general.gallery')</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
           
                @csrf
              <div class="modal-body">
                  
                  <img src="photos/gallery/{{$item->filename}}" class="img-fluid" >
                
                 
                   
              </div>
              <div class="modal-footer">
                </div>
            </div>
          </div>
        </div>
        @endforeach
       End Edit Modal
        <div id="show" class="modal fade" role="dialog">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title"></h4>
                            </div>
                              <div class="modal-body">
                              <div class="form-group">
                                <label for="">ID :</label>
                                <b id="i"/>
                               
                              </div>
                              <div class="form-group">
                        
                          <script>
                            var imgSource1 =document.getElementById("filename").filename;
                         
                            </script>

                                  <img src="" id="imgSource1"/>
                             
                               </div>
                             
                            
                              </div>
                              </div>
                            </div>
          </div>
        
          
          </div>-->
 
  @endsection
  