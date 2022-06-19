<?php
session_start();

include("connection.php");
include("functions.php");

if($_SERVER['REQUEST_METHOD'] == "POST")
{
    $user_fname=$_POST['fname'];
    $user_lname=$_POST['lname'];
    $user_email=$_POST['email'];
    $user_pswd=$_POST['password'];
 
    if(empty($user_fname) || empty($user_lname) || empty($user_email) || empty($user_pswd))
    {

        echo"please enter valid info!";
    
    }
    else{
        $query="INSERT INTO users (FirstName, LastName, Email, Password) VALUES('$user_fname','$user_lname','$user_email','$user_pswd')";
        mysqli_query($con, $query);

        header("Location: login.php");
        die;
    }
}

    
?>
<!DOCTYPE html>
<html lang="ro">
    <head>
        <meta charset="utf-8">
        <title>Register</title>
        <link rel="stylesheet" href="style2.css" type="text/css" />
        <meta name="viewport" content="width=device-width, initial-scale=1">

    </head>

    <body>
        <h3>Zoo Planet</h3>
          <form method="post">
                <div class="box">
                    <div class="img">
                        <img src="Panda%20Bear.png" alt="Panda Bear Icon" style="width:33%; height:25%">
                    </div>

                    <h1>SIGN IN</h1>

                    <div class="container">
                    <label for="fname">First name</label><br>
                    <input type="text" id="fname" placeholder="First Name" name="fname"><br><br>
                        
                    <label for="lname">Last name</label><br>
                    <input type="text" id="lname" placeholder="Last Name" name="lname"><br><br>

                    <label for="email">Email:</label><br>
                    <input type="email" id="email" placeholder="Email" name="email"><br><br>

                    <label for="password">Password</label><br>
                    <input type="password" id="password" placeholder="Enter Password" name="password" ><br><br>
                      
                    <button type="submit">Register</button>
                    
                    <h2>Or click here to <a href="login.php">LOG IN</a></h2>
                    </div>
                </div>
              </form>
    </body>
</html>