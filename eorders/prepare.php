<?php

require('connection.php');

if(isset($_POST['prepare'])){

           
    $orderid = mysqli_real_escape_string($conn,$_POST['orderid']);
    ?>
<!-- <form action="insert.php"  method="POST">
                    <div>
                        <label >EMPLOYE ID</label>
                        <input type="number" name="id">
                    </div>
                    <div>
                        <input type="hidden" name="orderid" value="">
                    </div>
                    <div>
                        <label >PASSWORD</label>
                        <input type="password" name="password">
                    </div>
                    <div>
                        <button type="submit" name="kitchen">TAKE ORDER</button>
                    </div>
                </form>  -->






<?php
    ?>

<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title> Employee Login </title>

        <style>
      
*{
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: 'Poppins', sans-serif;
}
.container{
    height: 100vh;
    width: 100%;
    display: flex;
    align-items: center;
    justify-content: center;
    background-color: white;
    column-gap: 30px;
}
.form{
    position: absolute;
    max-width: 430px;
    width: 100%;
    padding: 30px;
    border-radius: 6px;
    background: #FFF;
    box-shadow: 0 5px 10px rgba(0, 0, 0, 0.1);
}
.form.signup{
    opacity: 0;
    pointer-events: none;
}
.forms.show-signup .form.signup{
    opacity: 1;
    pointer-events: auto;
}
.forms.show-signup .form.login{
    opacity: 0;
    pointer-events: none;
}
header{
    font-size: 28px;
    font-weight: 600;
    color: #232836;
    text-align: center;
}
form{
    margin-top: 30px;
}
.form .field{
    position: relative;
    height: 50px;
    width: 100%;
    margin-top: 20px;
    border-radius: 6px;
}
.field input,
.field button{
    height: 100%;
    width: 100%;
    box-shadow: 0 5px 10px rgba(0, 0, 0, 0.1);
    font-size: 16px;
    font-weight: 400;
    border-radius: 0px;
    border:none;
    padding:10px;
}
.min.css.field input{
    outline: none;
    padding: 0 15px;
    border: 1px solid#CACACA;
}
.field input:focus{
    border-bottom-width: 2px;
}
.eye-icon{
    position: absolute;
    top: 50%;
    right: 10px;
    transform: translateY(-50%);
    font-size: 18px;
    color: #8b8b8b;
    cursor: pointer;
    padding: 5px;
}
.field button{
    color: #fff;
    background-color: #1c2132;
    transition: all 0.3s ease;
    cursor: pointer;
}
.field button:hover{
    background-color: #1c2132;
}

.form a{
    color: #0171d3;
    text-decoration: none;
}
.form-content a:hover{
    text-decoration: underline;
}
.line{
    position: relative;
    height: 1px;
    width: 100%;
    margin: 36px 0;
    background-color: #d4d4d4;
}
.line::before{
    content: 'Or';
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    background-color: #FFF;
    color: #8b8b8b;
    padding: 0 15px;
}


@media screen and (max-width: 400px) {
    .form{
        padding: 20px 10px;
    }
    
}
        </style>
                
                        
    </head>
    <body>
        <section class="container forms">
            <div class="form login">
                <div class="form-content">
                    <header>login</header>
                    <form action="kitchenplace.php" method = "POST">
                        <div class="field input-field">
                            <input type="number" placeholder="Staff ID " class="input" name="id"> 
                        </div>         
                        <div>
                            <input type="hidden"  name="orderid" value="<?= $orderid ?>" >
                        </div>

                        <div class="field input-field">
                            <input type="password" placeholder="Password" class="password" name="password" >
                            <i class='bx bx-hide eye-icon'></i>
                        </div>

                        <div class="field button-field">
                            <button type="submit" name="kitchen">TAKE ORDER</button>
                        </div>
                    </form>
                </div>
            </div>
            </div>
        </section>

  
    </body>
</html>



    <?php

}


?>

