
          @extends('layouts_admin.app')

          @section('content')
        
            <div class="row">
              <div class="col-lg-9 col-md-12">
                <!-- Add New Post Form    <div id="editor-container" class="add-new-post__editor mb-1"></div>-->
                <div class="card card-small mb-3 ">
                  <div class="card-body">
                      <form action="/create-post" class="add-new-post" method="post">
                  @csrf
                      <input class="form-control form-control-lg mb-3" type="text" name="title" placeholder="Your Post Title">
                   

                   
                     
                      <textarea name="content" name="content" class="form-control my-editor" rows="16"></textarea>
                   
                      <br>
                      <div class="input-group">
                        
                      <span class="input-group-btn">
                        <a id="lfm" data-input="thumbnail" style="border-radius:0px; color:white;" data-preview="holder" style="color:white" class="btn btn-primary">
                            <i class="material-icons">
                                add_a_photo
                                </i> @lang('general.cover_images')
                        </a>
                      </span>                                                                                  
                      <input id="thumbnail" style="border-radius:0px;" class="form-control" type="text"  name="cover_images" >
                  </div>
                  <img id="holder" style="margin-top:15px;max-height:200px">
                </div>
                </div>
             
              
                <!-- / Add New Post Form -->
              </div>
              <div class="col-lg-3 col-md-12">
               
                <!-- Post Overview -->
                <div class='card card-small mb-3'>
                  <div class="card-header border-bottom">
                    <h6 class="m-0">@lang('general.categories')</h6>
                  </div>
                  <div class='card-body p-0'>
                    <ul class="list-group list-group-flush">
                      <li class="list-group-item px-3 pb-2">

                        @foreach ($Category as $item)
                            
                      
                          <div class="custom-control custom-checkbox mb-1">
                              <input type="checkbox" class="custom-control-input" value="{{$item->id}}" name="blog_category[]" id="category{{$item->id}}" >
                              <label class="custom-control-label" for="category{{$item->id}}">{{$item->category_name}}</label>
                            </div>
                       
                       
                            @endforeach
                      
                       

                        
                        
                      </li>
                      <li class="list-group-item d-flex px-3">
                            
                       
                        </li>

                    </ul>
                  </div>
                </div>

                
                <div class='card card-small mb-3'>
                    <div class="card-header border-bottom">
                      <h6 class="m-0">Actions</h6>
                    </div>
                    <div class='card-body p-0'>
                      <ul class="list-group list-group-flush">
                        <li class="list-group-item p-3">
                        
                          <span class="d-flex mb-2">
                            <i class="material-icons mr-1">visibility</i>
                            <strong class="mr-1">Visibility:</strong>
                           
                            
                          </span>
                          <div class="custom-control custom-radio mb-1">
                              <input type="radio" class="custom-control-input" id="materialChecked" value="1" name="visibility" checked>
                              <label class="custom-control-label" for="materialChecked"> <strong class="text-success">@lang('general.public')</strong></label>
                            </div>
                          
                          <div class="custom-control custom-radio mb-1">
                              <input type="radio" class="custom-control-input" id="materialUnchecked" value="0" name="visibility">
                              <label class="custom-control-label" for="materialUnchecked"><strong class="text-danger">@lang('general.privat')</strong></label>
                            </div>
                            
                            <!-- Material checked -->
                           
                        
                        </li>
                        <li class="list-group-item d-flex px-3">
                            
                            <button type="submit" class="btn btn-sm btn-accent " style="width:100%;">
                              <i class="material-icons">file_copy</i> Publish</button>
                          </li>
                      </ul>
                    </div>

                    
                  </div>
                
                
              </form>
                <!-- / Post Overview -->
              </div>
            </div>
          
         
          @endsection