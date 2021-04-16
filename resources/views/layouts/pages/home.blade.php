@extends('layouts.app')

@section('title')
ODTW | One Day To Write
@endsection

@section('content')
<div class="page-content page-home container">
  <section class="ws-jumbotron">
    <div class="container">
      <div class="row">
        <div class="col-lg-12" data-aos="zoom-in">
          <div class="jumbotron jumbotron-fluid" style="background-color:white; text-align:center">
            <div class="container">
              <h1 class="display-6">One Day To Write</h1>
              <p class="lead">
                A first place for you to learn writing through your own exploration and imagination
              </p>
              <p class="lead">
                <a class="daftar-sekarang btn btn-lg" href="{{route('register')}}" role="button">Daftar Sekarang!</a>
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>



  <section id="workshop" class="workshop" data-aos="fade-up" data-aos-duration="3000">
    <div class="container">
      <div class="section-title">
        <span>Workshop</span>
        <h2>Workshop</h2>
      </div>
      <div class="row">
        @foreach($workshop as $workshops)
        <div class="col-6 col-md-4 col-lg-3" data-aos="fade-up" data-aos-duration="3000">
          <a class="component-workshop d-block" href="{{route('detail_workshop')}}">
            <div class="workshop-thumbnail">
              <img src="{{$workshops->getPoster()}}" alt="Image" class="workshop-image" />
            </div>
            <div class="workshop-text">
              {{$workshops->nama}}
            </div>
            <div class="workshop-price">
              {{$workshops->harga}}
            </div>
          </a>
        </div>
        @endforeach
      </div>
    </div>
  </section>

  <section id="creation" class="creation" data-aos="fade-up" data-aos-duration="3000">
    <div class="container">
      <div class="section-title">
        <span>Kumpulan Karya Workshop</span>
        <h2>Kumpulan Karya Workshop</h2>
      </div>

      <div class="row mt-4">
        @foreach($karya as $karyas)
        <div class="col-12 col-sm-6 col-md-4 col-lg-3" data-aos="fade-up" data-aos-duration="3000">
          <a class="card card-dashboard-karya d-block" href="{{url('/creation-details/{id}')}}">
            <div class="card-body">
              <img src="{{$karyas->getCover()}}" alt="" class="karya-image" />
              <div class="karya-title">{{$karyas->nama_karya}}</div>
              <div class="karya-category">{{$karyas->level}}</div>
            </div>
          </a>
        </div>
        @endforeach
      </div>
  </section>

  <section id="testimonials" class="testimonials" data-aos="fade-up" data-aos-delay="200">
    <div class="container">

      <div class="section-title">
        <span>Testimonials</span>
        <h2>Testimonials</h2>
      </div>

      <div class="testimonials-slider swiper-container" data-aos="fade-up" data-aos-delay="100">
        <div class="swiper-wrapper">

          <div class="swiper-slide">
            <div class="testimonial-item">
              <p>
                <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                Proin iaculis purus consequat sem cure digni ssim donec porttitora entum suscipit rhoncus. Accusantium
                quam, ultricies eget id, aliquam eget nibh et. Maecen aliquam, risus at semper.
                <i class="bx bxs-quote-alt-right quote-icon-right"></i>
              </p>
              <h3>Saul Goodman</h3>
              <h4>Ceo &amp; Founder</h4>
            </div>
          </div>

          <div class="swiper-slide">
            <div class="testimonial-item">
              <p>
                <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                Enim nisi quem export duis labore cillum quae magna enim sint quorum nulla quem veniam duis minim
                tempor labore quem eram duis noster aute amet eram fore quis sint minim.
                <i class="bx bxs-quote-alt-right quote-icon-right"></i>
              </p>
              <h3>Jena Karlis</h3>
              <h4>Store Owner</h4>
            </div>
          </div>

          <div class="swiper-slide">
            <div class="testimonial-item">
              <p>
                <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                Fugiat enim eram quae cillum dolore dolor amet nulla culpa multos export minim fugiat minim velit
                minim dolor enim duis veniam ipsum anim magna sunt elit fore quem dolore labore illum veniam.
                <i class="bx bxs-quote-alt-right quote-icon-right"></i>
              </p>
              <h3>Matt Brandon</h3>
              <h4>Freelancer</h4>
            </div>
          </div>

          <div class="swiper-slide">
            <div class="testimonial-item">
              <p>
                <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                Quis quorum aliqua sint quem legam fore sunt eram irure aliqua veniam tempor noster veniam enim culpa
                labore duis sunt culpa nulla illum cillum fugiat legam esse veniam culpa fore nisi cillum quid.
                <i class="bx bxs-quote-alt-right quote-icon-right"></i>
              </p>
              <h3>John Larson</h3>
              <h4>Entrepreneur</h4>
            </div>
          </div>

        </div>
        <div class="swiper-pagination"></div>
      </div>

    </div>
  </section>

</div>
@endsection