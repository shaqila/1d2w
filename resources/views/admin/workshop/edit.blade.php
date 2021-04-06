@extends('admin-layout.layout')

@section('content')
<div class="main">
    <div class="main-content">
        <div class="container-fluid">
            @if(session('sukses'))
            <div class="alert alert-success" roles="alert">
                {{session('sukses')}}
            </div>
            @endif
            <div class="row">
                <div class="col-md-12">
                    <div class="panel">
                        <div class="panel-heading">
                            <h3 class="panel-title">Edit Data Peserta</h3>
                        </div>
                        <div class="panel-body">
                            <form action="{{route('workshop-update',$workshop->id)}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label for="exampleInputfirstname">Kode</label>
                                    <input name="kode" type="text" class="form-control" id="exampleInputname" aria-describedby="emailHelp" value="{{$workshop->kode}}">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPanggilan">Nama</label>
                                    <input name="nama" type="text" class="form-control" id="exampleInputname" aria-describedby="emailHelp" value="{{$workshop->nama}}">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputProfesi">Deskripsi</label>
                                    <input name="deskripsi" type="text" class="form-control" id="exampleInputname" aria-describedby="emailHelp" value="{{$workshop->deskripsi}}">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputSekolah">Harga</label>
                                    <input name="harga" type="text" class="form-control" id="exampleInputname" aria-describedby="emailHelp" value="{{$workshop->harga}}">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputDomisili">Tanggal Pelaksanaan</label>
                                    <input name="tanggal_pelaksanaan" type="text" class="form-control" id="exampleInputname" aria-describedby="emailHelp" value="{{$workshop->tanggal_pelaksanaan}}">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputInstagram">Jumlah Peserta</label>
                                    <input name="jumlah_peserta" type="text" class="form-control" id="exampleInputname" aria-describedby="emailHelp" value="{{$workshop->jumlah_peserta}}">
                                </div>
                                
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-warning">Update</button>

                        </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>
@stop