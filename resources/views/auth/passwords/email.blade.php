<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../dashboard_assets/images/favicon.ico">

    <title>BitPro - Login </title>

	<!-- Bootstrap 4.0-->
	<link rel="stylesheet" href="../dashboard_assets/assets/vendor_components/bootstrap/dist/css/bootstrap.min.css">

	<!-- Bootstrap extend-->
	<link rel="stylesheet" href="../dashboard_assets/css/bootstrap-extend.css">

	<!-- Theme style -->
	<link rel="stylesheet" href="../dashboard_assets/css/master_style.css">

	<!-- Crypto_Admin skins -->
	<link rel="stylesheet" href="../dashboard_assets/css/skins/_all-skins.css">
    <link rel="stylesheet" href="../dashboard_assets/assets/vendor_components/font-awesome/css/font-awesome.css">
    <link rel="stylesheet" href="../dashboard_assets/assets/vendor_components/Ionicons/css/ionicons.css">

	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
	<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
	<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->

</head>

<body style="background: url(../dashboard_assets/images/login-register.jpg) center center no-repeat #d2d6de" class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="{{ url('/') }}"><b>BitPro</a>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg">Reset Password</p>

    <form action="{{ route('password.email') }}" method="POST" class="form-element">
    @csrf

        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif

      <div class="form-group has-feedback">
        <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Email">
        <span class="ion ion-email form-control-feedback "></span>
        @error('email')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
      </div>

        <!-- /.col -->
        <div class="col-12 text-center">
          <button type="submit" class="btn btn-info btn-block margin-top-10">Send Password Reset Link</button>
        </div>
        <!-- /.col -->
      </div>
    </form>


    <div class="margin-top-30 text-center">
    	<p>Don't have an account? <a href="{{ route('register') }}" class="text-info m-l-5">Sign Up</a></p>
    </div>

  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->


	<!-- jQuery 3 -->
	<script src="../dashboard_assets/assets/vendor_components/jquery/dist/jquery.min.js"></script>

	<!-- popper -->
	<script src="../dashboard_assets/assets/vendor_components/popper/dist/popper.min.js"></script>

	<!-- Bootstrap 4.0-->
	<script src="../dashboard_assets/assets/vendor_components/bootstrap/dist/js/bootstrap.min.js"></script>


</body>
</html>

