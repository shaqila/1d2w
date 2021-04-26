@extends('layouts.app')

@section('content')
<div class="container" style="padding-top: 100px">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Verify Your Email Address') }}</div>

                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('Link verifikasi email sudah dikirimkan di email Anda, silahkan klik untuk melakukan verifikasi.') }}
                        </div>
                    @endif

                    {{ __('Sebelum melanjutkan proses, Anda diharuskan untuk melakukan verifikasi pada email Anda.') }}
                    
                    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                        @csrf
                        <button type="submit" class="btn btn-link p-0 m-0 align-baseline">{{ __('Klik link ini untuk verifikasi Email') }}</button>.
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
