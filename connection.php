<?php

$conn = mysqli_connect("localhost","root","","easyshop");


if (mysqli_connect_error()) {
  die("Connection failed: " . $conn->connect_error);
}
//echo "Connected successfully";
?>
