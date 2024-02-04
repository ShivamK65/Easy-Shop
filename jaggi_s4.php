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
    <title>Jaggi Shop 4</title>
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
    
    <h1 class="mainhead">Main Cafeteria</h1>
    <div>
    <table>
        <tr style="border-bottom:1px solid white;">
            <th class="tablehead">Items</th>
            <th class="tablehead">Price (in Rs.)</th>
            <th class="tablehead">Add to cart</th>
        </tr>
        <tr>
            <td class="itemname">Paneer Grill Sandwich</td>
            <td style="text-align: center;">45</td>
            <td style="text-align: center;font-size: x-large;"><span onclick="addToCart({name:'Paneer Grill Sandwich', price:45})" style="margin-right:2px ;">&#43</span><i class="fa fa-shopping-cart"></i><span onclick="removeFromCart('Paneer Grill Sandwich')" style="margin-left:4px ;">&#8722</span></td>
        </tr>
        <tr>
            <td class="itemname">Cheese Grill Sandwich</td>
            <td style="text-align: center;">35</td>
            <td style="text-align: center;font-size: x-large;"><span onclick="addToCart({name:'Cheese Grill Sandwich', price:35})" style="margin-right:2px ;">&#43</span><i class="fa fa-shopping-cart"></i><span onclick="removeFromCart('Cheese Grill Sandwich')" style="margin-left:4px ;">&#8722</span></td>
        </tr>
        <tr>
            <td class="itemname">Bread Pakoda</td>
            <td style="text-align: center;">15</td>
            <td style="text-align: center;font-size: x-large;"><span onclick="addToCart({name:'Bread Pakoda', price:15})" style="margin-right:2px ;">&#43</span><i class="fa fa-shopping-cart"></i><span onclick="removeFromCart('Bread Pakoda')" style="margin-left:4px ;">&#8722</span></td>
        </tr>
        <tr>
            <td class="itemname">Paneer Pattie</td>
            <td style="text-align: center;">20</td>
            <td style="text-align: center;font-size: x-large;"><span onclick="addToCart({name:'Paneer Pattie', price:20})" style="margin-right:2px ;">&#43</span><i class="fa fa-shopping-cart"></i><span onclick="removeFromCart('Paneer Pattie')" style="margin-left:4px ;">&#8722</span></td>
        </tr>
        <tr>
            <td class="itemname">Aloo Pattie</td>
            <td style="text-align: center;">15</td>
            <td style="text-align: center;font-size: x-large;"><span onclick="addToCart({name:'Aloo Pattie', price:15})" style="margin-right:2px ;">&#43</span><i class="fa fa-shopping-cart"></i><span onclick="removeFromCart('Aloo Pattie')" style="margin-left:4px ;">&#8722</span></td>
        </tr>
        <tr>
            <td class="itemname">Chole Samosa</td>
            <td style="text-align: center;">30</td>
            <td style="text-align: center;font-size: x-large;"><span onclick="addToCart({name:'Chole Samosa', price:30})" style="margin-right:2px ;">&#43</span><i class="fa fa-shopping-cart"></i><span onclick="removeFromCart('Chole Samosa')" style="margin-left:4px ;">&#8722</span></td>
        </tr>
        <tr>
            <td class="itemname">Samosa</td>
            <td style="text-align: center;">10</td>
            <td style="text-align: center;font-size: x-large;"><span onclick="addToCart({name:'Samosa', price:10})" style="margin-right:2px ;">&#43</span><i class="fa fa-shopping-cart"></i><span onclick="removeFromCart('Samosa')" style="margin-left:4px ;">&#8722</span></td>
        </tr>
        <tr>
            <td class="itemname">Dhokla</td>
            <td style="text-align: center;">20</td>
            <td style="text-align: center;font-size: x-large;"><span onclick="addToCart({name:'Dhokla', price:20})" style="margin-right:2px ;">&#43</span><i class="fa fa-shopping-cart"></i><span onclick="removeFromCart('Dhokla')" style="margin-left:4px ;">&#8722</span></td>
        </tr>
        <tr>
            <td class="itemname">Hakka Noodles</td>
            <td style="text-align: center;">30</td>
            <td style="text-align: center;font-size: x-large;"><span onclick="addToCart({name:'Hakka Noodles', price:30})" style="margin-right:2px ;">&#43</span><i class="fa fa-shopping-cart"></i><span onclick="removeFromCart('Hakka Noodles')" style="margin-left:4px ;">&#8722</span></td>
        </tr>
        <tr>
            <td class="itemname">Veg. Noodles</td>
            <td style="text-align: center;">40</td>
            <td style="text-align: center;font-size: x-large;"><span onclick="addToCart({name:'Veg. Noodles', price:40})" style="margin-right:2px ;">&#43</span><i class="fa fa-shopping-cart"></i><span onclick="removeFromCart('Veg. Noodles')" style="margin-left:4px ;">&#8722</span></td>
        </tr>
        <tr>
            <td class="itemname">Poha</td>
            <td style="text-align: center;">20</td>
            <td style="text-align: center;font-size: x-large;"><span onclick="addToCart({name:'Poha', price:20})" style="margin-right:2px ;">&#43</span><i class="fa fa-shopping-cart"></i><span onclick="removeFromCart('Poha')" style="margin-left:4px ;">&#8722</span></td>
        </tr>
        <tr>
            <td class="itemname">Spring Rolls</td>
            <td style="text-align: center;">45</td>
            <td style="text-align: center;font-size: x-large;"><span onclick="addToCart({name:'Spring Rolls', price:45})" style="margin-right:2px ;">&#43</span><i class="fa fa-shopping-cart"></i><span onclick="removeFromCart('Spring Rolls')" style="margin-left:4px ;">&#8722</span></td>
        </tr>
        <tr>
            <td class="itemname">Cheese Chilli Toast</td>
            <td style="text-align: center;">45</td>
            <td style="text-align: center;font-size: x-large;"><span onclick="addToCart({name:'Cheese Chilli Toast', price:45})" style="margin-right:2px ;">&#43</span><i class="fa fa-shopping-cart"></i><span onclick="removeFromCart('Cheese Chilli Toast')" style="margin-left:4px ;">&#8722</span></td>
        </tr>
        <tr>
            <td class="itemname">Paneer Kathi Roll</td>
            <td style="text-align: center;">45</td>
            <td style="text-align: center;font-size: x-large;"><span onclick="addToCart({name:'Paneer Kathi Roll', price:45})" style="margin-right:2px ;">&#43</span><i class="fa fa-shopping-cart"></i><span onclick="removeFromCart('Paneer Kathi Roll')" style="margin-left:4px ;">&#8722</span></td>
        </tr>
        <tr>
            <td class="itemname">Egg Kathi Roll</td>
            <td style="text-align: center;">40</td>
            <td style="text-align: center;font-size: x-large;"><span onclick="addToCart({name:'Egg Kathi Roll', price:40})" style="margin-right:2px ;">&#43</span><i class="fa fa-shopping-cart"></i><span onclick="removeFromCart('Egg Kathi Roll')" style="margin-left:4px ;">&#8722</span></td>
        </tr>
        <tr>
            <td class="itemname">Amritsari Naan Chole</td>
            <td style="text-align: center;">40</td>
            <td style="text-align: center;font-size: x-large;"><span onclick="addToCart({name:'Amritsari Naan Chole', price:40})" style="margin-right:2px ;">&#43</span><i class="fa fa-shopping-cart"></i><span onclick="removeFromCart('Amritsari Naan Chole')" style="margin-left:4px ;">&#8722</span></td>
        </tr>
        <tr>
            <td class="itemname">Chole Bhature</td>
            <td style="text-align: center;">50</td>
            <td style="text-align: center;font-size: x-large;"><span onclick="addToCart({name:'Chole Bhature', price:50})" style="margin-right:2px ;">&#43</span><i class="fa fa-shopping-cart"></i><span onclick="removeFromCart('Chole Bhature')" style="margin-left:4px ;">&#8722</span></td>
        </tr>
        <tr>
            <td class="itemname">Paneer Paratha</td>
            <td style="text-align: center;">30</td>
            <td style="text-align: center;font-size: x-large;"><span onclick="addToCart({name:'Paneer Paratha', price:30})" style="margin-right:2px ;">&#43</span><i class="fa fa-shopping-cart"></i><span onclick="removeFromCart('Paneer Paratha')" style="margin-left:4px ;">&#8722</span></td>
        </tr>
        <tr>
            <td class="itemname">Aloo Paratha</td>
            <td style="text-align: center;">20</td>
            <td style="text-align: center;font-size: x-large;"><span onclick="addToCart({name:'Aloo Paratha', price:20})" style="margin-right:2px ;">&#43</span><i class="fa fa-shopping-cart"></i><span onclick="removeFromCart('Aloo Paratha')" style="margin-left:4px ;">&#8722</span></td>
        </tr>
        <tr>
            <td class="itemname">Rajma Rice</td>
            <td style="text-align: center;">50</td>
            <td style="text-align: center;font-size: x-large;"><span onclick="addToCart({name:'Rajma Rice', price:50})" style="margin-right:2px ;">&#43</span><i class="fa fa-shopping-cart"></i><span onclick="removeFromCart('Rajma Rice')" style="margin-left:4px ;">&#8722</span></td>
        </tr>
        <tr>
            <td class="itemname">Standard Thali</td>
            <td style="text-align: center;">70</td>
            <td style="text-align: center;font-size: x-large;"><span onclick="addToCart({name:'Standard Thali', price:70})" style="margin-right:2px ;">&#43</span><i class="fa fa-shopping-cart"></i><span onclick="removeFromCart('Standard Thali')" style="margin-left:4px ;">&#8722</span></td>
        </tr>
        <tr>
            <td class="itemname">Special Thali</td>
            <td style="text-align: center;">120</td>
            <td style="text-align: center;font-size: x-large;"><span onclick="addToCart({name:'Special Thali', price:120})" style="margin-right:2px ;">&#43</span><i class="fa fa-shopping-cart"></i><span onclick="removeFromCart('Special Thali')" style="margin-left:4px ;">&#8722</span></td>
        </tr>
        <tr>
            <td class="itemname">Strawberry Cake</td>
            <td style="text-align: center;">225</td>
            <td style="text-align: center;font-size: x-large;"><span onclick="addToCart({name:'Strawberry Cake', price:225})" style="margin-right:2px ;">&#43</span><i class="fa fa-shopping-cart"></i><span onclick="removeFromCart('Strawberry Cake')" style="margin-left:4px ;">&#8722</span></td>
        </tr>
        <tr>
            <td class="itemname">Black Forest Cake</td>
            <td style="text-align: center;">250</td>
            <td style="text-align: center;font-size: x-large;"><span onclick="addToCart({name:'Black Forest Cake', price:250})" style="margin-right:2px ;">&#43</span><i class="fa fa-shopping-cart"></i><span onclick="removeFromCart('Black Forest Cake')" style="margin-left:4px ;">&#8722</span></td>
        </tr>
        <tr>
            <td class="itemname">Pineapple Cake</td>
            <td style="text-align: center;">225</td>
            <td style="text-align: center;font-size: x-large;"><span onclick="addToCart({name:'Pineapple Cake', price:225})" style="margin-right:2px ;">&#43</span><i class="fa fa-shopping-cart"></i><span onclick="removeFromCart('Pineapple Cake')" style="margin-left:4px ;">&#8722</span></td>
        </tr>
        <tr>
            <td class="itemname">Brownie</td>
            <td style="text-align: center;">20</td>
            <td style="text-align: center;font-size: x-large;"><span onclick="addToCart({name:'Brownie', price:20})" style="margin-right:2px ;">&#43</span><i class="fa fa-shopping-cart"></i><span onclick="removeFromCart('Brownie')" style="margin-left:4px ;">&#8722</span></td>
        </tr>
        <tr>
            <td class="itemname">Butterschotch Pastry</td>
            <td style="text-align: center;">20</td>
            <td style="text-align: center;font-size: x-large;"><span onclick="addToCart({name:'Butterschotch Pastry', price:20})" style="margin-right:2px ;">&#43</span><i class="fa fa-shopping-cart"></i><span onclick="removeFromCart('Butterschotch Pastry')" style="margin-left:4px ;">&#8722</span></td>
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