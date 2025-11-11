<?php
session_start();
include 'db.php';


if (isset($_GET['id'])) {
    $owner_id = $_GET['id'];
    $result = mysqli_query($conn, "SELECT * FROM customer WHERE id='$owner_id'");

    if ($test = mysqli_fetch_array($result)) {
        $id      = $test['id'];
        $fname   = $test['fname'];
        $lname   = $test['lname'];
        $address = $test['address'];
        $contact = $test['contact'];
    } else {
        die("Error: Data not found.");
    }
}


if (isset($_POST['ok'])) {
    $id = $_POST['id'];

    $delete = "DELETE FROM customer WHERE id='$id'";
    if (mysqli_query($conn, $delete)) {
        echo "<script>alert('Record deleted successfully'); window.location='billing.php';</script>";
        exit();
    } else {
        echo "Error deleting record: " . mysqli_error($conn);
    }
}
?>

<form action="" method="post">
    <h1>Are you sure you want to delete this record:</h1>
    <input type="hidden" name="id" value="<?php echo $id; ?>" />
    <input type="submit" name="ok" value="Delete" />
</form>
<style>
body {
  font-family: Arial, sans-serif;
  background: #f4f4f9;
  margin: 0;
  padding: 40px;
}

h1 {
  text-align: center;
  color: #333;
  margin-bottom: 30px;
}

form {
  width: 400px;
  margin: 0 auto;
  background: #fff;
  padding: 25px;
  border-radius: 8px;
  box-shadow: 0 4px 12px rgba(0,0,0,0.1);
  text-align: center;
}

input[type="submit"] {
  background: #e63946;
  color: #fff;
  border: none;
  padding: 10px 18px;
  border-radius: 4px;
  cursor: pointer;
  font-weight: bold;
  font-size: 14px;
}

input[type="submit"]:hover {
  background: #c71c2c;
}
</style>