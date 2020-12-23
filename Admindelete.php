<?php
$flightno = $_GET['flightno'];
$status = 'Pending';
$action = 'Delete';

include_once 'dbconnect.php';

$sql = "UPDATE flight SET status = '$status', action = '$action' WHERE number = '$flightno'";
if(! mysqli_query($conn, $sql))
{
	echo "\nErrormessage: ".mysqli_error($conn)."\n";
}

$sql = "UPDATE class SET status = '$status', action = '$action' WHERE number = '$flightno' AND name = 'Economy'";
if(! mysqli_query($conn, $sql))
{
	echo "\nErrormessage: ".mysqli_error($conn)."\n";
}

$sql = "UPDATE class SET status = '$status', action = '$action' WHERE number = '$flightno' AND name = 'Business'";
if(! mysqli_query($conn, $sql))
{
	echo "Errormessage: ".mysqli_error($conn)."\n";
}
echo "Flight Deleted!";

mysqli_close($conn);

?>