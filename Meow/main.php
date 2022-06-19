<?php
session_start();

include("connection.php");
include("functions.php");
 

?>

<!DOCTYPE html>
<html lang="ro">
    <head>
        <meta charset="utf-8">
        <title>MainPAge</title>
        <link rel="stylesheet" href="main.css" />
        <meta name="viewport" content="width=device-width, initial-scale=1">

    </head>
    
    <body>
          <div class="container">
                <ul class="nav">
                    <li>
                        <a href="aboutus.php">About Us</a>
                    </li>
                    <li>
                        <a href="login.php">Login</a>
                    </li>
                    <li>
                        <a href="register.php">Sign In</a>
                    </li>
                </ul>
            </div>
        </header>
            <div class="text">
                <h1>Zoo Planet: Join our great BIG zoo family and <a href="register.php">Sign In</a> to become a member!</h1>
            </div>
    </body>
</html> 
