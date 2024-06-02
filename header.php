<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Watch Translated Movies for Free</title>
    <meta name="description" content="Watch Translated Movies on Your Phone for Free">
    <link rel="icon" href="images/unnamed.ico" type="image/x-icon">
    <link rel="shortcut icon" href="images/unnamed.ico" type="image/x-icon"> <!-- For compatibility with older browsers -->

    <style>
        *{
            margin: 0;
            padding: 0;

        }
        body{
            background-color: rgb(46, 2, 2);
            background-repeat: no-repeat;
            background-size: cover;
        }
        .header{
            width: 100%;
            height: 30vh;
            padding-top:30px;
            background-color: rgb(22, 1, 1);
            box-shadow:5px, 5px, 15px,white;
           
            

        }
        .heading{
            color: white;
            display:inline-block;
        }
        .top-part{
            height: 8vh;
            width: 80%;
            padding-left: 30px;
            
            background-color: rgb(22, 1, 1);
            
        }
        .middle-part{
            height: 6vh;
            width: 100%;
            background-color: rgb(22, 1, 1);
            display: flex;
            justify-content: end;
            align-items: center;
        }
        .bottom-part{
            display: flex;
            background-color: rgb(22, 1, 1);
            justify-content: start;
            margin-top: 20px;
            height: 6vh;
            width: 60%;
           
        }
        .header-ul{
            display: flex;
            justify-content: end;
            width: 80%;
        }
        .menu{
            font-size: 17px;
            color: beige;
            padding-top:10px;
            padding-bottom:10px;
            padding-left:15px;
            padding-right:15px;
            list-style: none;

        }
        .menu:hover{
            background-color: red;
            cursor: pointer;

        }
        .vj-selection{
            padding: 10px;
            border-color: red;
            border-radius: 5px;
            margin-left:10px;
            background-color: rgba(0, 0, 0, 0);
            color: white;
        }
        .vj-selection:hover{
            background-color:red;
            cursor: pointer;
        }

        @media only screen and (max-width: 768px) {


            .middle-part{
            height: 10vh;
            width: 100%;
            margin-top:30px;
            display: flex;
            justify-content:center;
           
           
            align-items: center;
        }
        .menu{
            font-size: 16px;
            padding-top:10px;
            padding-bottom:10px;
            padding-left:5px;
            padding-right:5px;
            list-style: none;

        }
        .bottom-part{
            
            display: flex;
            flex-wrap:wrap;
            justify-content: center;
            margin-top: 20px;
            height: 6vh;
            width: 100%;
           
        }
        .vj-selection{
            margin-left:5px;
            margin-top:5px;
            padding: 10px;
            border-color: red;
            border-radius: 5px;
            background-color: rgba(0, 0, 0, 0);
            color: white;
        }
        .vj-selection:hover{
            background-color:red;
            
        }
       
        .header{
            width: 100%;
            height: 45vh;
           
            

        }
        .top-part{
            height: 8vh;
            width: 80%;
            padding-left: 30px;
            margin-top: 30px;
            
        }
        
            
        }
    </style>
</head>
<body>
    <div class="header">
        <div class="top-part">
            <h1 class="heading">What Would You Like to watch?</h1>
        </div>
        <div class="middle-part">
            <ul class="header-ul">
            <a href="index.php"><li class="menu">Home</li></a>
            <a href="all.php"><li class="menu">All</li></a>
            <a href="serieshome.php"><li class="menu">Series</li></a>
            <a href="cartoons.php"><li class="menu">Cartoons</li></a>
            <a href=""><li class="menu">Local</li></a>
            </ul>
        </div>
        <div class="bottom-part">
            <a href="junior.php"><button class="vj-selection">VJ Junior</button></a>
            <a href="icep.php"><button class="vj-selection">VJ Ice P</button></a>
            <a href="emmy.php"><button class="vj-selection">VJ Emmy</button></a>
            <a href="kevo.php"><button class="vj-selection">VJ Kevo</button></a>
            <a href="jingo.php"><button class="vj-selection">VJ Jingo</button></a>
            <a href="others.php"><button class="vj-selection">Others</button></a>
        </div>
    </div>
</body>
</html>