<?php

require('connection.php');

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OrderPage</title>
    <style>
        .mpg{
            display:block;
        }
        .fpg{
            display:none;
        }
        .dpg{
            display:none;
        }
*{
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  font-family: 'Poppins', sans-serif;
}
.sidebar{
  position: fixed;
  height: 100%;
  width: 240px;
  background: #00071b;
  transition: all 0.5s ease;
  margin: 0 0 0 0;
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
.sidebar.active{
  width: 60px;
}
.sidebar .logo-details{
  height: 80px;
  display: flex;
  align-items: center;
}
.sidebar .logo-details i{
  font-size: 28px;
  font-weight: 500;
  color: #fff;
  min-width: 60px;
  text-align: center
}
.sidebar .logo-details .logo_name{
  color: #fff;
  font-size: 24px;
  font-weight: 500;
}
.sidebar .nav-links{
  margin-top: 10px;
}
.sidebar .nav-links li{
  position: relative;
  list-style: none;
  height: 50px;
}
.sidebar .nav-links li a{
  height: 100%;
  width: 100%;
  display: flex;
  align-items: center;
  text-decoration: none;
  transition: all 0.4s ease;
}
.sidebar .nav-links li a.active{
  background: #081D45;
}
.sidebar .nav-links li a:hover{
  background: #081D45;
}
.sidebar .nav-links li i{
  min-width: 60px;
  text-align: center;
  font-size: 18px;
  color: #fff;
}
.sidebar .nav-links li a .links_name{
  color: #fff;
  font-size: 15px;
  font-weight: 400;
  white-space: nowrap;
}
.sidebar .nav-links .log_out{
  position: absolute;
  bottom: 0;
  width: 100%;
}
.home-section{
  position: relative;
  background: #f5f5f5;
  min-height: 100vh;
  width: calc(100% - 240px);
  left: 240px;
  transition: all 0.5s ease;
}
.sidebar.active ~ .home-section{
  width: calc(100% - 60px);
  left: 60px;
}
.home-section nav{
  display: flex;
  justify-content: space-between;
  height: 80px;
  background: #fff;
  display: flex;
  align-items: center;
  position: fixed;
  width: calc(100% - 240px);
  left: 240px;
  z-index: 100;
  padding: 0 20px;
  box-shadow: 0 1px 1px rgba(0, 0, 0, 0.1);
  transition: all 0.5s ease;
}
.sidebar.active ~ .home-section nav{
  left: 60px;
  width: calc(100% - 60px);
}
.home-section nav .sidebar-button{
  display: flex;
  align-items: center;
  font-size: 24px;
  font-weight: 500;
}
nav .sidebar-button i{
  font-size: 35px;
  margin-right: 10px;
}
.home-section nav .search-box{
  position: relative;
  height: 50px;
  max-width: 550px;
  width: 100%;
  margin: 0 20px;
}
nav .search-box input{
  height: 100%;
  width: 100%;
  outline: none;
  background: #F5F6FA;
  border: 2px solid #EFEEF1;
  border-radius: 6px;
  font-size: 18px;
  padding: 0 15px;
}
nav .search-box .bx-search{
  position: absolute;
  height: 40px;
  width: 40px;
  background: #2697FF;
  right: 5px;
  top: 50%;
  transform: translateY(-50%);
  border-radius: 4px;
  line-height: 40px;
  text-align: center;
  color: #fff;
  font-size: 22px;
  transition: all 0.4 ease;
}
.home-section nav .profile-details{
  display: flex;
  align-items: center;
  background: #F5F6FA;
  border: 2px solid #EFEEF1;
  border-radius: 6px;
  height: 50px;
  min-width: 190px;
  padding: 0 15px 0 2px;
}
nav .profile-details img{
  height: 40px;
  width: 40px;
  border-radius: 6px;
  object-fit: cover;
}
nav .profile-details .admin_name{
  font-size: 15px;
  font-weight: 500;
  color: #333;
  margin: 0 10px;
  white-space: nowrap;
}
nav .profile-details i{
  font-size: 25px;
  color: #333;
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
  display: flex;
  align-items: center;
  justify-content: center;
  width: calc(100% / 4 - 15px);
  background: #fff;
  padding: 15px 14px;
  border-radius: 12px;
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

  background-color:black;
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
.home-content .sales-boxes .top-sales{
  width: 60%;
  margin-left:5%;
  background: #fff;
  padding: 20px 30px;
  margin: 0 20px 0 0;
  border-radius: 0px;
  box-shadow: 0 5px 10px rgba(0, 0, 0, 0.1);
}
.sales-boxes .top-sales li{
  display: flex;
  align-items: center;
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
}
.staff-employe{
 width: 300px; 
  
}
.navigation-home{
  width:100%;
  background-color:black;
  height:30px;
  color:white;
  padding-left:20px;
  position:fixed;
  margin-bottom:30px;
}
.navigation-icon{
  border:none;
  background-color:black;
  color:white;
  font-size:20px;
  margin-right:15px;
  margin-top:3px;
  
}
.staff-details{
  margin-bottom:5px;
  font-weight:bold;
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
.edit-btn{
  background-color:black;
  color:white;
  width:70px;
  height:35px;
  padding:10px;
}
.staff-link{
  text-decoration:none;
  color:white;
}
/* Responsive Media Query */
@media (max-width: 1240px) {
  .sidebar{
    width: 60px;
  }
  .sidebar.active{
    width: 220px;
  }
  .home-section{
    width: calc(100% - 60px);
    left: 60px;
  }
  .sidebar.active ~ .home-section{
    left: 220px;
    width: calc(100% - 220px);
    overflow: hidden;
  }
  .home-section nav{
    width: calc(100% - 60px);
    left: 60px;
  }
  .sidebar.active ~ .home-section nav{
    width: calc(100% - 220px);
    left: 220px;
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
    width: calc(100% / 2 - 15px);
    margin-bottom: 15px;
  }
}
@media (max-width: 700px) {
  nav .sidebar-button .dashboard,
  nav .profile-details .admin_name,
  nav .profile-details i{
    display: none;
  }
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
  .sidebar.active ~ .home-section nav .profile-details{
    display: none;
  }
}
@media (max-width: 400px) {
  .sidebar{
    width: 0;
  }
  .sidebar.active{
    width: 30px;
  }
  .home-section{
    width: 100%;
    left: 0;
  }
  .sidebar.active ~ .home-section{
    left: 60px;
    width: calc(100% - 60px);
  }
  .home-section nav{
    width: 100%;
    left: 0;
  }
  .sidebar.active ~ .home-section nav{
    left: 30px;
    width: calc(100% - 30px);
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
            <button class="navigation-icon" id="menubtn">DASHBOARD</button>
            <button class="navigation-icon" id="foodbtn">STAFF</button>
            <button class="navigation-icon" id="drinkbtn">FOOD ITEMS</button>
        </div> 
        <div id="menupg" class="mpg">
        <div class="salese" id="sales">
          <div>
          </div>
    <div class="home-content" >
      <div class="overview-boxes">
        <div class="box">
          <div class="right-side">
            <div class="box-topic">Total Order</div>
            <div class="number">40,876</div>
            <div class="indicator">
              <i class='bx bx-up-arrow-alt'></i>
              <span class="text">Up from yesterday</span>
            </div>
          </div>
          <i class='bx bx-cart-alt cart'></i>
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
            <div class="indicator">
              <i class='bx bx-down-arrow-alt down'></i>
              <span class="text"></span>
            </div>
          </div>
          <i class='bx bxs-cart-download cart four' ></i>
        </div>
      </div>

      <div class="sales-boxes">
        <div class="recent-sales box">
          <div class="title">Recent Sales</div>
          <div class="">


             <?php	

                 $status = "prepared";

                $query = "SELECT *  FROM ordermanager WHERE status = '$status'";
                $query_run = mysqli_query($conn, $query);
                foreach($query_run as $orders){

                   ?>  

        
              <div>
                <div class="customer-name"><?= $orders['full_name']; ?></div>
                <div class="payment-mode"><?= $orders['payment_node']; ?></div>
               </div><br>
              <?php
              }

              ?>

          </div>
        </div>
        <div class="top-sales box">
          <div class="title">Top Seling Product</div>
          
          <?php	


           $query = "SELECT *  FROM foodmenu ";
           $query_run = mysqli_query($conn, $query);
           foreach($query_run as $fmenu){

            ?>

          <ul class="top-sales-details">
            <li>
            
            <a href="#">
              <?php echo '<img src="data:image/jpeg;base64,'.base64_encode($fmenu['foodimage']).'"/>'; ?>
              <span class="product"><?= $fmenu['foodname'] ?></span>
            </a>
            <span class="price"><?= $fmenu['foodprice'] ?></span>
          </li>
          </ul>



            <?php

          ?>  

          <?php
             }
            ?>

        </div>
      </div>
    </div>
    </div>
        </div>
  <div id="foodpg" class="fpg">

    <div class="staf" id="staff">

<div class=" home-content " >
  <div class="overview-boxes">
  <div class="box">
    <div class="right-side">
        <div class="number"></div>
      
      </div>
    </div>
    <div class="box">
    <div class="right-side">
        <div class="number"></div>
      
      </div>
    </div>


  <div class="sales-boxes">
    <div class="recent-sales box">
      <div class="">


         <?php	

             $status = "prepared";

            $query = "SELECT *  FROM staff";
            $query_run = mysqli_query($conn, $query);
            foreach($query_run as $staff){

               ?>  

    
          <div>
           <!-- <div class="customer-name"></div>
            <div class="payment-mode">/</div>-->
           
           <div class="overview-boxing">
             <div class="box">
              <div class="right-side">
              <div class="staff-details" ><?= $staff['name']; ?></div>
              
              <div class="staff-details"><?= $staff['id']; ?></div>
              <div class="staff-details"><?= $staff['national_id']; ?></div>
              <div class="staff-details" ><?= $staff['type']; ?></div>
              <div class="edit-btn">
              <a class="staff-link" href="editstafemploy.php?stefeneme=<?=$staff['id']; ?>">EDIT</a>
              </div>
             </div>
           </div><br><br>
            </div>
          <?php
          }

          ?>


      <div class="add-box">
        <a href="manager.php" class="add-staff">ADD STAFF</a>
      </div>
      </div>
    </div>
    <div class="dpg" id="drinkpg">


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