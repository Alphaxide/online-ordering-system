<?php

require('connection.php');

if(isset($_POST['register']))
{
    $name = mysqli_real_escape_string($conn,$_POST['name']);
    $idno = mysqli_real_escape_string($conn,$_POST['idno']);
    $staffid = mysqli_real_escape_string($conn,$_POST['staffid']);
    $phone = mysqli_real_escape_string($conn,$_POST['phoneno']);
    $pascode = mysqli_real_escape_string($conn,$_POST['password']);
    $status = mysqli_real_escape_string($conn,$_POST['status']);
    $work = mysqli_real_escape_string($conn,$_POST['work']);

    $query = "INSERT INTO staff (name,national_id,id,phone_no,password,status,type)
    VALUES ('$name','$idno','$staffid','$phone','$pascode','$status','$work')";

    $query_run =mysqli_query($conn,$query);


}

?>
