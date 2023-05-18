<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Verdana, Geneva, Tahoma, sans-serif;


        }
        body{
            background-color: #1c2132;
        }
        div{
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 100%;
            text-align: center;
            color: white;
        }
        div span{
           
            
            text-shadow: -0.08em 0.03em 0.12em rgba(0, 0, 0, 0.9);
        }
        div span:not(:first-child){
            margin-left: -0.23em;
        }
        .try-div{
            position:0;
            top:2%;
            left:20%;

        }
        .try-link{
            /*text-decoration: none;*/
            color:white;
            font-size: 25px;
        }
        .contact-link{
            /*text-decoration: none;*/
            color:white;
            font-size: 25px;
        }
    </style>
</head>
<body>
    <div>
        <div>
           <span>E-mail : kalphaxide@gmail.com </span> <br>
           <span> Phone : +254795210828</span>
        </div><br>
            
       
    </div>
    <div  class="try-div">
        <a class="try-link" href="/eorder/menufood.php">Try</a>
        <a class="contact-link" href="/eorder/contact.php">Contact</a>
    </div>
</body>
</html>