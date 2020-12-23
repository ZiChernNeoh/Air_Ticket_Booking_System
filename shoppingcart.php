<?php
// Start the session
session_start();

include_once 'dbconnect2.php';

//Setting the timezone
$type = $_POST["type"];
date_default_timezone_set("America/Chicago");
$t=time();
$time = date("Y-m-d h:i:s");


if(!isset($_SESSION['user'])){
    header("Location: customersignin.html");
}else{
    $user = $_SESSION['user'];

	//If flight is one way, or both, insert details into database
	if($type =="all" || $type =="onewaynonstop" ){

	$flightno = $_POST["flightno"];
	$class = $_POST["classtype"];
	$price = $_POST["price"];
	$date = $_POST["date"];

	$sql = "INSERT INTO book (time, date, flightno, username, classtype, paid) 
			VALUES ('$time', '$date', '$flightno', '$user', '$class', '0')";;


	$result = mysqli_query($con,$sql);
    header("Location: cartshow.php");
	}
	
	//If flight has more than 1 stop, insert 1st and 2nd flight details into database
	if($type =="oneway1stop"){

	$flightno = $_POST["flightno"];
	$class = $_POST["classtype"];
	$price = $_POST["price"];
	$date = $_POST["date"];


	$flightno2 = $_POST["flightno2"];
	$class2 = $_POST["classtype2"];
	$price2 = $_POST["price2"];


	$sql = "INSERT INTO book (time, date, flightno, username, classtype, paid) 
			VALUES ('$time', '$date', '$flightno', '$user', '$class', '0')";;

	$result = mysqli_query($con,$sql);

	$sql2 = "INSERT INTO book (time, date, flightno, username, classtype, paid) 
			VALUES ('$time', '$date', '$flightno2', '$user', '$class2', '0')";;

	$result2 = mysqli_query($con,$sql2);
    header("Location: cartshow.php");

	}

	//If flight is round trip, insert 1st and 2nd flight with return date into database
	if($type =="roundtrip"){

	$flightno = $_POST["flightno"];
	$class = $_POST["classtype"];
	$price = $_POST["price"];
	$date = $_POST["date"];


	$flightno2 = $_POST["flightno2"];
	$class2 = $_POST["classtype2"];
	$price2 = $_POST["price2"];

	$returndate = $_POST["date2"];

	$sql = "INSERT INTO book (time, date, flightno, username, classtype, paid) 
			VALUES ('$time', '$date', '$flightno', '$user', '$class', '0')";;

	$result = mysqli_query($con,$sql);

	$sql2 = "INSERT INTO book (time, date, flightno, username, classtype, paid) 
			VALUES ('$time', '$returndate', '$flightno2', '$user', '$class2', '0')";;

	$result2 = mysqli_query($con,$sql2);

    header("Location: cartshow.php");
	}

	//If fail to insert to database, display error message
    echo "Error adding to cart..";










}

mysqli_close($con);


?>



