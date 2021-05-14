@extends('peserta.sidebar')

@section('title')
Dashboard Peserta | ODTW
@endsection

@push('prepend-style')
<link href="{{asset('assets/vendor/bootstrap-5.0.0-beta3-dist/css/bootstrap.min.css')}}" rel="stylesheet">
@endpush

@push('prepend-script')
<script src="{{asset('assets/vendor/bootstrap-5.0.0-beta3-dist/js/bootstrap.min.js')}}"></script>
<script src="{{asset('assets/vendor/bootstrap-5.0.0-beta3-dist/js/bootstrap.bundle.min.js')}}"></script>
@endpush

@section('content')
<nav class="navbar navbar-store navbar-expand-lg navbar-light fixed-top" data-aos="fade-down">
  <button class="btn d-md-none mr-auto mr-2" id="menu-toggle" style="background-color:#7abaff; color:white">
    &laquo; Menu
  </button>
</nav>
<div class="section-content section-dashboard-home" data-aos="fade-up">
  <div class="container-fluid">
    @if(session('sukses'))
    <div class="alert alert-success" roles="alert">
      <button type="button" class="close" data-dismiss="alert">×</button>
      {{session('sukses')}}
    </div>
    @endif
    @if(session('error'))
    <div class="alert alert-danger" roles="alert">
      <button type="button" class="close" data-dismiss="alert">×</button>
      {{session('error')}}
    </div>
    @endif


    <div class="dashboard-heading">
      <h2 class="dashboard-title">Workshop Yang Saya Ikuti</h2>
      <p style="margin-top:-15px">*Workshop akan muncul setelah pembayaran terkonfirmasi.</p>
    </div>
    <div class="dashboard-content">
      @foreach($peserta as $peserta)
      @if ($peserta->status != "Belum Bayar")
      <div class="card mb-3">
        <div class="row">
          <div class="col-md-3">
            <img src="{{$peserta->workshop->getPoster()}}" alt="Image" class="poster img-fluid" style="padding: 10px 10px; " />
          </div>
          <div class="col-md-8">
            <div class="card-body">
              <h4 class="card-title" style="text-transform:capitalize">{{$peserta->workshop->nama}}</h4>
              <p class="card-text " style="margin-bottom:-2px">Nama Peserta : <strong>{{$peserta->nama_lengkap}}</strong></p>
              <p class="card-text " style="margin-bottom:-2px"> Waktu Pelaksanaan :
                @if(\Carbon\Carbon::now()->format('Y m d') != \Carbon\Carbon::parse($peserta->workshop->tanggal_pelaksanaan)->subDay(1)->format('Y m d'))
                <strong>{{ Carbon\Carbon::parse($peserta->workshop->tanggal_pelaksanaan)->translatedFormat('l, d F Y') }} - {{ date('H:i', strtotime($peserta->workshop->jam_pelaksanaan)) }} WIB</strong>
                @else
              <div class="alert alert-primary" style="margin-bottom:-20px" role="alert">
                Workshop ini akan dimulai <strong>besok</strong> pukul <strong>{{ date('H:i', strtotime($peserta->workshop->jam_pelaksanaan))}} WIB</strong>
                </br>
                Ini kode akses Kelas: <strong>{{$peserta->workshop->kode}}</strong>
              </div>
              @endif
              @if(\Carbon\Carbon::now()->format('Y m d') == \Carbon\Carbon::parse($peserta->workshop->tanggal_pelaksanaan)->format('Y m d'))
              <div class="alert alert-danger" style="margin-bottom:-20px">
                Workshop ini dilaksanakan hari ini pada pukul <strong>{{ date('H:i', strtotime($peserta->workshop->jam_pelaksanaan))}} WIB</strong>
                </br>
                Silahkan masuk Kelas dengan Kode : <strong>{{$peserta->workshop->kode}}</strong>
              </div>
              @endif
              <br />
              </p>
              <p class="card-text" style="margin-bottom:-2px; margin-top:10px"> Feedback :
                @if($peserta->feedback == null)
              <div>Feedback untuk Kamu dari Kami belum dibuat, ditunggu yaa!</div>
              @else
              <div class="alert alert-primary" role="alert">
                {{$peserta->feedback}}
              </div>
              @endif
              </p>
            </div>

            @if($peserta->naskah == null)
            <form action="{{route('naskah_peserta')}}" enctype="multipart/form-data" method="POST">
              @csrf
              <div class="col-9 ml-1 mb-3" style="margin-top:-20px">
                <label for="formFileSm" class="form-label">Upload Naskah</label>
                <input name="naskah" class="form-control form-control-sm" id="naskah" type="file" value="{{old('naskah')}}">
                <input type="hidden" name="workshop_id" value="{{$peserta->workshop->id}}" readonly />
                <button style="background-color: #7abaff;color: white; margin-top:10px" type="submit" id="upload_naskah" class="btn btn-sm">Kirim Naskah</button>
              </div>
            </form>
            @endif
            @if($peserta->naskah != null && $peserta->revisi == null)
            <form action="{{route('revisi_peserta')}}" enctype="multipart/form-data" method="POST">
              @csrf
              <div class="col-9 ml-1 mb-3" style="margin-top:-20px">
                <label for="formFileSm" class="form-label">Upload <strong>Revisi</strong></label>
                <input name="revisi" class="form-control form-control-sm" id="revisi" type="file" value="{{old('revisi')}}">
                <input type="hidden" name="workshop_id" value="{{$peserta->workshop->id}}" readonly />
                <button style="background-color: #7abaff;color: white; margin-top:10px" type="submit" id="upload_revisi" class="btn btn-sm">Kirim Revisi Naskah</button>
              </div>
              @endif

          </div>
        </div>
      </div>
      @endif
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
<script type="text/javascript">
  $(document).ready(function() {
    $('#upload_revisi').bind("click", function() {
      var imgVal = $('#revisi').val();
      if (imgVal == '') {
        alert("Silahkan Pilih File Kamu");
        return false;
      }
    });
  });
</script>
<script type="text/javascript">
  $(document).ready(function() {
    $('#upload_naskah').bind("click", function() {
      var imgVal = $('#naskah').val();
      if (imgVal == '') {
        alert("Silahkan Pilih File Kamu");
        return false;
      }
    });
  });
</script>
@endpush