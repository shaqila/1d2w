@extends('layouts.app')

@section('title')
Workshop | One Day To Write
@endsection

@section('content')
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
          <div class="harga" style="text-align:center">
            <h3>@currency($workshop->harga)</h3>
          </div>
          <a class="daftar-sekarang btn btn-lg btn-block" href="{{route('detail-pendaftaran', $workshop->id)}}" style="background-color: #7abaff; color: white; ">Daftar Workshop</a>
        </div>
      </div>
      <div class="col-lg-8">
        <div class="workshop-info">
          <h3>{{$workshop->nama}}</h3>
          <ul>
            <li><strong>Tanggal Pelaksanaan</strong>: </br>{{$workshop->tanggal_pelaksanaan}} | {{$workshop->jam_pelaksanaan}}</li>
            <li><strong>Batas Akhir Pendaftaran</strong>: </br>{{$workshop->batas_pendaftaran}}</li>
            <li><strong>Kapasitas</strong>:</br> {{$workshop->jumlah_peserta}} Peserta</li>
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

<!-- <section id="workshop-pendaftaran" class="workshop-pendaftaran">
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Tambah Data Peserta</h5>
                    </div>
                    <div class="modal-body">
                        <form action="/peserta/create" enctype="multipart/form-data" method="POST">
                            @csrf
                            <div class="form-group {{$errors->has('nama_lengkap') ? 'has-errors': ''}}">
                            <label for="exampleInputEmail1">Nama Lengkap</label>
                            <input name="nama_lengkap" type="text" class="form-control" id="exampleInputname" aria-describedby="emailHelp" value="{{old('nama_lengkap')}}">
                            @if($errors->has('nama_lengkap'))
                            <span class="help-block">{{$errors->first('nama_lengkap')}}</span>
                            @endif
                        </div>
                        <div class="form-group {{$errors->has('jenis_kelamin') ? 'has-errors': ''}}">
                            <label for="exampleFormSelect">Pilih Jenis Kelamin</label>
                            <select name="jenis_kelamin" class="form-control" aria-label="Default select example">
                                <option value=" L" {{(old('jenis_kelamin')== 'L') ? 'selected':''}}>Laki-Laki</option>
                                <option value="P" {{(old('jenis_kelamin')== 'P') ? 'selected':''}}>Perempuan</option>
                            </select>
                            @if($errors->has('jenis_kelamin'))
                            <span class="help-block">{{$errors->first('jenis_kelamin')}}</span>
                            @endif
                        </div>
                        <div class="form-group {{$errors->has('profesi') ? 'has-errors': ''}}">
                            <label for="exampleInputPassword1">Profesi</label>
                            <input name="profesi" type="text" class="form-control" id="exampleInputname" aria-describedby="emailHelp" value="{{old('profesi')}}">
                            @if($errors->has('profesi'))
                            <span class="help-block">{{$errors->first('profesi')}}</span>
                            @endif
                        </div>
                        <div class="form-group {{$errors->has('domisili') ? 'has-errors': ''}}">
                            <label for="exampleInputPassword1">Domisili</label>
                            <input name="domisili" type="text" class="form-control" id="exampleInputname" aria-describedby="emailHelp" value="{{old('domisili')}}">
                            @if($errors->has('domisili'))
                            <span class="help-block">{{$errors->first('domisili')}}</span>
                            @endif
                        </div>
                        <div class="form-group {{$errors->has('no_hp') ? 'has-errors': ''}}">
                            <label for="exampleInputPassword1">Nomor Handphone</label>
                            <input name="no_hp" type="text" class="form-control" id="exampleInputname" aria-describedby="emailHelp" value="{{old('no_hp')}}">
                            @if($errors->has('no_hp'))
                            <span class="help-block">{{$errors->first('no_hp')}}</span>
                            @endif
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>

    </section> -->
@endsection