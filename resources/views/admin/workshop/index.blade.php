@extends('admin-layout.layout')

@section('heading')
Data Workshop
@endsection

@push('prepend-style')
<link href="{{ asset('assets/vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet" />
@endpush

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
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-primary btn-sm btn-add" data-toggle="modal" data-target="#exampleModal">
                        <i class="fas fa-plus"></i>
                    </button>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped table-hover" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr class="text-center">
                                    <th>No.</th>
                                    <th>Nama</br>Workshop</th>
                                    <th>Harga</th>
                                    <th>Waktu</br>Pelaksanaan</th>
                                    <th>Jam</br>Pelaksanaan</th>
                                    <!-- <th>Kapasitas</br>Peserta</th> -->
                                    <th>Pendaftar</th>
                                    <th>Kode Classroom</th>
                                    <th>Poster</th>
                                    <th>AKSI</th>
                                </tr>
                            </thead>
                            <tbody style="text-transform:capitalize">
                                @foreach($workshop as $workshops)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td><a href="{{route('workshop-detail',$workshops->id)}}">{{$workshops->nama}}</a></td>
                                    <td>@currency($workshops->harga)</td>
                                    <td>{{Carbon\Carbon::parse($workshops->tanggal_pelaksanaan)->translatedFormat('l, d F Y')}} </td>
                                    <td>{{ date('H:i', strtotime($workshops->jam_pelaksanaan)) }} WIB</td>
                                    <!-- <td>{{$workshops->jumlah_peserta}} Peserta</td> -->
                                    <td>{{$workshops->peserta->count()}} Peserta</td>
                                    <td>{{$workshops->kode}}</td>
                                    <td class="text-center"><img src="{{$workshops->getPoster()}}" alt="Image" class="img-fluid tm-gallery-img" style=" max-height: 150px;
                                                            max-width: 150px;
                                                            object-fit: cover;" /></td>
                                    <td class="text-center">
                                        </br>
                                        <a href="/workshop/{{$workshops->id}}/edit" class="btn btn-warning btn-sm btn-circle"><i class="far fa-edit"></i> </a>
                                        </br></br>
                                        <a href="#" class="delete btn btn-danger btn-sm btn-circle" workshop-id="{{$workshops->id}}"><i class="fas fa-trash-alt"></i></a>
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
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{route('workshop-create')}}" enctype="multipart/form-data" method="POST">
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
                            <textarea name="deskripsi" class="form-control" id="exampleFormControlTextarea1" rows="3"> </textarea>
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
                        <div class="form-group {{$errors->has('batas_pendaftaran') ? 'has-errors': ''}}">
                            <label for="exampleInputPassword1">Batas Akhir Pendaftaran</label>
                            <input name="batas_pendaftaran" type="date" class="form-control" id="exampleInputname" aria-describedby="emailHelp" value="{{old('batas_pendaftaran')}}">
                            @if($errors->has('batas_pendaftaran'))
                            <span class="help-block">{{$errors->first('batas_pendaftaran')}}</span>
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
<script src="{{ asset('assets/vendor/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('assets/vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>
<script>
    $(document).ready(function() {
        $('#dataTable').DataTable();
    });
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