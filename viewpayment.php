<?php session_start();
if(!isset($_SESSION['id'])){
	echo '<script>windows: location="index.php"</script>';
	
	}
?>
<?php
include 'db.php';
$id =$_REQUEST['id'];
$result = mysqli_query($conn,"SELECT * FROM bill where id='$id'");
while($row = mysqli_fetch_array($result))
  {
	  $prev=$row['prev'];
	  $id=$row['id'];
	  $pres=$row['pres'];
	  $price=$row['price'];
	  $totalcons=$pres - $prev;
	  $bill=$totalcons * $price;
	  $date=$row['date'];
 
  }

?>

<?php
  
include 'db.php';


$result = mysqli_query($conn,"SELECT * FROM customer WHERE id  = '$id'");
$test = mysqli_fetch_array($result);
if (!$result) 
		{
		die("Error: Data not found..");
		}
				$id=$test['id'] ;
				$lname= $test['lname'] ;					
				$fname=$test['fname'] ;
				
				$address=$test['address'] ;
				$contact=$test['contact'] ;

?>

<style type="text/css">


<style>
  body {
    font-family: Arial, sans-serif;
    background: #f5f7fa;
    margin: 0;
    padding: 20px;
  }

  #data {
    margin: 0 auto;
    width: 700px;
    background: #fff;
    padding: 30px;
    border-radius: 12px;
    box-shadow: 0 4px 12px rgba(0,0,0,0.1);
  }

  h1 {
    color: #0073e6;
    margin-bottom: 5px;
  }

  #data p {
    font-size: 16px;
    line-height: 1.6;
    color: #333;
  }

  #context {
    border-top: 2px solid #0073e6;
    margin-top: 20px;
    padding-top: 15px;
    font-weight: bold;
  }

  .bill-info {
    margin: 20px 0;
    padding: 15px;
    background: #f9f9f9;
    border-radius: 8px;
    border: 1px solid #ddd;
  }

  .bill-info span {
    display: inline-block;
    width: 45%;
    margin-bottom: 8px;
  }

  .amount {
    text-align: center;
    font-size: 22px;
    font-weight: bold;
    color: #e63946;
    margin-top: 20px;
  }

  .footer {
    margin-top: 30px;
    text-align: center;
  }

  .footer a {
    display: inline-block;
    margin-top: 10px;
    text-decoration: none;
    color: #0073e6;
    font-weight: bold;
  }

  input[type="button"] {
    background: #0073e6;
    color: white;
    border: none;
    padding: 10px 20px;
    border-radius: 8px;
    cursor: pointer;
    font-size: 14px;
    transition: 0.3s;
  }

  input[type="button"]:hover {
    background: #005bb5;
  }
</style>

</style>
<div id="data">
<center>
<h1> WATER STATION</h1>
<p>Sri Lanka</p>
<p><strong>Eng. Welfredo Pitolan</strong></p>
<p>Phone:0703287374 </p>
</center>
<div id="context">
<p>Name: <?php echo $fname.'&nbsp;'.$lname.'&nbsp;'; ?> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Client Id: 000<?php echo $id; ?>
<br /><br />
Address: <?php echo $address; ?>
<br /> <br />
Contact: <?php echo $contact; ?>
</p>
<center>Date: <?php echo $date; ?> </center>
<p>
Previous Reading : <?php echo $prev;?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Price: <?php echo $price; ?><br /><br />
Present Reading : <?php echo $pres; ?> <br /><br />
Consuption: <?php echo $totalcons;?>
<h1 align="center">Bill Amount:Rs <?php echo $bill; ?> </h1><br /><br />

<?php
$session=$_SESSION['id'];
include 'db.php';
$result = mysqli_query($conn,"SELECT * FROM user where id= '$session'");
while($row = mysqli_fetch_array($result))
  {
  $sessionname=$row['id'];

  }
?>


<CENTER><form><input type="button" onclick="window.print()" value="Print page" /></form><a href="bill.php">Back</a></CENTER>
</div>


</div>
