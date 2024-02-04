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
    <title>Cos_s3</title>
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
    
    <h1 class="mainhead">Laundry & Dryclean</h1>
    <div>
        <table>
            <tr style="border-bottom:1px solid white;">
                <th class="tablehead">Items</th>
                <th class="tablehead">Price (in Rs.)</th>
                <th class="tablehead">Add to cart</th>
            </tr>
            <tr>
                <td colspan="3" style="text-align: center;">DRYCLEAN RATE</td>
            </tr>
            <tr>
                <td class="itemname">Jeans / Pent</td>
                <td style="text-align: center;">80</td>
                <td style="text-align: center;font-size: x-large;"><span onclick="addToCart({name:'Jeans / Pent', price:80})" style="margin-right:2px ;">&#43</span><i class="fa fa-shopping-cart"></i><span onclick="removeFromCart('Jeans / Pent')" style="margin-left:4px ;">&#8722</span></td>
            </tr>
            <tr>
                <td class="itemname">Sweater</td>
                <td style="text-align: center;">80</td>
                <td style="text-align: center;font-size: x-large;"><span onclick="addToCart({name:'Sweater', price:80})" style="margin-right:2px ;">&#43</span><i class="fa fa-shopping-cart"></i><span onclick="removeFromCart('Sweater')" style="margin-left:4px ;">&#8722</span></td>
            </tr>
            <tr>
                <td class="itemname">T-Shirt / Shirt</td>
                <td style="text-align: center;">60</td>
                <td style="text-align: center;font-size: x-large;"><span onclick="addToCart({name:'T-Shirt / Shirt', price:60})" style="margin-right:2px ;">&#43</span><i class="fa fa-shopping-cart"></i><span onclick="removeFromCart('T-Shirt / Shirt')" style="margin-left:4px ;">&#8722</span></td>
            </tr>
            <tr>
                <td class="itemname">Blanket Single</td>
                <td style="text-align: center;">170</td>
                <td style="text-align: center;font-size: x-large;"><span onclick="addToCart({name:'Blanket Single', price:170})" style="margin-right:2px ;">&#43</span><i class="fa fa-shopping-cart"></i><span onclick="removeFromCart('Blanket Single')" style="margin-left:4px ;">&#8722</span></td>
            </tr>
            <tr>
                <td class="itemname">Jacket</td>
                <td style="text-align: center;">125</td>
                <td style="text-align: center;font-size: x-large;"><span onclick="addToCart({name:'Jacket', price:125})" style="margin-right:2px ;">&#43</span><i class="fa fa-shopping-cart"></i><span onclick="removeFromCart('Jacket')" style="margin-left:4px ;">&#8722</span></td>
            </tr>
            <tr>
                <td class="itemname">Leather Jacket</td>
                <td style="text-align: center;">250</td>
                <td style="text-align: center;font-size: x-large;"><span onclick="addToCart({name:'Leather Jacket', price:250})" style="margin-right:2px ;">&#43</span><i class="fa fa-shopping-cart"></i><span onclick="removeFromCart('Leather Jacket')" style="margin-left:4px ;">&#8722</span></td>
            </tr>
            <tr style="border-top:1px solid white;">
                <td colspan="3" style="text-align: center;">WASHING RATE</td>
            </tr>
            <tr>
                <td class="itemname">Jeans</td>
                <td style="text-align: center;">10</td>
                <td style="text-align: center;font-size: x-large;"><span onclick="addToCart({name:'Jeans', price:10})" style="margin-right:2px ;">&#43</span><i class="fa fa-shopping-cart"></i><span onclick="removeFromCart('Jeans')" style="margin-left:4px ;">&#8722</span></td>
            </tr>
            <tr>
                <td class="itemname">Interview Shirt</td>
                <td style="text-align: center;">20</td>
                <td style="text-align: center;font-size: x-large;"><span onclick="addToCart({name:'Interview Shirt', price:20})" style="margin-right:2px ;">&#43</span><i class="fa fa-shopping-cart"></i><span onclick="removeFromCart('Interview Shirt')" style="margin-left:4px ;">&#8722</span></td>
            </tr>
            <tr style="border-top:1px solid white;">
                <td colspan="3" style="text-align: center;">IRONING RATE</td>
            </tr>
            <tr>
                <td class="itemname">Shirt</td>
                <td style="text-align: center;">4</td>
                <td style="text-align: center;font-size: x-large;"><span onclick="addToCart({name:'Shirt', price:4})" style="margin-right:2px ;">&#43</span><i class="fa fa-shopping-cart"></i><span onclick="removeFromCart('Shirt')" style="margin-left:4px ;">&#8722</span></td>
            </tr>
            <tr>
                <td class="itemname">Pent</td>
                <td style="text-align: center;">4</td>
                <td style="text-align: center;font-size: x-large;"><span onclick="addToCart({name:'Pent', price:4})" style="margin-right:2px ;">&#43</span><i class="fa fa-shopping-cart"></i><span onclick="removeFromCart('Pent')" style="margin-left:4px ;">&#8722</span></td>
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
    
    <?php 
    include('footer.php') ?>
    </body>
</html>