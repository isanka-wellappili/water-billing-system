<html>
    <head>
        <body>
            <style>
  body {
    background: #f0f0f0;
    font-family: Arial, sans-serif;
  }

  table {
    margin: 50px auto; 
    border-collapse: collapse;
    width: 80%; 
    background: #fff;
    box-shadow: 0 4px 12px rgba(0,0,0,0.1);
  }

  th, td {
    border: 1px solid #ccc;
    padding: 10px 15px;
    text-align: center;
  }

  th {
    background: #0073e6;
    color: white;
  }

  tr:nth-child(even) {
    background: #f9f9f9;
  }

  tr:hover {
    background: #e6f2ff;
  }
</style>

</body>
</head>

<?php
include 'db.php';
$id =$_REQUEST['id'];
$result = mysqli_query($conn,"SELECT * FROM bill where id='$id'");

echo "<table border='1' bgcolor='#fff'>
<tr>
<th>Bill Id</th>
<th>Id</th>
<th>Previous Reading</th>
<th>Present Reading</th>
<th>Consuption</th>
<th>Price</th>
<th>Date</th>
<th>Bill Amount</th>
<th>Action</th>
</tr>";

while($row = mysqli_fetch_array($result))
  {
	  $bid=$row['bid'];
      $prev=$row['prev'];
	  $pres=$row['pres'];
	  $price=$row['price'];
	  $totalcons=$pres - $prev;
	  $bill=$totalcons * $price;
  echo "<tr>";
  echo "<td>".$bid ."</td>";
  echo "<td>" . $row['id'] . "</td>";
  echo "<td>" . $prev . "</td>";
  echo "<td>" . $pres . "</td>";
  echo "<td>". $totalcons."</td>";
  echo "<td>" . $price . "</td>";
  echo "<td>" . $row['date'] . "</td>";
  echo "<td>" . $bill . "</td>";
 echo "<td><a rel='facebox' href='viewpayment.php?id=".$row['id']."'>View </a>| ";
 echo "<a rel='facebox' href='deletebill.php?id=".$row['bid']."'>Del </a>
 </td>";
  echo "</tr>";
  }
echo "</table>";

?>

</html>