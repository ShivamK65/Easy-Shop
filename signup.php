<?php 

include('connection.php');

$name=$_POST['username'];
$email=$_POST['email'];
$phone=$_POST['phone'];
$password=$_POST['pwd'];

$sql="INSERT INTO `client` ( `name`, `email`, `phoneno.`, `password`) VALUES ('$name', '$email', '$phone', '$password');";

if(mysqli_query($conn,$sql)==1)
//if($sql)
{
	echo '<script>
	alert("Account Create Successfully ");
	</script>';

	header("location:login.html");

}
else{
	echo "please Enter the valid information";
}


 ?>