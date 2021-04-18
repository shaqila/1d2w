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
            
                <div class="col-md-12">
                    <div class="panel">
                        <div class="panel-heading">
                            <h3 class="panel-title">Edit Data Peserta</h3>
                        </div>
                        <div class="panel-body">
                                <form action="{{route('workshop-update',$workshop->id)}}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="mb-3">
                                        <label for="FormControlInput">Kode</label>
                                        <input name="kode" type="text" class="form-control" id="exampleInputname" aria-describedby="emailHelp" value="{{$workshop->kode}}">
                                    </div>
                                    <div class="mb-3">
                                        <label for="FormControlInput">Nama</label>
                                        <input name="nama" type="text" class="form-control" id="exampleInputname" aria-describedby="emailHelp" value="{{$workshop->nama}}">
                                    </div>
                                    <div class="mb-3">
                                        <label for="FormControlInput">Deskripsi</label>
                                        <input name="deskripsi" type="text" class="form-control" id="exampleInputname" aria-describedby="emailHelp" value="{{$workshop->deskripsi}}">
                                    </div>
                                    <div class="mb-3">
                                        <label for="FormControlInput">Harga</label>
                                        <input name="harga" type="text" class="form-control" id="exampleInputname" aria-describedby="emailHelp" value="{{$workshop->harga}}">
                                    </div>
                                    <div class="mb-3">
                                        <label for="FormControlInput">Tanggal Pelaksanaan</label>
                                        <input name="tanggal_pelaksanaan" type="date" class="form-control" id="exampleInputname" aria-describedby="emailHelp" value="{{$workshop->tanggal_pelaksanaan}}">
                                    </div>
                                    <div class="mb-3">
                                        <label for="FormControlInput">Jam Pelaksanaan</label>
                                        <input name="jam_pelaksanaan" type="time" class="form-control" id="exampleInputname" aria-describedby="emailHelp" value="{{$workshop->jam_pelaksanaan}}">
                                    </div>
                                    <div class="mb-3">
                                        <label for="FormControlInput">Jumlah Peserta</label>
                                        <input name="jumlah_peserta" type="text" class="form-control" id="exampleInputname" aria-describedby="emailHelp" value="{{$workshop->jumlah_peserta}}">
                                    </div>
                                    <div class="mb-3">
                                        <label for="formFile" class="form-label">Poster</label>
                                        <input name= "poster" class="form-control" type="file" id="formFile" value="{{$workshop->poster}}">
                                    </div>
                                    
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-warning">Update</button>
                                    </div>
                                </form>
                        </div>
                    </div>
                </div>
        </div>
    </div>
</div>
@stop