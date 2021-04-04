<nav class="navbar navbar-expand-lg navbar-light navbar-store fixed-top navbar-fixed-top" data-aos="fade-down">
    <div class="container">
        <a class="navbar-brand" href="/">
            <img src="/images/logo.svg" alt="" />
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="{{url('home')}}">Beranda </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{url('creation')}}">Kumpulan Karya</a>
                </li>
                @if(Auth::user())
                @else
                <li class="nav-item">
                    <a class="nav-link" href="#">Sign Up</a>
                </li>
                <li class="nav-item">
                    <a class="getstarted" href="/login.html">Sign In</a>
                </li>
                @endif
            </ul>
        </div>
    </div>
</nav>