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

$selling_query = "SELECT * FROM sellers WHERE seller_user_id != '$user_id' AND merge_status = 'pending'";
$selling_result = $connection->query($selling_query);

$buying_merging_query = "SELECT * FROM mergings WHERE buyer_user_id = '$user_id' AND transaction_status IS NULL";
$buying_merging_result = $connection->query($buying_merging_query);

$selling_merging_query = "SELECT * FROM mergings WHERE seller_user_id = '$user_id' AND transaction_status IS NULL";
$selling_meriging_result = $connection->query($selling_merging_query);
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
            Balance: {{ $username }}
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
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h2>
       Estimated Assets:
       {{ $btc_wallet }}BTC /
       ${{ $usd_wallet }}
      </h2>
       <div class="breadcrumb" style="margin-top: -15px;">
        <a class="btn btn-primary btn-lg" href="{{ route('wallets') }}">Deposit/Withdraw</a>
      </div>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Pending Transactions</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                    title="Collapse">
              <i class="fa fa-minus"></i></button>
          </div>
        </div>
        <div class="box-body">
        @while($selling_merging_data = $selling_meriging_result->fetch_array())
            @if($selling_merging_data['seller_consent'] == NULL)
                <p> {{ $selling_merging_data['buyer_username'] }} is intertested in your selling ads of ${{ $selling_merging_data['selling_amount'] }} / <?php echo to_btc($selling_merging_data['selling_amount'], 'USD'); ?>BTC, buyer's details below</p>
                <form action="{{ route('seller.consent') }}" method="post">
                @csrf
                    <input name="merging_id" type="hidden" value="<?php echo $selling_merging_data['id'] ?>">
                    <input name="buyer_email" type="hidden" value="<?php echo $selling_merging_data['buyer_email'] ?>">
                    <button type="submit" class="btn btn-success">
                        Deal with buyer
                    </button>
                    <a href="user-profile/{{ $selling_merging_data['buyer_user_id'] }}" class="btn btn-primary">Check Buyer Profile</a>
                </form>
                <form style="margin-top: 10px;" action="{{ route('delete.int') }}" method="post">
                @csrf
                    <input name="merging_id" type="hidden" value="<?php echo $selling_merging_data['id'] ?>">
                    <input name="buying_id" type="hidden" value="<?php echo $selling_merging_data['buyer_id'] ?>">
                    <input name="buyer_email" type="hidden" value="<?php echo $selling_merging_data['buyer_email'] ?>">
                    <input name="selling_id" type="hidden" value="<?php echo $selling_merging_data['seller_id'] ?>">

                    <button type="submit" class="btn btn-danger">
                      Can't deal with buyer
                    </button>
                </form>
            @elseif($selling_merging_data['seller_consent'] == 'Deal')
                <p> You have agreed to deal with {{ $selling_merging_data['buyer_username'] }} on your selling ads of ${{ $selling_merging_data['selling_amount'] }}  / <?php echo to_btc($selling_merging_data['selling_amount'], 'USD'); ?>BTC, <br/> Contact the buyer with {{ $selling_merging_data['buyer_email'] }}.  </p>
                <h5> Buyer BTC Address: {{ $selling_merging_data['buyer_btc_address'] }} </h5>
                <p>  Use your confirm button when have received your payment to release BTC to buyer's address. </p>
                @if($selling_merging_data['payment_status'] != '')

                @if($selling_merging_data['pay_received_status'] == '')
                <form action="{{ route('confirm.received') }}" method="post">
                @csrf
                    <input name="merging_id" type="hidden" value="<?php echo $selling_merging_data['id'] ?>">
                    <input name="buying_id" type="hidden" value="<?php echo $selling_merging_data['buyer_id'] ?>">
                    <input name="selling_id" type="hidden" value="<?php echo $selling_merging_data['seller_id'] ?>">
                    <input name="seller_email" type="hidden" value="<?php echo $selling_merging_data['seller_email'] ?>">
                    <button type="submit" class="btn btn-success btn-lg">
                      Acknowleged Received Payment
                    </button>
                </form>
                @endif
                @else

                <h5>  Kindly contact the buyer and wait for the buyer to make payment. Afterward a button to acknowledge payment will appear. </h5>

                @endif
            @endif
            <hr>
        @endwhile

        @while($buying_merging_data = $buying_merging_result->fetch_array())
            @if($buying_merging_data['seller_consent'] == NULL)
                <p>your showed intertested in username selling ads of ${{ $buying_merging_data['selling_amount'] }}  / <?php echo to_btc($buying_merging_data['selling_amount'], 'USD'); ?>BTC <br/> Wait while the seller accept to deal</p>
            @elseif($buying_merging_data['seller_consent'] == 'Deal')
            <p> {{ $buying_merging_data['seller_username'] }} have agreed to deal with you on his selling ads of ${{ $buying_merging_data['selling_amount'] }}  / <?php echo to_btc($buying_merging_data['selling_amount'], 'USD'); ?>BTC, <br/> Contact the seller with {{ $buying_merging_data['seller_email'] }}.  </p>
            <p> Use your confirm button when have received your payment.</p>
                <div class="row">
                    @if($buying_merging_data['payment_status'] == '')
                    <div class="col-md-3">
                        <form action="{{ route('confirm.payment') }}" method="post">
                            @csrf
                            <input name="merging_id" type="hidden" value="<?php echo $buying_merging_data['id'] ?>">
                                <input name="buying_id" type="hidden" value="<?php echo $buying_merging_data['buyer_id'] ?>">
                                <input name="seller_email" type="hidden" value="<?php echo $buying_merging_data['seller_email'] ?>">
                                <input name="selling_id" type="hidden" value="<?php echo $buying_merging_data['seller_id'] ?>">
                                <button type="submit" class="btn btn-warning btn-lg">
                                    Acknowleged Payment Made
                                </button>
                        </form>
                    </div>
                    @elseif($buying_merging_data['pay_received_status'] != '')
                    <div class="col-md-3">
                        <form action="{{ route('confirm.tx') }}" method="post">
                            @csrf
                            <input name="merging_id" type="hidden" value="<?php echo $buying_merging_data['id'] ?>">
                                <input name="buying_id" type="hidden" value="<?php echo $buying_merging_data['buyer_id'] ?>">
                                <input name="selling_id" type="hidden" value="<?php echo $buying_merging_data['seller_id'] ?>">
                                <button type="submit" class="btn btn-success btn-lg">
                                    Confirm Transaction
                                </button>
                        </form>
                    </div>
                    @else
                    <div class="col-md-3">
                        <p>Kindly contact the seller and wait for the seller to acknowlegde payment. Afterward a button to acknowledge payment will appear. </p>
                        <form action="{{ route('confirm.tx') }}" method="post">
                            @csrf
                            <input name="merging_id" type="hidden" value="<?php echo $buying_merging_data['id'] ?>">
                                <input name="buying_id" type="hidden" value="<?php echo $buying_merging_data['buyer_id'] ?>">
                                <input name="selling_id" type="hidden" value="<?php echo $buying_merging_data['seller_id'] ?>">
                                <button type="submit" class="btn btn-success btn-lg">
                                    Confirm Transaction
                                </button>
                        </form>
                    </div>
                    @endif
                    <div class="col-md-3"></div>
                    <div class="col-md-3"></div>
                </div>
            @endif
        @endwhile
        </div>
        <!-- /.box-body -->
      </div>
      <!-- /.box -->


      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">All Open Exchanges</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                    title="Collapse">
              <i class="fa fa-minus"></i></button>
          </div>
        </div>
        <div class="box-body">
        <div class="table-responsive">
            <table id="example1" class="table table-bordered table-hover display nowrap margin-top-10 w-p100">
            <thead>
                <tr class="bg-dark">
                    <th class="text-yellow">ID</th>
                    <th class="text-yellow">Seller Username</th>
                    <th class="text-yellow">Seller Email</th>
                    <th class="text-yellow">Seller Payment Mode</th>
                    <th class="text-yellow">Seller Amount</th>
                    <th class="text-yellow"></th>
                </tr>
                </thead>
                <tbody>
                @while($selling_data = $selling_result->fetch_array())
                <tr>
                    <td>
                    <a class="text-yellow hover-warning">
                    {{ $selling_data['id'] }}
                    </a>
                    </td>
                    <td>{{ $selling_data['seller_username'] }}</td>
                    <td>{{ $selling_data['seller_email'] }}</td>
                    <td>{{ $selling_data['seller_payment_mode'] }}</td>
                    <td>
                    <?php
                        $usd_selling_amount = $selling_data['selling_amount'];
                        $btc_selling_amount = to_btc($usd_selling_amount, 'USD');
                    ?>
                    ${{ $usd_selling_amount }} / {{ $btc_selling_amount }}BTC

                    </td>
                    <td>
                    <form action="{{ route('buying.btc') }}" method="post">
                    @csrf
                    <input name="selling_id" type="hidden" value="<?php echo $selling_data['id'] ?>">
                    <button type="submit" class="btn btn-success btn-sm">
                        Buy
                    </button>
                    <a href="user-profile/{{ $selling_data['seller_user_id'] }}" class="btn btn-primary btn-sm">Check Seller Profile</a>
                    </form>
                    </td>
                </tr>
                @endwhile
                </tbody>
            <tfoot>
                <tr>
                    <th>ID</th>
                    <th>Seller Username</th>
                    <th>Seller Email</th>
                    <th>Seller Payment Mode</th>
                    <th>Seller Amount</th>
                    <th></th>
                </tr>
            </tfoot>
        </table>
        </div>
    </div>
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
    <!-- This is data table -->
    <script src="dashboard_assets/assets/vendor_plugins/DataTables-1.10.15/media/js/jquery.dataTables.min.js"></script>

    <!-- start - This is for export functionality only -->
    <script src="dashboard_assets/assets/vendor_plugins/DataTables-1.10.15/extensions/Buttons/js/dataTables.buttons.min.js"></script>
    <script src="dashboard_assets/assets/vendor_plugins/DataTables-1.10.15/extensions/Buttons/js/buttons.flash.min.js"></script>
    <script src="dashboard_assets/assets/vendor_plugins/DataTables-1.10.15/ex-js/jszip.min.js"></script>
    <script src="dashboard_assets/assets/vendor_plugins/DataTables-1.10.15/ex-js/pdfmake.min.js"></script>
    <script src="dashboard_assets/assets/vendor_plugins/DataTables-1.10.15/ex-js/vfs_fonts.js"></script>
    <script src="dashboard_assets/assets/vendor_plugins/DataTables-1.10.15/extensions/Buttons/js/buttons.html5.min.js"></script>
    <script src="dashboard_assets/assets/vendor_plugins/DataTables-1.10.15/extensions/Buttons/js/buttons.print.min.js"></script>
    <!-- end - This is for export functionality only -->

	<!-- Crypto_Admin for Data Table -->
	<script src="dashboard_assets/js/pages/data-table.js"></script>


</body>
</html>

