<!-- fixed-top-->
    <nav class="header-navbar navbar-expand-md navbar navbar-with-menu fixed-top navbar-semi-dark navbar-border">
      <div class="navbar-wrapper">
        <div class="navbar-header">
          <ul class="nav navbar-nav flex-row">
            <li class="nav-item mobile-menu d-md-none mr-auto"><a class="nav-link nav-menu-main menu-toggle hidden-xs" href="#"><i class="ft-menu font-large-1"></i></a></li>
            <li class="nav-item"><a class="navbar-brand" href="./backend">
                {{-- <img class="brand-logo" alt="stack admin logo" src="./logo.png"> --}}
                <h2 class="brand-text">Courses</h2>
              </a>
              </li>
            <li class="nav-item d-md-none"><a class="nav-link open-navbar-container" data-toggle="collapse" data-target="#navbar-mobile"><i class="fa fa-ellipsis-v"></i></a></li>
          </ul>
        </div>
        <div class="navbar-container content">
          <div class="collapse navbar-collapse" id="navbar-mobile">
            <ul class="nav navbar-nav mr-auto float-left">

            </ul>
            <ul class="nav navbar-nav float-right">
            
              <li class="dropdown dropdown-user nav-item">
                <a class="dropdown-toggle nav-link dropdown-user-link" href="#" data-toggle="dropdown">
                  <span class="avatar avatar-online">
         
                   
                      <img src="{{url('/assets/backend/images/User-Avatar.png')}}" alt="avatar" style="height:30px">
                    
                    <i></i>
                  </span>
                  <span class="user-name">{{auth()->user()->name}}</span>
                </a>
                <div class="dropdown-menu dropdown-menu-right">
               
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="{{route('backend.logout')}}"><i class="ft-power"></i> Logout</a>
                </div>
              </li>
              
            </ul>
          </div>
        </div>
      </div>
    </nav>

    <!-- ////////////////////////////////////////////////////////////////////////////-->


    <div class="main-menu menu-fixed menu-dark menu-accordion menu-bordered" data-scroll-to-active="true">
      <div class="main-menu-content">
            <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
              <li class="nav-item" ><a class="nav-link"  href="{{url('backend')}}"  data-action="dashboard.index"> <i class="ft-home"></i><span class="menu-title" >Dashboard</span></a>
              </li>
              <li class="nav-item" ><a class="nav-link"  href="{{url('backend/categories')}}"  data-action="categories.index"> <i class="ft-list"></i><span class="menu-title" >Categories</span></a>
              <li class="nav-item" ><a class="nav-link"  href="{{url('backend/courses')}}"  data-action="courses.index"> <i class="ft-list"></i><span class="menu-title" >Courses</span></a>
              </li>
        
            </ul>

      </div>
    </div>