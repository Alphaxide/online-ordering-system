<?php

require('connection.php');


if(isset($_GET['id']))
{

   ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
        <style>
            body{
                
                

            }
            .foodpage{
                width:80%;
                margin-left:5%;
                margin-right:5%;
                padding:5%;
                margin-top:20px;
                box-shadow: 0 5px 10px rgba(0, 0, 0, 0.1);
            }
            .food-details{
                margin-bottom:10px;
                box-shadow: 0 5px 10px rgba(0, 0, 0, 0.1);
                padding-top:10px;
                padding-bottom:10px;

            }
            .food-image{
                border-radius:12px;
                width:150px;
                height:150px;
                margin-left:40px;
                
                

            }
            .food-name{
             
                font-weight:500;
                font-size:30px;
                margin-left:100px;
                
            }
            .food-price{
                
                font-weight:500;
                font-size:20px;
                margin-left:110px;
                
            }
            
            .food-info{
             
             font-weight:500;
             font-size:30px;
             margin-left:70px;
             
         }
        </style>
    </head>
    <body>
    <div class="foodpage">
    <?php
    $foodid= mysqli_real_escape_string($conn, $_GET['id']);
    $query="SELECT * FROM foodmenu where foodname ='$foodid' ";
    $query_run= mysqli_query($conn,$query);

    
    $query2 = "SELECT COUNT(order_name)  FROM order_request WHERE order_name = '$foodid' AND MONTH(datetaken) = MONTH(now()) ";
    $query_run2 = mysqli_query($conn,$query2);

    
    $query3 = "SELECT COUNT(order_name)  FROM order_request WHERE order_name = '$foodid' AND DATE(datetaken) = DATE(now()) ";
    $query_run3 = mysqli_query($conn,$query2);

    
    if(mysqli_num_rows($query_run) > 0)
    {
     $food = mysqli_fetch_array($query_run);
      $price    = $food['foodprice'];

     ?>

     <div class="food-details">
        <div>
            
            <div class="food-image"><?php echo '<img class="food-image" src="data:image/jpeg;base64,'.base64_encode($food['foodimage']).'"/>'; ?></div>
            <div class="food-name"><?= $food['foodname']; ?></div>
            <div class="food-price">Ksh. <?= $food['foodprice']; ?></div>
        </div>
     </div><br>

     <?php

    }
    
    while($row = mysqli_fetch_array($query_run2)){
            
           ?>
           <div class="food-info">
               <div>Total Orders Monthly</div>
               <div><?= $row['COUNT(order_name)']; ?></div>
           </div><br>
           
           <div class="food-info">
               <div>Total Sales Monthly</div>
               <div>Ksh.<?= $price*$row['COUNT(order_name)'] ?></div>
           </div><br><br>
           <?php
        }

    ?>
         <?php
while($row = mysqli_fetch_array($query_run3)){
        
    ?>
    <div class="food-info">
        <div>Total  Order Today</div>
        <div><?= $row['COUNT(order_name)']; ?></div>
    </div><br>
    
    <div class="food-info">
        <div>Total Sales Today</div>
        <div>Ksh.<?= $price*$row['COUNT(order_name)'] ?></div>
    </div>
    <?php
 }
}



?>
    </div>
    </body>
    </html>

    <?php
     

 


?>