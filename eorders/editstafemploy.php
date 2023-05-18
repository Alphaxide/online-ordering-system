   <?php
require('connection.php');

      if(isset($_GET['stefeneme']))
      {

        $staffid = mysqli_real_escape_string($conn, $_GET['stefeneme']);

        $query = "SELECT * FROM staff where id = '$staffid' ";
        $query_run = mysqli_query($conn,$query);

        $staff = mysqli_fetch_array($query_run);

        ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit</title>
    <style>
        .editform{
            float:center;
            width:80%;
            margin-left:10%;
            margin-right:10%;
            padding-left:20px;
            padding-top:20px;
        }
        .name{
            font-size:20px;
            font-weight:300;
            margin-bottom:10px;
        }
        .status{
            font-size:20px;
        }
        
        .statusbox{
            font-size:20px;
            border-top:none;
            border-right:none;
            border-left:none;
            border-bottom:solid;
        }
        .value{
            font-size:20px;
            border-top:none;

            border-bottom:solid;
        }
        .btn{
            border:none;
            background-color:black;
            color:white;
            width:150px;
            height:60px;
            font-size:20px;
        }

    </style>
</head>
<body>
    <div class="editform">
    <form action="editemploy.php" method="POST">
            <div class="name">NAME : <?= $staff['name']; ?></div>
            <div class="name">NATIONAL ID : <?= $staff['national_id']; ?></div>
            <div class="name">STAFF ID : <?= $staff['id']; ?></div>
            <div class="name">PHONE NO : <?= $staff['phone_no']; ?></div>
            <label for="status" class="status">STATUS</label>
            <select name="status" id="status" class="statusbox">
                <option value="active" class="value">ACTIVE</option>
                <option value="off" class="value">OFF</option>
            </select><br><br>
            <input type="hidden" value="<?= $staffid ?>" name="id">
            <button type="SUBMIT" class="btn" name="edit">CHANGE</button>

        </form>
    </div>
</body>
</html>
        <?php
      }else{
        header("Location: menufood.php ");
        exit();
      }
                     
     ?>
