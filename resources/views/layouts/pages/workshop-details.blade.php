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
            <li>Detail Workshop</li>
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
            </div>
            <div class="workshop-info">
              <h3>Rp. 100.000</h3>
              <button type="button" class="btn btn-outline-primary btn-lg btn-block">Daftar Sekarang</button>
            </div>
          </div>

          <div class="col-lg-8">
            <div class="workshop-info">
              <h3>AL-AZHAR WRITING COMPETITION</h3>
              <ul>
                <li><strong>Level</strong>: </br> Kids, Teens, Adults</li>
                <li><strong>Tanggal Pelaksanaan</strong>: </br>24 April 2021 | 09:00 - 11:00</li>
                <li><strong>Batas Akhir Pendaftaran</strong>: </br>23 April 2021</li>
                <li><strong>Kapasitas</strong>:</br> 50 Peserta</li>
              </ul>
            </div>
            <div class="workshop-description">
              <h4>Tentang Workshop</h4>
              <p>
                Autem ipsum nam porro corporis rerum. Quis eos dolorem eos itaque inventore commodi labore quia quia. Exercitationem repudiandae officiis neque suscipit non officia eaque itaque enim. Voluptatem officia accusantium nesciunt est omnis tempora consectetur dignissimos. Sequi nulla at esse enim cum deserunt eius.
              </p>
            </div>
          </div>

        </div>

      </div>
    </section>
@endsection