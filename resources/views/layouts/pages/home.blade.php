@extends('layouts.app')

@section('title')
Home | ODTW
@endsection

@section('content')
<!-- <div class="page-content page-home container">
  <section class="ws-jumbotron">
    <div class="container">
      <div class="row">
        <div class="col-lg-12" data-aos="zoom-in" data-aos-duration="2000">
          <div class="jumbotron jumbotron-fluid" style="background-color:white; text-align:center">
            <div class="container">
              <h1 class="display-4">One Day to Write</h1>
              <p class="lead">
                A first place for you to learn writing through your own exploration and imagination
              </p>
              @guest
              <p class="lead">
                <a class="daftar-sekarang btn btn-lg" href="{{route('signup')}}" role="button">Sign Up Now!</a>
              </p>
              @endguest
            </div>
          </div>
        </div>
      </div>
    </div>
  </section> -->

<!-- ======= Hero Section ======= -->
<section id="hero" class="d-flex flex-column justify-content-end align-items-center">
  <div id="heroCarousel" data-bs-interval="5000" class="container carousel carousel-fade" data-bs-ride="carousel">

    <!-- Slide 1 -->
    <div class="carousel-item active">
      <div class="carousel-container" data-aos="fade-up" data-aos-duration="2000">
        <h2>One Day to Write</h2>

        <h5 style="color: white; margin-top: -10px">
          <i class="bx bxs-quote-alt-left quote-icon-left"></i>
           menulis bukan sekedar bercerita 
          <i class="bx bxs-quote-alt-right quote-icon-right"></i>
        </h5>
        @guest
        <a href="{{route('signup')}}" class="btn-get-started animate__animated animate__flash">Sign Up Sekarang</a>
        @endguest
      </div>
    </div>

  </div>

  <svg class="hero-waves" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 24 150 28 " preserveAspectRatio="none">
    <defs>
      <path id="wave-path" d="M-160 44c30 0 58-18 88-18s 58 18 88 18 58-18 88-18 58 18 88 18 v44h-352z">
    </defs>
    <g class="wave1">
      <use xlink:href="#wave-path" x="50" y="3" fill="rgba(255,255,255, .1)">
    </g>
    <g class="wave2">
      <use xlink:href="#wave-path" x="50" y="0" fill="rgba(255,255,255, .2)">
    </g>
    <g class="wave3">
      <use xlink:href="#wave-path" x="50" y="9" fill="#fff">
    </g>
  </svg>

</section><!-- End Hero -->

<section id="workshop" class="workshop">
  <div class="container">
    <div class="section-title" data-aos="fade-up" data-aos-duration="2000">
      <!-- <span>Workshop</span> -->
      <h2>Workshop</h2>
    </div>
    <div class="row">
      @foreach($workshop as $workshops)
      <div class="card-workshop col-6 col-md-4 col-lg-3" data-aos="fade-up" data-aos-duration="2000">
        <a class="component-workshop d-block" href="{{route('detail_workshop',$workshops->slug)}}">
          <div class="workshop-thumbnail">
            <img src="{{$workshops->getPoster()}}" alt="Image" class="workshop-image" />
          </div>
          <div class="workshop-text" style="text-transform:capitalize; font-weight:500">
            {{$workshops->nama}}
          </div>

          <div class="workshop-date">
            {{ Carbon\Carbon::parse($workshops->tanggal_pelaksanaan)->translatedFormat('l, d F Y') }}
            </br>
            {{ date('H:i', strtotime($workshops->jam_pelaksanaan)) }} WIB
          </div>
          <div class="workshop-price">
            @currency($workshops->harga)
          </div>
        </a>
      </div>
      @endforeach
    </div>
  </div>
</section>

