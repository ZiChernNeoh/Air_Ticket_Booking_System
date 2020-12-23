<!DOCTYPE html>
<html lang="en">
<style>
table{
overflow:hidden; 
white-space:nowrap;
  margin-left: auto;
  margin-right: auto;
}
td {
overflow:hidden; 
white-space:nowrap;
}
</style>

<?php
include_once 'dbconnect.php';
?>

<head>
	<title>FireFly - Requests</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/x-icon" href="https://lh3.googleusercontent.com/-HtZivmahJYI/VUZKoVuFx3I/AAAAAAAAAcM/thmMtUUPjbA/Blue_square_A-3.PNG" />
	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="forcompany.css">
	<link rel="stylesheet" href="AdminSignin.css">
	<script  src="jquery-1.9.1.min.js"></script>
	
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
					<li class="dropdown">
						<a class="dropdown-toggle" data-toggle="dropdown" href="logout.php"><span class="glyphicon glyphicon-user"> Sign out&nbsp;</span>						</a>
						
					</li>
				</ul>
			</div>
		</div>
	</nav>
	<div class="jumbotron text-center">
		<img src="Firefly.png" style="width: 400px; height: 250px;">

	</div>

<form method="get">

<h1><center>Flight Request</center></h1>

<table class="center" style="width:600px">
	<thead>
	<tr>
	<th>Flight No.&nbsp&nbsp&nbsp</th>
	<th>Airplane ID&nbsp&nbsp&nbsp</th>
	<th>Departure Airport&nbsp&nbsp&nbsp</th>
	<th>Departure Time&nbsp&nbsp&nbsp</th>
	<th>Arrival Airport&nbsp&nbsp&nbsp</th>
	<th>Arrival Time&nbsp&nbsp&nbsp</th>
	<th>Action&nbsp&nbsp&nbsp</th>
	</tr>
	</thead>
	<tbody>
	<?php
	$sql="SELECT * FROM flight WHERE status='Pending'";
	$result = mysqli_query($conn, $sql);
	while ($rec = mysqli_fetch_array($result)) {
	?>
	<tr>
	<td>
		<?php echo $rec['number']; ?>
	</td>
	<td>
		<?php echo $rec['airplane_id']; ?>
	</td>
	<td>
		<?php echo $rec['departure']; ?>
	</td>
	<td>
		<?php echo $rec['d_time']; ?>&nbsp&nbsp&nbsp
	</td>
	<td>
		<?php echo $rec['arrival']; ?>
	</td>
	<td>
		<?php echo $rec['a_time']; ?>&nbsp&nbsp&nbsp
	</td>
	<td>
		<?php echo $rec['action']; ?>&nbsp&nbsp&nbsp
	</td>
	<td>
		<a href='flightapprove.php?number=<?php echo $rec ['number'];?>&action=<?php echo $rec ['action'];?>'> <input type='button' value='Approve' data-toggle="tooltip" data-placement="top" title="Approve" class='btn btn-info'/></a>
		<a href='flightdisapprove.php?number=<?php echo $rec ['number'];?>'> <input type='button' value='Disapprove' data-toggle="tooltip" data-placement="top" title="Disapprove" class='btn btn-info'/></a>
	</td>
	</tr>
	<?php
	}
	?>
	</tbody>
</table>

<br>

<h1><center>Crew Request</center></h1>

