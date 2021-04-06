@extends('admin-layout.layout')

@section('heading')
Data Karya (Buku)
@endsection

@section('content')

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
                                <i class="fas fa-plus"></i> Tambah Karya Buku
                            </button>
                        </div>
                        <div class="panel-body">
                            <table class="table table-hover">
                                <thead>
                                    <tr style="font-size: 12px;" class="text-center">
                                        <th>JUDUL KARYA</th>
                                        <th>SINOPSIS</th>
                                        <th>COVER</th>
                                        <th>PDF</th>
                                        <th>AKSI</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($karya as $karyas)
                                    <tr style="font-size: 14px;" class="text-center">
                                        <td>{{$karyas->nama_karya}}</td>
                                        <td>{{$karyas->deskripsi}}</td>
                                        <td><img src="{{$karyas->getCover()}}" alt="Cover" class="img-fluid tm-gallery-img" 
                                                    style=" max-height: 100px;
                                                            max-width: 100px;
                                                            object-fit: cover;" />
                                        </td>
                                        <td><a href="{{url('download/'.$karyas->pdf)}}" class="btn btn-outline-secondary btn-sm btn-block">Download</a></td>
                                        <td>
                                            <a href="/creation/{{$karyas->id}}/edit" class="btn btn-warning btn-sm">Edit</a>
                                            <a href="#" class="btn btn-danger btn-sm delete" karya-id="{{$karyas->id}}">Delete</a>
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
                <h5 class="modal-title" id="exampleModalLabel">Tambah Karya</h5>
            </div>
            <div class="modal-body">
                <form action="/creation/create" enctype="multipart/form-data" method="POST">
                    @csrf
                    <div class="form-group {{$errors->has('nama_karya') ? 'has-errors': ''}}">
                        <label for="exampleInputEmail1">Judul Karya</label>
                        <input name="nama_karya" type="text" class="form-control" id="exampleInputname" aria-describedby="emailHelp" value="{{old('nama_karya')}}">
                        @if($errors->has('nama_karya'))
                        <span class="help-block">{{$errors->first('nama_karya')}}</span>
                        @endif
                    </div>
                    <div class="form-group {{$errors->has('deskripsi') ? 'has-errors': ''}}">
                        <label for="exampleInputEmail1">Sinopsis</label>
                        <input name="deskripsi" type="text" class="form-control" id="exampleInputname" aria-describedby="emailHelp" value="{{old('deskripsi')}}">
                        @if($errors->has('deskripsi'))
                        <span class="help-block">{{$errors->first('deskripsi')}}</span>
                        @endif
                    </div>
                    <div class="form-group" {{$errors->has('cover') ? 'has-errors': ''}}">
                        <label for="exampleInputAvatar">Cover</label>
                        <input name="cover" type="file" class="form-control" value="{{old('cover')}}">
                        @if($errors->has('cover'))
                        <span class="help-block">{{$errors->first('cover')}}</span>
                        @endif
                    </div>
                    <div class="form-group" {{$errors->has('pdf') ? 'has-errors': ''}}">
                        <label for="exampleInputAvatar">Pdf</label>
                        <input name="pdf" type="file" class="form-control" value="{{old('pdf')}}">
                        @if($errors->has('pdf'))
                        <span class="help-block">{{$errors->first('pdf')}}</span>
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
@endsection

@push('addon-script')
    <script>
        $('.delete').click(function() {
            var karya_id = $(this).attr('karya-id');
            swal({
                    title: "Apakah anda yakin?",
                    text: "Data dengan id " + karya_id + " akan terhapus",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                        window.location = "/creation/" + karya_id + "/delete";
                    }
                });
        })
    </script>
@endpush