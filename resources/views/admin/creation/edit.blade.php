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
                            <form action="{{route('creation-update',$karya->id)}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label for="exampleInputfirstname">Judul Karya</label>
                                    <input name="nama_karya" type="text" class="form-control" id="exampleInputname" aria-describedby="emailHelp" value="{{$karya->nama_karya}}">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPanggilan">Sinopsis</label>
                                    <input name="deskripsi" type="text" class="form-control" id="exampleInputname" aria-describedby="emailHelp" value="{{$karya->deskripsi}}">
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