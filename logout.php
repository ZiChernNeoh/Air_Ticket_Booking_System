<?php
session_start();
unset($_SESSION['user']);	//Destroy session
header("Location: FireFly_home.html");	//Brings user back to home page
?>