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
$status = 'Pending';
$action = 'Update';

include_once 'dbconnect.php';

$sql = "UPDATE crews SET pilot_name = '$pilot', co_pilot_name = '$copilot', attendant_1 = '$attendant1', attendant_2 = '$attendant2', attendant_3 = '$attendant3', attendant_4 = '$attendant4', attendant_5 = '$attendant5', attendant_6 = '$attendant6', status = '$status', action = '$action' WHERE flight = '$flightno'";
if(! mysqli_query($conn, $sql))
{
	echo "\nErrormessage: ".mysqli_error($conn)."\n";
}
echo 0;

mysqli_close($conn);

?>