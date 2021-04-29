<nav class="navi navbar navbar-expand-lg navbar-light navbar-store fixed-top navbar-fixed-top">
  <div class="container">
    <a class="navbar-brand" href="{{route('home')}}">
      <!-- <img src="{{asset('LOGO-ODTW.png')}}" class="logo-odtw" alt="logo-odtw" /> -->
      <div class="brand-odtw">ODtW</div>
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item {{ '/' == request()->path() ? 'active' : '' }}">
          <a class="nav-link" href="{{route('home')}}">Home</a>
        </li>
        <li class="nav-item {{ '/' == request()->path() ? 'active' : '' }}">
          <a class="nav-link" href="{{route('page_karya')}}">Karya</a>
        </li>
        <li class="nav-item {{ 'about' == request()->path() ? 'active' : '' }}">
            <a class="nav-link" href="{{route('about')}}">About</a>
        </li>
        <li class="nav-item {{ 'tips' == request()->path() ? 'active' : '' }}">
          <a class="nav-link" href="{{route('tips')}}">Tips</a>
        </li>
        @guest
        <li class="nav-item">
          <a class="nav-link" href="{{route('signup')}}">Sign Up</a>
        </li>
        <li class="nav-item lead">
          <a class="daftar-sekarang btn nav-link px-4 text-white" href="{{route('signin')}}">Sign In</a>
        </li>
        @endguest
      </ul>

      @auth
      <div class="btn-group dropdown ml-3">
        <button type="button" class="btn btn-light dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          {{Auth::user()->name}}
        </button>
        <div class="dropdown-menu">
          @if(Auth::user()->role=='admin')
          <a class="dropdown-item" href="{{route('admin-dashboard')}}">Dashboard</a>
          @else
          <a class="dropdown-item" href="{{route('peserta-dashboard')}}">Dashboard</a>
          @endif
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="{{route('logout')}}">Logout</a>
        </div>
      </div>
      @endauth
    </div>
  </div>
</nav>