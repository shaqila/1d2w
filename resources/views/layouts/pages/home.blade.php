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
                                <a class="btn btn-success btn-lg" href="#" role="button">Sign Up Now</a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
		</div>
	</section>

	<!-- <section class="ws-categories">
		<div class="tm-paging-links" data-aos="fade-up" data-aos-delay="200">
			<nav>
				<ul>
					<li class="tm-paging-item"><a href="#" class="tm-paging-link active">All</a></li>
					<li class="tm-paging-item"><a href="#" class="tm-paging-link">Kids</a></li>
                    <li class="tm-paging-item"><a href="#" class="tm-paging-link">Teens</a></li>
                    <li class="tm-paging-item"><a href="#" class="tm-paging-link">Adults</a></li>
				</ul>
			</nav>
		</div>
	</section> -->

	<!-- <section class="ws-workshop">
		<div class="row tm-gallery"> -->
			<!-- Category All -->
			<!-- <div id="tm-gallery-page-all" class="tm-gallery-page">
				<a class="col-lg-3 col-md-4 col-sm-6 col-12 tm-gallery-item" data-aos="fade-up" data-aos-delay="300" href="#">
					<figure>
						<img src="img/gallery/01.jpg" alt="Image" class="img-fluid tm-gallery-img" />
							<figcaption>
								<h4 class="tm-gallery-title">Fusce dictum finibus</h4>
								<p class="tm-gallery-description">Nam in suscipit nisi, sit amet consectetur metus. Ut sit amet tellus accumsan</p>
								<p class="tm-gallery-price">$45 / $55</p>
							</figcaption>
					</figure>
				</a>
				<a class="col-lg-3 col-md-4 col-sm-6 col-12 tm-gallery-item" data-aos="fade-up" data-aos-delay="400" href="#">
					<figure>
						<img src="img/gallery/02.jpg" alt="Image" class="img-fluid tm-gallery-img" />
							<figcaption>
								<h4 class="tm-gallery-title">Aliquam sagittis</h4>
								<p class="tm-gallery-description">Nam in suscipit nisi, sit amet consectetur metus. Ut sit amet tellus accumsan</p>
								<p class="tm-gallery-price">$65 / $70</p>
							</figcaption>
						</figure>
				</a>
				<a class="col-lg-3 col-md-4 col-sm-6 col-12 tm-gallery-item" data-aos="fade-up" data-aos-delay="500" href="#">
					<figure>
						<img src="img/gallery/03.jpg" alt="Image" class="img-fluid tm-gallery-img" />
							<figcaption>
								<h4 class="tm-gallery-title">Sed varius turpis</h4>
								<p class="tm-gallery-description">Nam in suscipit nisi, sit amet consectetur metus. Ut sit amet tellus accumsan</p>
								<p class="tm-gallery-price">$30.50</p>
							</figcaption>
						</figure>
				</a>
				<a class="col-lg-3 col-md-4 col-sm-6 col-12 tm-gallery-item" data-aos="fade-up" data-aos-delay="600" href="#">
					<figure>
						<img src="img/gallery/08.jpg" alt="Image" class="img-fluid tm-gallery-img" />
						<figcaption>
							<h4 class="tm-gallery-title">Noodle One</h4>
							<p class="tm-gallery-description">Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.</p>
							<p class="tm-gallery-price">$12.50</p>
						</figcaption>
					</figure>
				</a>
				<a class="col-lg-3 col-md-4 col-sm-6 col-12 tm-gallery-item" data-aos="fade-up" data-aos-delay="700" href="#">
					<figure>
						<img src="img/gallery/08.jpg" alt="Image" class="img-fluid tm-gallery-img" />
						<figcaption>
							<h4 class="tm-gallery-title">Noodle One</h4>
							<p class="tm-gallery-description">Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.</p>
							<p class="tm-gallery-price">$12.50</p>
						</figcaption>
					</figure>
				</a>
				<a class="col-lg-3 col-md-4 col-sm-6 col-12 tm-gallery-item" data-aos="fade-up" data-aos-delay="800" href="#">
					<figure>
						<img src="img/gallery/08.jpg" alt="Image" class="img-fluid tm-gallery-img" />
						<figcaption>
							<h4 class="tm-gallery-title">Noodle One</h4>
							<p class="tm-gallery-description">Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.</p>
							<p class="tm-gallery-price">$12.50</p>
						</figcaption>
					</figure>
				</a>
			</div> -->

			<!-- Category Kids -->
			<!-- <div id="tm-gallery-page-kids" class="tm-gallery-page hidden">
				<a class="col-lg-3 col-md-4 col-sm-6 col-12 tm-gallery-item" data-aos="fade-up" data-aos-delay="200" href="#">
					<figure>
						<img src="img/gallery/03.jpg" alt="Image" class="img-fluid tm-gallery-img" />
							<figcaption>
								<h4 class="tm-gallery-title">Fusce dictum finibus</h4>
								<p class="tm-gallery-description">Nam in suscipit nisi, sit amet consectetur metus. Ut sit amet tellus accumsan</p>
								<p class="tm-gallery-price">$45 / $55</p>
							</figcaption>
					</figure>
				</a>
				<a class="col-lg-3 col-md-4 col-sm-6 col-12 tm-gallery-item" data-aos="fade-up" data-aos-delay="300" href="#">
					<figure>
						<img src="img/gallery/01.jpg" alt="Image" class="img-fluid tm-gallery-img" />
							<figcaption>
								<h4 class="tm-gallery-title">Aliquam sagittis</h4>
								<p class="tm-gallery-description">Nam in suscipit nisi, sit amet consectetur metus. Ut sit amet tellus accumsan</p>
								<p class="tm-gallery-price">$65 / $70</p>
							</figcaption>
						</figure>
				</a>
				<a class="col-lg-3 col-md-4 col-sm-6 col-12 tm-gallery-item" data-aos="fade-up" data-aos-delay="400" href="#">
					<figure>
						<img src="img/gallery/04.jpg" alt="Image" class="img-fluid tm-gallery-img" />
							<figcaption>
								<h4 class="tm-gallery-title">Sed varius turpis</h4>
								<p class="tm-gallery-description">Nam in suscipit nisi, sit amet consectetur metus. Ut sit amet tellus accumsan</p>
								<p class="tm-gallery-price">$30.50</p>
							</figcaption>
						</figure>
				</a>
				<a class="col-lg-3 col-md-4 col-sm-6 col-12 tm-gallery-item" data-aos="fade-up" data-aos-delay="500" href="#">
					<figure>
						<img src="img/gallery/04.jpg" alt="Image" class="img-fluid tm-gallery-img" />
							<figcaption>
								<h4 class="tm-gallery-title">Apani</h4>
								<p class="tm-gallery-description">Nam in suscipit nisi, sit amet consectetur metus. Ut sit amet tellus accumsan</p>
								<p class="tm-gallery-price">$30.50</p>
							</figcaption>
						</figure>
				</a>
			</div>  -->
					
			<!-- Category Teens -->
			<!-- <div id="tm-gallery-page-teens" class="tm-gallery-page hidden">
				<a class="col-lg-3 col-md-4 col-sm-6 col-12 tm-gallery-item" data-aos="fade-up" data-aos-delay="200" href="#">
					<figure>
						<img src="img/gallery/08.jpg" alt="Image" class="img-fluid tm-gallery-img" />
						<figcaption>
							<h4 class="tm-gallery-title">Noodle One</h4>
							<p class="tm-gallery-description">Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.</p>
							<p class="tm-gallery-price">$12.50</p>
						</figcaption>
					</figure>
				</a>
				<a class="col-lg-3 col-md-4 col-sm-6 col-12 tm-gallery-item" data-aos="fade-up" data-aos-delay="300" href="#">
					<figure>
						<img src="img/gallery/07.jpg" alt="Image" class="img-fluid tm-gallery-img" />
						<figcaption>
							<h4 class="tm-gallery-title">Noodle Second</h4>
							<p class="tm-gallery-description">Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.</p>
							<p class="tm-gallery-price">$15.50</p>
							</figcaption>
						</figure>
						</a>
				<a class="col-lg-3 col-md-4 col-sm-6 col-12 tm-gallery-item" data-aos="fade-up" data-aos-delay="400" href="#">
					<figure>
						<img src="img/gallery/06.jpg" alt="Image" class="img-fluid tm-gallery-img" />
						<figcaption>
							<h4 class="tm-gallery-title">Third Soft Noodle</h4>
							<p class="tm-gallery-description">Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.</p>
							<p class="tm-gallery-price">$20.50</p>
						</figcaption>
					</figure>
				</a>
				<a class="col-lg-3 col-md-4 col-sm-6 col-12 tm-gallery-item" data-aos="fade-up" data-aos-delay="500" href="#">
					<figure>
						<img src="img/gallery/05.jpg" alt="Image" class="img-fluid tm-gallery-img" />
						<figcaption>
							<h4 class="tm-gallery-title">Aliquam sagittis</h4>
							<p class="tm-gallery-description">Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.</p>
							<p class="tm-gallery-price">$30.25</p>
						</figcaption>
					</figure>
				</a>
				<a class="col-lg-3 col-md-4 col-sm-6 col-12 tm-gallery-item" data-aos="fade-up" data-aos-delay="600" href="#">
					<figure>
						<img src="img/gallery/04.jpg" alt="Image" class="img-fluid tm-gallery-img" />
						<figcaption>
							<h4 class="tm-gallery-title">Maecenas eget justo</h4>
							<p class="tm-gallery-description">Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.</p>
							<p class="tm-gallery-price">$35.50</p>
						</figcaption>
					</figure>
				</a>
				<a class="col-lg-3 col-md-4 col-sm-6 col-12 tm-gallery-item" data-aos="fade-up" data-aos-delay="700" href="#">
					<figure>
						<img src="img/gallery/03.jpg" alt="Image" class="img-fluid tm-gallery-img" />
						<figcaption>
							<h4 class="tm-gallery-title">Quisque et felis eros</h4>
							<p class="tm-gallery-description">Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.</p>
							<p class="tm-gallery-price">$40.50</p>
						</figcaption>
					</figure>
				</a>
			</div>  -->

			<!-- Category Adults -->
			<!-- <div id="tm-gallery-page-adults" class="tm-gallery-page hidden">
				<a class="col-lg-3 col-md-4 col-sm-6 col-12 tm-gallery-item" data-aos="fade-up" data-aos-delay="200"  href="#">
					<figure>
						<img src="img/gallery/01.jpg" alt="Image" class="img-fluid tm-gallery-img" />
							<figcaption>
								<h4 class="tm-gallery-title">Fusce dictum finibus</h4>
								<p class="tm-gallery-description">Nam in suscipit nisi, sit amet consectetur metus. Ut sit amet tellus accumsan</p>
								<p class="tm-gallery-price">$45 / $55</p>
							</figcaption>
					</figure>
				</a>
				<a class="col-lg-3 col-md-4 col-sm-6 col-12 tm-gallery-item" data-aos="fade-up" data-aos-delay="400" href="#">
					<figure>
						<img src="img/gallery/02.jpg" alt="Image" class="img-fluid tm-gallery-img" />
							<figcaption>
								<h4 class="tm-gallery-title">Aliquam sagittis</h4>
								<p class="tm-gallery-description">Nam in suscipit nisi, sit amet consectetur metus. Ut sit amet tellus accumsan</p>
								<p class="tm-gallery-price">$65 / $70</p>
							</figcaption>
						</figure>
				</a>
				<a class="col-lg-3 col-md-4 col-sm-6 col-12 tm-gallery-item" data-aos="fade-up" data-aos-delay="500" href="#">
					<figure>
						<img src="img/gallery/03.jpg" alt="Image" class="img-fluid tm-gallery-img" />
							<figcaption>
								<h4 class="tm-gallery-title">Sed varius turpis</h4>
								<p class="tm-gallery-description">Nam in suscipit nisi, sit amet consectetur metus. Ut sit amet tellus accumsan</p>
								<p class="tm-gallery-price">$30.50</p>
							</figcaption>
						</figure>
				</a>
				<a class="col-lg-3 col-md-4 col-sm-6 col-12 tm-gallery-item" data-aos="fade-up" data-aos-delay="600" href="#">
					<figure>
						<img src="img/gallery/08.jpg" alt="Image" class="img-fluid tm-gallery-img" />
						<figcaption>
							<h4 class="tm-gallery-title">Noodle One</h4>
							<p class="tm-gallery-description">Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.</p>
							<p class="tm-gallery-price">$12.50</p>
						</figcaption>
					</figure>
				</a>
			</div>  -->
		<!-- </div>
	</section> -->

	<section id="workshop" class="workshop" data-aos="fade-up" data-aos-delay="200">
		<div class="container">
			<div class="section-title">
			<span>Workshop</span>
			<h2>Workshop</h2>
			<p>Sit sint consectetur velit quisquam cupiditate impedit suscipit alias</p>
			</div>

			<!-- <div class="row">
			<div class="col-lg-12 d-flex justify-content-center">
				<ul id="workshop-flters">
				<li data-filter="*" class="filter-active">All</li>
				<li data-filter=".filter-kids">Kids</li>
				<li data-filter=".filter-teens">Teens</li>
				<li data-filter=".filter-adults">Adults</li>
				</ul>
			</div>
			</div> -->

			<div class="row workshop-container" >
				@foreach($workshop as $workshops) 
				<a class="col-lg-3 col-md-4 col-sm-6 col-12 workshop-item filter-kids" data-aos="fade-up" data-aos-delay="300" href="/workshop-details/{$workshops->id}">
					<figure>
						<img src="{{$workshops->getPoster()}}" alt="Image" class="img-fluid tm-gallery-img" />
							<figcaption>
								<h4 class="tm-gallery-title">{{$workshops->nama}}</h4>
								<p class="tm-gallery-description">{{$workshops->deskripsi}}</p>
								<p class="tm-gallery-price">{{$workshops->harga}}</p>
							</figcaption>
					</figure>
				</a>
				@endforeach
			</div>

		</div>
	</section>

	<section id="creation" class="creation" data-aos="fade-up" data-aos-delay="200" >
		<div class="container">
			<div class="section-title">
			  <span>Kumpulan Karya Workshop</span>
			  <h2>Kumpulan Karya Workshop</h2>
			</div>

			<div class="row creation-container">
				<div class="col-lg-2 col-md-4 col-sm-6 col-12 creation-box">
					<p><a href="product_detail.html"><img src="img/gallery/04.jpg" alt="" class="img-fluid" /></a></p>
					<a href="product_detail.html" class="title">Ut wisi enim ad</a><br/>
					<a href="products.html" class="category">Commodo consequat</a>
					<p class="price">$25.50</p>
				</div>
				<div class="col-lg-2 col-md-4 col-sm-6 col-12 creation-box" >
					<p><a href="product_detail.html"><img src="img/gallery/03.jpg"  alt="" class="img-fluid"/></a></p>
					<a href="product_detail.html" class="title">Ut wisi enim ad</a><br/>
					<a href="products.html" class="category">Commodo consequat</a>
					<p class="price">$25.50</p>
				</div>
				<div class="col-lg-2 col-md-4 col-sm-6 col-12 creation-box">
					<p><a href="product_detail.html"><img src="img/gallery/01.jpg"  alt="" class="img-fluid" /></a></p>
					<a href="product_detail.html" class="title">Ut wisi enim ad</a><br/>
					<a href="products.html" class="category">Commodo consequat</a>
					<p class="price">$25.50</p>
				</div>
				<div class="col-lg-2 col-md-4 col-sm-6 col-12 creation-box">
					<p><a href="product_detail.html"><img src="img/gallery/02.jpg"  alt="" class="img-fluid" /></a></p>
					<a href="product_detail.html" class="title">Ut wisi enim ad</a><br/>
					<a href="products.html" class="category">Commodo consequat</a>
					<p class="price">$25.50</p>
				</div>
				<div class="col-lg-2 col-md-4 col-sm-6 col-12 creation-box" >
					<p><a href="product_detail.html"><img src="img/gallery/03.jpg"  alt="" class="img-fluid"/></a></p>
					<a href="product_detail.html" class="title">Ut wisi enim ad</a><br/>
					<a href="products.html" class="category">Commodo consequat</a>
					<p class="price">$25.50</p>
				</div>
		</div>
	</section>

    <section id="testimonials" class="testimonials"  data-aos="fade-up" data-aos-delay="200" >
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
                  Export tempor illum tamen malis malis eram quae irure esse labore quem cillum quid cillum eram malis
                  quorum velit fore eram velit sunt aliqua noster fugiat irure amet legam anim culpa.
                  <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                </p>
                <h3>Sara Wilsson</h3>
                <h4>Designer</h4>
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