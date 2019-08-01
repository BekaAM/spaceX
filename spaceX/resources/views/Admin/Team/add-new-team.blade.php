@extends('layouts_admin.app')
@section('content')


<div class="row">
    <div class="col">
      <div class="card card-small mb-4">
        <div class="card-header border-bottom">
          <h6 class="m-0">@lang('general.teamMng')</h6>
        </div>
        <div class="card-body">
                <div class="table-responsive">  
                    <form action="multi-team-action" method="post">
                        {{ csrf_field() }}
      <table id="example" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                    
                    <th><i  class="material-icons">gamepad</i></th>
                    <th>@lang('general.name')</th>
                    <th>@lang('general.lastname')</th>
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
                    <th>@lang('general.name')</th>
                    <th>@lang('general.lastname')</th>
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
              <h5 class="modal-title" id="exampleModalLabel">@lang('general.team')</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form action="add-team" method="post">
              @csrf
            <div class="modal-body">
             
              <label for="name">@lang('general.name'): </label> 
              <input type="text" name="name" style="width:100%; display:inline;" required class="form-control" placeholder="@lang('general.name')">
              <label for="lastname">@lang('general.lastname'): </label> 
              <input type="text" name="lastname" style="width:100%; display:inline;" required class="form-control" placeholder="@lang('general.lastname')">
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
            <label for="profession">@lang('general.profession'): </label> 
              <input type="text" name="profession" style="width:100%; display:inline;" required class="form-control" placeholder="@lang('general.profession')">
             {{--  <label for="description">@lang('general.description'): </label>
              <textarea rows="3" name="description" class="form-control"  placeholder="@lang('general.ShortDescription')" maxlength="200"></textarea> 
            --}}   <label for="url_facebook">@lang('general.urlFacebook'): </label> 
              <input type="text" name="url_facebook" style="width:100%; display:inline;" required class="form-control" placeholder="@lang('general.urlFacebook')">
              <label for="url_gmail">@lang('general.urlGmail'): </label> 
              <input type="text" name="url_gmail" style="width:100%; display:inline;" required class="form-control" placeholder="@lang('general.urlGmail')">
              <label for="url_twitter">@lang('general.urlTwitter'): </label> 
              <input type="text" name="url_twitter" style="width:100%; display:inline;" required class="form-control" placeholder="@lang('general.urlTwitter')">
             
              <label for="status"> @lang('general.visibility'):</label> 
              <select class="form-control" name="status" style="width:100%;" >
              

                     <option value="1">@lang('general.public')</option>
                     <option value="0">@lang('general.privat')</option>
               
                 </select>
             
                 
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">@lang('general.close')</button>
              <input type="submit" class="btn btn-primary"value="@lang('general.AddNewTeam')">     
            </div>
            </form>
          </div>
        </div>
      </div>
       <!--End Add Modal-->
       @foreach ($Team as $item)
       <div class="modal fade" id="myModalShow{{$item->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
             <div class="modal-dialog" role="document">
               <div class="modal-content">
                 <div class="modal-header">
                   <h5 class="modal-title" id="exampleModalLabel">@lang('general.show') @lang('general.team')</h5>
                   <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                   </button>
                 </div>
               
                   @csrf
                 <div class="modal-body">
                   
                 <label for="name">@lang('general.name'): <b>{{$item->name}}</b> </label> <br>
                 <label for="lastname">@lang('general.lastname'):<b> {{$item->lastname}}</b> </label> <br>
                 <label for="lastname">@lang('general.cover_images'):<br> <img src='{{ asset("$item->cover_images") }}'  style="margin-top:15px;  max-height:150px"> </label> <br>
                
                 
                
              
               <label for="profession">@lang('general.profession'):<b> {{$item->profession}}</b> </label> <br>
              {{--   <label for="description">@lang('general.description'):<b> {{$item->description}}  </b></label><br>
                --}}  <label for="url_facebook">@lang('general.urlFacebook'):<b>  {{$item->url_facebook}}</b></label> <br>
                <label for="url_gmail">@lang('general.urlGmail'): <b>{{$item->url_gmail}}</b></label> <br>
                 <label for="url_twitter">@lang('general.urlTwitter'):<b> {{$item->url_twitter}}</b></label><br> 
               
                   
                
             
                    
                      
                 </div>
                 <div class="modal-footer">
                  </div>
                </div>
             </div>
           </div>
           @endforeach
      <!--Edit Modal-->
      @foreach ($Team as $item)
    <div class="modal fade" id="myModal{{$item->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">@lang('general.edit') @lang('general.team')</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
            <form action="edit-team-{{$item->id}}" method="post">
                @csrf
              <div class="modal-body">
                
              <label for="name">@lang('general.name'): </label> 
              <input type="text" name="name" value="{{$item->name}}" style="width:100%; display:inline;" required class="form-control" placeholder="@lang('general.name')">
              <label for="lastname">@lang('general.lastname'): </label> 
              <input type="text"  value="{{$item->lastname}}" name="lastname" style="width:100%; display:inline;" required class="form-control" placeholder="@lang('general.lastname')">
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
            <label for="profession">@lang('general.profession'): </label> 
            <input type="text" value="{{$item->profession}}" name="profession" style="width:100%; display:inline;" required class="form-control" placeholder="@lang('general.profession')">
              {{-- <label for="description">@lang('general.description'): </label>
              <textarea rows="3"  name="description" class="form-control"  placeholder="@lang('general.ShortDescription')" maxlength="200">{{$item->description}}</textarea> 
            --}}   <label for="url_facebook">@lang('general.urlFacebook'): </label> 
              <input type="text" value="{{$item->url_facebook}}" name="url_facebook" style="width:100%; display:inline;" required class="form-control" placeholder="@lang('general.urlFacebook')">
              <label for="url_gmail">@lang('general.urlGmail'): </label> 
              <input type="text" value="{{$item->url_gmail}}" name="url_gmail" style="width:100%; display:inline;" required class="form-control" placeholder="@lang('general.urlGmail')">
              <label for="url_twitter">@lang('general.urlTwitter'): </label> 
              <input type="text" value="{{$item->url_twitter}}" name="url_twitter" style="width:100%; display:inline;" required class="form-control" placeholder="@lang('general.urlTwitter')">
             
                
             
            <label for="status"> @lang('general.visibility'):</label> 
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