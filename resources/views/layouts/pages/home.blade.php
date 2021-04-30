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
      <div class="carousel-container">
        <h2 class="animate__animated animate__fadeInDown">One Day to Write</h2>
        <p class="animate__animated fanimate__adeInUp">Ut velit est quam dolor ad a aliquid qui aliquid. Sequi ea ut et est quaerat sequi nihil ut aliquam. Occaecati alias dolorem mollitia ut. Similique ea voluptatem. Esse doloremque accusamus repellendus deleniti vel. Minus et tempore modi architecto.</p>
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
        <a class="component-workshop d-block" href="{{route('detail_workshop',$workshops->id)}}">
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
          <li><i class="bi bi-circle-fill"></i>Lakukan pembayaran melalui transfer <strong>Bank BCA 08123131 a.n Shaqila Erbeliza</strong></li>
          <li><i class="bi bi-circle-fill"></i>Klik tombol "Submit"</li>
          <li><i class="bi bi-circle-fill"></i>Kirim konfirmasi pembayaran melalui <strong>Whatsapp</strong> pada nomor <strong>085157574711</strong></li>
          <li><i class="bi bi-circle-fill"></i>Tunggu balasan konfirmasi dari Admin</li>
        </ul>
      </div>
      <div class="col-lg mt-3" style="margin-left:-60px">
        <img src="assets/img/regist.svg" class="img-fluid" alt="">
      </div>
    </div>
  </div>
</section>

<section id="testimonials" class="testimonials">
  <div class="container">

    <div class="section-title" data-aos="fade-up" data-aos-duration="2000">
      <!-- <span>Kesan & Pesan</span> -->
      <h2>Kesan & Pesan</h2>
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

        <!-- <div class="swiper-slide">
            <div class="testimonial-item">
              <p>
                <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                “Hai, saya Elvis (@efanizar). 
                Wiken kemarin saya ikut workshop menulis kelas adults secara online 
                di @onedaytowrite yang dibimbing oleh kak @lala.elmira selama 2 hari. 
                Sebagai penulis cerita pendek pemula, kelas tingkat dasar ini sangat 
                membantu saya untuk bisa memulai menulis cerita pendek yang ringan. 
                Kita diperkenalkan dengan flash fiction dan ciri-cirinya, lalu diberi 
                tugas untuk membuat flash fiction. Kita juga dibimbing gimana 
                menghubungkan judul dengan konflik yang kita angkat di cerita serta 
                gimana menghidupkan cerita dan menguatkan tokoh melalui dialog. 
                Di akhir kelas, kita ditantang untuk membuat cerita pendek. Nantikan 
                kumpulan cerita pendek kita yang akan diterbitkan oleh @ellunarpublish_. 
                Pasti seru bacanya.
                <i class="bx bxs-quote-alt-right quote-icon-right"></i>
              </p>
              <h3>Elvis</h3>
              <h4>Adults Level</h4>
            </div>
          </div> -->

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

        <!-- <div class="swiper-slide">
            <div class="testimonial-item">
              <p>
                <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                Alhamdulillah, ODTW memberikan workshop novella kids,aku ucapkan terima kasih banyak! 🌺
                Aku belum pernah melihat komunitas sekeren ini sebelumnya,rasa senang dan kaget tercampur aduk ketika aku mengikuti workshop online yang diadakan oleh komunitas One Day to Write 🌈
                Sekali lagi,aku ucapkan terima kasih kepada mentor-mentor ODTW yang sudah membimbing aku dan teman-teman selama workshop menulis online ini 🌇
                Aku berharap ODTW tetap semangat berbagi ilmu untuk anak anak Indonesia 💖
                Salam semangat dan ceria,
                <i class="bx bxs-quote-alt-right quote-icon-right"></i>
              </p>
              <h3>Sasha</h3>
              <h4>Kids Level</h4>
            </div>
          </div> -->

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