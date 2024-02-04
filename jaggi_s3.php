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
    <title>Jaggi Shop 3</title>
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
        tr{
            height: 30px;
        }
        .tablehead {
            color: white;
            text-align: center;
            height: 40px;
            font-size: 15px;
        }
        td{
            font-weight: bold;
            color: white;
        }
        .itemname{
            text-align: left;
            padding-left: 15px;
        }
    </style>
</head>
<body style="background-image: url('background.jpg'); height: 100%;background-repeat: no-repeat;background-size: cover;background-position: center;background-attachment: fixed;">
    <?php include('header.php'); ?>
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
            var amount=0;
            var existing = false
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
            // const myJSON = JSON.stringify(cart)
            // console.log(cart)
            // console.log(myJSON)
                        for(var i=0;i<cart.length;i++){
                amount+= cart[i].price*cart[i].quantity;
            }
            console.log(cart)
            const ele = document.getElementById('rs');
            ele.innerHTML= amount;
            console.log(amount);
            
        }
        function removeFromCart(name){
            var amount=0;
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
   
    <h1 class="mainhead">Cafe House</h1>
    <div>
    <table>
        <tr style="border-bottom:1px solid white;">
            <th class="tablehead">Items</th>
            <th class="tablehead">Price (in Rs.)</th>
            <th class="tablehead">Add to cart</th>
        </tr>
        <tr>
            <td class="itemname">Masala Noodles</td>
            <td style="text-align: center;">25</td>
            <td class="icon" style="text-align: center;font-size: x-large;"><span onclick="addToCart({name:'Masala Noodles', price:25})" style="margin-right:2px ;">&#43</span><i class="fa fa-shopping-cart"></i><span onclick="removeFromCart('Masala Noodles')" style="margin-left:4px ;">&#8722</span></td>
        </tr>
        <tr>
            <td class="itemname">Flavoured Noodles</td>
            <td style="text-align: center;">40</td>
            <td style="text-align: center;font-size: x-large;"><span onclick="addToCart({name:'Flavoured Noodles', price:40})" style="margin-right:2px ;">&#43</span><i class="fa fa-shopping-cart"></i><span onclick="removeFromCart('Flavoured Noodles')" style="margin-left:4px ;">&#8722</span></td>
        </tr>
        <tr>
            <td class="itemname">Pasta</td>
            <td style="text-align: center;">40</td>
            <td style="text-align: center;font-size: x-large;"><span onclick="addToCart({name:'Pasta', price:40})" style="margin-right:2px ;">&#43</span><i class="fa fa-shopping-cart"></i><span onclick="removeFromCart('Pasta')" style="margin-left:4px ;">&#8722</span></td>
        </tr>
        <tr>
            <td class="itemname">Paneer Pattie</td>
            <td style="text-align: center;">15</td>
            <td style="text-align: center;font-size: x-large;"><span onclick="addToCart({name:'Paneer Pattie', price:15})" style="margin-right:2px ;">&#43</span><i class="fa fa-shopping-cart"></i><span onclick="removeFromCart('Paneer Pattie')" style="margin-left:4px ;">&#8722</span></td>
        </tr>
        <tr>
            <td class="itemname">Pastry</td>
            <td style="text-align: center;">15</td>
            <td style="text-align: center;font-size: x-large;"><span onclick="addToCart({name:'Pastry', price:15})" style="margin-right:2px ;">&#43</span><i class="fa fa-shopping-cart"></i><span onclick="removeFromCart('Pastry')" style="margin-left:4px ;">&#8722</span></td>
        </tr>
        <tr>
            <td class="itemname">Spring Rolls</td>
            <td style="text-align: center;">50</td>
            <td style="text-align: center;font-size: x-large;"><span onclick="addToCart({name:'Spring Rolls', price:50})" style="margin-right:2px ;">&#43</span><i class="fa fa-shopping-cart"></i><span onclick="removeFromCart('Spring Rolls')" style="margin-left:4px ;">&#8722</span></td>
        </tr>
        <tr>
            <td class="itemname">Pizza</td>
            <td style="text-align: center;">80</td>
            <td style="text-align: center;font-size: x-large;"><span onclick="addToCart({name:'Pizza', price:80})" style="margin-right:2px ;">&#43</span><i class="fa fa-shopping-cart"></i><span onclick="removeFromCart('Pizza')" style="margin-left:4px ;">&#8722</span></td>
        </tr>
        <tr>
            <td class="itemname">Coffee Regular</td>
            <td style="text-align: center;">15</td>
            <td style="text-align: center;font-size: x-large;"><span onclick="addToCart({name:'Coffee Regular', price:15})" style="margin-right:2px ;">&#43</span><i class="fa fa-shopping-cart"></i><span onclick="removeFromCart('Coffee Regular')" style="margin-left:4px ;">&#8722</span></td>
        </tr>
        <tr>
            <td class="itemname">Cappuccino</td>
            <td style="text-align: center;">20</td>
            <td style="text-align: center;font-size: x-large;"><span onclick="addToCart({name:'Cappuccino', price:20})" style="margin-right:2px ;">&#43</span><i class="fa fa-shopping-cart"></i><span onclick="removeFromCart('Cappuccino')" style="margin-left:4px ;">&#8722</span></td>
        </tr>
        <tr>
            <td class="itemname">Cafe Latte</td>
            <td style="text-align: center;">25</td>
            <td style="text-align: center;font-size: x-large;"><span onclick="addToCart({name:'Cafe Latte', price:25})" style="margin-right:2px ;">&#43</span><i class="fa fa-shopping-cart"></i><span onclick="removeFromCart('Cafe Latte')" style="margin-left:4px ;">&#8722</span></td>
        </tr>
        <tr>
            <td class="itemname">Espresso</td>
            <td style="text-align: center;">25</td>
            <td style="text-align: center;font-size: x-large;"><span onclick="addToCart({name:'Espresso', price:25})" style="margin-right:2px ;">&#43</span><i class="fa fa-shopping-cart"></i><span onclick="removeFromCart('Espresso')" style="margin-left:4px ;">&#8722</span></td>
        </tr>
        <tr>
            <td class="itemname">Cafe Mocha</td>
            <td style="text-align: center;">30</td>
            <td style="text-align: center;font-size: x-large;"><span onclick="addToCart({name:'Cafe Mocha', price:30})" style="margin-right:2px ;">&#43</span><i class="fa fa-shopping-cart"></i><span onclick="removeFromCart('Cafe Mocha')" style="margin-left:4px ;">&#8722</span></td>
        </tr>
        <tr>
            <td class="itemname">Frappe</td>
            <td style="text-align: center;">30</td>
            <td style="text-align: center;font-size: x-large;"><span onclick="addToCart({name:'Frappe', price:30})" style="margin-right:2px ;">&#43</span><i class="fa fa-shopping-cart"></i><span onclick="removeFromCart('Frappe')" style="margin-left:4px ;">&#8722</span></td>
        </tr>
        <tr>
            <td class="itemname">Tea</td>
            <td style="text-align: center;">10</td>
            <td style="text-align: center;font-size: x-large;"><span onclick="addToCart({name:'Tea', price:10})" style="margin-right:2px ;">&#43</span><i class="fa fa-shopping-cart"></i><span onclick="removeFromCart('Tea')" style="margin-left:4px ;">&#8722</span></td>
        </tr>
        <tr>
            <td class="itemname">Iced Lemon Tea</td>
            <td style="text-align: center;">20</td>
            <td style="text-align: center;font-size: x-large;"><span onclick="addToCart({name:'Iced Lemon Tea', price:20})" style="margin-right:2px ;">&#43</span><i class="fa fa-shopping-cart"></i><span onclick="removeFromCart('Iced Lemon Tea')" style="margin-left:4px ;">&#8722</span></td>
        </tr>
        <tr>
            <td class="itemname">Tomato Soup</td>
            <td style="text-align: center;">15</td>
            <td style="text-align: center;font-size: x-large;"><span onclick="addToCart({name:'Tomato Soup', price:15})" style="margin-right:2px ;">&#43</span><i class="fa fa-shopping-cart"></i><span onclick="removeFromCart('Tomato Soup')" style="margin-left:4px ;">&#8722</span></td>
        </tr>
        <tr>
            <td class="itemname">Soft Drinks</td>
            <td style="text-align: center;">20</td>
            <td style="text-align: center;font-size: x-large;"><span onclick="addToCart({name:'Soft Drinks', price:20})" style="margin-right:2px ;">&#43</span><i class="fa fa-shopping-cart"></i><span onclick="removeFromCart('Soft Drinks')" style="margin-left:4px ;">&#8722</span></td>
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
    <?php include('footer.php'); ?>
</body>
</html>