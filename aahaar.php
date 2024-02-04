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
    <title>Aahaar</title>
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
            padding-left: 20px;
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
   
    <h1 class="mainhead">Aahaar</h1>
    <div>
        <table>
            <tr style="border-bottom:1px solid white;">
                <th class="tablehead">Items</th>
                <th class="tablehead">Price (in Rs.)</th>
                <th class="tablehead">Add to cart</th>
            </tr>
            <tr>
                <td class="itemname">Culche</td>
                <td style="text-align: center;">25</td>
                <td style="text-align: center;font-size: x-large;"><span onclick="addToCart({name:'Culche', price:25})" style="margin-right:2px ;">&#43</span><i class="fa fa-shopping-cart"></i><span onclick="removeFromCart('Culche')" style="margin-left:4px ;">&#8722</span></td>
            </tr>
            <tr>
                <td class="itemname">Bread Pakoda</td>
                <td style="text-align: center;">12</td>
                <td style="text-align: center;font-size: x-large;"><span onclick="addToCart({name:'Bread Pakoda', price:12})" style="margin-right:2px ;">&#43</span><i class="fa fa-shopping-cart"></i><span onclick="removeFromCart('Bread Pakoda')" style="margin-left:4px ;">&#8722</span></td>
            </tr>
            <tr>
                <td class="itemname">Bread Roll</td>
                <td style="text-align: center;">10</td>
                <td style="text-align: center;font-size: x-large;"><span onclick="addToCart({name:'Bread Roll', price:10})" style="margin-right:2px ;">&#43</span><i class="fa fa-shopping-cart"></i><span onclick="removeFromCart('Bread Roll')" style="margin-left:4px ;">&#8722</span></td>
            </tr>
            <tr>
                <td class="itemname">Macroni</td>
                <td style="text-align: center;">30</td>
                <td style="text-align: center;font-size: x-large;"><span onclick="addToCart({name:'Macroni', price:30})" style="margin-right:2px ;">&#43</span><i class="fa fa-shopping-cart"></i><span onclick="removeFromCart('Macroni')" style="margin-left:4px ;">&#8722</span></td>
            </tr>
            <tr>
                <td class="itemname">Momos</td>
                <td style="text-align: center;">25</td>
                <td style="text-align: center;font-size: x-large;"><span onclick="addToCart({name:'Momos', price:25})" style="margin-right:2px ;">&#43</span><i class="fa fa-shopping-cart"></i><span onclick="removeFromCart('Momos')" style="margin-left:4px ;">&#8722</span></td>
            </tr>
            <tr>
                <td class="itemname">Noodles</td>
                <td style="text-align: center;">25</td>
                <td style="text-align: center;font-size: x-large;"><span onclick="addToCart({name:'Noodles', price:25})" style="margin-right:2px ;">&#43</span><i class="fa fa-shopping-cart"></i><span onclick="removeFromCart('Noodles')" style="margin-left:4px ;">&#8722</span></td>
            </tr>
            <tr>
                <td class="itemname">Maggi</td>
                <td style="text-align: center;">25</td>
                <td style="text-align: center;font-size: x-large;"><span onclick="addToCart({name:'Maggi', price:25})" style="margin-right:2px ;">&#43</span><i class="fa fa-shopping-cart"></i><span onclick="removeFromCart('Maggi')" style="margin-left:4px ;">&#8722</span></td>
            </tr>
            <tr>
                <td class="itemname">Poha</td>
                <td style="text-align: center;">30</td>
                <td style="text-align: center;font-size: x-large;"><span onclick="addToCart({name:'Poha', price:30})" style="margin-right:2px ;">&#43</span><i class="fa fa-shopping-cart"></i><span onclick="removeFromCart('Poha')" style="margin-left:4px ;">&#8722</span></td>
            </tr>
            <tr>
                <td class="itemname">Spring Roll</td>
                <td style="text-align: center;">25</td>
                <td style="text-align: center;font-size: x-large;"><span onclick="addToCart({name:'Spring Roll', price:25})" style="margin-right:2px ;">&#43</span><i class="fa fa-shopping-cart"></i><span onclick="removeFromCart('Spring Roll')" style="margin-left:4px ;">&#8722</span></td>
            </tr>
            <tr>
                <td class="itemname">Bhel Puri</td>
                <td style="text-align: center;">25</td>
                <td style="text-align: center;font-size: x-large;"><span onclick="addToCart({name:'Bhel Puri', price:25})" style="margin-right:2px ;">&#43</span><i class="fa fa-shopping-cart"></i><span onclick="removeFromCart('Bhel Puri')" style="margin-left:4px ;">&#8722</span></td>
            </tr>
            <tr>
                <td class="itemname">Aloo Tikki</td>
                <td style="text-align: center;">30</td>
                <td style="text-align: center;font-size: x-large;"><span onclick="addToCart({name:'Aloo Tikki', price:30})" style="margin-right:2px ;">&#43</span><i class="fa fa-shopping-cart"></i><span onclick="removeFromCart('Aloo Tikki')" style="margin-left:4px ;">&#8722</span></td>
            </tr>
            <tr>
                <td class="itemname">Dahi Vada</td>
                <td style="text-align: center;">30</td>
                <td style="text-align: center;font-size: x-large;"><span onclick="addToCart({name:'Dahi Vada', price:30})" style="margin-right:2px ;">&#43</span><i class="fa fa-shopping-cart"></i><span onclick="removeFromCart('Dahi Vada')" style="margin-left:4px ;">&#8722</span></td>
            </tr>
            <tr>
                <td class="itemname">Aloo Paratha</td>
                <td style="text-align: center;">25</td>
                <td style="text-align: center;font-size: x-large;"><span onclick="addToCart({name:'Aloo Paratha', price:25})" style="margin-right:2px ;">&#43</span><i class="fa fa-shopping-cart"></i><span onclick="removeFromCart('Aloo Paratha')" style="margin-left:4px ;">&#8722</span></td>
            </tr>
            <tr>
                <td class="itemname">Lunch Plate</td>
                <td style="text-align: center;">60</td>
                <td style="text-align: center;font-size: x-large;"><span onclick="addToCart({name:'Lunch Plate', price:60})" style="margin-right:2px ;">&#43</span><i class="fa fa-shopping-cart"></i><span onclick="removeFromCart('Lunch Plate')" style="margin-left:4px ;">&#8722</span></td>
            </tr>
            <tr>
                <td class="itemname">Cold Drinks</td>
                <td style="text-align: center;">20</td>
                <td style="text-align: center;font-size: x-large;"><span onclick="addToCart({name:'Cold Drinks', price:20})" style="margin-right:2px ;">&#43</span><i class="fa fa-shopping-cart"></i><span onclick="removeFromCart('Cold Drinks')" style="margin-left:4px ;">&#8722</span></td>
            </tr>
            <tr>
                <td class="itemname">Flavoured Shake</td>
                <td style="text-align: center;">35</td>
                <td style="text-align: center;font-size: x-large;"><span onclick="addToCart({name:'Flavoured Shake', price:35})" style="margin-right:2px ;">&#43</span><i class="fa fa-shopping-cart"></i><span onclick="removeFromCart('Flavoured Shake')" style="margin-left:4px ;">&#8722</span></td>
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