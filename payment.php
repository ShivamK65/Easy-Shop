<?php
if(session_status() === PHP_SESSION_NONE)
{
  session_start();

}
  $data=$_SESSION['array'];
  $jdata=json_decode($data,true);
  
  $username=$_SESSION['username'];
  

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="payment.css">
    <link rel="stylesheet" href="footer.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <title>Payment</title>

      <style>
        table{
            border-collapse: collapse;
            border-spacing: 0;
            min-width: rem-calc(640);
            width: 100%;
        }
        th, td{
            padding: 10px 10px;
            border: 1px solid #000;


        }
        .table{
          overflow: hiden;
          overflow-x:auto ;
          clear: both;
          width: 100%;
        }
    </style>

</head>
<body>

    <nav class="navbar navbar-inverse">
        <div class="container-fluid">
          <div class="navbar-header">
            <a class="navbar-brand" href="login.html">Easy Shop</a>
          </div>
          <ul class="nav navbar-nav">
            <li><a href="blocks.php" id = "home">Home</a></li>
            <li><a href="#" id = "contact">Contact</a></li>
            
          </ul>
          <ul class="nav navbar-nav navbar-right">
            <li><a href="#" id = "signup"><span class="glyphicon glyphicon-user"></span> <?php echo $username; ?></a></li>
            <li><a href="Logout.php"><button>Logout</button></a></li>
          </ul>
        </div>
      </nav>



    <h1 style="text-align: center;">Cart Details</h1>
    <div class="col-25">
        <div class="container">
          <h4>Cart
            <span class="price" style="color:black">
              <i class="fa fa-shopping-cart"></i>
              <b><?php //echo(count($data)); ?></b>
            </span>
          </h4>
          <div class="table table-responsive striped" id="table"></div>
          <?php $total=0; for($i=0;$i <count($jdata);$i++){ ?>
          <p><?php echo($jdata[$i]["name"]);?> <span class="price"><?php echo($jdata[$i]["price"]*$jdata[$i]["quantity"]);$total+=$jdata[$i]["price"]*$jdata[$i]["quantity"]; ?> Rs.</span></p>
        <?php }?>
          <hr>
          <p>Total <span class="price" style="color:black"><b><?php echo($total);?> Rs</b></span></p>
        </div>
      </div>
    </div>

    <h1 style="text-align: center;">Payment Details</h1>
