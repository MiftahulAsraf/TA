@if(session('sukses'))
         <div class= "alert alert-success" role="alert">
                {{session('sukses')}}
        </div>
        @endif
<!doctype html>
<html lang="en" class="fullscreen-bg">

<head>
	<title>Login | Klinik Seira</title>
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
	<div id="wrapper">
		<div class="vertical-align-wrap">
			<div class="vertical-align-middle">
				<div class="auth-box ">
					<div class="left">
						<div class="content">
							<div class="header">
							<div class="logo text-center"><h1><b>KLINIK SEIRA</h1></div><br>
								<p class="lead">Login</p>
							</div>
                            <form class="form-auth-small" action="{{ route('login') }}" method="POST">
                                {{csrf_field()}}
								<div class="form-group">
									<label for="username" class="control-label sr-only">{{ __('Username') }}</label>
									<input name="username" type="text" class="form-control class=form-control @error('username') is-invalid @enderror" id="username" value="{{ old('username') }}" required autocomplete="username" autofocus placeholder="username">
									
								@error('username')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
								</div>

								<div class="form-group">
									<label for="signin-password" class="control-label sr-only">{{ __('Password') }}</label>
									<input name="password" type="password" class="form-control @error('password') is-invalid @enderror" id="password"  placeholder="Password">
								</div>
								<div class="form-group clearfix">
								</div>
								<button type="submit" class="btn btn-primary btn-lg btn-block">LOGIN</button>
								<div class="bottom">
									<span class="helper-text"><i class="fa fa-user"></i> 
									<a href="/register">Registrasi Disini</a></span>
								</div>


							
							</form>
						</div>
					</div>
					<div class="right">
						<div class="overlay"></div>
						<div class="content text">
							<h1 class="heading">Aplikasi Klinik Seira</h1>
							<p>by Miftahul Asraf</p>
						</div>
					</div>
					<div class="clearfix"></div>
				</div>
			</div>
		</div>
	</div>
	<!-- END WRAPPER -->
</body>

</html>
