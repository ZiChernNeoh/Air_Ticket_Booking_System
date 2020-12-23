<!DOCTYPE html>
<html>
<html lang="en">
<head>
  <title>Flight Sales - Firefly</title>
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
      <h1>Flight Sales</h1>
	  
	  <form role="form" method="post">
			 <div class="row"> 
			  <div class="col-sm-6">
			  <label for="selectdate">Select a date:</label>
			  <input type="date" class="form-control" id="selectdate" name="selectdate" required>
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

//Store selected date into a variable if exists
if (isset ($_POST["selectdate"])) {
	$selectdate = $_POST["selectdate"];
}

else {
	$selectdate = 0;
}

global $sql, $availableNumber;
    $sql = "SELECT * 
            FROM flight FL,  class C, airplane AP 
            WHERE (FL.number = C.number) AND (FL.airplane_id = AP.ID) 
            
            ORDER BY FL.number";


$result = mysqli_query($con,$sql);
$rowcount = mysqli_num_rows($result);

//Display no rows if no flights are available, and display all rows of available flights
if($rowcount == 0){
    echo "<div class='alert alert-info'><strong>Sales for each flight based on date: ".$selectdate ."</div>";
}
else{
echo "<div class='alert alert-info'><strong>Sales for each flight based on date: ".$selectdate ."</div>";
echo "<table class='table table-bordered table-striped table-hover' id='sales'>
      <thead>
      <tr>
        <th>Flight</th>
		<th>Date</th>
        <th>Class</th>
        <th>Capacity</th>
        <th>Occupied Seats</th>
		<th>Price</th>
      </tr>
      </thead>";
	  
	  //Total sales variable
	  $total = 0;
while($row = mysqli_fetch_array($result)) {
    echo "<tbody><tr>";
    echo "<td>" . $row['number'] . "</td>";
	echo "<td>" . $selectdate . "</td>";
    echo "<td>" . $row['name'] . "</td>";
    echo "<td>" . $row['capacity'] . "</td>";
	
	//calculate the number of remain seats
        $seatreserved = "SELECT flightno, classtype, COUNT(*)
                    FROM book B
                    WHERE B.date = '".$selectdate."' AND B.flightno = '".$row['number']."'AND B.classtype ='".$row['name']."' AND paid=1
                    GROUP BY flightno, classtype";
        $reserved = mysqli_query($con, $seatreserved);   
        $reservedNumber = mysqli_fetch_array($reserved);
        
        $capacity = mysqli_query($con, "SELECT capacity FROM class C WHERE C.number='".$row['number']."' AND C.name= '".$row['name']."'");
        $capacityNumber = mysqli_fetch_array($capacity);

		//Reduce seat capacity by 1 if seat capacity is above 0
		//If seat capacity is full, do not reduce capacity
        if(mysqli_num_rows($reserved)>0){            
            $availableNumber = $capacityNumber['capacity'] - $reservedNumber['COUNT(*)'];
        }else{
            $availableNumber = $capacityNumber['capacity'];
        }
		
		//Calculate occupied seats by deducting available seats from flight capacity
		$bookedSeats = $row['capacity']-$availableNumber;
        echo "<td>".$bookedSeats."</td>";
		
	$sales = $row['price'] * $bookedSeats;	//Calculate sales by multiplying class price and occupied seats
    echo "<td>" . $sales . "</td>";
	$total += $sales;	//Cumulate the sales to be displayed at the end of the table
    
    echo "</tr>";
}
echo " </tbody></table>";

echo "<h1>Total: </h1><h1>" .$total ."$</h1>";
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