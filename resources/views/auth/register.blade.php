<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="dashboard_assets/images/favicon.ico">

    <title>BitPro - Registration </title>

	<!-- Bootstrap 4.0-->
	<link rel="stylesheet" href="dashboard_assets/assets/vendor_components/bootstrap/dist/css/bootstrap.min.css">

	<!-- Bootstrap extend-->
	<link rel="stylesheet" href="dashboard_assets/css/bootstrap-extend.css">

	<!-- Theme style -->
	<link rel="stylesheet" href="dashboard_assets/css/master_style.css">

	<!-- Crypto_Admin skins -->
	<link rel="stylesheet" href="dashboard_assets/css/skins/_all-skins.css">
    <link rel="stylesheet" href="dashboard_assets/assets/vendor_components/font-awesome/css/font-awesome.css">
    <link rel="stylesheet" href="dashboard_assets/assets/vendor_components/Ionicons/css/ionicons.css">
	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
	<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
	<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->

</head>
<body style="background: url(dashboard_assets/images/login-register.jpg) center center no-repeat #d2d6de" class="hold-transition register-page">
<div class="register-box">

  <div class="register-box-body">
	  <div class="register-logo">
		<a href="{{ url('/') }}"><b>BitPro</a>
	  </div>
    <p class="login-box-msg">Register a new membership</p>

    <form action="{{ route('register') }}" method="POST" class="form-element">
    @csrf
      <div class="form-group has-feedback">
        <input type="text" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" required autocomplete="username" autofocus placeholder="Username">
        <span class="ion ion-person form-control-feedback "></span>
        @error('username')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
      </div>
      <div class="form-group has-feedback">
        <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Email">
        <span class="ion ion-email form-control-feedback "></span>
        @error('email')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
      </div>
      <div class="form-group has-feedback">
        <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="Password">
        <span class="ion ion-locked form-control-feedback "></span>
        @error('password')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
      </div>

      <div class="form-group has-feedback">
        <input type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder="Retype password">
        <span class="ion ion-log-in form-control-feedback "></span>
      </div>

      <div class="row">
        <div class="col-12">
          <div class="checkbox">
            <input type="checkbox" id="basic_checkbox_1" >
			<label for="basic_checkbox_1">I agree to the <a href="#"><b>Terms</b></a></label>
          </div>
        </div>
        <!-- /.col -->
        <div class="col-12 text-center">
          <button type="submit" class="btn btn-info btn-block margin-top-10">SIGN UP</button>
        </div>
        <!-- /.col -->
      </div>
    </form>

     <div class="margin-top-20 text-center">
    	<p>Already have an account?<a href="{{ route('login') }}" class="text-info m-l-5"> Sign In</a></p>
     </div>

  </div>
  <!-- /.form-box -->
</div>
<!-- /.register-box -->


	<!-- jQuery 3 -->
	<script src="dashboard_assets/assets/vendor_components/jquery/dist/jquery.min.js"></script>

	<!-- popper -->
	<script src="dashboard_assets/assets/vendor_components/popper/dist/popper.min.js"></script>

	<!-- Bootstrap 4.0-->
	<script src="dashboard_assets/assets/vendor_components/bootstrap/dist/js/bootstrap.min.js"></script>


</body>
</html>

