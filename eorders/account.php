<?php

require('connection.php');

if(isset($_POST['account'])){


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
        <title>Account</title>
        <style>
            .details-place{
                margin-left:10%;
                margin-right:10%;
                width:80%;
                padding-left:10%;
            }
            .staff-details{
                margin-bottom:10px;
                padding-left:10px;

            }
            .detail-header{
                font-weight:bold;
                font-size:20px;

            }
            .details{
                font-size:17px;
            }
        </style>
    </head>
    <body>
        <div class="details-place">
            <div>
                <img src="download (1).png" alt="">
            </div>
            <div class="staff-details">
                <div class="detail-header">NAME:</div>
                <div class="details"> <?= $row['name'] ?></div>
            </div>
            <div class="staff-details">
                <div class="detail-header">NATIONAL ID</div>
                <div class="details"><?= $row['national_id'] ?></div>
            </div>
            
            <div class="staff-details">
                <div class="detail-header">STAFF ID</div>
                <div class="details"><?= $row['id'] ?></div>
            </div>
            
            <div class="staff-details">
                <div class="detail-header">PHONE NO.</div>
                <div class="details"><?= $row['phone_no'] ?></div>
            </div>
            
            <div class="staff-details">
                <div class="detail-header">TOTAL ORDERS</div>
                <div class="details">
                <?php

                $id = $row['id'];

                  $query = "SELECT COUNT(order_id)  FROM ordermanager WHERE waiter_id = '$id' ";
                  $result = $conn->query($query);
                  while($row = mysqli_fetch_array($result)){

                  ?>

                  <div><?= $row['COUNT(order_id)']; ?></div>

                 <?php
                  }

    ?> </div>
            </div>
        </div>
    </body>
    </html>


    <?php


    }elseif(($row['type'] == 'manager') && ($row['id'] == $userid)){
        header("Location: adminlogin.php");
        exit();
    }elseif(($row['type'] == 'cheff') && ($row['id'] == $userid)){
        
        header("Location: kitchen.php");
        exit();
    }else{
          
        header("Location: staffdashboard.php");
        exit();
    }

}

?>