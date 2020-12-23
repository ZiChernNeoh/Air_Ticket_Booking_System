<!DOCTYPE html>
<html>
<html lang="en">
<head>
  <title>Crew List - Firefly</title>
<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/x-icon" href="https://lh3.googleusercontent.com/-HtZivmahJYI/VUZKoVuFx3I/AAAAAAAAAcM/thmMtUUPjbA/Blue_square_A-3.PNG" />
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="forcompany.css">
    <script src="login.js"></script>
  <link rel="stylesheet" type="text/css" href="Search.css">
  <script src="notavailable.js"></script>
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
                              <li><a tabindex="-1" href="stafflogin.php">Staff Sign in</a></li>
                              <li><a href="customersignin.html">Customer Sign in</a></li>
                              
                        
                    </li>
                            </ul>
                          </li>
                        
                        </ul>
                    </li>
                      <li class="dropdown" id = "old">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#" ><span class="glyphicon glyphicon-user" id="wuser">Welcom!</span>
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
      <h1>Crew List</h1>

<?php
session_start();
include_once 'dbconnect2.php';
$sql = "SELECT * FROM crews";
$result = mysqli_query($con,$sql);
echo "<table class='table table-bordered table-striped table-hover' id='sales'>
      <thead>
      <tr>
        <th>Flight</th>
		<th>Pilot</th>
        <th>Co-pilot</th>
        <th>Attendant 1</th>
        <th>Attendant 2</th>
		<th>Attendant 3</th>
		<th>Attendant 4</th>
		<th>Attendant 5</th>
		<th>Attendant 6</th>
		<th></th>
      </tr>
      </thead>";

while($row = mysqli_fetch_array($result)) {
    echo "<tbody><tr>";
    echo "<td>" . $row['flight'] . "</td>";
	echo "<td>" . $row['pilot'] . "</td>";
    echo "<td>" . $row['copilot'] . "</td>";
    echo "<td>" . $row['attendant1'] . "</td>";
	echo "<td>" . $row['attendant2'] . "</td>";
	echo "<td>" . $row['attendant3'] . "</td>";
	echo "<td>" . $row['attendant4'] . "</td>";
	echo "<td>" . $row['attendant5'] . "</td>";
	echo "<td>" . $row['attendant6'] . "</td>";
	$_SESSION['flight'] = $row['flight'];
	$_SESSION['pilot'] = $row['pilot'];
	$_SESSION['copilot'] = $row['copilot'];
	$_SESSION['attendant1'] = $row['attendant1'];
	$_SESSION['attendant2'] = $row['attendant2'];
	$_SESSION['attendant3'] = $row['attendant3'];
	$_SESSION['attendant4'] = $row['attendant4'];
	$_SESSION['attendant5'] = $row['attendant5'];
	$_SESSION['attendant6'] = $row['attendant6'];
	
	echo '<td><form action="Crew.php" method="post">
            <input type="hidden" name="flight" value="'.$_SESSION['flight'].'" >
			<input type="hidden" name="pilot" value="'.$_SESSION['pilot'].'" >
			<input type="hidden" name="copilot" value="'.$_SESSION['copilot'].'" >
			<input type="hidden" name="attendant1" value="'.$_SESSION['attendant1'].'" >
			<input type="hidden" name="attendant2" value="'.$_SESSION['attendant2'].'" >
			<input type="hidden" name="attendant3" value="'.$_SESSION['attendant3'].'" >
			<input type="hidden" name="attendant4" value="'.$_SESSION['attendant4'].'" >
			<input type="hidden" name="attendant5" value="'.$_SESSION['attendant5'].'" >
			<input type="hidden" name="attendant6" value="'.$_SESSION['attendant6'].'" >
            <button type="submit" class="btn btn-warning">Add/Edit</button></div>
            </form>        
            </td>';
    echo "</tr>";
}
echo " </tbody></table>";




//mysqli_free_result($result);

mysqli_close($con);
?>
 
    </div>
    
  </div>
</div>

<footer class="container-fluid text-center">
        <p>FireFly Sdn. Bhd.</p>     
</footer>
</body>
</html>