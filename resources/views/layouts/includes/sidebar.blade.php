<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a href="../index3.html" class="brand-link">
    <img src="{{asset('adminlte/img/AdminLTELogo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
    <span class="brand-text font-weight-light">{{ config('app.name', 'Laravel') }}</span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        <img src="{{asset('adminlte/img/user2-160x160.jpg')}}" class="img-circle elevation-2" alt="User Image">
      </div>
      <div class="info">
        <a href="#" class="d-block">{{ Auth::user()->name }}</a>
      </div>
    </div>

    <!-- SidebarSearch Form -->
    <div class="form-inline">
      <div class="input-group" data-widget="sidebar-search">
        <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
        <div class="input-group-append">
          <button class="btn btn-sidebar">
            <i class="fas fa-search fa-fw"></i>
          </button>
        </div>
      </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
           with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="{{ url('positions') }}" class="dropdown-item">
                <i class="nav-icon fa fa-user-alt"></i>
                Positions
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ url('departments') }}" class="dropdown-item">
                <i class="nav-icon fa fa-building"></i>
                Departments
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ url('users') }}" class="dropdown-item">
                <i class="nav-icon fa fa-users"></i>
                Users
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ url('news_categories') }}" class="dropdown-item">
                <i class="nav-icon fa fa-file-alt"></i>
                News Categories
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ url('news') }}" class="dropdown-item">
                <i class="nav-icon fa fa-newspaper"></i>
                News
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ url('events') }}" class="dropdown-item">
                <i class="nav-icon fa fa-calendar-alt"></i>
                Events
            </a>
          </li>
          
          <li class="nav-header">------</li>
          <li class="nav-item">
            <a class="dropdown-item" href="{{ route('logout') }}"
                onclick="event.preventDefault();
                document.getElementById('logout-form').submit();">
                <i class="nav-icon fa fa-sign-out-alt"></i>
                {{ __('Logout') }}
            </a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
          </li>
          
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>