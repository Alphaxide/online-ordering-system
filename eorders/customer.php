<?php

require('connection.php');


?>
<?php


session_start();


  	




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
    background-color:#C2703D;
    border:none;
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
    font-size:18px;


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
         

          
<?php?>
<table class="table">
<tbody>
	
<?php		
   
    $customer= mysqli_fetch_assoc($_SESSION["customer_details"]);
?>
<tr class="top-sales-details">
<td class="label-name"><?php echo $customer["personname"]; ?>


<td>
</td>
<td>
</td>
</tr>
<?php

?>

</tbody>
</table>

<div>

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
     <?php

?>
</body>
</html>