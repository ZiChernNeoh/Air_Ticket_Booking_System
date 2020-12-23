<!DOCTYPE html>
<html lang="en">
<head>
	<title>FireFly - STAFF SIGN IN</title>
	<meta name="language" content="english" />
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<meta http-equiv="Content-Style-Type" content="text/css" />
	<meta name="viewpoint" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
	<link rel="shortcut icon" type="image/x-icon" href="https://lh3.googleusercontent.com/-HtZivmahJYI/VUZKoVuFx3I/AAAAAAAAAcM/thmMtUUPjbA/Blue_square_A-3.PNG" />
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="forcompany.css">
	<link rel="stylesheet" href="customersignin.css">
	<link rel="stylesheet" href="AdminSignin.css">
	<script src="login.js"> </script>
	
	<style>
		#signin {
		background-color: orange;
		width: 800px;
		color: #fff;
		height: 450px;
		}
		#signin a {
			color: green;
		}
		#main {
			
			width: 700px;
			padding-left: 50px;
			padding-right: 50px;
		}
		h2 {text-align: center;}
		
		h3 {text-align: center;}
		
		p {text-align: center;}
		
	</style>
</head>

<body id="signUpPage" data-spy="scroll" data-target=".navbar" data-offset="60">
	<nav class="navbar navbar-default navbar-fixed-top">
		<div class="container">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="FireFly_home.html"><span class="glyphicon glyphicon-home"></span> Home</a>
			</div>
			<div class="collapse navbar-collapse" id="myNavbar">
				<ul class="nav navbar-nav navbar-right">
					<li id = "cart">
						<a class="navbar-brand" href="cartshow.php"><span class="glyphicon glyphicon-shopping-cart"></span> Shopping Cart</a>
					</li>


					<li class="dropdown" id = "new">
						<a class="dropdown-toggle" data-toggle="dropdown" href="#"><span class="glyphicon glyphicon-user"> Sign in&nbsp;</span><span class="caret"></span>
						</a>
						<ul class="dropdown-menu multi-level" role="menu" aria-labelledby="dropdownMenu">
						  <li><a href="signup.html">Register</a></li>
						  
						  <li class="dropdown-submenu">
							<a tabindex="-1" href="#">Sign in</a>
							<ul class="dropdown-menu">
							  <li><a href="customersignin.html">Customer Sign in</a></li>
							  <li><a href="stafflogin.php">Staff Log-in</a></li>
							  </li>
						
					
							</ul>
						  </li>
						
						</ul>
					</li>
					  <li class="dropdown" id = "old">
						<a class="dropdown-toggle" data-toggle="dropdown" href="#" ><span class="glyphicon glyphicon-user" id="wuser">Welcome!</span>
						<span class="caret"></span>
						</a>
						<ul class="dropdown-menu multi-level" role="menu" aria-labelledby="dropdownMenu">
							<li><a href="showhistory.php">History</a></li>							
							<li><a href="#" id="logout">Sign out</a></li>
						</ul>
						</li>
				</ul>
			</div>
		</div>
	</nav>
	<div class="jumbotron text-center">
				<img src="Firefly.png" style="width: 400px; height: 250px;"> 
	</div>
	
	<div class="container" id="signin">
		<h3>Staff Sign-In</h3>
		<p>Please enter your Staff Email and Password to get started. Only For Authorized Personnel Staff Only.</p>

		<form action="staffindex.php" method="post">
		<div class="container" id="main">
			<h3>Your email:</h3>
			<input type="text" class="form-control" id="email" placeholder="Enter Your Email" name="email" required>
			<h3>Your password:</h3>
			<input type="password" class="form-control" id="pwd" placeholder="Enter Your Password" name="pwd" required>
			
		</div>
		<br />
		<div class="col-sm-offset-2 col-sm-6">
			<div class="checkbox">
				<label><input type="checkbox"> Remember my username when I return</label>
			</div>
		</div>
		
		<div class="col-sm-offset-2 col-sm-8">
			<button type="submit" class="btn btn-success btn-block" name="btn-login">Log In</button>
		</div>
		</form>

	</div>
	<br /><br />
	<footer class="container-fluid text-center">
		<p>FireFly Sdn. Bhd.</p>		
	</footer>
</body>
</html>