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
                            <form action="{{route('peserta-update',$peserta->id)}}" method="POST" enctype="multipart/form-data">
                                {{csrf_field()}}
                                <div class="form-group">
                                    <label for="exampleInputfirstname">Nama Lengkap</label>
                                    <input name="nama_lengkap" type="text" class="form-control" id="exampleInputname" aria-describedby="emailHelp" value="{{$peserta->nama_lengkap}}">
                                </div>
                                <div class="form-group">
                                    <label for="exampleFormSelect">Pilih Jenis Kelamin</label>
                                    <select class="form-control">
                                        <option value="L" @if ($peserta->jenis_kelamin=='L') selected @endif>Laki-Laki</option>
                                        <option value="P" @if ($peserta->jenis_kelamin=='P') selected @endif>Perempuan</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputProfesi">Profesi</label>
                                    <input name="profesi" type="text" class="form-control" id="exampleInputname" aria-describedby="emailHelp" value="{{$peserta->profesi}}">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputDomisili">Domisili</label>
                                    <input name="domisili" type="text" class="form-control" id="exampleInputname" aria-describedby="emailHelp" value="{{$peserta->domisili}}">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Nomor Handphone</label>
                                    <input name="no_hp" type="text" class="form-control" id="exampleInputname" aria-describedby="emailHelp" value="{{$peserta->no_hp}}">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputAvatar">Avatar</label>
                                    <input name="avatar" type="file" class="form-control">
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