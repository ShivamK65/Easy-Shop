<?php 
if(session_status() === PHP_SESSION_NONE)
{
	session_start();

}
$data=$_POST["data"];

$_SESSION['array']=$data;
 
echo "updated";

 ?>