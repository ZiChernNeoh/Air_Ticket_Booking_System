<?php
$flightno = $_GET['flightno'];
$status = 'Pending';
$action = 'Delete';

include_once 'dbconnect.php';

$sql = "UPDATE crews SET status = '$status', action = '$action' WHERE flight = '$flightno'";
if(! mysqli_query($conn, $sql))
{
	echo "\nErrormessage: ".mysqli_error($conn)."\n";
}

echo "Crew Deleted!";

mysqli_close($conn);

?>