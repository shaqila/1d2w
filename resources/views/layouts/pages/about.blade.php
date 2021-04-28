@extends('layouts.app')

@section('title')
About | One Day to Write
@endsection

@section('content')
<section id="about" class="about">
  <div class="container">
    <div class="row" style="padding-top:100px" data-aos="fade-up" data-aos-duration="2000">
      <div class="col-lg-5 mx-4">
        <img src="assets/img/typewriter.svg" class="img-fluid" alt="">
      </div>
      <div class="col-lg-6 pt-4 pt-lg-0 mx-2 content">
        <h3>One Day to Write (ODTW)</h3>
        <p class="fst-italic">
          Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et
          dolore
          magna aliqua.
        </p>
        <ul>
          <li><i class="bi bi-check-circle"></i> Ullamco laboris nisi ut aliquip ex ea commodo consequat</li>
          <li><i class="bi bi-check-circle"></i> Duis aute irure dolor in reprehenderit in voluptate velit</li>
          <li><i class="bi bi-check-circle"></i> Ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute
            irure dolor in reprehenderit in voluptate trideta storacalaperda</li>
        </ul>
        <p>
          Ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in
          voluptate
          velit esse cillum dolore eu fugiat nulla pariatur.
        </p>
      </div>
    </div>
  </div>
</section>
@endsection