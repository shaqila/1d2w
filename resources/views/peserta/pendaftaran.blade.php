@extends('layouts.app')

@section('content')

<body class="form-v10">
	<div class="pendaftaran-content">
		<div class="form-v10-content">
			<form class="form-detail" action="#" method="post" id="myform">
				<div class="form-left">
					<h2>Informasi Peserta</h2>
					<div class="form-row">
						<input type="text" name="nama_lengkap" class="input-text" id="nama_lengkap" placeholder="Nama Langkap" required>
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
						<select name="Domisili" required>
							<option value="domisili">Pilih Domisili</option>
							<option value="director">Director</option>
							<option value="manager">Manager</option>
							<option value="employee">Employee</option>
						</select>
						<span class="select-btn">
							<i class="zmdi zmdi-chevron-down"></i>
						</span>
					</div>
					<div class="form-group">
						<label class="date-input" required>Tanggal Lahir</label>
						<div class="form-row">
							<input class="form-control" type="date" value="today" id="date-input">
						</div>
					</div>

				</div>
				<div class="form-right">
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
						<p class="info">Shaqila Erbeliza </br> <strong>1812828230</strong></p>
					</div>
					<div class="form-row-last">
						<input type="submit" name="register" class="register" value="SUBMIT">
					</div>

				</div>
			</form>
		</div>
	</div>
</body>

@endsection
