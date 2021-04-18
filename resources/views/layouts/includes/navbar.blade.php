<nav class="navbar navbar-expand-lg navbar-light navbar-store fixed-top navbar-fixed-top">
  <div class="container" data-aos="fade-down" data-aos-duration="2000">
    <a class="navbar-brand" href="{{url('home')}}">
      <img src="{{asset('LOGO-ODTW.png')}}" class="logo-odtw" alt="logo-odtw" />
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item active">
          <a class="nav-link" href="{{url('home')}}">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#section1">About</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#section2">Contact Us</a>
        </li>
        @if(Auth::user())
        <div class="btn-group dropdown">
          <button type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            {{Auth::user()->name}}
          </button>
          <div class="dropdown-menu">
            <a class="dropdown-item" href="{{route('admin-dashboard')}}">Dashboard</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="{{Auth::logout()}}">Logout</a>
          </div>
        </div>
        @else
        <li class="nav-item">
          <a class="nav-link" href="{{route('register')}}">Daftar</a>
        </li>
        <li class="nav-item lead">
          <a class="daftar-sekarang btn nav-link px-4 text-white" href="{{route('login')}}">Masuk</a>
        </li>
        @endif
      </ul>
    </div>
  </div>
</nav>