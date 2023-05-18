<?php

require('connection.php');

session_start();



$con = mysqli_connect("localhost","root","","eorder");

if($_SERVER["REQUEST_METHOD"] =="POST")
{
    if(isset($_POST['order']))
    {
        $name = mysqli_real_escape_string($conn,$_POST['name']);
        $phone = mysqli_real_escape_string($conn,$_POST['phone']);
        $adress = mysqli_real_escape_string($conn,$_POST['adress']);
        $total = mysqli_real_escape_string($conn,$_POST['total']);
        
        $query1 =("INSERT INTO ordermanager ( full_name, phone_no, address, amount,datetaken) VALUES ('$name','$phone','$adress','$total','".date("Y-m-d H:i:s")."')");
        $query_run = mysqli_query($conn,$query1);

        $order_id = mysqli_insert_id($conn);

        $query3 ="INSERT INTO pre_orders ( order_id,full_name, phone_no, adress) VALUES ('$order_id','$name','$phone','$adress')" ;
        $query_run = mysqli_query($conn,$query3);

       $ifset = "your order has been taken";

         
        if($query_run)
        {
           
            $stmt = $con->prepare("INSERT INTO `order_request`( `order_name`, `price`, `quantity`, `order_id` ) VALUES (?,?,?,? )  ");
            
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

            
        $query4= "UPDATE order_request SET datetaken= '".date("Y-m-d H:i:s")."' WHERE order_id='$order_id'";
        $query_run4 = mysqli_query($conn,$query4);
        }
        header("Location: menudrink.php");
        exit();
}
}