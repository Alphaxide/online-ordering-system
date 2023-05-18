<?php

require('connection.php');


?>

<?php


?>
    
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>AdminPage</title>
        <style>
            .mpg{
                display:block;
            }
            .fpg{
                display:none;
            }
    *{
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: 'Poppins', sans-serif;
    }
 
    .menupg{
        margin-top:0px;
    }
    .salese{
      display:block;
    }
    .stafee{
      display:none;
    }
    .customer-name{
        margin: 50px 30 5px 20px;
        font-weight: bold;
        font-size: 20px;
    }
 
    .home-section{
      position: relative;
      background: #f5f5f5;
      min-height: 100vh;
      width: calc(100% - 240px);
      left: 240px;
      transition: all 0.5s ease;
    }
    .home-section .home-content{
      position: relative;
      padding-top: 104px;
    }
    .home-content .overview-boxes{
      display: flex;
      align-items: center;
      justify-content: space-between;
      flex-wrap: wrap;
      padding: 0 20px;
      margin-bottom: 26px;
    }
    .home-content{
      
    }
    .overview-boxes .box{
      margin-top:40px;
      display: flex;
      align-items: center;
      justify-content: center;
      min-width: calc(100% / 1 - 15px);
      background: #fff;
      padding: 15px 14px;
      border-radius: 0px;
      box-shadow: 0 5px 10px rgba(0,0,0,0.1);
    }
    .overview-boxing .box{
      display: flex;
      align-items: center;
      justify-content: center;
      width: calc(100% / 2 - 15px);
      background: #fff;
      padding: 15px 14px;
      border-radius: 12px;
      box-shadow: 0 5px 10px rgba(0,0,0,0.1);
    }
    .overview-boxes .box-topic{
      font-size: 20px;
      font-weight: 500;
    }
    .home-content .box .number{
      display: inline-block;
      font-size: 35px;
      margin-top: -6px;
      font-weight: 500;
    }
    .home-content .box .indicator{
      display: flex;
      align-items: center;
    }
    .home-content .box .indicator i{
      height: 20px;
      width: 20px;
      background: #8FDACB;
      line-height: 20px;
      text-align: center;
      border-radius: 50%;
      color: #fff;
      font-size: 20px;
      margin-right: 5px;
    }
    .box .indicator i.down{
      background: #e87d88;
    }
    .home-content .box .indicator .text{
      font-size: 12px;
    }
    .home-content .box .cart{
      display: inline-block;
      font-size: 32px;
      height: 50px;
      width: 50px;
      background: #cce5ff;
      line-height: 50px;
      text-align: center;
      color: #66b0ff;
      border-radius: 12px;
      margin: -15px 0 0 6px;
    }
    .home-content .box .cart.two{
       color: #2BD47D;
       background: #C0F2D8;
     }
    .home-content .box .cart.three{
       color: #ffc233;
       background: #ffe8b3;
     }
    .home-content .box .cart.four{
       color: #e05260;
       background: #f7d4d7;
     }
    .home-content .total-order{
      font-size: 20px;
      font-weight: 500;
    }
    .home-content .sales-boxes{
      display: flex;
      justify-content: space-between;
       padding: 0 20px; 
    }
    
    /* left box */
    .home-content .sales-boxes .recent-sales{
      width: 50%;
      background: #fff;
      padding: 20px 30px;
      margin: 0 0px;
      border-radius: 12px;
      box-shadow: 0 5px 10px rgba(0, 0, 0, 0.1);
    }
    
    .home-content .sales-boxes .sales-details{
      display: flex;
      align-items: center;
      justify-content: space-between;
    }
    .sales-boxes .box .title{
      font-size: 24px;
      font-weight: 500;
       margin-bottom: 10px; 
       margin-left:30%;
    }
    .sales-boxes .sales-details li.topic{
      font-size: 20px;
      font-weight: 500;
    }
    .sales-boxes .sales-details li{
      list-style: none;
      margin: 8px 0;
    }
    .sales-boxes .sales-details li a{
      font-size: 18px;
      color: #333;
      font-size: 400;
      text-decoration: none;
    }
    .sales-boxes .box .button{
      width: 100%;
      display: flex;
      justify-content: flex-end;
    }
    .sales-boxes .box .button a{
      color: #fff;
      background: #0A2558;
      padding: 4px 12px;
      font-size: 15px;
      font-weight: 400;
      border-radius: 4px;
      text-decoration: none;
      transition: all 0.3s ease;
    }
    .sales-boxes .box .button a:hover{
      background:  #0d3073;
    }
    .add-box{
    
      background-color: #1c2132;
      width: 150px;
      height:40px;
      padding-left:10px;
      padding-top:10px;
    }
    .add-staff{
      text-decoration:none;
      color:white;
      font-size:20px;
    }
    
     /*Right box */
   .top-sales{
      width: 50%;
      margin-left:5%;
      background: #fff;
      padding: 20px 30px;
      margin: 0 20px 0 0;
      border-radius: 0px;
      box-shadow: 0 5px 10px rgba(0, 0, 0, 0.1);
    }
    .sales-boxes .top-sales li{
      display: flex;
      align-items: left;
      justify-content: space-between;
      margin: 10px 0;
    }
    
