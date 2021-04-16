<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <meta name="description" content="" />
  <meta name="author" content="" />

  <title>@yield('title')</title>

  <!-- Style -->
  @stack('prepend-style')
  @include('layouts.includes.style')
  @stack ('addon-style')
</head>

<body>
  <div class="page-dashboard">
    <div class="d-flex" id="wrapper" data-aos="fade-right">
      <!-- Sidebar -->
      <div class="border-right" id="sidebar-wrapper">
        <div class="sidebar-heading text-center">
          <img src="{{asset('LOGO-ODTW.png')}}" alt="" class="logo-odtw" />
        </div>
        <div class="list-group list-group-flush">
          <a href="/dashboard.html" class="list-group-item list-group-item-action active">Workshop Saya</a>
          <a href="/dashboard-settings.html" class="list-group-item list-group-item-action">Pengaturan</a>
          <a href="/dashboard-account.html" class="list-group-item list-group-item-action">Akun Saya</a>
        </div>
      </div>
      <div id="page-content-wrapper">
        <nav class="navbar navbar-store navbar-expand-lg navbar-light fixed-top" data-aos="fade-down">
          <button class="btn btn-secondary d-md-none mr-auto mr-2" id="menu-toggle">
            &laquo; Menu
          </button>

          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>

          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto d-none d-lg-flex">
              <li class="nav-item dropdown">
                <a class="nav-link" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <img src="{{asset('assets/img/team/team-3.jpg')}}" alt="" class="rounded-circle mr-2 profile-picture" />
                  Hi, Angga
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <a class="dropdown-item" href="/index.html">Kembali ke Beranda</a>
                  <a class="dropdown-item" href="/dashboard-account.html">Pengaturan</a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="/">Logout</a>
                </div>
              </li>
            </ul>
            <!-- Mobile Menu -->
            <ul class="navbar-nav d-block d-lg-none mt-3">
              <li class="nav-item">
                <a class="nav-link" href="#">
                  Hi, Angga
                </a>
              </li>
            </ul>
          </div>
        </nav>
        <!-- Page Content-->
        @yield('content')
      </div>
    </div>
    
    <!-- Footer -->
    @include('layouts.includes.footer')

    <!-- Script-->
    @stack('prepend-script')
    @include('layouts.includes.script')
    @stack ('addon-script')

</body>

</html>