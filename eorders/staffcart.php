
<?php

include('deteb.php');

session_start();
$status="";
if (isset($_POST['action']) && $_POST['action']=="remove"){
if(!empty($_SESSION["shopping_cart"])) {
	foreach($_SESSION["shopping_cart"] as $key => $value) {
		if($_POST["foodname"] == $key){
		unset($_SESSION["shopping_cart"][$key]);
		$status = "<div class='box' style='color:red;'>
		Product is removed from your cart!</div>";
		}
		if(empty($_SESSION["shopping_cart"]))
		unset($_SESSION["shopping_cart"]);
			}		
		}
}

if (isset($_POST['action']) && $_POST['action']=="change"){
  foreach($_SESSION["shopping_cart"] as &$value){
    if($value['foodname'] === $_POST["foodname"]){
        $value['quantity'] = $_POST["quantity"];
        break; 
    }
}
  	
}




?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OrderPage</title>
    <style>
*{
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  font-family: 'Poppins', sans-serif;
}



.home-section{
  position: relative;
  background: #f5f5f5;
  min-height: 100vh;
  width: calc(100% - 240px);
  left: 240px;
  transition: all 0.5s ease;
}



img{
  height: 40px;
  width: 40px;
  border-radius: 6px;
  object-fit: cover;
}

.remove{
    background:none;
    border:none;
    font-size:30px;
    font-weight:bold;
    margin-left:10px;
}

.buttono{
    width: 220px;
    height:50px;
    font-size: 20px;
    color:white;
    background-color:black;
}






/* Right box */
  .top-sales{
  width: 55%;
  background: #fff;
  padding: 20px 30px;
  margin: 0 0px 0 0;
  border-radius: 12px;
  box-shadow: 0 5px 10px rgba(0, 0, 0, 0.1);
}
  img{
  height: 80px;
  width: 80px;
  object-fit: cover;
  border-radius: 12px;
  margin-right: 15px;
  background: #333;
}

 a{
  display: flex;
  align-items: center;
  text-decoration: none;
}
 
.price{
  font-size: 17px;
  font-weight: 400;
  color: #333;
  margin-right: 20px;
}
/* Responsive Media Query */

.input-box{
    /*border-radius:15px;*/
    width:60%;
    height:40px;
    border-top:none;
    border-left:none;
    border-right:none;
    border-bottom:solid;
    border-color:black;


}
.label-name{
    font-size:20px;
}
.label-price{
    font-size:20px;
    margin-right:10px;
    margin-left:20px;
}
.quantity{
    border-top:none;
    border-left:none;
    border-right:none;
    margin-left:10px;
    border-bottom:solid;
    font-size:20px;
    margin-right:15px;
}
@media (max-width: 1240px) {
  .home-section{
    width: calc(100% );
    left: 40px;
  }
}
@media (max-width: 1150px) {
   .sales-boxes{
    flex-direction: column;
  }
    .box{
    width: 100%;
    overflow-x: scroll;
    margin-bottom: 30px;
  }
   .top-sales{
    margin: 0 0px;
    width : 100%;
    margin-right:0px;
}
@media (max-width: 1000px) {
  .overview-boxes .box{
    width: calc(100% / 2 - 15px);
    margin-bottom: 15px;
  }
}
@media (max-width: 700px) {

    .sales-details{
    width: 100%;
  }
}
@media (max-width: 550px) {
    .sales-details{
    width: 100%;
  }
}
@media (max-width: 400px) {
    .sales-details{
    width: 100%;
  }
  .top-sales{
    width:100%;
  }

}



}


    </style>
</head>
<body>
    <div>
        <div id="menupg" class="mpg">
        <div class="salese" id="sales">
    <div class="home-content" >
    
        <div class="top-sales box">
         

          
<?php
if(isset($_SESSION["shopping_cart"])){
    $total_price = 0;
?>	
<table class="table">
<tbody>
	
<?php		
foreach ($_SESSION["shopping_cart"] as $product){
   
     
?>
<tr class="top-sales-details">
<td><?php echo '<img src="data:image/jpeg;base64,'.base64_encode($product["foodimage"]).'"/>'; ?></td>
<td class="label-name"><?php echo $product["foodname"]; ?>


<td>
<form method='post' action=''>
<input type='hidden' name='foodname'  value="<?php echo $product["foodname"]; ?>" />
<input type='hidden' name='action' value="change" />
<select name='quantity' class='quantity' onchange="this.form.submit()">
<option <?php if($product["quantity"]==1) echo "selected";?> value="1">1</option>
<option <?php if($product["quantity"]==2) echo "selected";?> value="2">2</option>
<option <?php if($product["quantity"]==3) echo "selected";?> value="3">3</option>
<option <?php if($product["quantity"]==4) echo "selected";?> value="4">4</option>
<option <?php if($product["quantity"]==5) echo "selected";?> value="5">5</option>
</select>
</form>
</td>
<td class="label-price"><?php echo "Sh.".$product["foodprice"]*$product["quantity"]; ?></td>
<td>
<form method='post' action=''>
<input type='hidden' name='foodname' value="<?php echo $product["foodname"]; ?>" />
<input type='hidden' name='action' value="remove" />
<button type='submit' class='remove'>x</button>
</form>
</td>
</tr>
<?php
$total_price += ($product["foodprice"]*$product["quantity"]);
}

?>
<tr>

<td colspan="5" align="right">
<strong>TOTAL: <?php echo "Sh.".$total_price; ?></strong>
</td>
</tr>
<?php
}
?>
</tbody>
</table>

<div>
<form action="database.php" method="POST">
    
		<label class="label-name" >Staff Id</label><br>
		<input type="text" name="staffid" class="input-box"><br><br>
		<label class="label-name" >Password</label><br>
		<input type="password" name="password" class="input-box"><br><br>
		<label class="label-name" >Phone Number</label><br>
		<input type="text" name="phone" class="input-box"><br><br>
		<label class="label-name"  >Table Number</label><br>
		<input type="text" name="adress" class="input-box"><br><br>
	<button class="buttono" type='SUBMIT' class='buy' name="waiter">ORDER NOW</button>
</form>
</div>

        </div>
      </div>
    </div>
    </div>
        </div>
 


   
  </div>
</div>
</div>


</div>

 

        
    </div>
    <script>
        var mpage = document.getElementById("menupg");

        var fpage = document.getElementById("foodpg");

        var dpage = document.getElementById("drinkpg");

        var mbtn = document.getElementById("menubtn");

        var dbtn = document.getElementById("drinkbtn");

        var fbtn = document.getElementById("foodbtn");

        fbtn.onclick = function(){
            fpage.style.display = "block";
            dpage.style.display = "none";
            mpage.style.display = "none";
        }

        dbtn.onclick = function(){
            dpage.style.display = "block";
            fpage.style.display = "none";
            mpage.style.display ="none";
        }

        mbtn.onclick = function(){
            mpage.style.display = "block";
            fpage.style.display = "none";
            dpage.style.display = "none";
            
        }


    </script>
</body>
</html>