.sales-boxes .top-sales li a img{
  height: 40px;
  width: 40px;
  object-fit: cover;
  border-radius: 12px;
  margin-right: 10px;
  background: #333;
  border:none;
}

   .staff-boxing{
    width:80%;
    box-shadow: 0 5px 10px rgba(0, 0, 0, 0.1);
    padding:20px;
   }
    .staff-employe{
     width: 300px; 
      
    }
    .navigation-home{
      width:100%;
      background-color: #1c2132;
      height:40px;
      color:white;
      padding-left:20px;
      position:absolute;
      margin-bottom:30px;
    }
    .navigation-icon{
      float:center;
      border:none;
      background-color: #1c2132;
      color:white;
      font-size:25px;
      margin-right:15px;
      margin-top:3px;
      border-right:solid;
      
    }
    .staff-details{
      margin-bottom:5px;
      font-weight:500;
      font-size:20px;
    }
    .employee-board{
      margin-left: 0px;
      background: #333;
    }
    .sales-boxes .top-sales li a{
      display: flex;
      align-items: center;
      text-decoration: none;
    }
    .sales-boxes .top-sales li .product,
    .price{
      font-size: 17px;
      font-weight: 400;
      color: #333;
    }
    .staff-page{
        margin-top:50px;
        width:80%;
        margin-left:10%;
        margin-right:10%;
        padding:20px;
        box-shadow: 0 5px 10px rgba(0, 0, 0, 0.1);
    }
    .edit-btn{
      background-color: #1c2132;
      color:white;
      width:70px;
      height:35px;
      padding:10px;
    }
    .staff-link{
      text-decoration:none;
      color:white;
      background-color: #1c2132;
    }
    /* Responsive Media Query */
    @media (max-width: 1240px) {
      .home-section{
        width: calc(100% - 60px);
        left: 60px;
      }

    }
    @media (max-width: 1150px) {
      .home-content .sales-boxes{
        flex-direction: column;
      }
      .home-content .sales-boxes .box{
        width: 100%;
        overflow-x: scroll;
        margin-bottom: 30px;
      }
      .home-content .sales-boxes .top-sales{
        margin: 0;
      }
    }
    @media (max-width: 1000px) {
      .overview-boxes .box{
        width: calc(100% /2  - 15px);
        margin-bottom: 15px;
        height: 200px;
        border-radius:10px;
      }
    }
    @media (max-width: 700px) {
      .home-section nav .profile-details{
        height: 50px;
        min-width: 40px;
      }
      .home-content .sales-boxes .sales-details{
        width: 560px;
      }
    }
    @media (max-width: 550px) {
      .overview-boxes .box{
        width: 100%;
        margin-bottom: 15px;
      }
    }
    @media (max-width: 400px) {
      .home-section{
        width: 100%;
        left: 0;
      }
 
      .home-content{
        margin: 0 20px;
      }
    }
    
    
    
        </style>
    </head>
    <body>
        <div>
            <div class="navigation-home">
                <button class="navigation-icon" id="menubtn">DASHBOARD  </button>
                <button class="navigation-icon" id="foodbtn">STAFF </button>
                <!--<button class="navigation-icon" id="drinkbtn">FOOD ITEMS </button>-->
            </div>
            <div id="menupg" class="mpg">
                <div class="menupg">
            <div class="salese" id="sales">
        <div class="home-content" >
          <div class="overview-boxes">
            <div class="box">
              <div class="right-side">
                <div class="box-topic"></div>
                <div class="number"></div>
                <div class="indicator">
                </div>
              </div>
            </div>
            
        <div class="box">
          <div class="right-side">
            <div class="box-topic">Total Sales</div>
            <div class="number">
              
            <?php

              $query = "SELECT SUM(amount)  FROM ordermanager ";
              $result = $conn->query($query);
              while($row = mysqli_fetch_array($result)){
                
                ?>

                <div><?= $row['SUM(amount)']; ?></div>

                 <?php
              }

              ?>
              
          </div>
            <div class="indicator">
              <i class='bx bx-up-arrow-alt'></i>
              <span class="text"></span>
            </div>
          </div>
          <i class='bx bxs-cart-add cart two' ></i>
        </div>
        
        <div class="box">
          <div class="right-side">
            <div class="box-topic">Total Orders</div>
            <div class="number">
               
            <?php

             $query = "SELECT COUNT(full_name)  FROM ordermanager ";
             $result = $conn->query($query);
              while($row = mysqli_fetch_array($result)){
  
             ?>

             <div><?= $row['COUNT(full_name)']; ?></div>

             <?php
             }

          ?>
            </div>
            <div class="indicator">
              <i class='bx bx-up-arrow-alt'></i>
              <span class="text"></span>
            </div>
          </div>
          <i class='bx bx-cart cart three' ></i>
        </div>
        
        <div class="box">
          <div class="right-side">
            <div class="box-topic">Untaken Orders</div>
            <div class="number">
            <?php

               $query = "SELECT COUNT(order_id)  FROM pre_orders ";
               $result = $conn->query($query);
               while($row = mysqli_fetch_array($result)){

                  ?>

                   <div><?= $row['COUNT(order_id)']; ?></div>

                <?php
                 }

                   ?>
            </div>
           </div>

           
       
          
            <div class="indicator">
              <i class='bx bx-down-arrow-alt down'></i>
              <span class="text"></span>
            </div>
          </div>
          <i class='bx bxs-cart-download cart four' ></i>
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
        </div>
        <script>
            var mpage = document.getElementById("menupg");
    
            var fpage = document.getElementById("foodpg");
    
            
            var mbtn = document.getElementById("menubtn");
    
            var fbtn = document.getElementById("foodbtn");
    
            fbtn.onclick = function(){
                fpage.style.display = "block";
                mpage.style.display = "none";
            }
    
    
            mbtn.onclick = function(){
                mpage.style.display = "block";
                fpage.style.display = "none";
                
            }
    
    
        </script>
    </body>
    </html>

    <?php


    ?>

<?php


?>