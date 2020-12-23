<!DOCTYPE html>
<html>
<html lang="en">
<head>
  <title>Boarding Module - Firefly</title>
<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/x-icon" href="https://lh3.googleusercontent.com/-HtZivmahJYI/VUZKoVuFx3I/AAAAAAAAAcM/thmMtUUPjbA/Blue_square_A-3.PNG" />
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="forcompany.css">
    <script src="login.js"></script>
  <link rel="stylesheet" type="text/css" href="Search.css">
  <script src="notavailable.js"></script>
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
                              <li><a tabindex="-1" href="stafflogin.php">Staff Sign in</a></li>
                              <li><a href="customersignin.html">Customer Sign in</a></li>
                              
                        
                    </li>
                            </ul>
                          </li>
                        
                        </ul>
                    </li>
                      <li class="dropdown" id = "old">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#" ><span class="glyphicon glyphicon-user" id="wuser">Welcom!</span>
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
    <div class="col-sm-8 text-left"> 
      <h1>Check-ins</h1>
	  
	  <form role="form" method="post">
			 <div class="row"> 
			  <div class="col-sm-6">
			  <label for="selectdate">Select a flight:</label>
			  <input type="text" class="form-control" id="selectFlight" name="selectFlight" required>
			  </div>
			 </div>
			 <br>
			<div class="row">   
			  <div class="col-sm-6">
			  <button type="submit" class="btn btn-warning">Show ALL</button><br>
			  </div>
			</div> 
			</form>
			

<?php
include_once 'dbconnect2.php';

//Store selected flight into a variable if exists
if (isset ($_POST["selectFlight"])) {
	$selectFlight = $_POST["selectFlight"];
}

else {
	$selectFlight = 0;
}

//Retrieve sql data from boarding table where flight is same as flight number entered
$sql = "SELECT * FROM boarding WHERE flight = '$selectFlight'";
$result = mysqli_query($con,$sql);
$rowcount = mysqli_num_rows($result);

//Display no rows if no flights are available, and display all rows of available boardings
if($rowcount == 0){
    echo "<div class='alert alert-info'><strong>Boarding(s) for selected flight: ".$selectFlight ."</div>";
}

else {
echo "<div class='alert alert-info'><strong>Boarding(s) for selected flight: ".$selectFlight ."</div>";
	echo "<table class='table table-bordered table-striped table-hover' id='boarding'>
		  <thead>
		  <tr>
			<th>Flight</th>
			<th>Username</th>
			<th>Date</th>
			<th>From</th>
			<th>To</th>
			<th>Status</th>
		  </tr>
		  </thead>";
		  
		  $board = 0;
		  $noboard = 0;

	//Display the data from boarding table into a table
	while($row = mysqli_fetch_array($result)) {
		echo "<tbody><tr>";
		echo "<td>" . $row['flight'] . "</td>";
		echo "<td>" . $row['username'] . "</td>";
		echo "<td>" . $row['date'] . "</td>";
		echo "<td>" . $row['arrival'] . "</td>";
		echo "<td>" . $row['departure'] . "</td>";
		echo "<td>" . $row['status'] . "</td>";
		$status = $row['status'];
		
		if ($status == 'check') {
			$board++;
		}
		
		elseif ($status == 'unchecked'){
			$noboard++;
		}
	}
echo " </tbody></table>";

echo "<h2>Boarded passengers: ".$board."</h2>";
echo "<h2>Unboarded passengers: ".$noboard."</h2>";

}
//mysqli_free_result($result);

mysqli_close($con);
?>
 
    </div>
    
  </div>
</div>

<footer class="container-fluid text-center">
        <p>FireFly Sdn. Bhd.</p>     
</footer>
</body>
</html>