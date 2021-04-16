@extends('admin-layout.layout')

@section('heading')
Data Karya (Buku)
@endsection

@section('content')

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
                                            <th>NAMA PESERTA</th>
                                            <th>WORKSHOP</th>
                                            <th>HARGA</th>
                                            <th>AKSI</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($peserta as $pesertas)
                                        <tr>
                                            <td>{{$pesertas->nama_lengkap}}</td>
                                            @foreach($pesertas->workshop as $workshop)
                                            <td>{{$workshop->nama}}</td>
                                            <td>{{$workshop->harga}}</td>
                                            @endforeach
                                            <!-- <td>
                                                <a href="/peserta/{{$pesertas->id}}/edit" class="btn btn-warning btn-sm">Edit</a>
                                                <a href="#" class="btn btn-danger btn-sm delete" peserta-id="{{$pesertas->id}}">Delete</a>
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

@endsection