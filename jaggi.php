<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style1.css">
    <link rel="stylesheet" href="footer.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <title>Jaggi</title>
</head>
<body style="background-image: url('background.jpg'); height: 100%;background-repeat: no-repeat;background-size: cover;background-position: center;background-attachment: fixed;">
    <?php include('header.php'); ?>
    
    <h1 style="text-align: center; font: 1em sans-serif; font-weight: bold; color: white; font-size: 40px;">Jaggi</h1>
    <div class="container-fluid" style=" justify-items: center; height: fit-content; width: fit-content;">
        <div class="container-fluid" style="margin: 10px; ">
            <div class="col col-sm blocksbox" style=" margin: 10px ;float: left;padding: 7px;"> 
                <div class="box_uppr" style="height: 70%; background-image: url(Royal_bite.jpg); background-repeat: no-repeat;background-size: cover;opacity: 0.9;"></div>
                <div class="box_lwr" style="height: 30%;">
                    <b style="font-size: 27px;">Royal Bite</b>
                    <p style="font-size: small;">Check our <a href="jaggi_s1.php">menu </a>here.</p></div>
            </div>
            <div class="col col-sm blocksbox" style=" margin: 10px ;float: left;padding: 7px;">
                <div class="box_uppr" style="height: 70%;background-image: url(juice_shake_bar.jpg); background-repeat: no-repeat;background-size: cover; opacity: 0.9;"></div>
                <div class="box_lwr" style="height: 30%;">
                    <b style="font-size: 27px;">Juice&Shake Bar</b>
                    <p style="font-size: small;">Check our <a href="jaggi_s2.php">menu</a> here.</p>
                </div>
            </div>
            <div class="col col-sm blocksbox" style=" margin: 10px ;float: left;padding: 7px;">
                <div class="box_uppr" style="height: 70%;background-image: url(cafe_house.jpg); background-repeat: no-repeat;background-size: cover; opacity: 0.9;"></div>
                <div class="box_lwr" style="height: 30%;">
                    <b style="font-size: 27px;">Cafe House</b>
                    <p style="font-size: small;">Check our <a href="jaggi_s3.php">menu</a> here.</p>
                </div>
            </div>
            <div class="col col-sm blocksbox" style=" margin: 10px ;float: left;padding: 7px;"> 
                <div class="box_uppr" style="height: 70%; background-image: url(jaggi_sodexo.jpg); background-repeat: no-repeat;opacity: 0.85;"></div>
                <div class="box_lwr" style="height: 30%;">
                    <b style="font-size: 27px;">Main Cafeteria</b>
                    <p style="font-size: small;">Check our <a href="jaggi_s4.php">menu</a> here.</p>
                </div>
            </div>
        </div>
    </div>
    <?php include('footer.php'); ?>
</body>