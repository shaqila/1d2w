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
                        <h3 class="panel-title">Detail Workshop</h3>
                    </div>
                    <div class="panel-body">
                        <div class="card">
                            <div class="row">
                                <div class="col-lg-2">
                                    <img src="{{$workshop->getPoster()}}" class="img-fluid" />
                                </div>
                                <div class="col-lg workshop-description">
                                    <h4>Deskripsi Workshop</h4>
                                    <p>{{$workshop->deskripsi}}</p>
                                </div>
                                <div class="col-lg-12">
                                    <table class="table table-hover">
                                        <thead>
                                            <tr class="text-center">
                                                <th>Nama Peserta</th>
                                                <th>Jenis Kelamin</th>
                                                <th>Profesi</th>
                                                <th>Domisili</th>
                                                <th>No. Handphone</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            @foreach($workshop->peserta as $peserta)
                                            <tr>
                                                <td class="text-center">{{$peserta->nama_lengkap}}</td>
                                                <td class="text-center">{{$peserta->jenis_kelamin}}</td>
                                                <td class="text-center">{{$peserta->profesi}}</td>
                                                <td class="text-center">{{$peserta->province->nama_provinsi}}</td>
                                                <td class="text-center">{{$peserta->no_hp}}</td>
                                                <td class="text-center">
                                                    <a href="/" class="icon"><i class="edit-icon far fa-edit"></i></a>
                                                    <a href="#" class="delete" peserta-id="{{$peserta->id}}">Hapus</a>
                                                </td>
                                            </tr>
                                            @endforeach

                                        </tbody>
                                        <tr>
                                            <td>Total Peserta : {{$workshop->peserta->count()}}</td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
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
                    window.location = "/workshop/" + workshop_id + "/delete";
                }
            });
    })
</script>
@endpush