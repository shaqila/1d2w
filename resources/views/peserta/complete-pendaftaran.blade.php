@extends('layouts.app')

@section('content')

<section id="about" class="about">
  <div class="page-content page-success" style="font-family: Poppins, sans-serif">
    <div class=" section-success" data-aos="zoom-in">
      <div class="container">
        <div class="row align-items-center row-login justify-content-center">
          <div class="col-lg-6 text-center">
            <div class="checkout">
              <img src="assets/img/success.svg" alt="" class="mb-4 w-25 mt-5" />
              <h2>
                Checkout Berhasil!
              </h2>
              <p>
                Silahkan lakukan konfirmasi pembayaran melalui <br />
                <strong style="color:#fff; font-size:22px; letter-spacing: 1px">Whatsapp 08123123131</strong><br /> untuk melanjutkan proses pendaftaran.
              </p>
              <div>
                <a class="btn w-50 mt-2" href="{{route('peserta-dashboard')}}" style="background-color:#7abaff; color:white;">
                  Dashboard Saya
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection