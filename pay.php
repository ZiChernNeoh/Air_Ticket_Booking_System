<?php
// Start the session
session_start();

$user = $_SESSION['user'];
include_once 'dbconnect.php';
?>

<!DOCTYPE html>
<html>
<html lang="en">
<head>
  <title>Firefly - Payment Details</title>
<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/x-icon" href="https://lh3.googleusercontent.com/-HtZivmahJYI/VUZKoVuFx3I/AAAAAAAAAcM/thmMtUUPjbA/Blue_square_A-3.PNG" />
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="forcompany.css">
  <link rel="stylesheet" href="FireFly_home.css">
  <link rel="stylesheet" href="AdminSignin.css">
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
                <li><a tabindex="-1" href="Adminpage.html">Manager Sign in</a></li>
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


<div class="container-fluid text-center">    
  <div class="row content">
    <div class="col-sm-2 sidenav">

    </div>
    <div class="col-sm-8 text-left"> 
      <h1>Payment Successful!</h1>
	  <h3>Booking details</h3>

<?php
	//Select the user's latest flight booking from the booking database
	$query="SELECT * FROM book WHERE username = '$user' ORDER BY id DESC LIMIT 1";
	$result = $conn->query($query);
	
	//Display the details of the booking
	if ($result->num_rows > 0) {
		while ($row = $result-> fetch_assoc()) {
			echo "Reference No: " .$row['ID'] ."<br>";
			echo "Booking time: " .$row['time']."<br>";
			echo "Flight No: " .$row['flightno']."<br>";
			echo "Class Type: " .$row['classtype']."<br>";
			echo "Date: " .$row['date']."<br>";
			$id = $row['ID'];
			$date = $row['date'];
			$time = $row['time'];
			$flight = $row['flightno'];
			$class = $row['classtype'];
		}
	}
	
	//Select the price from class database based on the user's chosen flight and class type
	$query1="SELECT price FROM class WHERE number='$flight' AND name='$class'";
	$result1 = $conn->query($query1);
	if ($result1->num_rows > 0) {
		while ($row = $result1-> fetch_assoc()) {
			echo "Price: $" .$row['price'];		//Display price
			$price = $row['price'];
		}
	}
	
	
include_once 'dbconnect2.php';

	//Update the paid status to 1 (Yes)
    $sql = mysqli_query($con,"UPDATE book
            SET paid = '1'
            WHERE username = '$user'");

mysqli_close($con);
?>
		<h3>Contact details</h3><br>
<?php
	//Select passenger from database based on the user's username
	$query2="SELECT * FROM passanger WHERE username = '$user'";
	$result2 = $conn->query($query2);
	if ($result2->num_rows > 0) {
		while ($row = $result2-> fetch_assoc()) {
			echo "First name: " .$row['firstname'] ."<br>";
			echo "Last name: " .$row['lastname']."<br>";
			echo "Email: " .$row['email']."<br>";
			echo "Mobile Phone: " .$row['cellphone']."<br><br>";	//Display passenger details
			$username = $row['username'];
		}
	}
	
	//Select flight based of flight number
	$query3="SELECT * FROM flight WHERE number = '$flight'";
	$result3 = $conn->query($query3);
	if ($result3->num_rows > 0) {
		while ($row = $result3-> fetch_assoc()) {
			$arrival = $row['arrival'];
			$departure = $row['departure'];
		}
	}
	
	$sql = "INSERT INTO boarding (flight, ticketID, username, date, arrival, departure, status) VALUES ('$flight', '$id', '$user', '$date', '$arrival', '$departure', 'unchecked')";
	if(! mysqli_query($conn, $sql))
	{
		echo "Errormessage: ".mysqli_error($conn)."\n";
	}
	
	
	//Write the payment and customer details into an XML file
	$dom = new DOMDocument();
	$payment = $dom->createElement("payment");
	$dom->appendChild($payment);
	
	//Create referenceID as a child element to payment element
	$referenceID = $dom->createElement('referenceID');
	$referenceID->appendChild($dom->createTextNode($id));
	$payment->appendChild($referenceID);
	
	//Create flight number as a child element to referenceID element
	$flightNo = $dom->createElement('flightNo');
	$flightNo->appendChild($dom->createTextNode($flight));
	$referenceID->appendChild($flightNo);
	
	//Create flight class as a child element to payment element
	$flightClass = $dom->createElement('class');
	$flightClass->appendChild($dom->createTextNode($class));
	$referenceID->appendChild($flightClass);
	
	//Create booking time as a child element to payment element
	$bookTime = $dom->createElement('bookTime');
	$bookTime->appendChild($dom->createTextNode($time));
	$referenceID->appendChild($bookTime);
	
	//Create price as a child element to payment element
	$flightPrice = $dom->createElement('price');
	$flightPrice->appendChild($dom->createTextNode($price));
	$referenceID->appendChild($flightPrice);
	
	//Save details into xml file
	$dom->save("payment.xml");
	
?>

    </div>
    
  </div>
</div>

<footer class="container-fluid text-center">
        <p>FireFly Sdn. Bhd.</p>     
</footer>


</body>
</html>