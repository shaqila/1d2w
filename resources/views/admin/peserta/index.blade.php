@extends('admin-layout.layout')

@section('heading')
Data Semua Peserta
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
                                        <i class="fas fa-plus"></i> Tambah Data
                                </button>
                            </div>
                            <div class="panel-body">
                                <table class="table table-hover">
                                    <thead>
                                        <tr class="text-center">
                                            <th>NAMA LENGKAP</th>
                                            <th>JENIS KELAMIN</th>
                                            <th>PROFESI</th>
                                            <th>DOMISILI</th>
                                            <th>NO. HANDPHONE</th>
                                            <th>AKSI</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($peserta as $pesertas)
                                        <tr>
                                            <td>{{$pesertas->nama_lengkap}}</td>
                                            <td>{{$pesertas->jenis_kelamin}}</td>
                                            <td>{{$pesertas->profesi}}</td>
                                            <td>{{$pesertas->domisili}}</td>
                                            <td>{{$pesertas->no_hp}}</td>
                                            <td>
                                                <a href="/peserta/{{$pesertas->id}}/edit" class="btn btn-warning btn-sm">Edit</a>
                                                <a href="#" class="btn btn-danger btn-sm delete" peserta-id="{{$pesertas->id}}">Delete</a>
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
                    <div class="form-group {{$errors->has('email') ? 'has-errors': ''}} ">
                        <label for="exampleInputPassword1">Email</label>
                        <input name="email" type="email" class="form-control" id="exampleInputname" aria-describedby="emailHelp" value="{{old('email')}}">
                        @if($errors->has('email'))
                        <span class=" help-block">{{$errors->first('email')}}</span>
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

    
</section>
@endsection

@push('addon-script')
    <script>
        $('.delete').click(function() {
            var peserta_id = $(this).attr('peserta-id');
            swal({
                    title: "Apakah anda yakin?",
                    text: "Data dengan id " + peserta_id + " akan terhapus",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                        window.location = "/peserta/" + peserta_id + "/delete";
                    }
                });
        })
    </script>
@endpush