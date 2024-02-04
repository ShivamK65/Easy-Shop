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
    <title>Cos_s2</title>
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
    
    <h1 class="mainhead">The Desert Club</h1>
    <div>
        <table>
            <tr style="border-bottom:1px solid white;">
                <th class="tablehead">Items</th>
                <th class="tablehead">Price (in Rs.)</th>
                <th class="tablehead">Add to cart</th>
            </tr>
            <tr>
                <td class="itemname">Oreo Bubble Waffle</td>
                <td style="text-align: center;">120</td>
                <td style="text-align: center;font-size: x-large;"><span onclick="addToCart({name:'Oreo Bubble Waffle', price:120})" style="margin-right:2px ;">&#43</span><i class="fa fa-shopping-cart"></i><span onclick="removeFromCart('Oreo Bubble Waffle')" style="margin-left:4px ;">&#8722</span></td>
            </tr>
            <tr>
                <td class="itemname">Pistachio Bubble Waffle</td>
                <td style="text-align: center;">120</td>
                <td style="text-align: center;font-size: x-large;"><span onclick="addToCart({name:'Pistachio Bubble Waffle', price:120})" style="margin-right:2px ;">&#43</span><i class="fa fa-shopping-cart"></i><span onclick="removeFromCart('Pistachio Bubble Waffle')" style="margin-left:4px ;">&#8722</span></td>
            </tr>
            <tr>
                <td class="itemname">KitKat Sqr. Waffle</td>
                <td style="text-align: center;">120</td>
                <td style="text-align: center;font-size: x-large;"><span onclick="addToCart({name:'KitKat Sqr. Waffle', price:120})" style="margin-right:2px ;">&#43</span><i class="fa fa-shopping-cart"></i><span onclick="removeFromCart('KitKat Sqr. Waffle')" style="margin-left:4px ;">&#8722</span></td>
            </tr>
            <tr>
                <td class="itemname">Fresh Fruit Sqr. Waffle</td>
                <td style="text-align: center;">120</td>
                <td style="text-align: center;font-size: x-large;"><span onclick="addToCart({name:'Fresh Fruit Sqr. Waffle', price:120})" style="margin-right:2px ;">&#43</span><i class="fa fa-shopping-cart"></i><span onclick="removeFromCart('Fresh Fruit Sqr. Waffle')" style="margin-left:4px ;">&#8722</span></td>
            </tr>
            <tr>
                <td class="itemname">Nutella Waffle Onstick</td>
                <td style="text-align: center;">75</td>
                <td style="text-align: center;font-size: x-large;"><span onclick="addToCart({name:'Nutella Waffle Onstick', price:75})" style="margin-right:2px ;">&#43</span><i class="fa fa-shopping-cart"></i><span onclick="removeFromCart('Nutella Waffle Onstick')" style="margin-left:4px ;">&#8722</span></td>
            </tr>
            <tr>
                <td class="itemname">Hot Choco Hazelnut</td>
                <td style="text-align: center;">75</td>
                <td style="text-align: center;font-size: x-large;"><span onclick="addToCart({name:'Hot Choco Hazelnut', price:75})" style="margin-right:2px ;">&#43</span><i class="fa fa-shopping-cart"></i><span onclick="removeFromCart('Hot Choco Hazelnut')" style="margin-left:4px ;">&#8722</span></td>
            </tr>
            <tr>
                <td class="itemname">Brownie Choco Fudge</td>
                <td style="text-align: center;">120</td>
                <td style="text-align: center;font-size: x-large;"><span onclick="addToCart({name:'Brownie Choco Fudge', price:120})" style="margin-right:2px ;">&#43</span><i class="fa fa-shopping-cart"></i><span onclick="removeFromCart('Brownie Choco Fudge')" style="margin-left:4px ;">&#8722</span></td>
            </tr>
            <tr>
                <td class="itemname">Chocolate Tacoo</td>
                <td style="text-align: center;">90</td>
                <td style="text-align: center;font-size: x-large;"><span onclick="addToCart({name:'Chocolate Tacoo', price:90})" style="margin-right:2px ;">&#43</span><i class="fa fa-shopping-cart"></i><span onclick="removeFromCart('Chocolate Tacoo')" style="margin-left:4px ;">&#8722</span></td>
            </tr>
            <tr>
                <td class="itemname">Fresh Fruit Tacoo</td>
                <td style="text-align: center;">100</td>
                <td style="text-align: center;font-size: x-large;"><span onclick="addToCart({name:'Fresh Fruit Tacoo', price:100})" style="margin-right:2px ;">&#43</span><i class="fa fa-shopping-cart"></i><span onclick="removeFromCart('Fresh Fruit Tacoo')" style="margin-left:4px ;">&#8722</span></td>
            </tr>
            <tr>
                <td class="itemname">Fruit Punch</td>
                <td style="text-align: center;">150</td>
                <td style="text-align: center;font-size: x-large;"><span onclick="addToCart({name:'Fruit Punch', price:150})" style="margin-right:2px ;">&#43</span><i class="fa fa-shopping-cart"></i><span onclick="removeFromCart('Fruit Punch')" style="margin-left:4px ;">&#8722</span></td>
            </tr>
            <tr>
                <td class="itemname">Pineapple Sundae</td>
                <td style="text-align: center;">200</td>
                <td style="text-align: center;font-size: x-large;"><span onclick="addToCart({name:'Pineapple Sundae', price:200})" style="margin-right:2px ;">&#43</span><i class="fa fa-shopping-cart"></i><span onclick="removeFromCart('Pineapple Sundae')" style="margin-left:4px ;">&#8722</span></td>
            </tr>
            <tr>
                <td class="itemname">Kinderjoy Ice-cream Roll</td>
                <td style="text-align: center;">130</td>
                <td style="text-align: center;font-size: x-large;"><span onclick="addToCart({name:'Kinderjoy Ice-cream Roll', price:130})" style="margin-right:2px ;">&#43</span><i class="fa fa-shopping-cart"></i><span onclick="removeFromCart('Kinderjoy Ice-cream Roll')" style="margin-left:4px ;">&#8722</span></td>
            </tr>
            <tr>
                <td class="itemname">Bubblegum Ice-cream Roll</td>
                <td style="text-align: center;">130</td>
                <td style="text-align: center;font-size: x-large;"><span onclick="addToCart({name:'Bubblegum Ice-cream Roll', price:130})" style="margin-right:2px ;">&#43</span><i class="fa fa-shopping-cart"></i><span onclick="removeFromCart('Bubblegum Ice-cream Roll')" style="margin-left:4px ;">&#8722</span></td>
            </tr>
            <tr>
                <td class="itemname">Belgian Dark Sundae</td>
                <td style="text-align: center;">160</td>
                <td style="text-align: center;font-size: x-large;"><span onclick="addToCart({name:'Belgian Dark Sundae', price:160})" style="margin-right:2px ;">&#43</span><i class="fa fa-shopping-cart"></i><span onclick="removeFromCart('Belgian Dark Sundae')" style="margin-left:4px ;">&#8722</span></td>
            </tr>
            <tr>
                <td class="itemname">Strawberry Smoothy</td>
                <td style="text-align: center;">80</td>
                <td style="text-align: center;font-size: x-large;"><span onclick="addToCart({name:'Strawberry Smoothy', price:80})" style="margin-right:2px ;">&#43</span><i class="fa fa-shopping-cart"></i><span onclick="removeFromCart('Strawberry Smoothy')" style="margin-left:4px ;">&#8722</span></td>
            </tr>
            <tr>
                <td class="itemname">Mango Smoothy</td>
                <td style="text-align: center;">80</td>
                <td style="text-align: center;font-size: x-large;"><span onclick="addToCart({name:'Mango Smoothy', price:80})" style="margin-right:2px ;">&#43</span><i class="fa fa-shopping-cart"></i><span onclick="removeFromCart('Mango Smoothy')" style="margin-left:4px ;">&#8722</span></td>
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
    include('footer.php');
     ?>
    </body>
</html>