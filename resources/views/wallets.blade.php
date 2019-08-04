<?php
// Getting a connection to our Database at this point
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_DATABASE', 'exchange');
$connection = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);

$user_id = Auth::user()->id;
$username = Auth::user()->username;
$email = Auth::user()->email;
$btc_address = Auth::user()->btc_address;
$btc_wallet = $wallet_balance;
$usd_wallet = to_currency('USD', $btc_wallet);

$selling_query = "SELECT * FROM sellers WHERE seller_user_id = '$user_id'";
$selling_result = $connection->query($selling_query);


$withdraw_query = "SELECT * FROM payouts WHERE user_id = '$user_id' ORDER BY id DESC";
$withdraw_result = $connection->query($withdraw_query);

?>


<!DOCTYPE html>
<html style="zoom: 90%;" lang="en">
<head>
  <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="dashboard_assets/images/favicon.ico">

    <title>BitPro - Dashboard</title>

	<!-- Bootstrap 4.0-->
	<link rel="stylesheet" href="dashboard_assets/assets/vendor_components/bootstrap/dist/css/bootstrap.min.css">

	<!-- Bootstrap extend-->
	<link rel="stylesheet" href="dashboard_assets/css/bootstrap-extend.css">

	<!-- Theme style -->
	<link rel="stylesheet" href="dashboard_assets/css/master_style.css">

    <!-- Select2 -->
	<link rel="stylesheet" href="dashboard_assets/assets/vendor_components/select2/dist/css/select2.min.css">

    <!-- iCheck for checkboxes and radio inputs -->
	<link rel="stylesheet" href="dashboard_assets/assets/vendor_plugins/iCheck/all.css">

	<!-- Bootstrap Color Picker -->
	<link rel="stylesheet" href="dashboard_assets/assets/vendor_components/bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css">

    <!-- Theme style -->
	<link rel="stylesheet" href="dashboard_assets/css/master_style.css">

    <!-- Crypto_Admin skins -->
    <link rel="stylesheet" href="dashboard_assets/css/skins/_all-skins.css">


	<!-- Crypto_Admin skins -->
	<link rel="stylesheet" href="dashboard_assets/css/skins/_all-skins.css">
    <link rel="stylesheet" href="dashboard_assets/assets/vendor_components/font-awesome/css/font-awesome.css">
    <link rel="stylesheet" href="dashboard_assets/assets/vendor_components/Ionicons/css/ionicons.css">
    <link rel="stylesheet" href="dashboard_assets/assets/vendor_components/themify-icons/themify-icons.css">
    <link rel="stylesheet" href="dashboard_assets/assets/vendor_components/linea-icons/linea.css">
    <link rel="stylesheet" href="dashboard_assets/assets/vendor_components/glyphicons/glyphicon.css">
    <link rel="stylesheet" href="dashboard_assets/assets/vendor_components/flag-icon/css/flag-icon.css">
    <link rel="stylesheet" href="dashboard_assets/assets/vendor_components/material-design-iconic-font/css/materialdesignicons.css">

	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
	<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
	<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->