<div class="row">
    <div class="col-75">
      <div class="container">
        <form action="payout.php" method="POST">
  
          <div class="row">
            <div class="col-50">
              <h3>Billing Address</h3>
              <label for="fname"><i class="fa fa-user"></i> Full Name</label>
              <input type="text" id="fname" name="firstname" value=<?php echo $username; ?>>
              <label for="email"><i class="fa fa-envelope"></i> Email</label>
              <input type="text" id="email" name="email" placeholder="john@example.com">
              <label for="adr"><i class="fa fa-address-card-o"></i> Address</label>
              <input type="text" id="adr" name="address" placeholder="542 W. 15th Street">
              <label for="city"><i class="fa fa-institution"></i> City</label>
              <input type="text" id="city" name="city" value="Patiala">
  
              <div class="row">
                <div class="col-50">
                  <label for="state">State</label>
                  <input type="text" id="state" name="state" value="Punjab">
                </div>
                <div class="col-50">
                  <label for="zip">Zip</label>
                  <input type="text" id="zip" name="zip" value="147001">
                </div>
              </div>
            </div>
  
            <div class="col-50">
              <h3>Payment</h3>
              <label for="fname">Accepted Cards</label>
              <div class="icon-container">
                <i class="fa fa-cc-visa" style="color:navy;"></i>
                <i class="fa fa-cc-amex" style="color:blue;"></i>
                <i class="fa fa-cc-mastercard" style="color:red;"></i>
                <i class="fa fa-cc-discover" style="color:orange;"></i>
              </div>
              <label for="cname">Name on Card</label>
              <input type="text" id="cname" name="cardname" value=<?php echo $username; ?>>
              <label for="ccnum">Credit card number</label>
              <input type="text" id="ccnum" name="cardnumber" placeholder="1111-2222-3333-4444">
              <label for="expmonth">Exp Month</label>
              <input type="text" id="expmonth" name="expmonth" placeholder="September">
  
              <div class="row">
                <div class="col-50">
                  <label for="expyear">Exp Year</label>
                  <input type="text" id="expyear" name="expyear" placeholder="2018">
                </div>
                <div class="col-50">
                  <label for="cvv">CVV</label>
                  <input type="text" id="cvv" name="cvv" placeholder="352">
                </div>
              </div>
            </div>
  
          </div>
          <label>
            <input type="checkbox" checked="checked" name="sameadr"> Shipping address same as billing
          </label>
          <input type="submit" value="Continue to checkout" class="btn">
        </form>
      </div>
    </div>
  

    <?php include('footer.php'); ?>

    <!-- <footer class="footer-distributed">

        <div class="footer-left">
       //<img src="img/logo.png"> 
            <h3>EASY<span>Shop</span></h3>

            <p class="footer-links">
                <a href="#">Home</a>
                |
                <a href="#">Blog</a>
                |
                <a href="#">About</a>
                |
                <a href="#">Contact</a>
            </p>

            <p class="footer-company-name">© 2021 EASYShop Pvt. Ltd.</p>
        </div>

        <div class="footer-center">
            <div>
                <i class="fa fa-map-marker"></i>
                  <p><span>Thapar Institue of Engineering and Technology </span>
                Patiala 147001</p>
            </div>

            <div>
                <i class="fa fa-phone"></i>
                <p>+91 99999999</p>
            </div>
            <div>
                <i class="fa fa-envelope"></i>
                <p><a href="mailto:support@eduonix.com">support@eduonix.com</a></p>
            </div>
        </div>
        <div class="footer-right">
            <p class="footer-company-about">
                <span>About the company</span>
                We offer an Easy Way to shop groceries</p>
            <div class="footer-icons">
                <a href="#"><i class="fa fa-facebook"></i></a>
                <a href="#"><i class="fa fa-twitter"></i></a>
                <a href="#"><i class="fa fa-instagram"></i></a>
                <a href="#"><i class="fa fa-linkedin"></i></a>
                <a href="#"><i class="fa fa-youtube"></i></a>
            </div>
        </div>
    </footer> -->
   
   <script type="text/javascript">
        var array=sessionStorage.getItem('a');
        // console.log(array);
        // let obj = JSON.parse(array);
        // console.log(obj[0].name);
        // let table = document.createElement('table');
        // let thead = document.createElement('thead');
        // let tbody = document.createElement('tbody');

        // table.appendChild(thead);
        // table.appendChild(tbody);
        // // Adding the entire table to the body tag
        // document.getElementById('table').appendChild(table);


        // //Creating and adding data to first row of the table
        // let row_1 = document.createElement('tr');
        // let heading_1 = document.createElement('th');
        // heading_1.innerHTML = "Name";
        // let heading_2 = document.createElement('th');
        // heading_2.innerHTML = "Amount";

        // row_1.appendChild(heading_1);
        // row_1.appendChild(heading_2);
        // thead.appendChild(row_1);

        // let t=0;
        // // Creating and adding data to second row of the table
        // for(i=0; i<array.length;i++){
        //   let row_2 = document.createElement('tr');
        //   let row_2_data_1 = document.createElement('td');
        //   row_2_data_1.innerHTML = obj[i].name ;
        //   let row_2_data_2 = document.createElement('td');
        //   row_2_data_2.innerHTML = obj[i].price*obj[i].quantity;

        //   row_2.appendChild(row_2_data_1);
        //   row_2.appendChild(row_2_data_2);
        //   tbody.appendChild(row_2);
        //   t+=obj[i].price*obj[i].quantity;
      //}



  
</script>


</body>
</html>