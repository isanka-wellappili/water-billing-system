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

<?php
if (isset($_POST['add']))
	{	   
	include 'db.php';
			 		$id=$_POST['id'] ;
					$lname= $_POST['lname'] ;					
					$fname=$_POST['fname'] ;
					$address=$_POST['address'] ;
					$contact=$_POST['contact'] ;
					
		 mysqli_query($conn,"INSERT INTO  customer (id,fname,lname,address,contact) 
		 VALUES ('$id','$fname','$lname','$address','$contact')"); 
				
				echo '<script>alert("success")</script>';
				
				
	        }
	
?>
    <div id= "addd"> 
        <p align ="center">Add Client </p>
        <form method = "POST">
            <input type ="hidden" name ="id" value ="0">
            <lable> First Name :</lable>
            <input type ="text" name ="fname"> <br><br>
            
            <lable> Last Name :</lable>
            <input type ="text" name ="lname"><br><br>

            <lable>Address :</lable>
            <input type ="text" name="address"><br><br>

            <lable>Contact NO   :</lable>
            <input tpye ="text" name ="contact"><br><br>
            <div id ="bttn">
            <input type="submit" name="add" value = "ADD">
            <input type = "reset" name= "CANCEL" value ="Reset">
             </div>
        </form>   
    </div> 
    
    
    <div id ="view">
        <p> Customer</p>

<?php
include 'db.php';
$result = mysqli_query($conn,"SELECT * FROM customer");

echo "<table border='1' bgcolor='#fff'>
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
 echo "<td><a rel='facebox' href='edit.php?id=".$row['id']."'>Edit </a>| ";
 echo "<a rel='facebox' href='delete.php?id=".$row['id']."'>Del</td>";
  echo "</tr>";
  }
echo "</table>";

?>

<?php
if (isset($_GET['del'])) {
    $id = intval($_GET['del']);
    $conn->query("DELETE FROM customers WHERE id=$id");
    header("Location: billing.php"); // refresh page
    exit;
}
?>


</body>
</html>