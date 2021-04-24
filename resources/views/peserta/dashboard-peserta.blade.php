@extends('peserta.sidebar')

@section('title')
Dashboard Peserta
@endsection

@section('content')
<nav class="navbar navbar-store navbar-expand-lg navbar-light fixed-top" data-aos="fade-down">
  <button class="btn d-md-none mr-auto mr-2" id="menu-toggle" style="background-color:#7abaff; color:white">
    &laquo; Menu
  </button>
</nav>
<div class="section-content section-dashboard-home" data-aos="fade-up">
  <div class="container-fluid">
    <div class="dashboard-heading">
      <h2 class="dashboard-title">Workshop Yang Saya Ikuti</h2>
    </div>
    <div class="dashboard-content">
      @foreach($workshop as $workshops)
      <div class="card mb-3">
        <div class="row">
          <div class="col-md-3">
            <img src="{{$workshops->getPoster()}}" alt="Image" class="poster img-fluid" style="padding: 10px 10px; "/>
          </div>
          <div class="col-md-8">
            <div class="card-body" >
              <h5 class="card-title" style="text-transform:capitalize">{{$workshops->nama}}</h5>
              <p class="card-text">
                @if(\Carbon\Carbon::now()->format('Y m d') != \Carbon\Carbon::parse($workshops->tanggal_pelaksanaan)->subDay(1)->format('Y m d'))
                <strong>{{ Carbon\Carbon::parse($workshops->tanggal_pelaksanaan)->translatedFormat('l, d F Y') }}</strong>
                @else
              <div class="alert alert-primary" role="alert">
                Halo <strong>{{Auth::user()->name}}</strong>!
                </br> Workshop ini akan dimulai besok pukul {{ date('H:i', strtotime($workshops->jam_pelaksanaan)) }}
                </br> Ini kode akses aplikasi Zoomnya : <strong>{{$workshops->kode}}</strong>
                </br> Jangan lupa yaa!
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              @endif
              </p>
            </div>
          </div>
        </div>
      </div>
      @endforeach
    </div>
  </div>
</div>
@endsection

@push('addon-script')
<!-- Menu Toggle Script -->
<script>
  $("#menu-toggle").click(function(e) {
    e.preventDefault();
    $("#wrapper").toggleClass("toggled");
  });
</script>
@endpush