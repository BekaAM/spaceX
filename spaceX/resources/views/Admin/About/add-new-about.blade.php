@extends('layouts_admin.app')
@section('content')


<div class="row">
    <div class="col">
      <div class="card card-small mb-4">
        <div class="card-header border-bottom">
          <h6 class="m-0">@lang('general.aboutMng')</h6>
        </div>
        <div class="card-body">
                <div class="table-responsive">  
                    <form action="multi-about-action" method="post">
                        {{ csrf_field() }}
      <table id="example" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                    
                    <th><i  class="material-icons">gamepad</i></th>
                    <th>@lang('general.title')</th>
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
                    <th>@lang('general.title')</th>
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
              <h5 class="modal-title" id="exampleModalLabel">@lang('general.about')</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form action="add-about" method="post">
              @csrf
            <div class="modal-body">
          
            <label for="title">@lang('general.title'): </label> 
              <input type="text" name="title" style="width:100%; display:inline;" required class="form-control" placeholder="@lang('general.title')">
             
              <label for="description">@lang('general.description'): </label>
              <textarea rows="3" name="description" class="form-control"  placeholder="@lang('general.ShortDescription')" maxlength="500"></textarea> 
              <label for="lastname">@lang('general.cover_images'): </label> 
              <div class="input-group">
                        
                <span class="input-group-btn">
                  <a id="lfm" data-input="thumbnail" style="border-radius:0px; color:white;" data-preview="holder" style="color:white" class="btn btn-primary">
                      <i class="material-icons">
                          add_a_photo
                          </i> @lang('general.cover_images')
                  </a>
                </span>                                                                                  
                <input id="thumbnail" style="border-radius:0px;" required class="form-control" type="text"  name="cover_images" >
          
              </div>
              <img id="holder" style="margin-top:15px;  max-height:150px"> 
              <br>  
              <label for="category"> @lang('general.category'):</label> 
              <select class="form-control" name="category" style="width:100%;" >
                 

                     <option value="1">@lang('general.banner')</option>
                     <option value="2">@lang('general.aboutUs')</option>
                     <option value="3">@lang('general.feature')</option>
              </select>
              <label for="status"> @lang('general.visibility'):</label> 
              <select class="form-control" name="status" style="width:100%;" >
              

                     <option value="1">@lang('general.public')</option>
                     <option value="0">@lang('general.privat')</option>
               
                 </select>
             
                 
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">@lang('general.close')</button>
              <input type="submit" class="btn btn-primary"value="@lang('general.AddNewAboutUs')">     
            </div>
            </form>
          </div>
        </div>
      </div>
       <!--End Add Modal-->
       @foreach ($About as $item)
       <div class="modal fade" id="myModalShow{{$item->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
             <div class="modal-dialog" role="document">
               <div class="modal-content">
                 <div class="modal-header">
                   <h5 class="modal-title" id="exampleModalLabel">@lang('general.show') </h5>
                   <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                   </button>
                 </div>
               
                   @csrf
                 <div class="modal-body">
                   
                
                 
                
              
              
                    <label for="title">@lang('general.title'):<b> {{$item->title}}</b> </label> <br>
                   
                    <label for="description">@lang('general.description'):<b> {{$item->description}}  </b></label><br>
                    <label for="cover_images">@lang('general.cover_images'):<br> <img src='{{ asset("$item->cover_images") }}'  style="margin-top:15px;  max-height:150px"> </label> <br>
                 
                   
                
             
                    
                      
                 </div>
                 <div class="modal-footer">
                  </div>
                </div>
             </div>
           </div>
           @endforeach
      <!--Edit Modal-->
      @foreach ($About as $item)
    <div class="modal fade" id="myModal{{$item->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">@lang('general.edit')</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
            <form action="edit-about-{{$item->id}}" method="post">
                @csrf
              <div class="modal-body">
                
           
              
            <label for="title">@lang('general.title'): </label> 
            <input type="text" value="{{$item->title}}" name="title" style="width:100%; display:inline;" required class="form-control" placeholder="@lang('general.title')">
              <label for="description">@lang('general.description'): </label>
              <textarea rows="3"  name="description" class="form-control"  placeholder="@lang('general.ShortDescription')" maxlength="500">{{$item->description}}</textarea> 
              <label for="lastname">@lang('general.cover_images'): </label> 
              <div class="input-group">
                        
                <span class="input-group-btn">
                  <a id="lfm{{$item->id}}" data-input="thumbnail{{$item->id}}" style="border-radius:0px; color:white;" data-preview="holder{{$item->id}}" style="color:white" class="btn btn-primary">
                      <i class="material-icons">
                          add_a_photo
                          </i> @lang('general.cover_images')
                  </a>
                </span>                                                                                  
                <input id="thumbnail{{$item->id}}" value="{{$item->cover_images}}" style="border-radius:0px;" required class="form-control" type="text"  name="cover_images" >
          
              </div>
              
              <img id="holder{{$item->id}}" src='{{ asset("$item->cover_images") }}'  style="margin-top:15px;  max-height:150px">
            <br>  
              <label for="category"> @lang('general.category'):</label> 
              <select class="form-control" name="category" style="width:100%;" >
                 

                     <option value="1"   {{ old('category',$item->category) == 1 ? 'selected' : '' }}>@lang('general.banner')</option>
                     <option value="2"  {{ old('category',$item->category) == 2 ? 'selected' : '' }}>@lang('general.aboutUs')</option>
                     <option value="3"  {{ old('category',$item->category) == 3 ? 'selected' : '' }}>@lang('general.feature')</option>
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