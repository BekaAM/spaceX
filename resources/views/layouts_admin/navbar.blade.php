
<div class="main-navbar sticky-top bg-white">
    <!-- Main Navbar -->
    <nav class="navbar align-items-stretch navbar-light flex-md-nowrap p-0">
        
 <form action="/blog-posts" method="get" class="main-navbar__search w-100 d-none d-md-flex d-lg-flex">
        @csrf
        <div class="input-group input-group-seamless ml-3">
          <div class="input-group-prepend">
            <div class="input-group-text">
            <!--  <i class="fas fa-search"></i>-->
            </div>
          </div>
          <input class="navbar-search form-control" type="hidden" name="searchTerm" placeholder="@lang('general.SearchForPost')" aria-label="Search" required> </div>
      </form> 
      <ul class="navbar-nav border-left flex-row ">
        
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle text-nowrap px-3" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
          <img class="user-avatar rounded-circle mr-2" src="{{asset('admin/images/avatars/user_no_photo_300x300.png')}}" alt="User Avatar">
            <span class="d-none d-md-inline-block">{{ Auth::user()->email }}</span>
          </a>
          <div class="dropdown-menu dropdown-menu-small">
          {{--   <a class="dropdown-item" href="user-profile-lite">
              <i class="material-icons">&#xE7FD;</i> Profile</a>
            <a class="dropdown-item" href="components-blog-posts">
              <i class="material-icons">vertical_split</i> Blog Posts</a>
            <a class="dropdown-item" href="add-new-post">
              <i class="material-icons">note_add</i> Add New Post</a>
            <div class="dropdown-divider"></div> --}}
         
           
           
     <a   href="{{ route('logout') }}"  class="dropdown-item" onclick="event.preventDefault();
     document.getElementById('logout-form').submit();">
              <i class="material-icons text-danger">&#xE879;</i> @lang('general.logout') </a>


              <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                {{ csrf_field() }}
            </form>
          </div>
        </li>
      </ul>
      <nav class="nav">
        <a href="#" class="nav-link nav-link-icon toggle-sidebar d-md-inline d-lg-none text-center border-left" data-toggle="collapse" data-target=".header-navbar" aria-expanded="false" aria-controls="header-navbar">
          <i class="material-icons">&#xE5D2;</i>
        </a>
      </nav>
    </nav>
  </div>