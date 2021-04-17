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
                                <div class="col-lg-4">
                                    <img src="{{$workshop->getPoster()}}" class="img-fluid" />
                                </div>
                                <div class="col-lg">
                                    <table class="table table-hover">
                                        <thead>
                                            <tr class="text-center">
                                                <th>NAMA Peserta</th>
                                                <th>Jenis Kelamin</th>
                                                <th>Profesi</th>
                                                <th>Domisili</th>
                                                <th>AKSI</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            @foreach($workshop->peserta as $peserta)
                                            <tr>
                                                <td class="text-center">{{$peserta->nama_lengkap}}</td>
                                                <td class="text-center">{{$peserta->jenis_kelamin}}</td>
                                                <td class="text-center">{{$peserta->profesi}}</td>
                                                <td class="text-center">{{$peserta->domisili}}</td>
                                                <td class="text-center"><a href="#">Hapus</a></td>
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