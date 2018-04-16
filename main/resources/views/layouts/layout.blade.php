<?php //systemCheck(); ?>

<!DOCTYPE html>
<html lang="en">


  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php //echo binfo()['name1']; ?></title>
    <!-- Bootstrap core CSS -->
		
    <link href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
	<link href="{{asset('css/bootstrap.css')}}" rel="stylesheet">
	 <link href="{{asset('images/fvr.png')}}" rel="shortcut icon" type="images/jpeg">
	 
    <!-- Custom styles for this template -->
	<link href="https://fonts.googleapis.com/css?family=Droid+Serif|Montserrat|PT+Serif|Roboto" rel="stylesheet">
	<link href="{{asset('css/style.css')}}" rel="stylesheet">
	<link href="{{asset('css/receipt.css')}}" rel="stylesheet">
	<link href="{{asset('css/googleaddresslookup.css')}}" rel="stylesheet">
	<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css" rel="stylesheet">
	<link href="{{asset('css/font-awesome.css')}}" rel="stylesheet">
	<link href="{{asset('css/datepicker.css')}}" rel="stylesheet">
	<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
	  
  </head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-responsive-collapse">
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<div id="logo_head">
						<img src="#" width="40px" height="40px">
						<a class="navbar-brand" href="#"><? // php echo binfo()['name1']; ?></a>
					</div>
				</div>

				<div class="collapse navbar-collapse" id="navbarSupportedContent">
					<ul class="navbar-nav mr-auto">
						<li class="nav-item"><a class="nav-link" href="index.php">Home</a></li>
						<li class="nav-item dropdown">
							@if(Auth::user()->isAgent())
								<a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Senders</a>
										<ul class="dropdown-menu">
										<li ><a href="sendersReceivers.php" class="dropdown-item">Sender</a></li>
										<li><a href="newSender.php" class="dropdown-item">New Senders</a></li>
									</ul>
							</li>
							@endif
							
							@if(Auth::user()->isCustomer())
									<a href="#" class="dropdown-toggle" data-toggle="dropdown">Receivers <b class="caret"></b></a>
										<ul class="dropdown-menu"> 
											<li><a href="{{route('beneficiaries.index')}}" class="dropdown-item">Receivers</a></li>
											<li><a href="{{route('beneficiaries.create')}}" class="dropdown-item">New Receivers</a></li>
										</ul>
									`</li>
							@endif

				<li class="nav-item"><a href="sendMoney.php" class="nav-link">Send Money</a></li>
						<li class="dropdown">
					<a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">Transactions </a>
								<ul class="dropdown-menu">
								<li><a href="prevTrans.php">Previous Transaction</a></li>
						<li><a href="search.php">Search</a></li>
						<li><a href="commission.php">Commission</a></li>
						<li><a href="cancelTrans.php">Cancelled Transactions</a></li>
							<li><a href="turnover.php">Turnover</a></li>
							</ul>
				`</li>
					</ul>
					<form class="navbar-form navbar-left">
						<input type="text" class="form-control  search-form" style="width:200px;" placeholder="Search2">
					</form>
					<ul class="nav navbar-nav navbar-right">
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown">My Account <b class="caret"></b></a>
							<ul class="dropdown-menu">
								
						<li><a href="mPassword.php">Modify Password</a></li>
						<li><a href="aModify.php">Modify Profile</a></li>
							</ul>
						</li>
					<li><a href="help.php">Help</a></li>
						<li><a href="logout.php">Logout</a></li>
					</ul>
				</div>
	</nav>

		@include('includes.message')
		@include('includes.form_error')

    
      <div class="container">
	        <div class="row">
	        	<div class="col-md-3">
	        		@if(auth::check()) 
	        		<div class="panel panel-primary">
					  	<div class="panel-heading">
							<p class="text-center text-uppercase "><strong>Account:{{auth::user()->type() }}</strong></p>
					  	</div>
	        		</div>
	        		<div class="panel-body">
	        				<div class="pull-left image">
							  <img src="#" width="50" height="50" alt="..." class="img-thumbnail">
							</div>
							<div id="user">
							  <p class="text-Capitalize text-center"> Welcome  {{auth::user()->name}}!</p>
							</div>
							<div class="panel-border">
								<div id="quickinfo" class="well well-lg text-center">
										<strong class="text-center">£1 = 224</strong>
								</div>
							</div>
			        		<div class="list-group">
									  <a href="index.php" class="list-group-item active"  >
										<span style="color:white;"><i class="glyphicon glyphicon-home"></i> Home</span>
									  </a>
									  @if(Auth::user()->isAgent())
											<a href="{{route('customer.create')}}" class="list-group-item"><i class="glyphicon glyphicon-plus"></i> New Sender</a>
											<a href="{{route('customer.index')}}" class="list-group-item"><i class="glyphicon glyphicon-tags"></i> New Receivers</a>
											<a href="{{route('customer-transactions.index')}}" class="list-group-item"><i class="glyphicon glyphicon-record"></i> Previous Transaction</a>
									  @endif
									  @if(Auth::user()->isCustomer())
									 	 <a href="{{route('beneficiaries.create')}}" class="list-group-item"><i class="glyphicon glyphicon-plus"></i> New Receiver</a>
									 	 <a href="{{route('beneficiaries.index')}}" class="list-group-item"><i class="glyphicon glyphicon-user"></i> Receivers</a>
									 	 <a href="prevTrans.php" class="list-group-item"><i class="glyphicon glyphicon-record"></i> Previous Transaction</a>
									  @endif
									 
									 @if(Auth::user()->isAgent())
									  	<a href="{{route('customer.index')}}" class="list-group-item"><i class="glyphicon glyphicon-user"></i> Senders List</a>
									  @endif
									  <a href="{{route('customer-transactions.create')}}" class="list-group-item"><i class="glyphicon glyphicon-send"></i> Send Money </a>
									  
									  <a href="search.php" class="list-group-item"><i class="glyphicon glyphicon-search"></i> Search</a>
									  
									 @if(Auth::user()->isAgent())
									  <a href="commission.php" class="list-group-item"><i class="glyphicon glyphicon-gbp"></i> My Commission</a>
									  @endif
									  <a href="help.php" class="list-group-item"><i class="fa fa-question-circle fa-2x" aria-hidden="true"></i> Help</a>
					
		           			 </div>
		           		</div>
	        	</div>
	        	<div class="col-md-9">
	        		@yield('content')
	        	</div>
	     
			</div>
       </div>
					@endif

					






	<footer class="footer">
      <div class="container">
        <span class=""> <p>&copy;Copyright <?php //echo date('Y'); ?>, All Rights Reserved <a href="http://www.computing24x7.co.uk">COMPUTING24X7 LTD</a></p>.</span>
      </div>
    </footer>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    
    
    <script src="{{asset('js/jquery-1.9.1.min.js')}}"></script>
  	<script src="{{asset('js/bootstrap.js')}}"></script>
	<script src="{{asset('js/bootstrap-datepicker.js')}}"></script>
	<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
	<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
    <script src="{{asset('js/jquery.tablesorter.js')}}"></script>
    <script src="{{asset('js/tablesorter.js')}}"></script>
     <script src="{{asset('js/googleaddresslookup.js')}}" ></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBGi3_lQwfN86wd0Pw5TsQxkTcjPldlpiY&libraries=places&callback=initAutocomplete"
        async defer></script>
    
    <script src="{{asset('js/script.js')}}" ></script>
    <script src="{{asset('js/create-transaction.js')}}" ></script>
	
	<script>
		@yield('script')
	</script>
   		

	 </body>
</html>