@extends('admin-layout.layout')
@section('content')

<div class="main">
    <div class="main-content">
        <!-- @if(session('sukses'))
        <div class="alert alert-success" roles="alert">
            <button type="button" class="close" data-dismiss="alert">×</button>
            {{session('sukses')}}
        </div>
        @endif
        @if(session('hapus'))
        <div class="alert alert-danger" roles="alert">
            <button type="button" class="close" data-dismiss="alert">×</button>
            {{session('hapus')}}
        </div>
        @endif -->
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="panel">
                        <div class="panel-heading">
                            <h3 class="panel-title">Data Workshop</h3>
                            <div class="right" style="background-color: #676a6d; color:white; border-radius: 6px; padding:5px; ">

                                <button type="button" class="btn" data-toggle="modal" data-target="#exampleModal" style="margin: auto;">Tambah Data</button>

                            </div>
                        </div>
                        <div class="panel-body">
                            <table class="table table-hover">
                                <thead>
                                    <tr style="font-size: 12px;" class="text-center">
                                        <th>KODE</th>
                                        <th>NAMA WORKSHOP</th>
                                        <th>DESKRIPSI</th>
                                        <th>HARGA</th>
                                        <th>TANGGAL PELAKSANAAN</th>
                                        <th>JUMLAH PESERTA</th>
                                        <th>POSTER</th>
                                        <th>AKSI</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($data_workshop as $workshop)
                                    <tr?>
                                        <td>{{$workshop->kode}}</td>
                                        <td>{{$workshop->nama}}</td>
                                        <td>{{$workshop->deskripsi}}</td>
                                        <td>{{$workshop->harga}}</td>
                                        <td>{{$workshop->tanggal_pelaksanaan}}</td>
                                        <td>{{$workshop->jumlah_peserta}}</td>
                                        <td><img src="{{$workshop->getPoster()}}" alt="Image" class="img-fluid tm-gallery-img" /></td>
                                        <td>
                                            <a href="/workshop/{{$workshop->id}}/edit" class="btn btn-warning btn-sm">Edit</a>
                                            <a href="#" class="btn btn-danger btn-sm delete" peserta-id="{{$workshop->id}}">Delete</a>
                                        </td>
                                        </tr>
                                        @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Workshop</h5>
            </div>
            <div class="modal-body">
                <form action="/workshop/create" enctype="multipart/form-data" method="POST">
                    {{csrf_field()}}
                    <div class="form-group {{$errors->has('kode') ? 'has-errors': ''}}">
                        <label for="exampleInputEmail1">Kode</label>
                        <input name="kode" type="text" class="form-control" id="exampleInputname" aria-describedby="emailHelp" value="{{old('kode')}}">
                        @if($errors->has('kode'))
                        <span class="help-block">{{$errors->first('kode')}}</span>
                        @endif
                    </div>
                    <div class="form-group {{$errors->has('nama') ? 'has-errors': ''}}">
                        <label for="exampleInputEmail1">Nama</label>
                        <input name="nama" type="text" class="form-control" id="exampleInputname" aria-describedby="emailHelp" value="{{old('nama')}}">
                        @if($errors->has('nama'))
                        <span class="help-block">{{$errors->first('nama')}}</span>
                        @endif
                    </div>
                    <div class="form-group {{$errors->has('deskripsi') ? 'has-errors': ''}}">
                        <label for="exampleInputEmail1">Deskripsi</label>
                        <input name="deskripsi" type="text" class="form-control" id="exampleInputname" aria-describedby="emailHelp" value="{{old('deskripsi')}}">
                        @if($errors->has('deskripsi'))
                        <span class="help-block">{{$errors->first('deskripsi')}}</span>
                        @endif
                    </div>
                    <div class="form-group {{$errors->has('harga') ? 'has-errors': ''}}">
                        <label for="exampleInputEmail1">Harga</label>
                        <input name="harga" type="text" class="form-control" id="exampleInputname" aria-describedby="emailHelp" value="{{old('harga')}}">
                        @if($errors->has('harga'))
                        <span class="help-block">{{$errors->first('harga')}}</span>
                        @endif
                    </div>
                    <div class="form-group {{$errors->has('tanggal_pelaksanaan') ? 'has-errors': ''}}">
                        <label for="exampleInputPassword1">Tanggal Pelaksanaan</label>
                        <input name="tanggal_pelaksanaan" type="text" class="form-control" id="exampleInputname" aria-describedby="emailHelp" value="{{old('tanggal_pelaksanaan')}}">
                        @if($errors->has('tanggal_pelaksanaan'))
                        <span class="help-block">{{$errors->first('tanggal_pelaksanaan')}}</span>
                        @endif
                    </div>
                    <div class="form-group {{$errors->has('jumlah_peserta') ? 'has-errors': ''}}">
                        <label for="exampleInputPassword1">Jumlah Peserta</label>
                        <input name="jumlah_peserta" type="text" class="form-control" id="exampleInputname" aria-describedby="emailHelp" value="{{old('jumlah_peserta')}}">
                        @if($errors->has('jumlah_peserta'))
                        <span class="help-block">{{$errors->first('jumlah_peserta')}}</span>
                        @endif
                    </div>
                    <div class="form-group" {{$errors->has('poster') ? 'has-errors': ''}}">
                        <label for="exampleInputAvatar">Poster</label>
                        <input name="poster" type="file" class="form-control" value="{{old('poster')}}">
                        @if($errors->has('poster'))
                        <span class="help-block">{{$errors->first('poster')}}</span>
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
@stop

@section ('footer')
<script>
    $('.delete').click(function() {
        var workshop_nama = $(this).attr('workshop-nama');
        swal({
                title: "Apakah anda yakin?",
                text: "Workshop dengan judul " + workshop_nama + " akan terhapus",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    window.location = "/workshop/" + workshop_nama + "/delete";
                }
            });
    })
</script>
@stop