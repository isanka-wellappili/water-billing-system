<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <title>Document</title>
    <link rel = "stylesheet" type ="text/css" href = "style.css">

</head>
<body>

<div id="h1">
<h1>Water Billing System </h2>
</div>
<div id= "header">
    <li><a href= "billing.php">Home</a></li>
    <li><a href ="bill.php"> Billing</a></li>
    <li><a href = "user.php">Users</a></li>
    <li><a href = "logout.php">Logout</a></li>
</div>

 
<?php session_start();
if(!isset($_SESSION['id'])){
	echo '<script>windows: location="index.php"</script>';

	
	}
		
?>
<?php
$session=$_SESSION['id'];
include 'db.php';
$result = mysqli_query($conn,"SELECT * FROM user where id= '$session'");
while($row = mysqli_fetch_array($result))
  {
  $sessionname=$row['id'];

  }
?>

<p><b><a rel="facebox" href="adduser.php">Add User</a></b></p>
<center>
<?php
include 'db.php';

$result = mysqli_query($conn,"SELECT * FROM user");

echo "<table border='1' bgcolor='#fff'>
<tr>
<th>Id</th>
<th>Username</th>
<th>Password</th>
<th>Name</th>
</tr>";

while($row = mysqli_fetch_array($result))
  {
  echo "<tr>";
  echo "<td>" . $row['id'] . "</td>";
  echo "<td>" . $row['user_name'] . "</td>";
  echo "<td>" . $row['password'] . "</td>";
  echo "<td>" . $row['name'] . "</td>";
  }
echo "</table>";

?>

<p>&nbsp;</p>

</center>




