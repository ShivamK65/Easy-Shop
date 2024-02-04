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
    <title>Cos_s4</title>
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
    
    <h1 class="mainhead">Chill & Grill</h1>
    <div>
        <table>
            <tr style="border-bottom:1px solid white;">
                <th class="tablehead">Items</th>
                <th class="tablehead">Price (in Rs.)</th>
                <th class="tablehead">Add to cart</th>
            </tr>
            <tr>
                <td class="itemname">Chilli Paneer Dosa</td>
                <td style="text-align: center;">110</td>
                <td style="text-align: center;font-size: x-large;"><span onclick="addToCart({name:'Chilli Paneer Dosa', price:110})" style="margin-right:2px ;">&#43</span><i class="fa fa-shopping-cart"></i><span onclick="removeFromCart('Chilli Paneer Dosa')" style="margin-left:4px ;">&#8722</span></td>
            </tr>
            <tr>
                <td class="itemname">Manchurian Dosa</td>
                <td style="text-align: center;">110</td>
                <td style="text-align: center;font-size: x-large;"><span onclick="addToCart({name:'Manchurian Dosa', price:110})" style="margin-right:2px ;">&#43</span><i class="fa fa-shopping-cart"></i><span onclick="removeFromCart('Manchurian Dosa')" style="margin-left:4px ;">&#8722</span></td>
            </tr>
            <tr>
                <td class="itemname">Cheese Burst Dosa</td>
                <td style="text-align: center;">130</td>
                <td style="text-align: center;font-size: x-large;"><span onclick="addToCart({name:'Cheese Burst Dosa', price:130})" style="margin-right:2px ;">&#43</span><i class="fa fa-shopping-cart"></i><span onclick="removeFromCart('Cheese Burst Dosa')" style="margin-left:4px ;">&#8722</span></td>
            </tr>
            <tr>
                <td class="itemname">Mayo Garlic Bread</td>
                <td style="text-align: center;">85</td>
                <td style="text-align: center;font-size: x-large;"><span onclick="addToCart({name:'Mayo Garlic Bread', price:85})" style="margin-right:2px ;">&#43</span><i class="fa fa-shopping-cart"></i><span onclick="removeFromCart('Mayo Garlic Bread')" style="margin-left:4px ;">&#8722</span></td>
            </tr>
            <tr>
                <td class="itemname">Jalapenos Fries</td>
                <td style="text-align: center;">80</td>
                <td style="text-align: center;font-size: x-large;"><span onclick="addToCart({name:'Jalapenos Fries', price:80})" style="margin-right:2px ;">&#43</span><i class="fa fa-shopping-cart"></i><span onclick="removeFromCart('Jalapenos Fries')" style="margin-left:4px ;">&#8722</span></td>
            </tr>
            <tr>
                <td class="itemname">Cheese Pav Bhaji</td>
                <td style="text-align: center;">110</td>
                <td style="text-align: center;font-size: x-large;"><span onclick="addToCart({name:'Cheese Pav Bhaji', price:110})" style="margin-right:2px ;">&#43</span><i class="fa fa-shopping-cart"></i><span onclick="removeFromCart('Cheese Pav Bhaji')" style="margin-left:4px ;">&#8722</span></td>
            </tr>
            <tr>
                <td class="itemname">ldli Vada Sambar</td>
                <td style="text-align: center;">55</td>
                <td style="text-align: center;font-size: x-large;"><span onclick="addToCart({name:'ldli Vada Sambar', price:55})" style="margin-right:2px ;">&#43</span><i class="fa fa-shopping-cart"></i><span onclick="removeFromCart('ldli Vada Sambar')" style="margin-left:4px ;">&#8722</span></td>
            </tr>
            <tr>
                <td class="itemname">Kulfi Falooda</td>
                <td style="text-align: center;">80</td>
                <td style="text-align: center;font-size: x-large;"><span onclick="addToCart({name:'Kulfi Falooda', price:80})" style="margin-right:2px ;">&#43</span><i class="fa fa-shopping-cart"></i><span onclick="removeFromCart('Kulfi Falooda')" style="margin-left:4px ;">&#8722</span></td>
            </tr>
            <tr>
                <td class="itemname">Afghani Chaap</td>
                <td style="text-align: center;">150</td>
                <td style="text-align: center;font-size: x-large;"><span onclick="addToCart({name:'Afghani Chaap', price:150})" style="margin-right:2px ;">&#43</span><i class="fa fa-shopping-cart"></i><span onclick="removeFromCart('Afghani Chaap')" style="margin-left:4px ;">&#8722</span></td>
            </tr>
            <tr>
                <td class="itemname">Paneer Tikka</td>
                <td style="text-align: center;">150</td>
                <td style="text-align: center;font-size: x-large;"><span onclick="addToCart({name:'Paneer Tikka', price:150})" style="margin-right:2px ;">&#43</span><i class="fa fa-shopping-cart"></i><span onclick="removeFromCart('Paneer Tikka')" style="margin-left:4px ;">&#8722</span></td>
            </tr>
            <tr>
                <td class="itemname">White Pasta</td>
                <td style="text-align: center;">80</td>
                <td style="text-align: center;font-size: x-large;"><span onclick="addToCart({name:'White Pasta', price:80})" style="margin-right:2px ;">&#43</span><i class="fa fa-shopping-cart"></i><span onclick="removeFromCart('White Pasta')" style="margin-left:4px ;">&#8722</span></td>
            </tr>
            <tr>
                <td class="itemname">Red Pasta</td>
                <td style="text-align: center;">80</td>
                <td style="text-align: center;font-size: x-large;"><span onclick="addToCart({name:'Red Pasta', price:80})" style="margin-right:2px ;">&#43</span><i class="fa fa-shopping-cart"></i><span onclick="removeFromCart('Red Pasta')" style="margin-left:4px ;">&#8722</span></td>
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