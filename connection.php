<?php
 session_start();
 
include 'db.php';
 $login = mysqli_query($conn,"SELECT * FROM user WHERE (user_name = '" .($_POST['user']) . "') and (Password = '" .($_POST['pass']) . "')");
 $row=mysqli_fetch_array($login);  
 
 if($row){
 $_SESSION['id'] = $row['id'];

 echo '<script>windows: location="billing.php"</script>';
	}
	else {
		header ("location: index.php?err");
		}
 
 
?>
