<?php
include 'db.php';

// Handle form submission
if (isset($_POST['ok'])) {
    // Collect form data safely
    $username = $_POST['username'];
    $password = $_POST['password'];
    $name     = $_POST['name'];

    // Insert into database
    $sql = "INSERT INTO user (user_name, password, name) VALUES ('$username', '$password', '$name')";

    if (mysqli_query($conn, $sql)) {
        echo "<script>alert('User added successfully'); window.location.href='user.php';</script>";
    } else {
        echo "Error: " . mysqli_error($conn);
    }

    mysqli_close($conn);
}
?>
<style>

body {
  font-family: Arial;
  background: #f0f0f0;
}

h1 {
  text-align: center;
  color: #333;
}

form {
  width: 300px;
  margin: 30px auto;
  background: #fff;
  padding: 20px;
  border-radius: 8px;
  box-shadow: 0 2px 6px rgba(0,0,0,0.1);
}

table {
  width: 100%;
}

td {
  padding: 8px;
  font-size: 14px;
}

input[type="text"],
input[type="password"] {
  width: 100%;
  padding: 8px;
  border: 1px solid #ccc;
  border-radius: 4px;
}

input[type="submit"] {
  width: 100%;
  padding: 10px;
  background: #0073e6;
  border: none;
  color: white;
  font-weight: bold;
  border-radius: 4px;
  cursor: pointer;
}

input[type="submit"]:hover {
  background: #005bb5;
}
</style>

<center>
    <h1>Add User</h1>
    <form method="post" action="">
        <table width="300" border="1" cellpadding="8" cellspacing="0">
            <tr>
                <td>Username:</td>
                <td><input type="text" name="username" required /></td>
            </tr>
            <tr>
                <td>Password:</td>
                <td><input type="password" name="password" required /></td>
            </tr>
            <tr>
                <td>Name:</td>
                <td><input type="text" name="name" required /></td>
            </tr>
            <tr>
                <td colspan="2" align="center">
                    <input type="submit" name="ok" value="Add" />
                </td>
            </tr>
        </table>
    </form>
</center>
