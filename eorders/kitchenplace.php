<?php

require('connection.php');

if(isset($_POST['kitchen'])){


$userid = mysqli_real_escape_string($conn,$_POST["id"]);
$password = mysqli_real_escape_string($conn, $_POST["password"]);
$res = mysqli_query($conn, "SELECT * FROM staff where id='$userid' AND password='$password'");
$row = mysqli_fetch_assoc($res);

?>



<?php

 if(($row['type'] == 'cheff') && ($row['id'] == $userid)) {

    $orderid = mysqli_real_escape_string($conn,$_POST['orderid']);

    $status = "prepared";


    $delete = " DELETE FROM kitchen WHERE order_id='$orderid' ";
    $querydelete = mysqli_query($conn,$delete);

    $query4= "UPDATE ordermanager SET cheff_id='$userid' WHERE order_id='$orderid'";
    $query_run = mysqli_query($conn,$query4);

    $query4= "UPDATE ordermanager SET status='$status' WHERE order_id='$orderid'";
    $query_run = mysqli_query($conn,$query4);

     ?>
     <div><?=$orderid ?></div>

  

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title></title>
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
        background-color: black;
        color:white;
        margin-left:20px;
        margin-right:20px;
        margin-top:20px;
    }
    .form{
        width:50%;
        height:100px;
        margin-left:10%;
        margin-top:10px;

    }
    .time{
        margin-left:20px;
        width:200px;
        height:60px;
        font-size:25px;
    }
    .time-label{
        font-size:30px;
    }
    .logbtn{
        background-color: #1c2132;
        color:white;
        width:100px;
        height:30px;
        padding:20px;
        margin-top:30px;
        text-decoration:none;
        color:white;
        font-size:30px;
    }
    


</style>
</head>
<body>
<div>
    <div >
        
    <?php

   

     $query1 =  "SELECT * FROM order_request WHERE order_id ='$orderid' ";
     $query_run = mysqli_query($conn,$query1);
foreach($query_run as $preorder)
{
        ?>
    <div class="order-list">
    <div id="fooddisplay" >
        <div class="ordername">
             <?= $preorder['order_name']; ?>
       </div>
      <div class="details">
         <?= $preorder['quantity']; ?>
      </div> 
      <div class="details">
      <?= $preorder['order_id']; ?>
      </div> 
        </div>
    </div>
    </div>


    <?php 
}

?>
    <?php



$query1 =  "SELECT * FROM ordermanager WHERE order_id ='$orderid' ";
$query_run = mysqli_query($conn,$query1);
foreach($query_run as $reorder)
{
?>
<div class="order-list">
<div id="fooddisplay" >
<div class="ordername">
     <?= $reorder['waiter_id']; ?>
</div>

</div>
</div>
</div>


<?php 
}

?>
    </div><br><br><br>
    <div>
        <a  class="logbtn" href="kitchen.php">
        OK
        </a>
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


    }
    else{
        
        header("Location: staffdashboard.php");
        exit();
    }


}
?>