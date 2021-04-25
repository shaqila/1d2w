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
                        <h3 class="panel-title ml-2">Tulis Feedback untuk <em>{{$peserta->nama_lengkap}}</em></h3>
                    </div>
                    <div class="panel-body col-lg-6">
                        <form action="{{route('feedback-update',$peserta->id)}}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <textarea name="feedback" type="text" class="form-control" id="exampleInputname" aria-describedby="emailHelp">{{$peserta->feedback}}</textarea>
                            </div>
                            <div class="panel-footer">
                                <button type="submit" class="btn btn-primary">Kirim Feedback</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@stop