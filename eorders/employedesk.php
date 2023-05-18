<?php

require('connection.php');

if(isset($_POST['employeeregister'])){


$userid = mysqli_real_escape_string($conn,$_POST["id"]);
$password = mysqli_real_escape_string($conn, $_POST["password"]);
$res = mysqli_query($conn, "SELECT * FROM staff where id='$userid' AND password='$password'");
$row = mysqli_fetch_assoc($res);

?>

<?php

 if(($row['type'] == 'manager') && ($row['id'] == $userid)) {

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
    <title>ADD</title>
    <style>

        .input-form{
             width:80%;
             margin-left:10%;
             margin-right:10%;
             padding:30px;
        }
        .input-box{
            border-top:none;
            border-left:none;
            border-right:none;
            border-bottom:solid;
        }
        .input-div{
            margin-top:10px;
        }
        .submit-btn{
            color:white;
            background-color:black;
            border:none;
            width: 120px;
            height:40px;
            font-size:20px;
            padding-left:10px;
        }

    </style>
</head>
<body>
                    <div class="input-form">
                        <form action="register.php" method="POST">
                            <div class="input-div">
                                <label >FULL NAME</label><br>
                                <input class="input-box" type="text" name="name">
                            </div>
                            
                            <div class="input-div">
                                <label >PHONE NO.</label><br>
                                <input class="input-box" type="number" name="phoneno">
                            </div>
                            <div class="input-div">
                                <label >ID NUMBER</label><br>
                                <input class="input-box" type="text" name="idno">
                            </div>
                            
                            <div class="input-div">
                                <label >STAFF ID</label><br>
                                <input class="input-box" type="text" name="staffid">
                            </div>
                            
                            <div class="input-div">
                                <label >PASSWORD</label><br>
                                <input class="input-box" type="password" name="password">
                            </div><br>
                            <div>
                                <label for = "active">STATUS</label><br><br>
                                <select name="status" id="worktype" class="input-box">
                                    <option value="active">ACTIVE</option>
                                    <option value="off">OFF</option>    
                                </select>
                            </div><br>
                            <div>
                                <label for = "worktype">WORK TYPE</label><br><br>
                                <select name="work" id="worktype" class="input-box">
                                    <option value="manager">MANAGER</option>
                                    <option value="supervisor">SUPERVISOR</option>
                                    <option value="waiter">WAITER/WAITRESS</option>
                                    <option value="service" >SERVICE/GROUNDSMAN</option> 
                                    <option value="cheff" >CHEFF</option>   
                                </select>
                                
                            </div><br><br>
                            <button type="SUBMIT" class="submit-btn" name="register">REGISTER</button>
                        </form>

                    </div>
                
</body>
</html>
    <?php

}

    }
    ?>

<?php


?>