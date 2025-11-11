<?php
include 'db.php';
	
	$bid =$_POST['bid'];
	$prev = $_POST['prev'];
	$pres = $_POST['pres'];
	$price = $_POST['price'];
	$date=$_POST['date'] ;
	$id=$_POST['id'] ;

	mysqli_query($conn,"INSERT INTO  bill (bid,id,prev,pres,price,date) 
		 VALUES ('$bid','$id','$prev','$pres','$price','$date')"); 
				
				echo '<script>alert("success")</script>';
				echo '<script>windows: location="bill.php"</script>';

            ?>