@extends('layouts.app')

@section('content')

<body>
	<div class="page-content page-success" style="font-family: Poppins, sans-serif">
      <div class="section-success" data-aos="zoom-in">
        <div class="container">
          <div class="row align-items-center row-login justify-content-center">
            <div class="col-lg-6 text-center">
              <img src="assets/img/success.svg" alt="" class="mb-4 w-25" />
              <h2>
                Checkout Berhasil!
              </h2>
              <p>
                Silahkan lakukan konfirmasi pembayaran melalui <br/>
                <strong style="color:#25d366; font-size:large">Whatsapp 08123123131</strong><br/> untuk melanjutkan proses pendaftaran.
              </p>
              <div>
                <a class="btn w-50 mt-4" href="{{route('peserta-dashboard')}}" style="background-color:#7abaff; color:white;">
                  Dashboard Saya
                </a>
                <a class="btn btn-signup w-50 mt-2" href="/index.html">
                  Butuh Bantuan
                </a>
              </div>
            </div>
          </div>
        </div>
    </div>
</body>
@endsection