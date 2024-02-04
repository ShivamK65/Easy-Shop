<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style1.css">
    <link rel="stylesheet" href="footer.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
	<title></title>
</head>
<body>

<nav class="navbar navbar-default">
        <div class="container-fluid">
          <div class="navbar-header">
            <a class="navbar-brand" href="blocks.php" style="font: normal 20px 'Cookie', cursive;">EASY Shop</a>
          </div>
          <ul class="nav navbar-nav">
            <li><a href="blocks.php" style="font-size: medium;" id = "home"><b>Home</b></a></li>
            <li><a href="#" id = "contact" style="font-size: medium;"><b>Contact</b></a></li>
            
          </ul>
          <ul class="nav navbar-nav navbar-right">
            <li><a href="#"><span class="glyphicon glyphicon-user"></span> 
            	<?php
					session_start();
					$name=$_SESSION['username'];
					echo $name;
					?></a></li>
          <li><a href="Logout.php"><button>Logout</button></a></li>
          </ul>
        </div>
      </nav>

</body>
</html>