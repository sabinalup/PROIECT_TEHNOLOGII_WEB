<?php
session_start();

include("connection.php");
include("functions.php");



if($_SERVER['REQUEST_METHOD'] == "POST")
{
    echo "am intrat";
    $email=$_POST['email'];
    $pswd=$_POST['password'];

    echo "'$email' , '$pswd'";
 
    if(empty($email) || empty($pswd))
    {

        echo "please enter valid info!";
    
    }
    else{
        echo "am intrat aici 1";
        $query="SELECT * FROM users WHERE Email = '$email' limit 1";

        $result = mysqli_query($con, $query);
        echo"am intrat aici 1";
        if($result){
            if($result && mysqli_num_rows($result)>0)
        {
          $user_data = mysqli_fetch_assoc($result);
          
          if($user_data['Password'] == $pswd){

             echo " am intrat aici 2";
             $_SESSION['ID']=$user_data['ID'];
             header("Location:animals.php");
             die;
          }
        }
        }
        echo "am esuat2";
        header("Location: login.php");
        die;
    }
}
?>

<!DOCTYPE html>
<html lang="ro">
    <head>
        <meta charset="utf-8">
        <title>Login</title>
        <link rel="stylesheet" href="style1.css" type="text/css" />
        <meta name="viewport" content="width=device-width, initial-scale=1">

    </head>

    <body>
    <h3>Zoo Planet</h3>
          <form method="post">
                <div class="box">
                    <div class="img">
                        <img src="Panda%20Bear.png" alt="Panda Bear Icon" style="width:33%; height:25%">
                    </div>

                    <h1>LOG IN</h1>

                    <div class="container">
                    <label for="email">Email</label><br>
                    <input type="text" id="email" placeholder="Enter Email" name="email"><br><br>
              
                    <label for="password">Password</label><br>
                    <input type="password" id="password" placeholder="Enter Password" name="password" ><br><br>
                      
                    <button type="submit">Login</button>
                    
                    <h2>Or click here to <a href="register.php">SIGN UP</a></h2>
                    </div>
                </div>
        </form>
    </body>
</html>