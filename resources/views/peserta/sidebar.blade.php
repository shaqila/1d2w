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
  @stack('addon-style')
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
          <a href="{{route('peserta-dashboard')}}" class="list-group-item list-group-item-action {{ 'peserta/dashboard' == request()->path() ? 'active' : '' }}">Workshop Saya</a>
          <a href="{{route('peserta-setting')}}" class="list-group-item list-group-item-action {{ 'peserta/setting' == request()->path() ? 'active' : '' }}">Settings</a>
          <a href="{{route('logout')}}" class="list-group-item list-group-item-action">Logout</a>
        </div>
      </div>
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