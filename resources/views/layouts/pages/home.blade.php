@extends('layouts.app')

@section('title')
ODTW | One Day To Write
@endsection

@section('content')
<div class="page-content page-home container">
  <section class="ws-jumbotron">
    <div class="container">
      <div class="row">
        <div class="col-lg-12" data-aos="zoom-in" data-aos-duration="2000">
          <div class="jumbotron jumbotron-fluid" style="background-color:white; text-align:center">
            <div class="container">
              <h1 class="display-4">One Day To Write</h1>
              <p class="lead">
                A first place for you to learn writing through your own exploration and imagination
              </p>
              <p class="lead">
                <a class="daftar-sekarang btn btn-lg" href="{{route('register')}}" role="button">Sign Up Now!</a>
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>



  <section id="workshop" class="workshop" data-aos="fade-up" data-aos-duration="2000">
    <div class="container">
      <div class="section-title">
        <span>Workshop</span>
        <h2>Workshop</h2>
      </div>
      <div class="row">
        @foreach($workshop as $workshops)
        <div class="card-workshop col-6 col-md-4 col-lg-3" data-aos="fade-up" data-aos-duration="2000">
          <a class="component-workshop d-block" href="{{route('detail_workshop',$workshops->id)}}">
            <div class="workshop-thumbnail">
              <img src="{{$workshops->getPoster()}}" alt="Image" class="workshop-image" />
            </div>
            <div class="workshop-text">
              {{$workshops->nama}}
            </div>
            <div class="workshop-date">
              {{ date('l, d F Y', strtotime($workshops->tanggal_pelaksanaan)) }}</br> {{ date('H:i', strtotime($workshops->jam_pelaksanaan)) }}
            </div>
            <div class="workshop-price">
              Rp. {{number_format($workshops->harga, 0, ',', '.')}}
            </div>
          </a>
        </div>
        @endforeach
      </div>
    </div>
  </section>

  <section id="creation" class="creation" data-aos="fade-up" data-aos-duration="2000">
    <div class="container">
      <div class="section-title">
        <span>Karya</span>
        <h2>  Karya</h2>
      </div>

      <div class="row">
        @foreach($karya as $karyas)
        <div class="col-12 col-sm-6 col-md-4 col-lg-3" data-aos="fade-up" data-aos-duration="2000">
          <a class="card card-dashboard-karya d-block" href="{{route('detail_creation',$karyas->id)}}">
            <div class="card-body">
              <div class="karya-thumbnail">
                <img src="{{$karyas->getCover()}}" alt="" class="karya-image img-fluid" />
              </div>
              <div class="karya-title">{{$karyas->nama_karya}}</div>
              <div class="karya-category">{{$karyas->level}}</div>
            </div>
          </a>
        </div>
        @endforeach
      </div>
  </section>

  <section id="testimonials" class="testimonials" data-aos="fade-up" data-aos-duration="2000">
    <div class="container">

      <div class="section-title">
        <span>Kesan & Pesan</span>
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
                Aku belum pernah melihat komunitas sekeren ini sebelumnya,rasa senang dan kaget tercampur aduk ketika aku mengikuti workshop online yang diadakan oleh komunitas One Day To Write 🌈
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