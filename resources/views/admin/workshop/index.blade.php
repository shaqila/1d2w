@extends('admin-layout.layout')

@section('heading')
Data Workshop
@endsection

@section('content')
<section class="content">
    <div class="main">
        <div class="main-content">
            @if(session('sukses'))
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
            @endif
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="panel">
                            <div class="panel-heading">
                                <button type="button" class="btn btn-info float-right" data-toggle="modal" data-target="#exampleModal" style="margin-bottom:12px">
                                    <i class="fas fa-plus"></i> Tambah Workshop
                                </button>
                            </div>
                            <div class="panel-body">
                                <table class="table table-hover">
                                    <thead>
                                        <tr class="text-center">
                                            <th>KODE</th>
                                            <th>NAMA WORKSHOP</th>
                                            <th>HARGA</th>
                                            <th>WAKTU PELAKSANAAN</th>
                                            <th>JUMLAH PESERTA</th>
                                            <th>POSTER</th>
                                            <th>AKSI</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($workshop as $workshops)
                                        <tr>
                                            <td>{{$workshops->kode}}</td>
                                            <td><a href="{{route('workshop-detail',$workshops->id)}}">{{$workshops->nama}}</a></td>
                                            <td>Rp. {{number_format($workshops->harga, 0, ',', '.')}}</td>
                                            <td>{{$workshops->tanggal_pelaksanaan}} , {{$workshops->jam_pelaksanaan}}</td>
                                            <td>{{$workshops->jumlah_peserta}}</td>
                                            <td><img src="{{$workshops->getPoster()}}" alt="Image" class="img-fluid tm-gallery-img" style=" max-height: 150px;
                                                            max-width: 150px;
                                                            object-fit: cover;" /></td>
                                            <td>
                                                <a href="/workshop/{{$workshops->id}}/edit" class="btn btn-warning btn-sm">Edit</a>
                                                <a href="#" class="btn btn-danger btn-sm delete" workshop-id="{{$workshops->id}}">Delete</a>
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
                        @csrf
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
                            <input name="tanggal_pelaksanaan" type="date" class="form-control" id="exampleInputname" aria-describedby="emailHelp" value="{{old('tanggal_pelaksanaan')}}">
                            @if($errors->has('tanggal_pelaksanaan'))
                            <span class="help-block">{{$errors->first('tanggal_pelaksanaan')}}</span>
                            @endif
                        </div>
                        <div class="form-group {{$errors->has('jam_pelaksanaan') ? 'has-errors': ''}}">
                            <label for="exampleInputPassword1">Jam Pelaksanaan</label>
                            <input name="jam_pelaksanaan" type="time" class="form-control" id="exampleInputname" aria-describedby="emailHelp" value="{{old('jam_pelaksanaan')}}">
                            @if($errors->has('jam_pelaksanaan'))
                            <span class="help-block">{{$errors->first('jam_pelaksanaan')}}</span>
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
</section>
@endsection

@push('addon-script')
<script>
    $('.delete').click(function() {
        var workshop_id = $(this).attr('workshop-id');
        swal({
                title: "Apakah anda yakin?",
                text: "Data dengan id " + workshop_id + " akan terhapus",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    window.location = "/workshop/" + workshop_id + "/delete";
                }
            });
    })
</script>
@endpush