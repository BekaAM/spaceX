@if(count($errors) > 0)
    @foreach($errors->all() as $error)

<!--Success-->
<div class="alert alert-danger alert-dismissible fade show mb-0" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
       
        <strong>{{$error}}</strong> 
    </div>

    @endforeach
    @endif
    
    @if(session('success'))
<!--Dagner-->
    <div class="alert alert-success alert-dismissible fade show mb-0" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
           
            <strong> {{session('success')}}</strong>
        </div>
        @endif

@if(session('error'))
<!--Dagner-->
        <div class="alert alert-danger alert-dismissible fade show mb-0" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">×</span>
                </button>
               
                <strong>{{session('error')}}</strong>
            </div>
            @endif