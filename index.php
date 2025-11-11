<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>water billing system</title>
    <link  rel ="stylesheet" type = "text/css" href ="style.css">
</head>
<body>
    <div id = "login">
        <h1> Water Billing System </h1>
        <form method = "POST" action = "connection.php">
            <lable>User Name :</lable>
            <input type = "text" id = "user" name = "user"><br><br>
            <lable>Password  :  </lable>
            <input type =password id= "pass" name = "pass"><br><br>
            <input type = "Submit" id = "btn" value ="Login" name ="submit">
        </form> 
    </div>
<?php if(isset($_GET['err'])){
	echo "<script>alert('Invalid Username or Password')</script>";
	}
 ?>

</body>
</html>