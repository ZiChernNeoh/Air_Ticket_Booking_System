<!DOCTYPE html>
<html lang="en">
<?php
include_once 'dbconnect.php';
?>

<head>
	<title>FireFly - Crew Module</title>
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

<?php
$search = $_GET["action"];
if ($search=="Add" || $search=="Update"){
$sql = "UPDATE class SET status='Approved' WHERE number='$_GET[number]' AND name='$_GET[name]'";
}
else{
$sql = "DELETE FROM class WHERE number='$_GET[number]' AND name='$_GET[name]'";
}
if(! mysqli_query($conn, $sql))
{
	echo "\nErrormessage: ".mysqli_error($conn)."\n";
}

echo "<p><center>Price approved</center></p>";
?>

<a href=requests.php><center>Go back</center></a>

	<footer class="container-fluid text-center">
		<p>FireFly Sdn. Bhd.</p>		
	</footer>
</body>
</html>