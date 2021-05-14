@extends('layouts.app')

@section('content')

<body class="form-v10">
	<div class="pendaftaran-content">
		<div class="form-v10-content">
			<form class="form-detail" action="{{route('create_pendaftaran')}}" method="post" id="myform">
				@csrf
				<div class="form-left col-lg-6">
					<h2>Informasi Peserta</h2>
					<div class="form-row">
						<input type="text" name="nama_lengkap" class="input-text" id="nama_lengkap" value="{{Auth::user()->name}}" required>
						<input type="hidden" name="workshop_id" class="input-text" id="nama_lengkap" value="{{$workshop->id}}" readonly>
					</div>
					<div class="form-row">
						<select name="jenis_kelamin" required>
							<option class="option" value="jenis_kelamin">Pilih Jenis Kelamin</option>
							<option class="option" value="L">Laki-laki</option>
							<option class="option" value="P">Perempuan</option>
						</select>
						<span class="select-btn">
							<i class="zmdi zmdi-chevron-down"></i>
						</span>
					</div>
					<div class="form-row">
						<input type="text" name="no_hp" class="input-text" id="no_hp" placeholder="Nomor Telefon" required>
					</div>
					<div class="form-row">
						<select name="province_id" required>
							<option value="">Pilih Domisili</option>
							@foreach($province as $provinces)
							<option value="{{$provinces->id}}">{{$provinces->nama_provinsi}}</option>
							@endforeach
						</select>
						<span class="select-btn">
							<i class="zmdi zmdi-chevron-down"></i>
						</span>
					</div>
					<div class="form-group">
						<div class="form-row">
							<label class="date-input" required>Tanggal Lahir</label>
							<input name="tanggal_lahir" class="form-control" type="date" value="2002-02-09" id="date-input">
						</div>
					</div>
					<div class="form-row">
						<input type="text" name="profesi" class="input-text" id="no_hp" placeholder="Profesi" required>
					</div>
					<div class="form-row mb-5">
						<select name="pendidikan_terakhir" required>
							<option class="option" value="pendidikan_terakhir">Pendidikan Terakhir</option>
							<option class="option" value="SD">SD</option>
							<option class="option" value="SMP">SMP</option>
							<option class="option" value="SMA">SMA</option>
							<option class="option" value="Diploma">Diploma</option>
							<option class="option" value="Sarjana">Sarjana</option>
						</select>
						<span class="select-btn">
							<i class="zmdi zmdi-chevron-down"></i>
						</span>
					</div>

				</div>
				<div class="form-right col-lg-6">
					<div class="center">
						<h2>Informasi Pembayaran</h2>
						<div class="form-row">
							<p class="title">Workshop</p>
							<p class="value"><em><b>{{$workshop->nama}}</b></em></p>
						</div>
						<div class="form-row">
							<p class="title">Total Harga</p>
							<p class="value"><em><b>Rp. {{number_format($workshop->harga, 0, ',', '.')}}</b></em></p>
						</div>
						<h2>Transfer Pembayaran</h2>

						<div class="form-bank">
							<img src="{{asset('assets/img/logo_bank_BCA.png')}}" alt="bca" class="logo-bank">
							<p class="info" style="letter-spacing: 1px; font-size: 18px"><strong>Elmira Nidya</strong></br> 8810296985</p>
						</div>
						<div class="form-row-last ">
							<input type="submit" name="register" class="register" value="SUBMIT">
						</div>
					</div>

				</div>
			</form>
		</div>
	</div>
</body>

@endsection