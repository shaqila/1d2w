@extends('layouts.app')

@section('title')
Karya | One Day To Write
@endsection

@section('content')

<section id="workshop-details" class="workshop-details" data-aos="fade-up" data-aos-duration="2000">
  <div class="container">

    <div class="row gy-4">

      <div class="col-lg-4">
        <div class="workshop-details-slider ">
          <div class="poster">
            <img src="{{$karya->getCover()}}" class="creation-detail" alt="">
          </div>
          <div class="workshop-info">
            <a href="{{url('download/'.$karya->pdf)}}" class="btn btn-lg btn-block" 
            style="
            background-color: #7abaff;
            color: white;"
            >Download</a>
          </div>
        </div>
      </div>

      <div class="col-lg-8">
        <div class="workshop-info">
          <h3>Sinopsis</h3>
          <p>
            {{$karya->deskripsi}}
          </p>
        </div>
      </div>

    </div>

  </div>
</section>
@endsection