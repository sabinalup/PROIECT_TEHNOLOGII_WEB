<?php
include("connection.php");
include("functions.php");



if($_SERVER['REQUEST_METHOD'] == "POST"){

    $old_pswd=$_POST['password'];
    $new_pswd=$_POST['new_password'];
    $chk_pswd=$_POST['old_password'];


}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Your Account</title>
        <link rel="stylesheet" href="style_.css" type="text/css" />
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible"
        content="IE=edge" />
        <meta name="viewport"
        content="width=device-width, initial-scale=1.0" />
        <link rel="stylesheet" href="./normalize.css" />
        <link rel="stylesheet" href="./main1.css" />
    </head>

    <body> 
        <!--Security & Privacy-->>

        <form method="post">
          <div class="box">
            <h2>Change your password</h2>
            
            <label for="password">Current Password:</label><br>
            <input type="password" id="password" name="password" value="******"><br><br>
           
            <label for="new_password">New Password:</label><br>
            <input type="password" id="new_password" ><br><br>
           
            <label for="confirm_password">Confirm Password:</label><br>
            <input type="password" id="confirm_password" ><br><br>

            <div class="Save">
                <input type="submit" value="Save">
            </div>
            
          </div>
          </form> 

          <!--sidebar-->
          <nav class="navbar">
            <ul class="navbar-nav">
              <li class="logo">
                <a href="index.php" class="nav-link">
                  <span class="link-text logo-text">Zoo Planet</span>
                </a>
              </li>
        
              <li class="nav-item">
                <a href="security.php" class="nav-link">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M288 208C288 216.8 280.8 224 272 224C263.2 224 255.1 216.8 255.1 208C255.1 199.2 263.2 192 272 192C280.8 192 288 199.2 288 208zM256.3-.0068C261.9-.0507 267.3 1.386 272.1 4.066L476.5 90.53C487.7 95.27 495.2 105.1 495.9 118.1C501.6 213.6 466.7 421.9 272.5 507.7C267.6 510.5 261.1 512.1 256.3 512C250.5 512.1 244.9 510.5 239.1 507.7C45.8 421.9 10.95 213.6 16.57 118.1C17.28 105.1 24.83 95.27 36.04 90.53L240.4 4.066C245.2 1.386 250.7-.0507 256.3-.0068H256.3zM160.9 286.2L143.1 320L272 384V320H320C364.2 320 400 284.2 400 240V208C400 199.2 392.8 192 384 192H320L312.8 177.7C307.4 166.8 296.3 160 284.2 160H239.1V224C239.1 259.3 211.3 288 175.1 288C170.8 288 165.7 287.4 160.9 286.2H160.9zM143.1 176V224C143.1 241.7 158.3 256 175.1 256C193.7 256 207.1 241.7 207.1 224V160H159.1C151.2 160 143.1 167.2 143.1 176z"/></svg>
                  <span class="link-text">Security&Privacy</span>
                </a>
              </li>
        
              <li class="nav-item">
                <a href="account.php" class="nav-link">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path d="M224 256c70.7 0 128-57.31 128-128s-57.3-128-128-128C153.3 0 96 57.31 96 128S153.3 256 224 256zM274.7 304H173.3C77.61 304 0 381.6 0 477.3c0 19.14 15.52 34.67 34.66 34.67h378.7C432.5 512 448 496.5 448 477.3C448 381.6 370.4 304 274.7 304z"/></svg>
                  <span class="link-text">Your Account</span>
                </a>
              </li>
        
              <li class="nav-item">
                <a href="animals.php" class="nav-link">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512"><path d="M584.2 96.36c-28.88-1.701-54.71 17.02-79.74 26.49C490 88.22 455.9 64 416 64c-11.25 0-22 2.252-32 5.877V56C384 42.75 373.2 32 360 32h-16C330.8 32 320 42.75 320 56v49C285.1 79.62 241.2 64 192 64C85.1 64 0 135.6 0 224v232C0 469.3 10.75 480 24 480h48C85.25 480 96 469.3 96 456v-62.87C128.4 407.5 166.8 416 208 416s79.63-8.492 112-22.87V456c0 13.25 10.75 24 24 24h48c13.25 0 24-10.75 24-24V288h128v32c0 8.837 7.163 16 16 16h32c8.837 0 16-7.163 16-16V288c17.62 0 32-14.38 32-32l-.0001-96.07C639.1 127.8 616.4 98.25 584.2 96.36zM447.1 176c-8.875 0-16-7.125-16-16S439.1 144 448 144s16 7.125 16 16S456.9 176 447.1 176z"/></svg>
                  <span class="link-text">Animals</span>
                </a>
              </li>

            </ul>
          </nav>
    </body>
</html>
