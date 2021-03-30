<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Premium Laundry</title>
  
  <!-- General CSS Files -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

  <!-- CSS Libraries -->
  <link rel="stylesheet" href="{{ asset('assets/stisla/jqvmap/dist/jqvmap.min.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/stisla/weathericons/css/weather-icons.min.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/stisla/weathericons/css/weather-icons-wind.min.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/stisla/summernote/dist/summernote-bs4.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/stisla/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/stisla/datatables.net-select-bs4/css/select.bootstrap4.min.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/stisla/prism/prism.css') }}">


  <!-- Template CSS -->
  <link rel="stylesheet" href="{{ asset('assets/stisla/css/style.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/stisla/css/components.css') }}">
</head>

<style>
  .badge-status {
    min-width: 5rem;
  }
</style>

<body>
  @include('sweetalert::alert')

  <div id="app">
    <div class="main-wrapper">
      <div class="navbar-bg"></div>
      <nav class="navbar navbar-expand-lg main-navbar">
        <form class="form-inline mr-auto">
          <ul class="navbar-nav mr-3">
            <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>            
          </ul>          
        </form>
        <ul class="navbar-nav navbar-right">                                      
          <li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
            <img alt="image" src="{{ asset('assets/images/avatar/avatar-5.png') }}" class="rounded-circle mr-1">
            <div class="d-sm-none d-lg-inline-block">Hi, {{ session('auth.admin.fullname') }}</div></a>
            <div class="dropdown-menu dropdown-menu-right">
              <div class="dropdown-title">Logged in 5 sec ago</div>              
              <div class="dropdown-divider"></div>
              <a href="{{ route('logout') }}" class="dropdown-item has-icon text-danger">
                <i class="fas fa-sign-out-alt"></i> Logout
              </a>
            </div>
          </li>
        </ul>
      </nav>
      <div class="main-sidebar">
        <aside id="sidebar-wrapper">
          <div class="sidebar-brand">
            <a href="#">Premium Laundry</a>
          </div>
          <div class="sidebar-brand sidebar-brand-sm">
            <a href="#">PL</a>
          </div>
          <ul class="sidebar-menu">
              <li class="menu-header">Dashboard</li>
              <li class="nav-item @if(request()->is('admin/dashboard')) active @endif">
                <a href="{{ route('admin.dashboard') }}" class="nav-link">
                  <i class="fas fa-fire"></i><span>Dashboard</span>
                </a>
              </li>
              <li class="menu-header">Menu</li>
              <li class="nav-item dropdown 
                @if(request()->is('admin/outlet*')) active @endif
                @if(request()->is('admin/employee*')) active @endif
                @if(request()->is('admin/product*')) active @endif
                @if(request()->is('admin/member*')) active @endif"
              >
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-bars"></i> <span>Management</span></a>
                <ul class="dropdown-menu">
                  <li><a class="nav-link @if(request()->is('admin/outlet*')) active @endif" href="{{ route('admin.outlet.index') }}">Outlets</a></li>
                  <li><a class="nav-link @if(request()->is('admin/employee*')) active @endif" href="{{ route('admin.employee.index') }}">Employees</a></li>
                  <li><a class="nav-link @if(request()->is('admin/product*')) active @endif" href="{{ route('admin.product.index') }}">Products</a></li>
                  <li><a class="nav-link @if(request()->is('admin/member*')) active @endif" href="{{ route('admin.member.index') }}">Members</a></li>                  
                </ul>
              </li>
              <li class="nav-item">
                <a href="" class="nav-link">
                  <i class="fas fa-credit-card"></i><span>Entry Transaction</span>
                </a>
              </li>
              <li class="nav-item">
                <a href="" class="nav-link">
                  <i class="fas fa-compass"></i><span>Member Location</span>
                </a>
              </li>
              <li class="nav-item">
                <a href="/reports" class="nav-link">
                  <i class="fas fa-file-invoice"></i><span>Reports</span>
                </a>
              </li>
            </ul>            
        </aside>
      </div>

      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          @yield('content')
        </section>
      </div>
      
    </div>
  </div>


  <!-- General JS Scripts -->
  <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
  <script src="{{ asset('assets/stisla/js/stisla.js') }}"></script>

  <!-- Template JS File -->
  <script src="{{ asset('assets/stisla/js/scripts.js') }}"></script>
  <script src="{{ asset('assets/stisla/js/custom.js') }}"></script>

  <!-- JS Libraies -->
  <script src="{{ asset('assets/stisla/impleweather/jquery.simpleWeather.min.js') }}"></script>
  <script src="{{ asset('assets/stisla/chart.js/dist/Chart.min.js') }}"></script>
  <script src="{{ asset('assets/stisla//jqvmap/dist/jquery.vmap.min.js') }}"></script>
  <script src="{{ asset('assets/stisla/jqvmap/dist/maps/jquery.vmap.world.js') }}"></script>
  <script src="{{ asset('assets/stisla/summernote/dist/summernote-bs4.js') }}"></script>
  <script src="{{ asset('assets/stisla/chocolat/dist/js/jquery.chocolat.min.js') }}"></script>

  <script src="{{ asset('assets/stisla/prism/prism.js') }}"></script>

  <!-- JS Libraies Datatables -->
  <script src="{{ asset('assets/stisla/datatables/media/js/jquery.dataTables.min.js') }}"></script>
  <script src="{{ asset('assets/stisla/datatables.net-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
  <script src="{{ asset('assets/stisla/datatables.net-select-bs4/js/select.bootstrap4.min.js') }}"></script>
  <script src="{{ asset('assets/stisla/jquery-ui/jquery-ui.min.js') }}"></script>

  <!-- Page Specific JS File -->
  <script src="{{ asset('assets/stisla/js/page/index-0.js') }}"></script>
  <script src="{{ asset('assets/stisla/js/page/modules-datatables.js') }}"></script>
  <script src="{{ asset('assets/stisla/js/page/bootstrap-modal.js') }}"></script>
</body>

@yield('modal')

</html>
