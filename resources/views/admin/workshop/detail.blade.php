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
                        <h3 class="panel-title mb-4 ml-1">{{$workshop->nama}}</h3>
                    </div>
                    <div class="panel-body">
                        <div class="card">
                            <div class="row">
                                <div class="col-lg-2 ">
                                    <img src="{{$workshop->getPoster()}}" class="img-fluid my-3 ml-3" />
                                    <!-- <ul style="list-style-type:none;" class="text-left">
                                        <li><strong>Harga Workshop </strong></br>{{$workshop->harga}}</li>
                                        <li><strong>Waktu Pelaksanaan </strong><br>{{$workshop->tanggal_pelaksanaan}}</li>
                                    </ul> -->
                                </div>
                                <div class="col-lg workshop-description m-3">
                                    <p>{{$workshop->deskripsi}}</p>
                                </div>
                                <div class="col-lg-12 px-4">
                                    <table class="table table-hover">
                                        <thead>
                                            <tr class="text-center">
                                                <th>Nama Peserta</th>
                                                <th>Jenis Kelamin</th>
                                                <th>Profesi</th>
                                                <th>Domisili</th>
                                                <th>No. Handphone</th>
                                                <th>Status</th>
                                                <th>Feedback</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            @foreach($workshop->peserta as $peserta)

                                            <tr>
                                                <td class="text-center">{{$peserta->nama_lengkap}}</td>
                                                <td class="text-center">{{$peserta->jenis_kelamin}}</td>
                                                <td class="text-center">{{$peserta->profesi}}</td>
                                                <td class="text-center">{{$peserta->user->province->nama_provinsi}}</td>
                                                <td class="text-center">{{$peserta->no_hp}}</td>
                                                <td class="text-center">{{$peserta->status}}
                                                @if ($peserta->status == "Belum Bayar")
                                                    <a href="{{ route('pembayaran', $peserta->id) }}" class="btn btn-primary btn-block btn-sm text-white">Verifikasi</a>
                                                @endif
                                                </td>
                                                <td class="text-center">
                                                    <a href="/feedback/{{$peserta->id}}" class="btn btn-warning btn-sm btn-circle"><i class="far fa-edit"></i> </a>
                                                </td>
                                                <td class="text-center">
                                                    <a href="#" class="delete btn btn-danger btn-sm btn-circle" peserta-id="{{$peserta->id}}"><i class="fas fa-trash-alt"></i></a>
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