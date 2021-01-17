<nav class="main-header navbar navbar-expand navbar-white navbar-light">
  <!-- Left navbar links -->
  <ul class="navbar-nav">

  </ul>

  <!-- Right navbar links -->
  <ul class="navbar-nav ml-auto">
    <!-- Notifications Dropdown Menu -->
    <li class="nav-item dropdown">
      <a class="nav-link" data-toggle="dropdown" href="#">
        <span class="badge badge-warning navbar-badge">
          <a href="{{ route('check_slack_messages') }}">
            <i class="far fa-bell"></i>
          </a>
        </span>
      </a>
      <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
        <span class="dropdown-item dropdown-header">
          @if( Session::has('new_messages'))
          {{ Session::get('new_messages')}}
          @endif Notifications</span>
        <div class="dropdown-divider"></div>
        <a href="{{ route('read_new_messages') }}" class="dropdown-item">
          <i class="fas fa-envelope mr-2"></i>
          @if( Session::has('new_messages'))
          {{ Session::get('new_messages')}}
          @endif

        </a>
        <div class="dropdown-divider"></div>
        <a href="https://app.slack.com/client/TDT14BX8W/CDX1CC5CM" target="_blank" ="dropdown-item dropdown-footer">See All Notifications</a>
      </div>
    </li>

  </ul>
</nav>