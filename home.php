<?php
session_start();	//Start the session
include_once 'dbconnect.php';

//Check if session still remains, creates new session if does not exist
if(!isset($_SESSION['user']))
{
	echo 0;
}
else
    echo $_SESSION['user'];
?>
