<aside class="main-sidebar col-12 col-md-3 col-lg-2 px-0">
    <div class="main-navbar">
      <nav class="navbar align-items-stretch navbar-light bg-white flex-md-nowrap border-bottom p-0">
        <a class="navbar-brand w-100 mr-0" href="#" style="line-height: 25px;">
          <div class="d-table m-auto">                                                              
            <img id="main-logo" class="d-inline-block align-top mr-1" style="max-width: 25px;" src="{{ asset('admin/images/shards-dashboards-logo.svg') }}" alt="Shards Dashboard">
            <span class="d-none d-md-inline ml-1">@lang('general.webName')</span>
          </div>
        </a>
        <a class="toggle-sidebar d-sm-inline d-md-none d-lg-none">
          <i class="material-icons">&#xE5C4;</i>
        </a>
      </nav>
    </div>
    
    <div class="nav-wrapper">
      <ul class="nav flex-column">
        <li class="nav-item">
          <a class="nav-link {{ Request::is('dashboard') ? 'active' : '' }}" href="/dashboard">
            <i class="material-icons">edit</i>
            <span>@lang('general.dashboard')</span>
          </a>
        </li>
      
        
   
    
        <ul class="nav nav flex-column">
           {{--  <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle " data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="true">
                  <i class="material-icons">note_add</i>
                <span>@lang('general.blogMng')</span>
              </a>
              <div class="dropdown-menu dropdown-menu-small">
                  <a class="dropdown-item {{ Request::is('add-new-category') ? 'active' : '' }}" href="/add-new-category">@lang('general.AddNewCategory')</a>
                    <a class="dropdown-item  {{ Request::is('add-new-post') ? 'active' : '' }}" href="/add-new-post">@lang('general.AddNewPost')</a>
                    <a class="dropdown-item {{ Request::is('table-post') ? 'active' : '' }}" href="/table-post">@lang('general.tablePost')</a>
                      <a class="dropdown-item  {{ Request::is('components-blog-posts') ? 'active' : '' }}" href="/components-blog-posts">@lang('general.blogArticle')</a>
              
                 </div>
            </li> --}}
        
          </ul>
          
        <li class="nav-item">
            <a class="nav-link  {{ Request::is('user') ? 'active' : '' }} " href="/user">
              <i class="material-icons">person</i>
              <span>@lang('general.userMng')</span>
            </a>
          </li>

          <li class="nav-item">
            <a class="nav-link  {{ Request::is('add-new-about') ? 'active' : '' }} " href="/add-new-about">
              <i class="material-icons">vertical_split</i>
                <span>@lang('general.AddNewAboutUs')</span>
            </a>
          </li>
          <li class="nav-item">
              <a class="nav-link  {{ Request::is('add-new-service') ? 'active' : '' }} " href="/add-new-service">
                <i class="material-icons">apps</i>
                  <span>@lang('general.AddNewService')</span>
              </a>
            </li>
          <li class="nav-item">
              <a class="nav-link  {{ Request::is('add-new-team') ? 'active' : '' }} " href="/add-new-team">
                <i class="material-icons">person</i>
                <span>@lang('general.AddNewTeam')</span>
              </a>
            </li>
            
            <li class="nav-item">
              <a class="nav-link  {{ Request::is('add-new-information') ? 'active' : '' }} " href="/add-new-information">
                <i class="material-icons">apps</i>
                  <span>@lang('general.AddNewInformation')</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link {{ Request::is('gallery') ? 'active' : '' }}" href="/add-new-gallery">
                <i class="material-icons">add_photo_alternate</i>
                <span>@lang('general.AddNewGallery')</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link  {{ Request::is('add-new-faq') ? 'active' : '' }} " href="/add-new-faq">
                <i class="material-icons">question_answer</i>
                  <span>@lang('general.faq')</span>
              </a>
            </li>
            <li class="nav-item">
                <a class="nav-link  {{ Request::is('add-new-subscribe') ? 'active' : '' }} " href="/add-new-subscribe">
                  <i class="material-icons">mail_outline</i>
                    <span>@lang('general.subscripe')</span>
                </a>
              </li>
              <li class="nav-item">
                  <a class="nav-link  {{ Request::is('add-new-messages') ? 'active' : '' }} " href="/add-new-messages">
                    <i class="material-icons">message</i>
                      <span>@lang('general.messages')</span>
                  </a>
                </li>

      
   


      
      </ul>
    </div>
  </aside>