<section id="tips" class="tips">
  <div class="container">
    <div class="row" data-aos="fade-up" data-aos-duration="2000">
      <div class="col-lg-8 content">
        <h3>Cara Pendaftaran</h3>
        <!-- <p class="fst-italic">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et
                    dolore
                    magna aliqua.
                </p> -->
        <ul class="ml-2">
          <li><i class="bi bi-circle-fill"></i>Pilih Workshop yang ingin kamu ikuti</li>
          <li><i class="bi bi-circle-fill"></i>Klik tombol "Daftar Sekarang" pada halaman Detail Workshop</li>
          <li><i class="bi bi-circle-fill"></i>Lengkapi form data pendaftaran</li>
          <li><i class="bi bi-circle-fill"></i>Lakukan pembayaran melalui transfer pada Bank yang tercantum</li>
          <li><i class="bi bi-circle-fill"></i>Klik tombol "Submit"</li>
          <li><i class="bi bi-circle-fill"></i>Kirim konfirmasi pembayaran melalui <strong>Whatsapp</strong> pada nomor <strong>0800000000</strong></li>
          <li><i class="bi bi-circle-fill"></i>Tunggu balasan konfirmasi dari Admin</li>
        </ul>
      </div>
      <div class="col-lg mt-5 ml-2" style="margin-left:-60px">
        <img src="assets/img/regist2.svg" class="img-fluid" alt="">
      </div>
    </div>
  </div>
</section>

<section id="testimonials" class="testimonials">
  <div class="container">

    <div class="section-title" data-aos="fade-up" data-aos-duration="2000">
      <h2>Kesan</h2>
    </div>

    <div class="testimonials-slider swiper-container" data-aos="fade-up" data-aos-duration="2000">
      <div class="swiper-wrapper">

        <div class="swiper-slide">
          <div class="testimonial-item">
            <p>
              <i class="bx bxs-quote-alt-left quote-icon-left"></i>
              Workshop Writing with mom kereeeen....
              membuka cakrawala menulis, memunculkan ide-ide kreatif mom dan anak...
              yang ngga diduga-duga..semoga terus berkembang dan menginovasi program2nya..
              Mendekatkan anak bangsa dengan buku.. 💖
              <i class="bx bxs-quote-alt-right quote-icon-right"></i>
            </p>
            <h3>Beryl &amp; Ummi</h3>
            <h4>Adults Level</h4>
          </div>
        </div>

        <div class="swiper-slide">
          <div class="testimonial-item">
            <p>
              <i class="bx bxs-quote-alt-left quote-icon-left"></i>
              Workshop ini menyenangkan dan menambah ilmu menulis.
              Fadhila jadi tahu lebih luas ilmu menulis.
              Fadhila juga ingin membuat cerita pendek dan dibukukan, makasih kak.
              Terimakasih juga untuk feedbacknya. Semoga makin sukses dan maju😊
              <i class="bx bxs-quote-alt-right quote-icon-right"></i>
            </p>
            <h3>Fadhila</h3>
            <h4>Kids Level</h4>
          </div>
        </div>

        <div class="swiper-slide">
          <div class="testimonial-item">
            <p>
              <i class="bx bxs-quote-alt-left quote-icon-left"></i>
              Kesan pesanku selama menjadi peserta workshop novella itu seru banget,
              terus penjelasan nya jelas bangettt, sama aku enjoy banget sih,
              pesan ku mungkin kedepannya kalo ada sesi tanya jawabnya lebih dipanjangin hehe 😸
              supaya nanya nya puas 🤩
              <i class="bx bxs-quote-alt-right quote-icon-right"></i>
            </p>
            <h3>Karissa</h3>
            <h4>Teens Level</h4>
          </div>
        </div>

        <div class="swiper-slide">
          <div class="testimonial-item">
            <p>
              <i class="bx bxs-quote-alt-left quote-icon-left"></i>
              OneDayToWrite class novella
              Nambah ilmu, nambah pengalaman, karya kita dibaca banyak orang lewat aplikasi keren best to write.
              @mariniarinboboho
              <i class="bx bxs-quote-alt-right quote-icon-right"></i>
            </p>
            <h3>Marini</h3>
            <h4>Adults Level</h4>
          </div>
        </div>

      </div>
      <div class="swiper-pagination"></div>
    </div>

  </div>
</section>

</div>
@endsection