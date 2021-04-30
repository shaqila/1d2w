@extends('admin-layout.layout')

@push('prepend-style')
<link href="{{ asset('assets/vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet" />
@endpush

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
                                    <div class="count-peserta mx-3 mb-3" style="font-weight:bold">
                                        Total Peserta : <span>{{$workshop->peserta->count()}}
                                    </div>
                                </div>
                                <div class="col-lg-9 workshop-description mt-2 mx-4">
                                    <p>{{$workshop->deskripsi}}</p>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-bordered table-striped table-hover" id="dataTable" width="100%" cellspacing="0">
                                            <thead>
                                                <tr class="text-center">
                                                    <th>Nama Peserta</th>
                                                    <th>L/P</th>
                                                    <th>Profesi</th>
                                                    <th>Pendidikan</br>Terkahir</th>
                                                    <th>Tanggal Lahir</th>
                                                    <th>Domisili</th>
                                                    <th>No. Handphone</th>
                                                    <th>Status</th>
                                                    <th>Naskah</th>
                                                    <th>Feedback</th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                                @foreach($workshop->peserta as $peserta)

                                                <tr>
                                                    <td class="text-center">{{$peserta->nama_lengkap}}</td>
                                                    <td class="text-center">{{$peserta->jenis_kelamin}}</td>
                                                    <td class="text-center">{{$peserta->profesi}}</td>
                                                    <td class="text-center">{{$peserta->pendidikan_terakhir}}</td>
                                                    <td class="text-center">{{$peserta->tanggal_lahir}}</td>
                                                    <td class="text-center">{{$peserta->user->province->nama_provinsi}}</td>
                                                    <td class="text-center">{{$peserta->no_hp}}</td>
                                                    <td class="text-center">{{$peserta->status}}
                                                        @if ($peserta->status == "Belum Bayar")
                                                        <a href="{{ route('pembayaran', $peserta->id) }}" class="btn btn-primary btn-block btn-sm text-white">Verifikasi</a>
                                                        @endif
                                                    </td>
                                                    <td class="text-center">
                                                        @if($peserta->naskah == null)
                                                        Belum Ada
                                                        @else
                                                        <a href="{{route('download_naskah',$peserta->naskah)}}" class="btn btn-sm btn-block" style="
                                                                background-color: #7abaff;
                                                                color: white;">Download</a>
                                                        @endif
                                                        <a href="#" class="delete btn btn-danger btn-sm btn-circle" peserta-id="{{$peserta->naskah}}"><i class="fas fa-trash-alt"></i></a>
                                                    </td>
                                                    <td class="text-center">
                                                        <a href="/feedback/{{$peserta->id}}" class="btn btn-warning btn-sm btn-circle"><i class="fa fa-plus"></i> </a>
                                                    </td>
                                                    <!-- <td class="text-center">
                                                        <a href="#" class="delete btn btn-danger btn-sm btn-circle" peserta-id="{{$peserta->id}}"><i class="fas fa-trash-alt"></i></a>
                                                    </td> -->
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
        </div>
    </div>

    @endsection

    @push('addon-script')
    <script src="{{ asset('assets/vendor/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('#dataTable').DataTable();
        });
        $('.delete').click(function() {
            var peserta_id = $(this).attr('peserta-id');
            swal({
                    title: "Apakah anda yakin?",
                    text: "Data naskah " + peserta_id + " akan terhapus",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                        window.location = "/naskah/" + peserta_id + "/delete";
                    }
                });
        })
    </script>
    @endpush