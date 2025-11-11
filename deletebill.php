<?php
include 'db.php';

if (isset($_GET['id'])) {
    $bid = $_GET['id'];

    $sql = "DELETE FROM bill WHERE id='$bid'";

    if (mysqli_query($conn, $sql)) {
        echo "<script>alert('Bill deleted successfully'); window.location.href='bill.php';</script>";
    } else {
        echo "Error deleting bill: " . mysqli_error($conn);
    }
} else {
    echo "No bill ID provided.";
}

mysqli_close($conn);
?>


		 echo "<script>windows: location='viewbill.php'</script>";				
	