<table class="center">
	<thead>
	<tr>
	<th>Flight No.&nbsp&nbsp&nbsp</th>
	<th>Pilot&nbsp&nbsp&nbsp</th>
	<th>Co-pilot&nbsp&nbsp&nbsp</th>
	<th>Attendant 1&nbsp&nbsp&nbsp</th>
	<th>Attendant 2&nbsp&nbsp&nbsp</th>
	<th>Attendant 3&nbsp&nbsp&nbsp</th>
	<th>Attendant 4&nbsp&nbsp&nbsp</th>
	<th>Attendant 5&nbsp&nbsp&nbsp</th>
	<th>Attendant 6&nbsp&nbsp&nbsp</th>
	<th>Action&nbsp&nbsp&nbsp</th>
	</tr>
	</thead>
	<tbody>
	<?php
	$sql="SELECT * FROM crews WHERE status='Pending'";
	$result = mysqli_query($conn, $sql);
	while ($rec = mysqli_fetch_array($result)) {
	?>
	<tr>
	<td>
		<?php echo $rec['flight']; ?>
	</td>
	<td>
		<?php echo $rec['pilot_name']; ?>&nbsp&nbsp&nbsp
	</td>
	<td>
		<?php echo $rec['co_pilot_name']; ?>
	</td>
	<td>
		<?php echo $rec['attendant_1']; ?>
	</td>
	<td>
		<?php echo $rec['attendant_2']; ?>
	</td>
	<td>
		<?php echo $rec['attendant_3']; ?>
	</td>
	<td>
		<?php echo $rec['attendant_4']; ?>
	</td>
	<td>
		<?php echo $rec['attendant_5']; ?>
	</td>
	<td>
		<?php echo $rec['attendant_6']; ?>
	</td>
	<td>
		<?php echo $rec['action']; ?>&nbsp&nbsp&nbsp
	</td>
	<td>
		<a href='crewapprove.php?flight=<?php echo $rec ['flight'];?>&action=<?php echo $rec ['action'];?>'> <input type='button' value='Approve' data-toggle="tooltip" data-placement="top" title="Approve" class='btn btn-info'/></a>
		<a href='crewdisapprove.php?flight=<?php echo $rec ['flight'];?>'> <input type='button' value='Disapprove' data-toggle="tooltip" data-placement="top" title="Disapprove" class='btn btn-info'/></a>
	</td>
	</tr>
	<?php
	}
	?>
	</tbody>
</table>

<br>

<h1><center>Ticket/Price Request</center></h1>

<table class="center">
	<thead>
	<tr>
	<th>Flight No.&nbsp&nbsp&nbsp</th>
	<th>Name&nbsp&nbsp&nbsp</th>
	<th>Capacity&nbsp&nbsp&nbsp</th>
	<th>Price (MYR)&nbsp&nbsp&nbsp</th>
	<th>Action&nbsp&nbsp&nbsp</th>
	</tr>
	</thead>
	<tbody>
	<?php
	$sql="SELECT * FROM class WHERE status='Pending'";
	$business="SELECT name FROM class WHERE name='Business'";
	$result = mysqli_query($conn, $sql);
	while ($rec = mysqli_fetch_array($result)) {
	?>
	<tr>
	<td>
		<?php echo $rec['number']; ?>
	</td>
	<td>
		<?php echo $rec['name']; ?>&nbsp&nbsp&nbsp
	</td>
	<td>
		<?php echo $rec['capacity']; ?>
	</td>
	<td>
		<?php echo $rec['price']; ?>
	</td>
	<td>
		<?php echo $rec['action']; ?>&nbsp&nbsp&nbsp
	</td>
	<td>
		<a href='priceapprove.php?number=<?php echo $rec ['number'];?>&name=<?php echo $rec ['name'];?>&action=<?php echo $rec ['action'];?>'> <input type='button' value='Approve' data-toggle="tooltip" data-placement="top" title="Approve" class='btn btn-info'/></a>
		<a href='pricedisapprove.php?number=<?php echo $rec ['number'];?>&name=<?php echo $rec ['name'];?>'> <input type='button' value='Disapprove' data-toggle="tooltip" data-placement="top" title="Disapprove" class='btn btn-info'/></a>
	</td>
	</tr>
	<?php
	}
	?>
	</tbody>
</table>

<br>

<a href=ManagerModule.html><center>Back To Manager Module</center></a>

	<footer class="container-fluid text-center">
		<p>FireFly Sdn. Bhd.</p>		
	</footer>
</body>
</html>