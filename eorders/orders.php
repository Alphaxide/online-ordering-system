<?php

require('connection.php');

if(isset($_POST['orderview'])){


$userid = mysqli_real_escape_string($conn,$_POST["id"]);
$password = mysqli_real_escape_string($conn, $_POST["password"]);
$res = mysqli_query($conn, "SELECT * FROM staff where id='$userid' AND password='$password'");
$row = mysqli_fetch_assoc($res);

?>

<?php

 if(($row['type'] == 'waiter') && ($row['id'] == $userid)) {

    ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Orders</title>
        <style>
            .payment-place{
                padding:20px;
                width:80%;
                margin-left:10%;
                margin-right:10%;
                box-shadow: 0 5px 10px rgba(0, 0, 0, 0.1);
            }
            .payment-container{
                margin-left:0px;
                font-size:20px;
                width:50%;
                margin-left:10%;
                margin-right:10%;
                margin-bottom:20px;
                padding:15px;
                box-shadow: 0 5px 10px rgba(0, 0, 0, 0.1);


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
        <div class="payment-place">

        <?php



        $query="SELECT * FROM ordermanager WHERE waiter_id = '$userid'";
        $query_run = mysqli_query($conn,$query);

        foreach($query_run as $payment){
            ?>

            <div class="payment-container">
                <div>
                    <div><?= $payment['full_name']; ?></div>
                </div>
                
                <div>
                    <div>ORDER:  <?= $payment['order_id']; ?></div>
                </div>
                
                <div>
                    <div>KSH.  <?= $payment['amount']; ?></div>
                </div>

                <form action="insert.php" method="POST">
                    <input type="hidden" value="<?= $payment['order_id']; ?>" name="orderid">
                    <button type="submit" name="orderview" class="taker"> VIEW</button>
                </form>
            </div>

            <?php
        }

        ?>
       </div>
        </div>
    </body>
    </html>


    <?php
 }else{
    header('Location: myorders.php');
    exit();
 }
} else{
    header('Location: staffdashboard.php');
    exit();
}

    
    ?>

<?php


?>