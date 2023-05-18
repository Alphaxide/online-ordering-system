<?php

session_start();
include('deteb.php');
$status="";
if (isset($_POST['foodname']) && $_POST['foodname']!=""){
$foodname = $_POST['foodname'];
$result = mysqli_query($con,"SELECT * FROM `foodmenu` WHERE `foodname`='$foodname'");
$row = mysqli_fetch_assoc($result);
$name = $row['foodname'];
$price = $row['foodprice'];
$id = $row['id'];
$img = $row['foodimage'];

$cartArray = array(
	$foodname=>array(
	'foodname'=>$name,
	'foodprice'=>$price,
	'id'=>$id,
	'quantity'=>1,
  'foodimage'=>$img,
    )
);

if(empty($_SESSION["shopping_cart"])) {
	$_SESSION["shopping_cart"] = $cartArray;
	$status = "<div class='box'>Product is added to your cart!</div>";
}else{
	$array_keys = array_keys($_SESSION["shopping_cart"]);
	if(in_array($foodname,$array_keys)) {
		$status = "<div class='box' style='color:red;'>
		Product is already added to your cart!</div>";	
	} else {
	$_SESSION["shopping_cart"] = array_merge($_SESSION["shopping_cart"],$cartArray);
	$status = "<div class='box'>Product is added to your cart!</div>";
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
        <title>FOOD MENU</title>
        <style>
*{
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  font-family: 'Poppins', sans-serif;
}
body{
  min-height: 80vh;
  display: flex;
  align-items: center;
  justify-content: center;
 /* background-color: #EFEFEF;*/
 background-color: white;
  padding-left:5%;
  padding-right:5%;
}



.slide-container{
  max-width: 1120px;
  width: 100%;
  padding: 40px 0;
}
.slide-content{
  margin: 20px 0px;
  overflow: hidden;
  border-radius: 25px;

}
.card{
  border-radius: 2px;
  background-color: #FFF;
  margin-bottom:30px;
  box-shadow: 0 5px 10px rgba(0, 0, 0, 0.1);
}
.image-content,
.card-content{
  display: flex;
  flex-direction: column;
  align-items: center;
  padding: 0px 0px;
}
.image-content{
  
  row-gap: 0px;
  padding: 0px 0;
}
.card-image{

  height: 150px;
  width: 150px;
  border-radius: 0px;
  background: white;
  padding: 0px;
  margin-top:35px;
  color:black;
}
 .card-img{
  height: 100%;
  border-radius: 20px;
  border: 0px white;
  width:100%;
}
.cart_div{
  
  text-decoration:none;
  float:right;
  height:20px;
  margin-top:-45px;
  background-color:white;

}
.cart-link{
  
  text-decoration:none;
  padding-bottom:10px;
}
.cart-image{
  width:60px;
  height:60px;
}
.cart-count{
  color: #1c2132;
  font-size:20px;
  float:right;
  margin-top:-22px;
  position:relative;
  font-weight:bold;
  

}
.name{
  font-size: 25px;
  font-weight: 500;
  color: black;
}
.menu{
  position:fixed;
  top: 0%;
  width:100%;
  background-color: #1c2132;
  padding:10px;
  border-bottom:12px;
  font-family: Verdana, Geneva, Tahoma, sans-serif;
}
.menu-item{
  text-decoration:none;
  font-size:25px;
  background-color: #1c2132;
  color:white;
  margin-left:20px;
}
.main-item{
  font-family: Verdana, Geneva, Tahoma, sans-serif;
  text-decoration:underline;
  font-size:25px;
  background-color: #1c2132;
  color:white;
  margin-left:15px;
}
.button-bar{
    background-color: #1c2132;
    border:none;
    font-size:15px;
    color:white;
    border-right:solid;
    padding-right:2px;
    margin-right:10px;

}
.button-class{
    margin-top:5px;
}
.description{
  font-size: 18px;
  color: black;
  text-align: center;
}
.whiskey{
    display:block;
}
.vodka{
    display:none;
}
.beer{
    display:none;
}
.wine{
    display:none;
}
.scotch{
    display:none;
}
.button{
  border: none;
  font-size: 16px;
  width:200px;
  height:50px;
  color: white;
  padding: 8px 16px;
  background-color: #1c2132;
  margin: 14px;
  cursor: pointer;
  transition: all 0.3s ease;
  box-shadow: 6px 5px 10px rgba(0.1, 0.1, 0.1, 0.3);
}
.button:hover{
  background-color: #1c2132;
}
.desc{
  margin-right:10px;
}

@media screen and (max-width: 768px) {
  .slide-content{
    margin: 0 10px;
  }
  .swiper-navBtn{
    display: none;
  }
}
        </style>
       
                                        
    </head>
    <body>
      
    <div class="menu">
      <a href="staffmenu.php" class="main-item " >MEALS</a>
      <a href="staffdrink.php" class="menu-item"  >DRINKS</a>
      <a href="staffbar.php" class="menu-item">BAR</a>
      <div class="button-class">
        
          <a href="staffbreak.php" class="button-bar" >BREAKFAST</a>
          <a href="staffmenu.php" class="button-bar" >MEALS</a>
      </div>
      
    <?php
                  if(!empty($_SESSION["shopping_cart"])) {
                    $cart_count = count(array_keys($_SESSION["shopping_cart"]));
                    ?>

         
        <div class="cart-count">
            <span class="cart-count"><?php echo $cart_count; ?></span>
        </div>
        <div class="cart_div">
                <a href="staffcart.php" class="cart-link"><img src="download.png"  class="cart-image"/> </a>        
        </div>
        <?php
                  }
                  ?>
      </div>
      </div>
      
             <div class="slide-container swiper">
                 <div class="slide-content">
                    <div class="whiskey" id="whiskey">
                 <div class="card-wrapper swiper-wrapper">
                     
                         <?php
                        
                        $meal = "meal";

                       $result = mysqli_query($con,"SELECT * FROM `foodmenu` WHERE foodtype = '$meal' " );
                       foreach($result as $row){
		               ?>
                        <div class="card swiper-slide">

           
                         
                          <div class="image-content">
                            <span class="overlay"></span>

                            <div class="card-image">
                            <?php echo '<img class="card-img" src="data:image/jpeg;base64,'.base64_encode($row['foodimage']).'"/>'; ?>
                            </div>
                        </div>

                        <div class="card-content">
                            <h2 class="name"><?= $row['foodname']?></h2>
                            <p class="description">Sh.<?= $row['foodprice']?></p>
                            
			               <form method='post' action=''>
			                  <input type='hidden' name='foodname' value="<?= $row['foodname']?>" />
                            <button type='submit' class="button">ORDER</button>
                            </form>
                       </div>
                       </div>
			     <?php
               }
               ?>
       
             
            </div>
            </div>
            
            
            
 
           
        </div>
        </div>
              </div>
              </div>
              </div>




    
    </body>

 
</html>