<?php

require('connection.php');



//$userid = mysqli_real_escape_string($conn,$_POST["id"]);
//$password = mysqli_real_escape_string($conn, $_POST["password"]);
//$res = mysqli_query($conn, "SELECT * FROM staff where id='$userid' AND password='$password'");
//$row = mysqli_fetch_assoc($res);

?>

<?php



?>
   <?php


require('connection.php');


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cheff</title>
    <style>
        body{
            padding-left:10%;
            padding-right:10%;
        }
        .orders{
            display:block;

        }
        .takeform{
            display:none;
            width: 100%;
            height:100%;
        }
        .order-list{
            float:center;
            width:auto;
            margin-bottom:20px;
            font-size:20px;
            border-radius:0px;
            box-shadow: 0 5px 10px rgba(0, 0, 0, 0.1);
            justify-content:center;
            align-items:center;
            padding-top: 20px;
            padding-left: 20%;
            padding-bottom: 20px;
        }
        .ordername{
            margin-left:20px;
            font-weight:bold;

        }
        
        .details{
            margin-left:20px;

        }
        .taker{
            width:250px;
            height:50px;
            font-size: 20px;
            border-radius: 0px;
            background-color: #1c2132;
            color:white;
            margin-left:20px;
            margin-right:20px;
            margin-top:20px;
            border:none;
        }


    </style>
</head>
<body>
    <div>
        <div >
            
        <?php

         $query1 =  "SELECT * FROM kitchen ";
         $query_run = mysqli_query($conn,$query1);
    foreach($query_run as $preorder)
    {
            ?>
        <div class="order-list">
          <div class="details">
          <?= $preorder['order_id']; ?>
          </div> 
               <form action="prepare.php" method="POST">
                   <input type="hidden" value="<?= $preorder['order_id'] ?>" name="orderid">
                  <div>
                    <button type="submit" name="prepare" class="taker">TAKE ORDER</button>
                  </div>
               </form>
            </div>
        </div>
        </div>


        <?php 
    }

?>
        </div>
    </div>
    <script >

        var btn = document.getElementById("taker");

        var order = document.getElementById("order");

        var confirm = document.getElementById("orderplace");

        btn.onclick= function(){
            confirm.style.display = "block";
            order.style.display = "none";
        }

    </script>
</body>
</html>


                  
    <?php


    ?>

<?php


?>
