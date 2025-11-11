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
<!DOCTYPE html>
<html>
    <head>
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
    <li><a href = "logout.php">Logout</a></li> <br><br>
</div>
<div id="view">
<?php

$result = mysqli_query($conn,"SELECT * FROM customer");

echo "<table border='1' bgcolor='#2419c4c3'>
<tr>
<th>Id</th>
<th>Firstname</th>
<th>Lastname</th>
<th>Address</th>
<th>Contact</th>
<th>Action</th>
</tr>";

while($row = mysqli_fetch_array($result))
  {
  echo "<tr>";
  echo "<td>" . $row['id'] . "</td>";
  echo "<td>" . $row['fname'] . "</td>";
  echo "<td>" . $row['lname'] . "</td>";
  echo "<td>" . $row['address'] . "</td>";
  echo "<td>" . $row['contact'] . "</td>";
 echo "<td><a rel='facebox' href='paybill.php?id=".$row['id']."'>Bill </a>| ";
 echo "<a rel='facebox' href='viewbill.php?id=".$row['id']."'>View Bill</td>";
  echo "</tr>";
  }
echo "</table>";

?>


</div>
</div>



    </body>
</html>