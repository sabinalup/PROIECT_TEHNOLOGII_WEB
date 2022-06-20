<?php
include("connection.php");
include("functions.php");
 $animal= $_GET['animal'];

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Your Account</title>
        <link rel="stylesheet" href="style4.css" type="text/css" />
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible"
        content="IE=edge" />
        <meta name="viewport"
        content="width=device-width, initial-scale=1.0" />
        <link rel="stylesheet" href="./normalize.css" />
        <link rel="stylesheet" href="./main1.css" />
    </head>

    <body>
      <div class="box">
        <div class="description">
           <div class="info">
            <?php
            $sql= "SELECT * FROM animal_description WHERE Name='$animal'";
            $stmt = mysqli_stmt_init($con);
  
            if(!mysqli_stmt_prepare($stmt, $sql)){
                    echo "";
            }
            else {
              mysqli_stmt_execute($stmt);
  
              $result = mysqli_stmt_get_result($stmt);
              $row = mysqli_fetch_assoc($result);
            }
            echo'<h1>'.$row["Name"].'</h1>
            <p>'.$row["Scientific_Name"].'</p>
            <p>Range: '.$row["Range1"].'</p>
            <p>Status: '.$row["Status1"].'</p>
            <p>Type: '.$row["Type"].'</p>
            <p>Related species:'.$row["Related_species"].' </p>
            <p>Natural Predators:'.$row["Natural_predators"].'</p>
            <p>Diet: '.$row["Diet"].' </p>
            <p>Reproduction:'.$row["Reproduction"].'</p>
            <p>Lifespan: '.$row["Lifespan"].'</p>
            
            </div>
              
               <img src="animals/'.$row["FileName"].'" class="animal" alt="'.$row["Name"].'">
               
        </div>
        <h2>Description</h2>
        <div class="general">
          <p>'.$row["Description"].'</p>
      </div>
      </div>'
      ?>
    <nav class="navbar">
            <ul class="navbar-nav">
              <li class="logo">
                <a href="main.php" class="nav-link">
                  <span class="link-text logo-text">Zoo Planet</span>
                </a>
              </li>
        
              <li class="nav-item">
                <a href="animals.php" class="nav-link">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512"><path d="M584.2 96.36c-28.88-1.701-54.71 17.02-79.74 26.49C490 88.22 455.9 64 416 64c-11.25 0-22 2.252-32 5.877V56C384 42.75 373.2 32 360 32h-16C330.8 32 320 42.75 320 56v49C285.1 79.62 241.2 64 192 64C85.1 64 0 135.6 0 224v232C0 469.3 10.75 480 24 480h48C85.25 480 96 469.3 96 456v-62.87C128.4 407.5 166.8 416 208 416s79.63-8.492 112-22.87V456c0 13.25 10.75 24 24 24h48c13.25 0 24-10.75 24-24V288h128v32c0 8.837 7.163 16 16 16h32c8.837 0 16-7.163 16-16V288c17.62 0 32-14.38 32-32l-.0001-96.07C639.1 127.8 616.4 98.25 584.2 96.36zM447.1 176c-8.875 0-16-7.125-16-16S439.1 144 448 144s16 7.125 16 16S456.9 176 447.1 176z"/></svg>
                  <span class="link-text">Animals</span>
                </a>
              </li>
      
              <li class="nav-item">
                <a href="upload.php" class="nav-link">
                  <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"><path d="M256 405.1V456C256 469.3 245.3 480 232 480C218.7 480 208 469.3 208 456V415.3C202.7 415.8 197.4 416 192 416C175.4 416 159.3 413.9 144 409.1V456C144 469.3 133.3 480 120 480C106.7 480 96 469.3 96 456V390.3C38.61 357.1 0 295.1 0 224C0 117.1 85.96 32 192 32C228.3 32 262.3 42.08 291.2 59.6C322.4 78.44 355.9 96 392.3 96H448C518.7 96 576 153.3 576 224V464C576 470.1 571.5 477.2 564.8 479.3C558.2 481.4 550.9 478.9 546.9 473.2L461.6 351.3C457.1 351.8 452.6 352 448 352H392.3C355.9 352 322.4 369.6 291.2 388.4C280.2 395.1 268.4 400.7 256 405.1zM448 248C461.3 248 472 237.3 472 224C472 210.7 461.3 200 448 200C434.7 200 424 210.7 424 224C424 237.3 434.7 248 448 248z"/></svg>
                  <span class="link-text">Upload Animal</span>
                </a>
              </li>
      
            </ul>
          </nav>
          </body>
</html>