</head>
<body class="hold-transition skin-yellow sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->

    <a href="{{ url('/') }}" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
	  <b class="logo-mini">
		  <span class="light-logo"><img src="dashboard_assets/images/logo-light.png" alt="logo"></span>
		  <span class="dark-logo"><img src="dashboard_assets/images/logo-dark.png" alt="logo"></span>
	  </b>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg">
		  <img src="dashboard_assets/images/logo-light-text.png" alt="logo" class="light-logo">
	  	  <img src="dashboard_assets/images/logo-dark-text.png" alt="logo" class="dark-logo">
	  </span>
    </a>
    <!-- Header Navbar -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">

		  <!-- User Account -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="dashboard_assets/images/user5-128x128.jpg" class="user-image rounded-circle" alt="User Image">
            </a>
            <ul class="dropdown-menu scale-up">
              <!-- User image -->
              <li class="user-header">
                <img src="dashboard_assets/images/user5-128x128.jpg" class="float-left rounded-circle" alt="User Image">

                <p>
                  {{ $username }}
                  <small class="mb-5">{{ $email }}</small>
                  <a href="{{ route('profile') }}" class="btn btn-danger btn-sm btn-rounded">View Profile</a>
                </p>
              </li>
              <!-- Menu Body -->
              <li class="user-body">
                <div class="row no-gutters">
                  <div class="col-12 text-left">
                    <a href="{{ route('profile') }}"><i class="ion ion-person"></i> My Profile</a>
                  </div>
				<div role="separator" class="divider col-12"></div>
				  <div class="col-12 text-left">
                    <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="fa fa-power-off"></i> Logout</a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">@csrf</form>
                  </div>
                </div>
                <!-- /.row -->
              </li>
            </ul>
          </li>
        </ul>
      </div>
    </nav>
  </header>

  <!-- Left side column. contains the sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
		 <div class="ulogo">
			 <a href="index.html">
			  <!-- logo for regular state and mobile devices -->
			  <span><b>BitPro </b>Dashboard</span>
			</a>
		</div>
        <div class="image">
          <img src="dashboard_assets/images/user2-160x160.jpg" class="rounded-circle" alt="User Image">
        </div>
        <div class="info">
          <p>{{ $username }}</p>
			<a href="#" class="link" data-toggle="tooltip" title="" data-original-title="Settings"><i class="ion ion-gear-b"></i></a>
            <a href="#" class="link" data-toggle="tooltip" title="" data-original-title="Email"><i class="ion ion-android-mail"></i></a>
            <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="link" data-toggle="tooltip" title="" data-original-title="Logout"><i class="ion ion-power"></i></a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">@csrf</form>
        </div>
      </div>

      <!-- sidebar menu -->
      <ul class="sidebar-menu" data-widget="tree">
		<li class="nav-devider"></li>
        <li class="header nav-small-cap">PERSONAL</li>
        <li>
          <a href="{{ url('/') }}">
            <i class="fa fa-home"></i> <span>Homepage</span>
          </a>
        </li>
        <li>
          <a href="{{ route('home') }}">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
          </a>
        </li>
        <li>
          <a href="{{ route('profile') }}">
            <i class="fa fa-user"></i> <span>Profile</span>
          </a>
        </li>
        <li class="header nav-small-cap">TRANSACTIONS</li>
        <li>
          <a href="{{ route('wallets') }}">
            <i class="fa fa-money"></i> <span>Wallets</span>
          </a>
        </li>
        <li>
          <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
            <i class="ion ion-power"></i> <span>Logout</span>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">@csrf</form>
          </a>
        </li>
      </ul>
    </section>
  </aside>

  <!-- =============================================== -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Wallet Informations.</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                    title="Collapse">
              <i class="fa fa-minus"></i></button>
          </div>
        </div>
        <div class="row">
		<div class="col-lg-6 col-12">
		  <div class="box">
			<div class="box-header with-border">
			  <h3 class="box-title">Wallet Address</h3>
			</div>
			<div class="box-body">
				<div class="table-responsive">
					<table class="table table-striped table-hover no-margin">
					  <tbody>
						<tr>
						  <td>Address</td>
						  <td><a href="https://blockchain.com/btc/address/{{ $btc_address }}">{{ $btc_address }}</a></td>
						</tr>
						<tr>
						  <td>Total Balance in USD</td>
						  <td><span class="text-success">${{ $usd_wallet }}</span></td>
						  <td><i class="fa fa-bar-chart"></i></td>
						</tr>
                        <tr>
						  <td>Total Balance in BTC</td>
						  <td><span class="text-success">{{ $btc_wallet }} BTC</span></td>
						  <td><i class="fa fa-bar-chart"></i></td>
						</tr>
					  </tbody>
					</table>
				</div>
			</div>
			<!-- /.box-body -->
		  </div>
		</div>
        <div class="col-lg-2 col-12">
		  <div class="box">
			<div class="box-body">
                <a href="https://chart.googleapis.com/chart?chs=250x250&cht=qr&chl=bitcoin:{{ $btc_address }}" target="_blank" title="barcode"><img id="btc" src="https://chart.googleapis.com/chart?chs=250x250&cht=qr&chl=bitcoin:{{ $btc_address }}" alt="{{ $btc_address }}"></a>
			</div>
			<!-- /.box-body -->
		  </div>
		</div>
        <div class="col-lg-4 col-12">
            <div class="box">
                <div class="box-header with-border">
                <h3 class="box-title">Fund Deposit/Withdraw</h3>

                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                            title="Collapse">
                    <i class="fa fa-minus"></i></button>
                </div>
                </div>
                <div class="box-body">
                    <div class="box-body">

                    <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#modal-center1">
                        Deposit Funds
                    </button>

                    <button type="button" class="btn btn-warning btn-lg" data-toggle="modal" data-target="#modal-center2">
                        Withdraw Funds
                    </button>
                    <!--==========================================================================================================-->
                    <!-- Modal -->
                        <div class="modal center-modal fade" id="modal-center1" tabindex="-1">
                        <div class="modal-dialog">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Deposit</h5>
                                <button type="button" class="close" data-dismiss="modal">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <p>BTC ONLY</p>
                                <hr>
                                <p>Deposit fee 0.00020000</p>
                                <p>This deposit address only accepts BTC. Do not send other coins to it.</p>
                                <hr>
                                <h5 class="text-center">{{ $btc_address }}</h5>
                                <p class="text-center"><a href="https://chart.googleapis.com/chart?chs=250x250&cht=qr&chl=bitcoin:{{ $btc_address }}" target="_blank" title="barcode"><img id="btc" src="https://chart.googleapis.com/chart?chs=250x250&cht=qr&chl=bitcoin:{{ $btc_address }}" alt="{{ $btc_address }}"></a></p>
                                <hr>
                            </div>
                            <div class="modal-footer modal-footer-uniform">
                                <button type="button" class="btn btn-bold btn-pure btn-secondary" data-dismiss="modal">Close</button>
                            </div>
                            </div>
                        </div>
                        </div>
                    <!-- /.modal -->
                    <!--=============================================================================================================-->
                        <!-- Modal -->
                        <div class="modal center-modal fade" id="modal-center2" tabindex="-1">
                        <div class="modal-dialog">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Withdraw</h5>
                                <button type="button" class="close" data-dismiss="modal">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form action="{{ route('withdraw.btc') }}" method="POST">
                                @csrf
                                    <div class="form-group">
                                        <label>Wallet Balance in BTC</label>

                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">
                                                    <i class="fa fa-btc"></i>
                                                </div>
                                            </div>
                                            <input type="text" value="{{ $btc_wallet }}BTC"  class="form-control" disabled>
                                        </div>
                                    <!-- /.input group -->
                                    </div>
                                    <div class="form-group">
                                        <label>Wallet Balance in USD</label>

                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">
                                                    <i class="fa fa-dollar"></i>
                                                </div>
                                            </div>
                                            <input type="text" value="${{ $usd_wallet }}"  class="form-control" disabled>
                                        </div>
                                    <!-- /.input group -->
                                    </div>
                                    <div class="form-group">
                                        <label>BTC Address</label>

                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">
                                                    <i class="fa fa-btc"></i>
                                                </div>
                                            </div>
                                            <input type="text" name="btc_address" class="form-control" required autofocus>
                                        </div>
                                    <!-- /.input group -->
                                    </div>
                                    <div class="form-group">
                                        <label>BTC Amount</label>

                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">
                                                    <i class="fa fa-money"></i>
                                                </div>
                                            </div>
                                            <input type="number" name="amount" placeholder="Amount in USD" min="0" max="{{ $usd_wallet }}" class="form-control" required >
                                        </div>
                                    <!-- /.input group -->
                                    </div>
                                    <button type="submit" class="btn btn-primary btn-lg">
                                        Withdraw
                                    </button>
                                </form>
                            </div>
                            <div class="modal-footer modal-footer-uniform">
                                <button type="button" class="btn btn-bold btn-pure btn-secondary float-right" data-dismiss="modal">Close</button>
                            </div>
                            </div>
                        </div>
                        </div>
                    <!-- /.modal -->
                    <!--===================================================================================================================-->

                    </div>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
	  </div>
      <!-- Default box -->
      <!-- /.box-body -->
      </div>
      <!-- /.box -->

        <div class="row">
            <div class="col-md-6">
            <div class="box">
                @if($selling_message = Session::get('selling_message'))
                    <div class="alert alert-success alert-dismissable">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    {{ $selling_message }}
                    </div>
                @endif
                @if($selling_er_message = Session::get('selling_er_message'))
                    <div class="alert alert-danger alert-dismissable">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    {{ $selling_er_message }}
                    </div>
                @endif
                    <div class="box-header with-border">
                    <h3 class="box-title">Sell</h3>

                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                                title="Collapse">
                        <i class="fa fa-minus"></i></button>
                    </div>
                    </div>
                    <div class="box-body">
                        <div class="box-body">
                        <form action="{{ route('sell.btc') }}" method="POST">
                        @csrf
                            <div class="form-group">
                                <label>Wallet Balance in BTC</label>

                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            <i class="fa fa-btc"></i>
                                        </div>
                                    </div>
                                    <input type="text" value="{{ $btc_wallet }}BTC"  class="form-control" disabled>
                                </div>
                            <!-- /.input group -->
                            </div>
                            <div class="form-group">
                                <label>Wallet Balance in USD</label>

                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            <i class="fa fa-dollar"></i>
                                        </div>
                                    </div>
                                    <input type="text" value="${{ $usd_wallet }}"  class="form-control" disabled>
                                </div>
                            <!-- /.input group -->
                            </div>
                            <div class="form-group">
                                <label>BTC Amount</label>

                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            <i class="fa fa-money"></i>
                                        </div>
                                    </div>
                                    <input type="number" name="usd_selling_amount" placeholder="Amount in USD" min="0" max="{{ $usd_wallet }}" class="form-control" autofocus required >
                                </div>
                            <!-- /.input group -->
                            </div>

                            <div class="form-group">
                                <label> Select Payment Mode</label>
                                <br/>
                                <input type="checkbox" id="md_checkbox_21" name="paypal" value="Paypal," class="filled-in chk-col-light-blue" checked />
                                <label for="md_checkbox_21">Paypal</label>
                                <br/>
                                <input type="checkbox" id="md_checkbox_23" name="payza" value="Payza," class="filled-in chk-col-purple" />
                                <label for="md_checkbox_23">Payza</label>
                                <br/>
                                <input type="checkbox" id="md_checkbox_24" name="netella" value="Netella," class="filled-in chk-col-deep-purple"  />
                                <label for="md_checkbox_24">Netella</label>
                                <br/>
                                <input type="checkbox" id="md_checkbox_26" name="giftcard" value="Gift Card," class="filled-in chk-col-red"  />
                                <label for="md_checkbox_26">Gift card</label>
                                <br/>
                                <input type="checkbox" id="md_checkbox_27" name="globalpayment" value="Global Payment." class="filled-in chk-col-blue"  />
                                <label for="md_checkbox_27">Global Payment</label>
                            </div>

                            <button type="submit" class="btn btn-primary btn-lg">
                                Sell BTC
                            </button>
                        </form>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
            </div>
            <div class="col-md-6">
                <div class="box">
                    <div class="box-header with-border">
                    <h3 class="box-title">Buy</h3>

                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                                title="Collapse">
                        <i class="fa fa-minus"></i></button>
                    </div>
                    </div>
                    <div class="box-body">
                        <div class="box-body">
                        <form action="{{ route('sell.btc') }}" method="POST">
                        @csrf
                            <div class="form-group">
                                <label>Wallet Balance in BTC</label>

                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            <i class="fa fa-btc"></i>
                                        </div>
                                    </div>
                                    <input type="text" value="{{ $btc_wallet }}BTC"  class="form-control" disabled>
                                </div>
                            <!-- /.input group -->
                            </div>
                            <div class="form-group">
                                <label>Wallet Balance in USD</label>

                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            <i class="fa fa-dollar"></i>
                                        </div>
                                    </div>
                                    <input type="text" value="${{ $usd_wallet }}"  class="form-control" disabled>
                                </div>
                            <!-- /.input group -->
                            </div>
                            <div class="form-group">
                                <label>BTC Amount</label>

                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            <i class="fa fa-money"></i>
                                        </div>
                                    </div>
                                    <input type="number" name="btc_amount" placeholder="Amount in USD" min="2" max="{{ $usd_wallet }}" class="form-control" autofocus required >
                                </div>
                            <!-- /.input group -->
                            </div>

                            <button type="submit" class="btn btn-primary btn-lg">
                                Buy BTC
                            </button>
                        </form>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
            <div class="col-md-12">
                <div class="box">
                    <div class="box-header with-border">
                    <h3 class="box-title">Withdrawal Requests</h3>

                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                                title="Collapse">
                        <i class="fa fa-minus"></i></button>
                    </div>
                    </div>
                    <div class="box-body">
                        <div class="box-body">
                        <h4 style="padding: 15px;" class="bg-dark box-title text-yellow">Your pending and approved withdrawals</h4>
                        <table class="table no-margin table-hover">
                            <thead>
                            <tr class="bg-dark">
                                <th class="text-yellow">ID</th>
                                <th class="text-yellow">User Label</th>
                                <th class="text-yellow">Amount</th>
                                <th class="text-yellow">Status</th>
                            </tr>
                            </thead>
                            <tbody>
                            @while($withdraw_data = $withdraw_result->fetch_array())
                            <tr>
                                <td>
                                <a class="text-yellow hover-warning">
                                #{{ $withdraw_data['id'] }}
                                </a>
                                </td>
                                <td>{{ $withdraw_data['user_label'] }}</td>
                                <td>
                                <?php
                                    $usd_selling_amount = $withdraw_data['amount'];
                                    $btc_selling_amount = to_btc($usd_selling_amount, 'USD');
                                ?>
                                ${{ $usd_selling_amount }} / {{ $btc_selling_amount }} BTC

                                </td>
                                <td><span class="label label-info">{{ $withdraw_data['status'] }}</span></td>
                            </tr>
                            @endwhile
                            </tbody>
                        </table>
                        </div>
                        <!-- /.box-body -->
                    </div>
                    <!-- /.box -->
                </div>
            </div>
        </div>

        <div class="box">
            <div class="box-header with-border">
            <h3 class="box-title">Buying ADS</h3>

            <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                        title="Collapse">
                <i class="fa fa-minus"></i></button>
            </div>
            </div>
            <div class="box-body">
            <h4 style="padding: 15px;" class="bg-dark box-title text-yellow">Your Pending Buying ADS</h4>
            <table class="table no-margin table-hover">
                <thead>
                <tr class="bg-dark">
                    <th class="text-yellow">ID</th>
                    <th class="text-yellow">Payment Mode</th>
                    <th class="text-yellow">Amount</th>
                    <th class="text-yellow">Status</th>
                </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->

        <div class="box">
            <div class="box-header with-border">
            <h3 class="box-title">Selling ADS</h3>

            <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                        title="Collapse">
                <i class="fa fa-minus"></i></button>
            </div>
            </div>
            <div class="box-body">
            <h4 style="padding: 15px;" class="bg-dark box-title text-yellow">Your Pending Selling ADS</h4>
            <table id="example1"class="table table-bordered table-hover display nowrap margin-top-10 w-p100">
                <thead>
                <tr class="bg-dark">
                    <th class="text-yellow">ID</th>
                    <th class="text-yellow">Payment Mode</th>
                    <th class="text-yellow">Amount</th>
                    <th class="text-yellow">Status</th>
                </tr>
                </thead>
                <tbody>
                @while($selling_data = $selling_result->fetch_array())
                <tr>
                    <td>
                    <a class="text-yellow hover-warning">
                    #{{ $selling_data['id'] }}
                    </a>
                    </td>
                    <td>{{ $selling_data['seller_payment_mode'] }}</td>
                    <td>
                    <?php
                        $usd_selling_amount = $selling_data['selling_amount'];
                        $btc_selling_amount = to_btc($usd_selling_amount, 'USD');
                    ?>
                    ${{ $usd_selling_amount }} / {{ $btc_selling_amount }} BTC

                    </td>
                    <td><span class="label label-default">{{ $selling_data['merge_status'] }}</span></td>
                </tr>
                @endwhile
                </tbody>
            </table>
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->



    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->


  <footer class="main-footer">
    <div class="pull-right d-none d-sm-inline-block">
        <ul class="nav nav-primary nav-dotted nav-dot-separated justify-content-center justify-content-md-end">
		  <li class="nav-item">
			<a class="nav-link" href="javascript:void(0)">FAQ</a>
		  </li>
		</ul>
    </div>
	  &copy; 2019 <a href="{{ url('/')}}">BitPro</a>. All Rights Reserved.
  </footer>


	<!-- jQuery 3 -->
	<script src="dashboard_assets/assets/vendor_components/jquery/dist/jquery.min.js"></script>

	<!-- popper -->
	<script src="dashboard_assets/assets/vendor_components/popper/dist/popper.min.js"></script>

	<!-- Bootstrap 4.0-->
	<script src="dashboard_assets/assets/vendor_components/bootstrap/dist/js/bootstrap.min.js"></script>

	<!-- SlimScroll -->
	<script src="dashboard_assets/assets/vendor_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>

	<!-- FastClick -->
	<script src="dashboard_assets/assets/vendor_components/fastclick/lib/fastclick.js"></script>

	<!-- Crypto_Admin App -->
	<script src="dashboard_assets/js/template.js"></script>

	<!-- Crypto_Admin for demo purposes -->
	<script src="dashboard_assets/js/demo.js"></script>

    <!-- Crypto_Admin for advanced form element -->
	<script src="dashboard_assets/js/pages/advanced-form-element.js"></script>

    <!-- Select2 -->
	<script src="dashboard_assets/assets/vendor_components/select2/dist/js/select2.full.js"></script>

	<!-- InputMask -->
	<script src="dashboard_assets/assets/vendor_plugins/input-mask/jquery.inputmask.js"></script>
	<script src="dashboard_assets/assets/vendor_plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
	<script src="dashboard_assets/assets/vendor_plugins/input-mask/jquery.inputmask.extensions.js"></script>

    <!-- iCheck 1.0.1 -->
	<script src="dashboard_assets/assets/vendor_plugins/iCheck/icheck.min.js"></script>

	<!-- FastClick -->
	<script src="dashboard_assets/assets/vendor_components/fastclick/lib/fastclick.js"></script>

    <!-- Crypto_Admin for Data Table -->
	<script src="dashboard_assets/js/pages/data-table.js"></script>


</body>
</html>


