<?php 

include('connection.php');
session_start();

$username=$_POST['userid'];
$password=$_POST['pwd'];

//prevent form mysql injection
$username=stripcslashes($username);
$password=stripcslashes($password);
	//remove special char
$username=mysqli_real_escape_string($conn,$username);
$password=mysqli_real_escape_string($conn,$password); 

$sql="select * from client where name='$username' and password='$password'";
$result=mysqli_query($conn,$sql);
//$row=mysqli_fetch_array($result,MYSQLI_ASSOC);
//$count=mysqli_num_rows($result);

//if($count==1)

if(mysqli_num_rows($result)==1)
{
	//echo"login successfully";
	while($row = mysqli_fetch_array($result)){
		$_SESSION['uid']=$row[0];
	}
	$_SESSION['username']=$username;
	
	header('location:blocks.php');
}
else{
	echo"login faild. invalid username or password";
}
 
 ?>