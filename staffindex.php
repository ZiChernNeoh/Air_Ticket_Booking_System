<?php
session_start();	//Starts the session
include_once 'dbconnect.php';

if(isset($_SESSION['user'])!="")
{
	header("Location: FireFly_home.html");
}
	
	$email=$_POST['email'];
	$pwd=$_POST['pwd'];
	
	$res=mysqli_query($conn,"SELECT * FROM staff WHERE email='$email'");	//Sorting out the username from the staff database
	$row=mysqli_fetch_array($res);
	
	
	if($row['password']==$pwd)
	{
		if ($row['position']=='manager') {
		$_SESSION['user']=$row['email'];
		header("Location: ManagerModule.html");
		}
		
		if ($row['position']=='flightAdmin') {
		$_SESSION['user']=$row['email'];
		header("Location: Flights.html");
		}

		if ($row['position']=='boardingAdmin') {
		$_SESSION['user']=$row['email'];
		header("Location: boarding.php");
		} 
		
		if ($row['position']=='crewAdmin') {
		$_SESSION['user']=$row['email'];
		header("Location: Crew.html");
		} 
		
		if ($row['position']=='FlSalesAdmin') {
		$_SESSION['user']=$row['email'];
		header("Location: Sales.php");
		} 
		
	}
	else
	{
	
	//echo wrong username or wrong password

	echo '
			<head>
			<title>User login</title>
			<meta charset="utf-8">
		    <meta name="viewport" content="width=device-width, initial-scale=1">
		    <link rel="shortcut icon" type="image/x-icon" href="https://lh3.googleusercontent.com/-HtZivmahJYI/VUZKoVuFx3I/AAAAAAAAAcM/thmMtUUPjbA/Blue_square_A-3.PNG" />
			<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
		    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
		    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
		    <link rel="stylesheet" href="FireFly_home.css">
		    <link rel="stylesheet" href="forcompany.css">
		    <link rel="stylesheet" href="AdminSignin.css">
		    <script src="login.js"> </script>
			<script src="jump.js"> </script>


			<meta http-equiv="refresh" content="3;url=stafflogin.php">
			</head>
			<body >
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
							  <li><a tabindex="-1" href="Flights.html">Manager Sign in</a></li>
							  <li><a href="customersignin.html">Customer Sign in</a></li>
							  
						
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
	<div class="container" id="FireFly_home">
		<h1>Oops</h1>
		<p>Wrong username or wrong password, wait 3s or <a href="stafflogin.php">click me back!</a></p>
	</div>
	<footer class="container-fluid text-center">
		<p>FireFly Sdn. Bhd.</p>		
	</footer>	
		</body>';
			
		
	}
mysqli_close($conn);
?>