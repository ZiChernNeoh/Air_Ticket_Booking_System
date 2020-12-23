<!DOCTYPE html>
<html>
<html lang="en">
<head>
  <title>Check In</title>
<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/x-icon" href="https://lh3.googleusercontent.com/-HtZivmahJYI/VUZKoVuFx3I/AAAAAAAAAcM/thmMtUUPjbA/Blue_square_A-3.PNG" />
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="forcompany.css">
  <script src="login.js"> </script>
  <script src="jump.js"> </script>
</head>
<body>
  <nav class="navbar navbar-default navbar-fixed-top">
    <div class="container">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="Firefly_home.html"><span class="glyphicon glyphicon-home"></span> Home</a>
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
                <li><a tabindex="-1" href="Adminpage.html">Manager Sign in</a></li>
                <li><a href="customersignin.html">Customer Sign in</a></li>
				<li><a href="checkin.php">Check in</a></li>
                
            
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


<div class="container-fluid text-center">    
  <div class="row content">
    <div class="col-sm-2 sidenav">

    </div>
<?php
// Start the session
session_start();

if(!isset($_SESSION['user']))
{
    header("Location: customersignin.html");
}
else
{
    $user = $_SESSION['user'];
}

include_once 'dbconnect2.php';
$id = $_POST['id'];
$flight = $_POST['flight'];
$date = $_POST['date'];
$arrival = $_POST['arrival'];
$departure = $_POST['departure'];

//Select boarding information record
$sql = "SELECT * FROM boarding WHERE ticketID='$id'";
$result = $con->query($sql);
	if ($result->num_rows > 0) {
		while ($row = $result-> fetch_assoc()) {
			$ticketID = $row['ticketID'];
			$status = $row['status'];
		}
	}
if ($id ==$ticketID) {
	if ($status=='check') {	//If already booked, message status to customer saying they have booked
		echo '<div class="col-sm-8 text-left"> 
			<h1>You have already checked-in</h1>';
		echo "<br><h4>Don't worry, you can go back now</h4>";	
	}
	else {	//If haven't book, update database status
		$sql = "UPDATE boarding SET status='check' WHERE ticketID='$id'";
		if ($con->query($sql) === TRUE) {
		  echo '<div class="col-sm-8 text-left"> 
		  <h1>Check-in Successful!!</h1>';	
		  echo "<br><h4>You have successfully checked in!!</h4>";
		} 
		else {	//Display error message
		  echo "Error checking in ";
		}
	}

}
else {
	echo "<h1>Error checking in</h1>";
	echo "<h4>Ticket number does not exist. Please ensure that the ticket number is entered
		correctly</h4>";
}
mysqli_close($con);

?>