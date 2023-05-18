<?php

session_start();
include('deteb.php');
$ifset="";
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
        <title>MENU DRINK</title>
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
  align-items: right;
  justify-content: center;
 background-color: white;
  padding-left:5%;
  padding-right:5%;
}


--white-color: #FFF;
--primary-color: #C87E4F;
--primary-color-hover: #C2703D;


::selection{
  background-color: var(--primary-color);
  color: var(--white-color);
}
::-webkit-scrollbar{
  width: 8px;
}
::-webkit-scrollbar-track{
  background-color: #f9f1ec;
}
::-webkit-scrollbar-thumb{
  border-radius: 1rem;
  background-color: #C87E4F;
}
::-webkit-scrollbar-thumb:hover{
  border-radius: 1rem;
  background-color: var(--primary-color-hover)
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
  width:-5px;
  margin-top:-52px;
  background-color:white;
  margin-right:-8px;

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
  color:black;
  font-size:20px;
  float:right;
  margin-top:-26px;
  position:relative;
  font-weight:bold;
  margin-right:-3px;
  

}
.name{
  font-size: 25px;
  font-weight: 500;
  color:black;
  text-align:center;
  font-family:serif;
}
.menu{
  position:fixed;
  top: 0%;
  width:100%;
  background-color:#C87E4F;
  padding:10px;
  border-bottom:12px;
  font-family:serif;
}
.menu-item{
  text-decoration:none;
  font-size:25px;
  background-color:#C87E4F;
  color:white;
  margin-left:20px;
  font-family:serif;
}
.main-item{
  text-decoration:underline;
  font-size:25px;
  background-color:#C87E4F;
  font-family:serif;
  color:white;
  margin-left:15px;
}
.button-bar{
  background-color:#C87E4F;
   font-family:serif;
    border:none;
    font-size:15px;
    color:white;
    border-right:solid;
    padding-right:2px;
    margin-right:10px;

}
.button-class{
    margin-top:5px;
    font-size:10px;
    font-family:serif;
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
  background-color:#C87E4F;
  margin: 14px;
  cursor: pointer;
  transition: all 0.3s ease;
  box-shadow: 6px 5px 10px rgba(0.1, 0.1, 0.1, 0.3);
}
.button:hover{
  background-color:#C87E4F;
}
.desc{
  margin-right:10px;
}
@media screen and (min-width: 700px) {
  body{

  }
 .card-image{
  height:100px;
  width:100px;
 
 }
 .card-content{
  margin-top:0px;
  margin-left: -5px;
  background-color:white;
  max-width:350px;
  margin-bottom:20px;
  padding:5px;
  
  
 }
 .slide-container{
  width:auto;
  float:right;
  align-items:right;
  justify-content:left;

 }
 
 .card{
  width:auto;
  float:right;
  margin-right:5%;
  margin-top:20px;
  margin-left: -10px;
  
 }
 .alignment{
  align-items:right;
 }
}
        </style>
       
                                        
    </head>
    <body>
      
         
    <div class="menu">
      <a href="menufood.php" class="menu-item" >MEALS</a>
      <a href="menudrink.php" class="main-item " >DRINKS</a>
      <a href="bar.php" class="menu-item">BAR</a>
      <div class="button-class">
        <button class="button-bar" id="whiskeybtn"><div class="desc">SODA</div></button><vr>
        <button class="button-bar" id="winebtn"><div class="desc">BEER</div></button><vr>
        <button class="button-bar" id="beerbtn"><div class="desc">FRUIT JUICE</div></button><vr>
        <button class="button-bar" id="vodkabtn"><div class="desc">WINE</div></button><vr>
        <button class="button-bar" id="scotchbtn"><div class="desc">COCKTAIL</div></button><vr>
      </div>
      
    <?php
                  if(!empty($_SESSION["shopping_cart"])) {
                    $cart_count = count(array_keys($_SESSION["shopping_cart"]));

                    
                    ?>

        <div class="cart-count">
            <span class="cart-count"><?php echo $cart_count; ?></span>
        </div>
        <div class="cart_div">
                <a href="cart.php" class="cart-link"><img src="download.png"  class="cart-image"/> </a>        
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
                        
                        $drink = "soda";
               
                       $result = mysqli_query($con,"SELECT * FROM `foodmenu` WHERE drinkspecific = '$drink' " );
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
                            <div class="details">
                            <h2 class="name"><?= $row['foodname']?></h2>
                            <p class="description">Sh.<?= $row['foodprice']?></p>
                            
                            </div>
			               <form method='post' action=''>
			                  <input type='hidden' name='foodname' value="<?= $row['foodname']?>" />
                            <button type='submit' class="button">ORDER</button>
                            </form>
                       </div>
                       </div>
			     <?php
           echo $ifset;
               }
               ?>
       
             
            </div>
            </div>
            
            <div class="vodka" id="vodka">
            <div class="slide-container swiper">
                 <div class="slide-content">
                 <div class="card-wrapper swiper-wrapper">
                 <?php
                  if(!empty($_SESSION["shopping_cart"])) {
                    $cart_count = count(array_keys($_SESSION["shopping_cart"]));
                    ?>

                       <div class="cart_div">
                       <a href="tray.php"><img src="cart-icon.png" /> Cart<span><?php echo $cart_count; ?></span></a>
                        </div>
                       
            

                         <?php
                        }
                        $drink = "wine";

                       $result = mysqli_query($con,"SELECT * FROM `foodmenu` WHERE type = '$drink' " );
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
            
            <div class="wine" id="wine">
            <div class="slide-container swiper">
                 <div class="slide-content">
                 <div class="card-wrapper swiper-wrapper">
                 <?php
                  if(!empty($_SESSION["shopping_cart"])) {
                    $cart_count = count(array_keys($_SESSION["shopping_cart"]));
                    ?>

                       <div class="cart_div">
                       <a href="tray.php"><img src="cart-icon.png" /> Cart<span><?php echo $cart_count; ?></span></a>
                        </div>
                       
            

                         <?php
                        }
                        $drink = "beer";

                       $result = mysqli_query($con,"SELECT * FROM `foodmenu` WHERE type = '$drink' " );
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
            
            <div  class="scotch" id="scotch">
            <div class="slide-container swiper">
                 <div class="slide-content">
                 <div class="card-wrapper swiper-wrapper">
                 <?php
                  if(!empty($_SESSION["shopping_cart"])) {
                    $cart_count = count(array_keys($_SESSION["shopping_cart"]));
                    ?>

                       <div class="cart_div">
                       <a href="tray.php"><img src="cart-icon.png" /> Cart<span><?php echo $cart_count; ?></span></a>
                        </div>
                       
            

                         <?php
                        }
                        $drink = "cocktail";

                       $result = mysqli_query($con,"SELECT * FROM `foodmenu` WHERE type = '$drink' " );
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
            

            <div class="beer" id="beer" >
            <div class="slide-container swiper">
                 <div class="slide-content">
                 <div class="card-wrapper swiper-wrapper">
                 <?php
                  if(!empty($_SESSION["shopping_cart"])) {
                    $cart_count = count(array_keys($_SESSION["shopping_cart"]));
                    ?>

                       <div class="cart_div">
                       <a href="tray.php"><img src="cart-icon.png" /> Cart<span><?php echo $cart_count; ?></span></a>
                        </div>
                       
            

                         <?php
                        }
                        $drink = "fruitjuice";

                       $result = mysqli_query($con,"SELECT * FROM `foodmenu` WHERE type = '$drink' " );
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
              </div>
              </div>


              <script>

                var whiskeybtn = document.getElementById("whiskeybtn");

                var vodkabtn = document.getElementById("vodkabtn");

                var winebtn = document.getElementById("winebtn");

                var beerbtn = document.getElementById("beerbtn");

                var scotchbtn = document.getElementById("scotchbtn");

                var whiskey = document.getElementById("whiskey");

                var vodka = document.getElementById("vodka");

                var wine = document.getElementById("wine");

                var beer = document.getElementById("beer");

                var scotch = document.getElementById("scotch");

                whiskeybtn.onclick = function() {
                    whiskey.style.display = "block";
                    vodka.style.display = "none";
                    wine.style.display = "none";
                    beer.style.display = "none";
                    scotch.style.display = "none";


                }

                vodkabtn.onclick = function() {
                    vodka.style.display = "block";
                    whiskey.style.display = "none";
                    wine.style.display = "none";
                    beer.style.display = "none";
                    scotch.style.display = "none";
                }
                
                winebtn.onclick = function() {
                    
                    wine.style.display = "block";
                    vodka.style.display = "none";
                    whiskey.style.display = "none";
                    beer.style.display = "none";
                    scotch.style.display = "none";
                    
                }
                
                beerbtn.onclick = function() {
                    
                    beer.style.display = "block";
                    wine.style.display = "none";
                    vodka.style.display = "none";
                    whiskey.style.display = "none";
                    scotch.style.display = "none";
                    
                }
                
                scotchbtn.onclick = function() {
                    
                    scotch.style.display = "block";
                    beer.style.display = "none";
                    wine.style.display = "none";
                    vodka.style.display = "none";
                    whiskey.style.display = "none";
                    
                }


              </script>


    
    </body>

 
</html>