<?php
$flightno = $_GET['flightno'];
$pilot = $_GET['pilot'];
$copilot = $_GET['copilot'];
$attendant1 = $_GET['attendant1'];
$attendant2 = $_GET['attendant2'];
$attendant3 = $_GET['attendant3'];
$attendant4 = $_GET['attendant4'];
$attendant5 = $_GET['attendant5'];
$attendant6 = $_GET['attendant6'];
$status = "Pending";
$action = "Add";

include_once 'dbconnect.php';
$sql = "INSERT INTO crews VALUES( '$flightno', '$pilot', '$copilot', '$attendant1', '$attendant2', '$attendant3', '$attendant4', '$attendant5', '$attendant6', '$action', '$status' )";
if(! mysqli_query($conn, $sql))
{
	
	echo "Errormessage: ".mysqli_error($conn)."\n";
}
echo 0;

mysqli_close($conn);

?>