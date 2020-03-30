<?php 
// start session
session_start();
// if no any session or cookie is set, redirect to main page
if (!isset($_SESSION['uname']) && !isset($_COOKIE['uname'])) {
    header("location:index.html");  
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Flexbox</title>
    <style>
        body {
            margin: 0;
            background-color: rgb(41, 39, 39);
        }

        header {
            display: flex;
            background-color: #B00020;
        }

        header>div {
            display: flex;
        }

        header>div>p {

            color: white;
            font-family: cursive;
            margin-left: 4%;
            font-size: larger;
        }

        nav {
            margin-left: auto;
            margin-right: 5%;
        }

        nav>ul {
            list-style: none;
            display: flex;

        }

        nav>ul>li {
            margin: 2% 5% 2% 0%;
            padding: 2%;
            font-size: larger;
        }

        nav a {
            color: white;
        }

        nav a:link {
            text-decoration: none;
        }

        #title-container {
            margin: 2% auto;
            width: 60%;
            padding: 2%;
            background-color: blanchedalmond;
            border: 2px solid #B00020;
            border-radius: 50px 20px;
        }

        #title-content {
            margin: auto;
            width: fit-content;
        }

        #title-content>h1 {
            font-family: cursive;
            margin-top: 0;
            font-size: -webkit-xxx-large;
        }

        #gallery-container {
            display: flex;
            /* margin: auto;
            width: fit-content; */
            margin-left: 2%;
            margin-right: 2%;
            flex-wrap: wrap;
        }

        .gallery-item {
            margin: 2px;
            border: solid #B00020;
        }

        .gallery-item>img {
            width: 300px;
            height: 300px;
        }
    </style>
</head>

<body>

    <header>
        <div class="logo" style="margin-left: 2%;">
            <img id="header-img" src="imgs/camera2.png" alt="logo image" style="width: 30%;" />
            <p>Gallery</p>
        </div>

        <nav>
            <ul>
                <li><a href="#">About</a></li>
                <li><a href="#">Contact</a></li>
                <li><a href="submit.php?logout=1">LogOut</a></li
            </ul>
        </nav>
    </header>
    <div>
        <div id="title-container">
            <div id="title-content">
                <center><img src="imgs/camera.png" width="30%"></center>
                <h1>Welcome</h1>
                <?php 
                if(isset($_SESSION['uname'])){
                echo "<h2>".$_SESSION['uname']."</h2>";
            }else if(isset($_COOKIE['uname'])){
                echo "<h2>". $_COOKIE['uname']."</h2>";
            }
                ?>

            </div>
        </div>

        

    </div>

</body>

</html>
