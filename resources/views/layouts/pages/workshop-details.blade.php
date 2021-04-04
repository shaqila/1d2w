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
                  <img src="{{$workshop->getPoster()}}" alt="">
                </div>
            </div>
            <div class="workshop-info">
              <h3>{{$workshop->harga}}</h3>
              <button type="button" class="btn btn-outline-primary btn-lg btn-block">Daftar Sekarang</button>
            </div>
          </div>
          <div class="col-lg-8">
            <div class="workshop-info">
              <h3>{{$workshop->nama}}</h3>
              <ul>
                <li><strong>Level</strong>: </br> Kids, Teens, Adults</li>
                <li><strong>Tanggal Pelaksanaan</strong>: </br>24 April 2021 | 09:00 - 11:00</li>
                <li><strong>Batas Akhir Pendaftaran</strong>: </br>23 April 2021</li>
                <li><strong>Kapasitas</strong>:</br> 50 Peserta</li>
              </ul>
            </div>
            <div class="workshop-description">
              <h4>Tentang Workshop</h4>
              <p>{{$workshop->deskripsi}}</p>
            </div>
          </div>
        
        </div>

      </div>
    </section>
@endsection