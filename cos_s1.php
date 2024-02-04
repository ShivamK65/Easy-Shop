<!DOCTYPE html>
<html>
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
    <title>Cos_s1</title>
    <style>
        .mainhead {
            text-align: center; 
            font: 1em sans-serif; 
            font-weight: bold; 
            color: white; 
            font-size: 40px;
            text-shadow: 0 0 5px white;
        }
        table{
            text-align: center;
            border-radius: 12px;
            box-shadow: 0 0 15px white;
            border-spacing: 10px;
            width: 45%;
            margin-left: auto;
            margin-right: auto;
            margin-top: 30px;
            background-color: rgb(70,70, 70);
            padding-right: 2px;
            opacity: 0.8;
        }
        .tablehead {
            color: white;
            text-align: center;
            height: 40px;
            font-size: 15px;
        }
        tr{
            height: 30px;
        }
        td{
            color: white;
            font-weight: bold;
        }
        .itemname{
            text-align: left;
            padding-left: 15px;
        }
    </style>
    </head>
    <body style="background-image: url('background.jpg'); height: 100%;background-repeat: no-repeat;background-size: cover;background-position: center;background-attachment: fixed;">
        <?php
        include('header.php');
        ?>
        <script>
        var cart = []
        
        $(document).ready(function(){
        $('#b').click(function(){
            // $.ajax({
            //  url:"try.php",
            //  type:"POST",
            //  data:{'a':"data"}

            // });
            const myJSON = JSON.stringify(cart)
            // console.log(cart)
            // console.log(myJSON)

            $.post('session.php',{
             'data':myJSON
            },(response)=>{
               console.log(response); 
            });
            sessionStorage.setItem('a',myJSON);
            window.location.replace("payment.php");
            
            // window.location.replace("payment.html");
        });
    });

        function addToCart(item) {
            var existing = false
            var amount=0
             for(var i =0; i< cart.length; i++ ){
                if(cart[i].name == item.name){
                    ++cart[i].quantity;
                    existing= true
                    break;
                }
            } 
            if(!existing){
                cart.push({
                name:item.name,
                price: item.price,
                quantity:1
            })    
            }
            for(var i=0;i<cart.length;i++){
                amount+= cart[i].price*cart[i].quantity;
            }
            console.log(cart)
            const ele = document.getElementById('rs');
            ele.innerHTML=amount;
            console.log(amount);
            
        }
        function removeFromCart(name){
            var amount=0
             cart.map((item,i)=> {
                if(item.name == name){
                    if(item.quantity == 1){
                        cart.splice(i,1)
                    } else {
                        --item.quantity;
                    }

                }
            })
            //console.log(cart)
            for(var i=0;i<cart.length;i++){
                amount+= cart[i].price*cart[i].quantity;
            }
            console.log(cart)
            const ele = document.getElementById('rs');
            ele.innerHTML=amount;
            console.log(amount);


        }
    </script>
    <!-- <nav class="navbar navbar-default">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand" href="login.html" style="font: normal 20px 'Cookie', cursive;">EASY Shop</a>
            </div>
            <ul class="nav navbar-nav">
                <li><a href="blocks.html" style="font-size: medium;" id = "home"><b>Home</b></a></li>
                <li><a href="#" id = "contact" style="font-size: medium;"><b>Contact</b></a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="login.html"><span class="glyphicon glyphicon-user"></span> Login</a></li>
            </ul>
        </div>
    </nav> -->
    <h1 class="mainhead">WRAPCHIK</h1>
    <div>
        <table>
            <tr style="border-bottom:1px solid white;">
                <th class="tablehead">Items</th>
                <th class="tablehead">Price (in Rs.)</th>
                <th class="tablehead">Add to cart</th>
            </tr>
            <tr>
                <td class="itemname">Veg.Crispy Burger</td>
                <td style="text-align: center;">50</td>
                <td style="text-align: center;font-size: x-large;"><span onclick="addToCart({name:'Veg.Crispy Burger', price:50})" style="margin-right:2px ;">&#43</span><i class="fa fa-shopping-cart"></i><span onclick="removeFromCart('Veg.Crispy Burger')" style="margin-left:4px ;">&#8722</span></td>
            </tr>
            <tr>
                <td class="itemname">Veg.Spicy Burger</td>
                <td style="text-align: center;">50</td>
                <td style="text-align: center;font-size: x-large;"><span onclick="addToCart({name:'Veg.Spicy Burger', price:50})" style="margin-right:2px ;">&#43</span><i class="fa fa-shopping-cart"></i><span onclick="removeFromCart('Veg.Spicy Burger')" style="margin-left:4px ;">&#8722</span></td>
            </tr>
            <tr>
                <td class="itemname">Mayo Burger</td>
                <td style="text-align: center;">50</td>
                <td style="text-align: center;font-size: x-large;"><span onclick="addToCart({name:'Mayo Burger', price:50})" style="margin-right:2px ;">&#43</span><i class="fa fa-shopping-cart"></i><span onclick="removeFromCart('Mayo Burger')" style="margin-left:4px ;">&#8722</span></td>
            </tr>
            <tr>
                <td class="itemname">Mini Steak Burger</td>
                <td style="text-align: center;">45</td>
                <td style="text-align: center;font-size: x-large;"><span onclick="addToCart({name:'Mini Steak Burger', price:45})" style="margin-right:2px ;">&#43</span><i class="fa fa-shopping-cart"></i><span onclick="removeFromCart('Mini Steak Burger')" style="margin-left:4px ;">&#8722</span></td>
            </tr>
            <tr>
                <td class="itemname">Chicken Steak Burger</td>
                <td style="text-align: center;">60</td>
                <td style="text-align: center;font-size: x-large;"><span onclick="addToCart({name:'Chicken Steak Burger', price:60})" style="margin-right:2px ;">&#43</span><i class="fa fa-shopping-cart"></i><span onclick="removeFromCart('Chicken Steak Burger')" style="margin-left:4px ;">&#8722</span></td>
            </tr>
            <tr>
                <td class="itemname">Chicken Whopper</td>
                <td style="text-align: center;">95</td>
                <td style="text-align: center;font-size: x-large;"><span onclick="addToCart({name:'Chicken Whopper', price:95})" style="margin-right:2px ;">&#43</span><i class="fa fa-shopping-cart"></i><span onclick="removeFromCart('Chicken Whopper')" style="margin-left:4px ;">&#8722</span></td>
            </tr>
            <tr>
                <td class="itemname">Veg.Crispy Wrap</td>
                <td style="text-align: center;">60</td>
                <td style="text-align: center;font-size: x-large;"><span onclick="addToCart({name:'Veg.Crispy Wrap', price:60})" style="margin-right:2px ;">&#43</span><i class="fa fa-shopping-cart"></i><span onclick="removeFromCart('Veg.Crispy Wrap')" style="margin-left:4px ;">&#8722</span></td>
            </tr>
            <tr>
                <td class="itemname">Veg.Harabhara Wrap</td>
                <td style="text-align: center;">30</td>
                <td style="text-align: center;font-size: x-large;"><span onclick="addToCart({name:'Veg.Harabhara Wrap', price:60})" style="margin-right:2px ;">&#43</span><i class="fa fa-shopping-cart"></i><span onclick="removeFromCart('Veg.Harabhara Wrap')" style="margin-left:4px ;">&#8722</span></td>
            </tr>
            <tr>
                <td class="itemname">Cheese Kabab Wrap</td>
                <td style="text-align: center;">65</td>
                <td style="text-align: center;font-size: x-large;"><span onclick="addToCart({name:'Cheese Kabab Wrap', price:65})" style="margin-right:2px ;">&#43</span><i class="fa fa-shopping-cart"></i><span onclick="removeFromCart('Cheese Kabab Wrap')" style="margin-left:4px ;">&#8722</span></td>
            </tr>
            <tr>
                <td class="itemname">Mexican Salsa Wrap</td>
                <td style="text-align: center;">65</td>
                <td style="text-align: center;font-size: x-large;"><span onclick="addToCart({name:'Mexican Salsa Wrap', price:65})" style="margin-right:2px ;">&#43</span><i class="fa fa-shopping-cart"></i><span onclick="removeFromCart('Mexican Salsa Wrap')" style="margin-left:4px ;">&#8722</span></td>
            </tr>
            <tr>
                <td class="itemname">Veg.Aloo Inferno Wrap</td>
                <td style="text-align: center;">30</td>
                <td style="text-align: center;font-size: x-large;"><span onclick="addToCart({name:'Veg.Aloo Inferno Wrap', price:65})" style="margin-right:2px ;">&#43</span><i class="fa fa-shopping-cart"></i><span onclick="removeFromCart('Veg.Aloo Inferno Wrap ')" style="margin-left:4px ;">&#8722</span></td>
            </tr>
            <tr>
                <td class="itemname">Chicken Seekh Kabab Wrap</td>
                <td style="text-align: center;">90</td>
                <td style="text-align: center;font-size: x-large;"><span onclick="addToCart({name:'Chicken Seekh Kabab Wrap', price:90})" style="margin-right:2px ;">&#43</span><i class="fa fa-shopping-cart"></i><span onclick="removeFromCart('Chicken Seekh Kabab Wrap')" style="margin-left:4px ;">&#8722</span></td>
            </tr>
            <tr>
                <td class="itemname">Bombay Frankie</td>
                <td style="text-align: center;">25</td>
                <td style="text-align: center;font-size: x-large;"><span onclick="addToCart({name:'Bombay Frankie', price:90})" style="margin-right:2px ;">&#43</span><i class="fa fa-shopping-cart"></i><span onclick="removeFromCart('Bombay Frankie')" style="margin-left:4px ;">&#8722</span></td>
            </tr>
            <tr>
                <td class="itemname">Cheesy Nuggets</td>
                <td style="text-align: center;">60</td>
                <td style="text-align: center;font-size: x-large;"><span onclick="addToCart({name:'Cheesy Nuggets', price:60})" style="margin-right:2px ;">&#43</span><i class="fa fa-shopping-cart"></i><span onclick="removeFromCart('Cheesy Nuggets')" style="margin-left:4px ;">&#8722</span></td>
            </tr>
            <tr>
                <td class="itemname">Loaded Fries</td>
                <td style="text-align: center;">20</td>
                <td style="text-align: center;font-size: x-large;"><span onclick="addToCart({name:'Loaded Fries', price:99})" style="margin-right:2px ;">&#43</span><i class="fa fa-shopping-cart"></i><span onclick="removeFromCart('Loaded Fries')" style="margin-left:4px ;">&#8722</span></td>
            </tr>
            <tr>
                <td class="itemname">Tofu Salad</td>
                <td style="text-align: center;">110</td>
                <td style="text-align: center;font-size: x-large;"><span onclick="addToCart({name:'Tofu Salad', price:110})" style="margin-right:2px ;">&#43</span><i class="fa fa-shopping-cart"></i><span onclick="removeFromCart('Tofu Salad')" style="margin-left:4px ;">&#8722</span></td>
            </tr>
            <tr>
                <td class="itemname">Veg.Crispy Nacho Salad</td>
                <td style="text-align: center;">125</td>
                <td style="text-align: center;font-size: x-large;"><span onclick="addToCart({name:'Veg.Crispy Nacho Salad', price:125})" style="margin-right:2px ;">&#43</span><i class="fa fa-shopping-cart"></i><span onclick="removeFromCart('Veg.Crispy Nacho Salad')" style="margin-left:4px ;">&#8722</span></td>
            </tr>
            <tr>
                <td class="itemname">Chicken Crispy Nacho Salad</td>
                <td style="text-align: center;">135</td>
                <td style="text-align: center;font-size: x-large;"><span onclick="addToCart({name:'Chicken Crispy Nacho Salad', price:135})" style="margin-right:2px ;">&#43</span><i class="fa fa-shopping-cart"></i><span onclick="removeFromCart('Chicken Crispy Nacho Salad')" style="margin-left:4px ;">&#8722</span></td>
            </tr>
            <tr>
                <td class="itemname">Mint Mojito</td>
                <td style="text-align: center;">65</td>
                <td style="text-align: center;font-size: x-large;"><span onclick="addToCart({name:'Mint Mojito', price:65})" style="margin-right:2px ;">&#43</span><i class="fa fa-shopping-cart"></i><span onclick="removeFromCart('Mint Mojito')" style="margin-left:4px ;">&#8722</span></td>
            </tr>
            <tr>
                <td class="itemname">Tropical Mojito</td>
                <td style="text-align: center;">65</td>
                <td style="text-align: center;font-size: x-large;"><span onclick="addToCart({name:'Tropical Mojito', price:65})" style="margin-right:2px ;">&#43</span><i class="fa fa-shopping-cart"></i><span onclick="removeFromCart('Tropical Mojito')" style="margin-left:4px ;">&#8722</span></td>
            </tr>
        </table>
    </div>
    <div class="container " style="; height: 50px; margin: 20px;">
            <div class="col" id="amount" style="";><font style="color: white;">Amount Rs.</font></div>
            <div class="col"  style="">
                <h5 style="color: white;" id="rs">0.00</h5>
                <button id="b" class="btn-success" style="height:30px ;width: 100px;">CHECK OUT</button>
                
            </div>
        </div>
    <!-- <footer class="footer-distributed">

        <div class="footer-left">
      <img src="img/logo.png">
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

            <p class="footer-company-name">© 2021 EasyShop Pvt. Ltd.</p>
        </div>

        <div class="footer-center">
            <div>
                <i class="fa fa-map-marker"></i>
                  <p><span>Thapar University</span>
                    Patiala,Punjab</p>
            </div>

            <div>
                <i class="fa fa-phone"></i>
                <p>+91 9999999999</p>
            </div>
            <div>
                <i class="fa fa-envelope"></i>
                <p><a href="mailto:support@eduonix.com">easyshop@gmail.com</a></p>
            </div>
        </div>
        <div class="footer-right">
            <p class="footer-company-about">
                <span>About the company</span>
                We offer training and skill building courses across Technology, Design, Management, Science and Humanities.</p>
            <div class="footer-icons">
                <a href="#"><i class="fa fa-facebook"></i></a>
                <a href="#"><i class="fa fa-twitter"></i></a>
                <a href="#"><i class="fa fa-instagram"></i></a>
                <a href="#"><i class="fa fa-linkedin"></i></a>
                <a href="#"><i class="fa fa-youtube"></i></a>
            </div>
        </div>
    </footer> -->
    <?php
    include('footer.php');
    ?>
    </body>
</html>