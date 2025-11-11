<html>
    <head>
<style>
  body {
    font-family: Arial, sans-serif;
    background: #f5f7fa;
    margin: 0;
    padding: 20px;
  }

  h1 {
    text-align: center;
    color: #0073e6;
    margin-bottom: 10px;
  }

  h2 {
    text-align: center;
    color: #333;
    margin-bottom: 20px;
  }

  p {
    text-align: center;
    font-size: 14px;
    color: #666;
  }

  form {
    display: flex;
    justify-content: center;
  }

  table {
    width: 400px;
    border-collapse: collapse;
    background: #fff;
    border-radius: 12px;
    overflow: hidden;
    box-shadow: 0 4px 12px rgba(0,0,0,0.1);
  }

  td {
    padding: 12px;
    border: 1px solid #ddd;
    font-size: 14px;
  }

  input[type="text"] {
    width: 100%;
    padding: 6px 8px;
    border: 1px solid #ccc;
    border-radius: 6px;
    font-size: 14px;
  }

  input[type="submit"] {
    background: #0073e6;
    color: white;
    border: none;
    padding: 10px 16px;
    border-radius: 6px;
    cursor: pointer;
    font-size: 14px;
    transition: 0.3s;
  }

  input[type="submit"]:hover {
    background: #005bb5;
  }
</style>
</head>
<body>


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


<p><h1>Owners Bill</h1></p>
 <h2>Name: <?php echo $fname." " .$lname;?></h2>
<p><?php $date=date('y/m/d');
 echo $date;?></p>

 <form method="post" action="addbill.php">
 <table width="346" border="1">
  <tr>
  <input type="hidden" name="bid" value="<?php echo $bid; ?>" />
  <input type="hidden" name="id" value="<?php echo $id; ?>" />
  <input type="hidden" name="date" value="<?php echo $date; ?>" />
    <td width="118">Previous Reading:</td>
    <td width="66"><input type="text" name="prev"  /></td>
    <td>P</td>
  </tr>
  <tr>
    <td width="118">Present Reading:</td>
    <td width="66"><input type="text" name="pres"  /></td>
    <td>P</td>
    </tr>
    <tr>
    <td width="118">Price/P:</td>
    <td width="66"><input type="text" name="price" value= "10" /></td>
    <td>RS</td>
    </tr>
    <tr>
    <td><input type="submit" name="total" value ="ADD"  /></td>
    
    </tr>
    </table>
    </form>

    </body>
    </html>
