<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>

    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
     

      <!-- Messages Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-comments"></i>
          <span class="badge badge-danger navbar-badge">3</span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <a href="#" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
              <img src="{{ url('public/dist/img/elder.png') }}" alt="User Avatar" class="img-size-50 mr-3 img-circle">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  Brad Diesel
                  <span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>
                </h3>
                <p class="text-sm">Call me whenever you can...</p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
              </div>
            </div>
            <!-- Message End -->
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
              <img src="{{ url('public/dist/img/manu.jpg') }}" alt="User Avatar" class="img-size-50 img-circle mr-3">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  John Pierce
                  <span class="float-right text-sm text-muted"><i class="fas fa-star"></i></span>
                </h3>
                <p class="text-sm">I got your message bro</p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
              </div>
            </div>
            <!-- Message End -->
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
              <img src="{{ url('public/dist/img/lamec.png') }}" alt="User Avatar" class="img-size-50 img-circle mr-3">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  Nora Silvester
                  <span class="float-right text-sm text-warning"><i class="fas fa-star"></i></span>
                </h3>
                <p class="text-sm">The subject goes here</p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
              </div>
            </div>
            <!-- Message End -->
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item dropdown-footer">See All Messages</a>
        </div>
      </li>
      <!-- Notifications Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-bell"></i>
          <span class="badge badge-warning navbar-badge">15</span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <span class="dropdown-item dropdown-header">15 Notifications</span>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-envelope mr-2"></i> 4 new messages
            <span class="float-right text-muted text-sm">3 mins</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-users mr-2"></i> 8 friend requests
            <span class="float-right text-muted text-sm">12 hours</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-file mr-2"></i> 3 new reports
            <span class="float-right text-muted text-sm">2 days</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-widget="control-sidebar" data-controlsidebar-slide="true" href="#" role="button">
          <i class="fas fa-th-large"></i>
        </a>
      </li>
    </ul>
  </nav>
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
        <a href="javascript:;" class="brand-link" style="text-align: center;">
    <a href="javascript:;" class="brand-link" style="text-align: center;">
      <img src="{{ url('public/dist/img/repent.webp') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light" style="font-weight: bold !important;text-align: center; font-size: 25px">G-45 MAIN</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{ url('public/dist/img/manu.jpg') }}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">{{ Auth::user()->name}}</a>
        </div>
      </div>

      <!-- SidebarSearch Form -->


      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

          @if(Auth::user()->user_type ==1)
            <li class="nav-item">
              <a href="{{ url('admin/dashboard') }}" class="nav-link @if(Request::segment(1) =='dashboard') active @endif">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>
                  Dashboard
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ url('admin/admin/list') }}" class="nav-link @if(Request::segment(1) =='admin') active @endif">
                <i class="nav-icon far fa-user"></i>
                <p>
                  Admin
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ url('admin/members/list') }}" class="nav-link @if(Request::segment(1) =='member') active @endif">
                <i class="nav-icon far fa-user"></i>
                <p>
                  Member
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ url('admin/cluster/list') }}" class="nav-link @if(Request::segment(1) =='cluster') active @endif">
                <i class="nav-icon far fa-user"></i>
                <p>
                  Cluster
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ url('admin/accountability/list') }}" class="nav-link @if(Request::segment(1) =='accountability') active @endif">
                <i class="nav-icon far fa-user"></i>
                <p>
                  Accountablity
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ url('admin/leaders/list') }}" class="nav-link @if(Request::segment(1) =='leaders') active @endif">
                <i class="nav-icon far fa-user"></i>
                <p>
                  Leaders
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ url('admin/pastors/list') }}" class="nav-link @if(Request::segment(1) =='pastors') active @endif">
                <i class="nav-icon far fa-user"></i>
                <p>
                  Pastors
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ url('admin/assign_accountability/list') }}" class="nav-link @if(Request::segment(1) =='assign_accountability') active @endif">
                <i class="nav-icon far fa-user"></i>
                <p>
                  Assign-Accountablity
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ url('admin/visitor/list') }}" class="nav-link @if(Request::segment(1) =='visitor') active @endif">
                <i class="nav-icon far fa-user"></i>
                <p>
                  Visitors
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ url('admin/change_password') }}" class="nav-link @if(Request::segment(1) =='change_password') active @endif">
                <i class="nav-icon far fa-user"></i>
                <p>
                  Change Password
                </p>
              </a>
            </li>
          @elseif(Auth::user()->user_type ==2)
            <li class="nav-item">
              <a href="{{ url('pastors/dashboard') }}" class="nav-link @if(Request::segment(2) =='dashboard') active @endif">
                <i class="nav-icon far fa-user"></i>
                <p>
                  Pastors
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ url('pastors/account') }}" class="nav-link @if(Request::segment(2) =='account') active @endif">
                <i class="nav-icon far fa-user"></i>
                <p>
                  My Account
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ url('pastors/change_password') }}" class="nav-link @if(Request::segment(2) =='change_password') active @endif">
                <i class="nav-icon far fa-user"></i>
                <p>
                  Change Password
                </p>
              </a>
            </li>

          @elseif(Auth::user()->user_type ==3)
            <li class="nav-item">
              <a href="{{ url('leaders/dashboard') }}" class="nav-link @if(Request::segment(3) =='dashboard') active @endif">
                <i class="nav-icon far fa-user"></i>
                <p>
                  Leaders
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ url('leaders/account') }}" class="nav-link @if(Request::segment(3) =='account') active @endif">
                <i class="nav-icon far fa-user"></i>
                <p>
                  My Account
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ url('leaders/change_password') }}" class="nav-link @if(Request::segment(3) =='change_password') active @endif">
                <i class="nav-icon far fa-user"></i>
                <p>
                  Change Password
                </p>
              </a>
            </li>
          @elseif(Auth::user()->user_type ==4)
            <li class="nav-item">
              <a href="{{ url('members/dashboard') }}" class="nav-link @if(Request::segment(4) =='dashboard') active @endif">
                <i class="nav-icon far fa-user"></i>
                <p>
                  Members
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ url('members/account') }}" class="nav-link @if(Request::segment(4) =='account') active @endif">
                <i class="nav-icon far fa-user"></i>
                <p>
                  My Account
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ url('members/my_accountability') }}" class="nav-link @if(Request::segment(4) =='my_accountability') active @endif">
                <i class="nav-icon far fa-user"></i>
                <p>
                  Accountablity
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ url('members/change_password') }}" class="nav-link @if(Request::segment(4) =='change_password') active @endif">
                <i class="nav-icon far fa-user"></i>
                <p>
                  Change Password
                </p>
              </a>
            </li>
          @endif
          
               

          
          <li class="nav-item">
            <a href="{{ url('logout') }}" class="nav-link">
              <i class="nav-icon far fa-user"></i>
              <p>
                Logout
              </p>
            </a>
          </li>
         

        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>




