<?php session_start(); ?>
<?php
include 'db.php';
$owner_id =$_REQUEST['id'];

$result = mysqli_query($conn,"SELECT * FROM customer WHERE id  = '$owner_id'");
$test = mysqli_fetch_array($result);
if (!$result) 
		{
		die("Error: Data not found..");
		}
				$id=$test['id'] ;
				$fname= $test['fname'] ;					
				$lname=$test['lname'] ;
				$address=$test['address'] ;
				$contact=$test['contact'] ;

?>
<style>

body {
  font-family: Arial, sans-serif;
  background: #f4f4f9;
  margin: 0;
  padding: 20px;
}

h1 {
  text-align: center;
  color: #333;
  margin-bottom: 20px;
}

form {
  width: 400px;
  margin: 0 auto;
  background: #fff;
  padding: 20px 25px;
  border-radius: 8px;
  box-shadow: 0 3px 8px rgba(0,0,0,0.1);
}

table {
  width: 100%;
  border-collapse: collapse;
}

td {
  padding: 10px 5px;
  font-size: 14px;
  color: #333;
}

input[type="text"] {
  width: 100%;
  padding: 8px;
  border: 1px solid #ccc;
  border-radius: 4px;
  font-size: 14px;
}

input[type="submit"] {
  background: #0073e6;
  color: #fff;
  border: none;
  padding: 10px 16px;
  border-radius: 4px;
  cursor: pointer;
  font-weight: bold;
}

input[type="submit"]:hover {
  background: #005bb5;
}
</style>

<p><h1>customer Update</h1></p>
  <form method="post" action="">
<table width="342" border="0">
  <tr>
    <td width="107">Id:</td>
    <td width="315"><input type="text" name="id" value="<?php echo $id; ?>" /></td>
    
  </tr>
  <tr>
    <td>First Name:</td>
    <td><input type="text" name="fname" value="<?php echo $lname; ?>"/></td>
    </tr>
    <tr>
    <td>Last Name:</td>
    <td><input type="text" name="lname"value="<?php echo $fname; ?>" /></td>
    </tr>
    <tr>
 
  </tr>
  <tr>
    <td>Address:</td>
    <td><input type="text" name="address" value="<?php echo $address; ?>" /></td>
  
  </tr>
  <tr>
  <td>Contact:</td>
    <td><input type="text" name="contact" value="<?php echo $contact; ?>"/></td></tr>
 <tr>
		<td>&nbsp;</td>
		<td><input type="submit" name="save" value="save"  /></td>
	</tr>
</table>
<?php


if (isset($_POST['save'])) {
    $id      = $_POST['id'];
    $fname   = $_POST['fname'];
    $lname   = $_POST['lname'];
    $address = $_POST['address'];
    $contact = $_POST['contact'];

    $update = "UPDATE customer 
               SET fname='$fname', lname='$lname', address='$address', contact='$contact' 
               WHERE id='$id'";

    if (mysqli_query($conn, $update)) {
        echo "<script>alert('Customer updated successfully'); window.location='billing.php';</script>";
        exit();
    } else {
        echo "Error updating record: " . mysqli_error($conn);
    }
}
?>