<?php

require('deteb.php');

if(isset($_POST['waiter'])){
    
session_start();

$userid = mysqli_real_escape_string($con,$_POST["staffid"]);
$password = mysqli_real_escape_string($con, $_POST["password"]);
$res = mysqli_query($con, "SELECT * FROM staff where id='$userid' AND password='$password'");
$row = mysqli_fetch_assoc($res);

?>

<?php

 if(($row['type'] == 'waiter') && ($row['id'] == $userid)) {
    ?><?php


    
    $phone = mysqli_real_escape_string($con,$_POST['phone']);
    $adress = mysqli_real_escape_string($con,$_POST['adress']);

    $query1 ="INSERT INTO ordermanager (  phone_no, address,waiter_id) VALUES ('$phone','$adress', '$userid')" ;
    $query_run = mysqli_query($con,$query1);

    $order_id = mysqli_insert_id($con);

    
    
    $query = "INSERT INTO orders_taken (order_id,waiterid) VALUES ('$order_id','$userid')";
    $query_run = mysqli_query($con,$query);
    
    $query2 = "INSERT INTO kitchen (order_id,waiter) VALUES ('$order_id','$userid')";
    $query_run2 = mysqli_query($con,$query2);
     
    if($query_run)
    {
       
        $stmt = $con->prepare("INSERT INTO `order_request`( `order_name`, `price`, `quantity`, `order_id` ) VALUES (?,?,?,?)  ");
        
        if($stmt){
            $stmt->bind_param("sssi", $item_name,$price,$quantity,$order_id );
            
            
            foreach($_SESSION['shopping_cart'] as $key => $values){
                $item_name = $values['foodname'];
                $price = $values['foodprice'];
                $quantity = $values['quantity'];
                
                mysqli_stmt_execute($stmt);

                unset($_SESSION["shopping_cart"]);

                
            }



        }

       
        header("Location: staffdashboard.php");
        exit();

    }

    if($query_run2){
        ?>
        hello kitchen

        <?
    }




    if($query_run){
        ?>

        <div>
            hello
        </div>

        <?php
    }



    else{
        ?>

        <div>error</div>

        <?php
    }




 }

}

?>

