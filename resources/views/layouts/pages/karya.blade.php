@extends('layouts.app')

@section('title')
Karya | ODTW
@endsection

@section('content')
<section id="about" class="about">
    <div class="container">
            <section id="creation" class="creation" data-aos="zoom-in" data-aos-duration="1000">
                <div class="container">

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
        </div>
    </div>
</section>
@endsection