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
    <title>Jaggi Shop 2</title>
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
    
    <h1 class="mainhead">Juice and Shake bar</h1>
    <div>
    <table>
        <tr style="border-bottom:1px solid white;">
            <th class="tablehead">Items</th>
            <th class="tablehead">Price for 400 ml (in Rs.)</th>
            <th class="tablehead">Add to cart</th>
        </tr>
        <tr>
            <td class="itemname">Strawberry Shake</td>
            <td style="text-align: center;">30</td>
            <td style="text-align: center;font-size: x-large;"><span onclick="addToCart({name:'Strawberry Shake', price:30})" style="margin-right:2px ;">&#43</span><i class="fa fa-shopping-cart"></i><span onclick="removeFromCart('Strawberry Shake')" style="margin-left:4px ;">&#8722</span></td>
        </tr>
        <tr>
            <td class="itemname">Chocolate Shake</td>
            <td style="text-align: center;">30</td>
            <td style="text-align: center;font-size: x-large;"><span onclick="addToCart({name:'Chocolate Shake', price:30})" style="margin-right:2px ;">&#43</span><i class="fa fa-shopping-cart"></i><span onclick="removeFromCart('Chocolate Shake')" style="margin-left:4px ;">&#8722</span></td>
        </tr>
        <tr>
            <td class="itemname">Badam Shake</td>
            <td style="text-align: center;">30</td>
            <td style="text-align: center;font-size: x-large;"><span onclick="addToCart({name:'Badam Shake', price:30})" style="margin-right:2px ;">&#43</span><i class="fa fa-shopping-cart"></i><span onclick="removeFromCart('Badam Shake')" style="margin-left:4px ;">&#8722</span></td>
        </tr>
        <tr>
            <td class="itemname">Apple Shake</td>
            <td style="text-align: center;">30</td>
            <td style="text-align: center;font-size: x-large;"><span onclick="addToCart({name:'Apple Shake', price:30})" style="margin-right:2px ;">&#43</span><i class="fa fa-shopping-cart"></i><span onclick="removeFromCart('Apple Shake')" style="margin-left:4px ;">&#8722</span></td>
        </tr>
        <tr>
            <td class="itemname">Pineapple Shake</td>
            <td style="text-align: center;">30</td>
            <td style="text-align: center;font-size: x-large;"><span onclick="addToCart({name:'Pineapple Shake', price:30})" style="margin-right:2px ;">&#43</span><i class="fa fa-shopping-cart"></i><span onclick="removeFromCart('Pineapple Shake')" style="margin-left:4px ;">&#8722</span></td>
        </tr>
        <tr>
            <td class="itemname">Papaya Shake</td>
            <td style="text-align: center;">30</td>
            <td style="text-align: center;font-size: x-large;"><span onclick="addToCart({name:'Papaya Shake', price:30})" style="margin-right:2px ;">&#43</span><i class="fa fa-shopping-cart"></i><span onclick="removeFromCart('Papaya Shake')" style="margin-left:4px ;">&#8722</span></td>
        </tr>
        <tr>
            <td class="itemname">Banana Shake</td>
            <td style="text-align: center;">30</td>
            <td style="text-align: center;font-size: x-large;"><span onclick="addToCart({name:'Banana Shake', price:30})" style="margin-right:2px ;">&#43</span><i class="fa fa-shopping-cart"></i><span onclick="removeFromCart('Banana Shake')" style="margin-left:4px ;">&#8722</span></td>
        </tr>
        <tr>
            <td class="itemname">Mango Shake</td>
            <td style="text-align: center;">30</td>
            <td style="text-align: center;font-size: x-large;"><span onclick="addToCart({name:'Mango Shake', price:30})" style="margin-right:2px ;">&#43</span><i class="fa fa-shopping-cart"></i><span onclick="removeFromCart('Mango Shake')" style="margin-left:4px ;">&#8722</span></td>
        </tr>
        <tr>
            <td class="itemname">Chiku Shake</td>
            <td style="text-align: center;">30</td>
            <td style="text-align: center;font-size: x-large;"><span onclick="addToCart({name:'Chiku Shake', price:30})" style="margin-right:2px ;">&#43</span><i class="fa fa-shopping-cart"></i><span onclick="removeFromCart('Chiku Shake')" style="margin-left:4px ;">&#8722</span></td>
        </tr>
        <tr>
            <td class="itemname">Butterschotch Shake</td>
            <td style="text-align: center;">30</td>
            <td style="text-align: center;font-size: x-large;"><span onclick="addToCart({name:'Butterschotch Shake', price:30})" style="margin-right:2px ;">&#43</span><i class="fa fa-shopping-cart"></i><span onclick="removeFromCart('Butterschotch Shake')" style="margin-left:4px ;">&#8722</span></td>
        </tr>
        <tr>
            <td class="itemname">Vanilla Shake</td>
            <td style="text-align: center;">30</td>
            <td style="text-align: center;font-size: x-large;"><span onclick="addToCart({name:'Vanilla Shake', price:30})" style="margin-right:2px ;">&#43</span><i class="fa fa-shopping-cart"></i><span onclick="removeFromCart('Vanilla Shake')" style="margin-left:4px ;">&#8722</span></td>
        </tr>
        <tr>
            <td class="itemname">Mousami Juice</td>
            <td style="text-align: center;">40</td>
            <td style="text-align: center;font-size: x-large;"><span onclick="addToCart({name:'Mousami Juice', price:40})" style="margin-right:2px ;">&#43</span><i class="fa fa-shopping-cart"></i><span onclick="removeFromCart('Mousami Juice')" style="margin-left:4px ;">&#8722</span></td>
        </tr>
        <tr>
            <td class="itemname">Orange Juice</td>
            <td style="text-align: center;">30</td>
            <td style="text-align: center;font-size: x-large;"><span onclick="addToCart({name:'Orange Juice', price:30})" style="margin-right:2px ;">&#43</span><i class="fa fa-shopping-cart"></i><span onclick="removeFromCart('Orange Juice')" style="margin-left:4px ;">&#8722</span></td>
        </tr>
        <tr>
            <td class="itemname">Pineapple Juice</td>
            <td style="text-align: center;">30</td>
            <td style="text-align: center;font-size: x-large;"><span onclick="addToCart({name:'Pineapple Juice', price:30})" style="margin-right:2px ;">&#43</span><i class="fa fa-shopping-cart"></i><span onclick="removeFromCart('Pineapple Juice')" style="margin-left:4px ;">&#8722</span></td>
        </tr>
        <tr>
            <td class="itemname">Mix Juice</td>
            <td style="text-align: center;">40</td>
            <td style="text-align: center;font-size: x-large;"><span onclick="addToCart({name:'Mix Juice', price:40})" style="margin-right:2px ;">&#43</span><i class="fa fa-shopping-cart"></i><span onclick="removeFromCart('Mix Juice')" style="margin-left:4px ;">&#8722</span></td>
        </tr>
        <tr>
            <td class="itemname">Annar Juice</td>
            <td style="text-align: center;">80</td>
            <td style="text-align: center;font-size: x-large;"><span onclick="addToCart({name:'Annar Juice', price:80})" style="margin-right:2px ;">&#43</span><i class="fa fa-shopping-cart"></i><span onclick="removeFromCart('Annar Juice')" style="margin-left:4px ;">&#8722</span></td>
        </tr>
        <tr>
            <td class="itemname">Carrot Juice</td>
            <td style="text-align: center;">20</td>
            <td style="text-align: center;font-size: x-large;"><span onclick="addToCart({name:'Carrot Juice', price:20})" style="margin-right:2px ;">&#43</span><i class="fa fa-shopping-cart"></i><span onclick="removeFromCart('Carrot Juice')" style="margin-left:4px ;">&#8722</span></td>
        </tr>
        <tr>
            <td class="itemname">Lemon Water</td>
            <td style="text-align: center;">20</td>
            <td style="text-align: center;font-size: x-large;"><span onclick="addToCart({name:'Lemon Water', price:20})" style="margin-right:2px ;">&#43</span><i class="fa fa-shopping-cart"></i><span onclick="removeFromCart('Lemon Water')" style="margin-left:4px ;">&#8722</span></td>
        </tr>
        <tr>
            <td class="itemname">Sugarcane Juice</td>
            <td style="text-align: center;">30</td>
            <td style="text-align: center;font-size: x-large;"><span onclick="addToCart({name:'Sugarcane Juice', price:30})" style="margin-right:2px ;">&#43</span><i class="fa fa-shopping-cart"></i><span onclick="removeFromCart('Sugarcane Juice')" style="margin-left:4px ;">&#8722</span></td>
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