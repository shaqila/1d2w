@extends('peserta.sidebar')

@section('title')
Dashboard Peserta
@endsection

@section('content')
<div class="section-content section-dashboard-home" data-aos="fade-up">
  <div class="container-fluid">
    <div class="dashboard-heading">
      <h2 class="dashboard-title">Workshop Saya</h2>
    </div>
    <div class="dashboard-content">
      <div class="card mb-3">
        <div class="row g-0">
          @foreach($workshop as $workshops)
          <div class="col-md-4">
            <img src="{{$workshops->getPoster()}}" alt="Image" class="poster img-fluid w-75" style="padding: 20px 20px;" />
          </div>
          <div class="col-md-8">
            <div class="card-body">
              <h5 class="card-title">{{$workshops->nama}}</h5>
              <p class="card-text">
                This is a wider card with supporting text below as a natural lead-in to
                additional content. This content is a little bit longer.
              </p>
              <p class="card-text">
                @if(\Carbon\Carbon::now()->format('Y m d') != \Carbon\Carbon::parse($workshops->tanggal_pelaksanaan)->subDay(1)->format('Y m d'))
                <small class="text-muted"> {{$workshops->tanggal_pelaksanaan}}</small>
                @else
              <div class="alert alert-primary" role="alert">
                Halo <strong>{{Auth::user()->name}}</strong>!
                </br> Workshop ini akan dimulai besok pukul {{ date('H:i', strtotime($workshops->jam_pelaksanaan)) }}
                </br> Ini kode akses aplikasi Zoomnya : <strong>{{$workshops->kode}}</strong>
                </br> Jangan lupa yaa!
                <!-- <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button> -->
              </div>
              @endif
              </p>
              
            </div>
          </div>
          @endforeach
        </div>
      </div>
      <!-- <div class="card-deck">
          <div class="card">
            <div class="col-lg-12" style="padding-bottom: 30px;">
              @foreach($workshop as $workshops)
              <div class="card mb-6">
                <div class="col-6 col-md-4 col-lg-3">
                  <a class="component-workshop d-block" href="/details.html">
                    <div class="myworkshop-thumbnail">
                      <img src="{{$workshops->getPoster()}}" alt="Image" class="myworkshop-image" />
                    </div>
                    <div class="myworkshop-title">
                      {{$workshops->nama}}
                    </div>
                  </a>
                </div>
              </div>
              @endforeach
            </div>
          </div>
        </div> -->
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