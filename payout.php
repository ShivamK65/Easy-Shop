<?php 
include('connection.php');
global $conn;
if(session_status() === PHP_SESSION_NONE)
{
  session_start();
}
  $data=$_SESSION['array'];
  $jdata=json_decode($data,true);
  
  $address=$_POST['address'];
  
  for($i=0;$i<count($jdata);$i++)
  {
  	$itemname=$jdata[$i]["name"];
  	$qty=$jdata[$i]["quantity"];
  	$userid=$_SESSION['uid'];

  	$query="INSERT INTO `order` ( `item_name`, `order_qty`, `user_id`, `address`) VALUES ('$itemname', '$qty', '$userid', '$address');";
  	//echo $query;
  	if(mysqli_query($conn,$query)==1)
  	{
  		echo "your order has been placed";
  		// header('location:')
  	}
  	else{
  		echo(mysqli_error($conn));
  	}
}
$_SESSION['update']="True";
header('location:blocks.php');
 ?>