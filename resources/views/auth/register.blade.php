<!doctype html>
<html lang="en" class="fullscreen-bg">

<head>
	<title>Register | Klinik Seira</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
	<!-- VENDOR CSS -->
	<link rel="stylesheet" href="{{asset('adminlte/assets/css/bootstrap.min.css')}}">
	<link rel="stylesheet" href="{{asset('adminlte/assets/vendor/font-awesome/css/font-awesome.min.css')}}">
	<link rel="stylesheet" href="{{asset('adminlte/assets/vendor/linearicons/style.css')}}">
	<!-- MAIN CSS -->
	<link rel="stylesheet" href="{{asset('adminlte/assets/css/main.css')}}">
	<!-- FOR DEMO PURPOSES ONLY. You should remove this in your project -->
	<link rel="stylesheet" href="{{asset('adminlte/assets/css/demo.css')}}">
	<!-- GOOGLE FONTS -->
	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700" rel="stylesheet">
	<!-- ICONS -->
	<link rel="apple-touch-icon" sizes="76x76" href="{{asset('adminlte/assets/img/apple-icon.png')}}">
	<link rel="icon" type="image/png" sizes="96x96" href="{{asset('adminlte/assets/img/favicon.png')}}">
</head>
<body>
	<!-- WRAPPER -->

		<div class="account-pages mt-5 mb-5">
            <div class="container">
            <div class="col-md-12">           
						<div class="content">
								<div class="logo text-center"><img src="{{asset('adminlte/assets/img/AdminLTELogo.png')}}" alt="klinik"></div>
								<p class="lead">Registrasi</p>
							</div>
              <form action="/register" method="POST" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <div class="form-group">
                            <label for="exampleInputNamaBelakang1">ID User</label>
                            <input name="id_users" type="text" class="form-control" placeholder="ID User" value="<?php echo "SEIRA".Rand(10,1000) ?>" readonly >
                        </div>
                        <div class="form-group">
                            <label for="exampleInputNamaBelakang1">ID User</label>
                            <input name="no_rekammedis" type="text" class="form-control" placeholder="No Rekam Medis" value="<?php echo "RKM".Rand(10,1000) ?>" readonly >
                        </div>
                        <div class="form-group">
                            <label @error('nama_user')
                            class="text-danger"
                            @enderror>Nama @error('nama_user')
                            | {{$message}}
                            @enderror</label>
                            <input name="nama_user" type="text" class="form-control" placeholder="Nama">
                        </div>
                        <div class="form-group">
                            <label @error('umur')
                            class="text-danger"
                            @enderror>Umur @error('umur')
                            | {{$message}}
                            @enderror</label>
                            <input name="umur" type="text" class="form-control" placeholder="Umur">
                        </div>
                        <div class="form-group">
                            <label @error('nomor_telp')
                            class="text-danger"
                            @enderror>Nomor Telepon @error('nomor_telp')
                            | {{$message}}
                            @enderror</label>
                            <input name="nomor_telp" type="numbtexter" class="form-control" placeholder="nomor Handphone">
                        </div>
                        <div class="form-group">
                            <label @error('jenis_kelamin')
                            class="text-danger"
                            @enderror>Jenis Kelamin @error('jenis_kelamin')
                            | {{$message}}
                            @enderror</label>
                            <select name="jenis_kelamin" class="form-control" placeholder="Jenis Kelamin">
                                <option value="L">Laki-Laki</option>
                                <option value="P">Perempuan</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label @error('alamat')
                            class="text-danger"
                            @enderror>Alamat @error('alamat')
                            | {{$message}}
                            @enderror</label>
                            <textarea name=alamat class="form-control" placeholder="Alamat" rows="2"></textarea>
                        </div>  
                        <div class="form-group">
                            <label for="exampleInputUmur1">note</label>
                            <input name="note" type="text" class="form-control" placeholder="ex: Alergi" >
                        </div>
                        <div class="form-group">
                            <label >Foto </label>
                            <input name="foto" type="file" class="form-control" placeholder="Foto" value="" >
                        </div>
                        <div class="form-group">
                            <label @error('username')
                            class="text-danger"
                            @enderror>username @error('username')
                            | {{$message}}
                            @enderror</label>
                            <input name="username" type="text" class="form-control" placeholder="Username" >
                        </div>
                        <div class="form-group">
                            <label @error('password')
                            class="text-danger"
                            @enderror>password @error('password')
                            | {{$message}}
                            @enderror</label>
                            <input name="password" type="password" class="form-control" placeholder="password" >
                        </div>
                <button type="submit" class="btn btn-primary btn-lg btn-block">Register</button>
                <a class="btn btn-warning btn-block" href="/login" role="button" onclick="return confirm('anda yakin?')">Batal</a>

							</form>
						</div>
					</div>
		</div>
	</div>
	<!-- END WRAPPER -->
</body>

</html>
