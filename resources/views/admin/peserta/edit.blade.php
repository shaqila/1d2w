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
                            <form action="{{route('peserta-update',$peserta->id)}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="mb-3">
                                    <label for="FormControlInput">Nama Lengkap</label>
                                    <input name="nama_lengkap" type="text" class="form-control" id="exampleInputname" aria-describedby="emailHelp" value="{{$peserta->nama_lengkap}}">
                                </div>
                                <div class="mb-3">
                                    <label for="exampleFormSelect">Pilih Jenis Kelamin</label>
                                    <select class="form-control">
                                        <option value="L" @if ($peserta->jenis_kelamin=='L') selected @endif>Laki-Laki</option>
                                        <option value="P" @if ($peserta->jenis_kelamin=='P') selected @endif>Perempuan</option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="FormControlInput">Profesi</label>
                                    <input name="profesi" type="text" class="form-control" id="exampleInputname" aria-describedby="emailHelp" value="{{$peserta->profesi}}">
                                </div>
                                <div class="mb-3">
                                    <label for="FormControlInput">Domisili</label>
                                    <input name="domisili" type="text" class="form-control" id="exampleInputname" aria-describedby="emailHelp" value="{{$peserta->province_id->nama_provinsi}}">
                                </div>
                                <div class="mb-3">
                                    <label for="FormControlInput">Nomor Handphone</label>
                                    <input name="no_hp" type="text" class="form-control" id="exampleInputname" aria-describedby="emailHelp" value="{{$peserta->no_hp}}">
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