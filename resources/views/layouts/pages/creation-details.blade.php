@extends('layouts.app')

@section('title')
Karya | One Day To Write
@endsection

@section('content')
    <section id="breadcrumbs" class="breadcrumbs">
      <div class="container">
        <div class="d-flex justify-content-between align-items-center">
          <ol>
            <li><a href="index.html">Beranda</a></li>
            <li>Detail Karya</li>
          </ol>
        </div>
      </div>
    </section>

    <section id="workshop-details" class="workshop-details">
      <div class="container">

        <div class="row gy-4">

          <div class="col-lg-4">
            <div class="workshop-details-slider ">
                <div class="poster">
                  <img src="assets/img/workshop/poster-01.jpg" alt="">
                </div>
                <div class="workshop-info" >
              <button type="button" class="btn btn-outline-primary btn-lg btn-block">Download</button>
            </div>
            </div>
          </div>

          <div class="col-lg-8">
            <div class="workshop-info">
              <h3>Sinopsis</h3>
              <p>
                Autem ipsum nam porro corporis rerum. Quis eos dolorem eos itaque inventore commodi labore quia quia. Exercitationem repudiandae officiis neque suscipit non officia eaque itaque enim. Voluptatem officia accusantium nesciunt est omnis tempora consectetur dignissimos. Sequi nulla at esse enim cum deserunt eius.
                </br></br>
                Autem ipsum nam porro corporis rerum. Quis eos dolorem eos itaque inventore commodi labore quia quia. Exercitationem repudiandae officiis neque suscipit non officia eaque itaque enim. Voluptatem officia accusantium nesciunt est omnis tempora consectetur dignissimos. Sequi nulla at esse enim cum deserunt eius.
              </p>
            </div>
          </div>

        </div>

      </div>
    </section>
@endsection