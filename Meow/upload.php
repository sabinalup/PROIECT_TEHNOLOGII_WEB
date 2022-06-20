<?php
         include("connection.php");
         include("functions.php");

 if($_SERVER['REQUEST_METHOD'] == "POST"){

  //echo "$_POST['animalname'],$_FILES['picture'],$_FILES['page']";
  $FileName = $_POST['animalname'];
  if(empty($FileName)){
      header("Location:upload.php");
  }
  echo"..................$FileName";
  
  $image = $_FILES['picture'];
  $image_name = $image["name"];
  $fileExt = explode(".", $image_name);
  $fileError = $image["error"];
  $fileSize = $image["size"];
  $fileActualExt = strtolower(end($fileExt));
      if($fileError == 0){
          if($fileSize < 2000000){
            move_uploaded_file($image['tmp_name'],"animals/".$image['name']);
          }
        }


  $file = $_FILES['page'];
  $fileName = $_FILES['page']['name'];
  echo"$fileName\n";
  $test=$_FILES['page']['tmp_name'];
  $test1=file_get_contents($test);
  $test1="$test1";
  //echo"$test!";
  //echo "$test1\n";
  $file1 = json_decode($test1,true);
 
    
 $sql= "INSERT INTO gallery (Name, FileName, Origin, Habitate, Type, Covered_in, Alimentation, Situation) VALUES ('".$file1['Name']."','".$file1['FileName']."','".$file1['Origin']."','".$file1['Habitate']."','".$file1['Type']."','".$file1['Covered_in']."','".$file1['Diet']."','".$file1['Status1']."');";
 echo"$sql\n"; 
 $stmt = mysqli_stmt_init($con); 
    if(!mysqli_stmt_prepare($stmt, $sql)){
            echo "it didnt work";
    }
    else {
      mysqli_stmt_execute($stmt);
    }

      $result = mysqli_stmt_get_result($stmt);
 
  $sql1="INSERT INTO animal_description (FileName, Name, Scientific_Name, Range1, Status1, Type, Related_species, Natural_predators, Diet, Reproduction, Lifespan, Description) VALUES ('".$file1['FileName']."','".$file1['Name']."','".$file1['Scientific_Name']."','".$file1['Range1']."','".$file1['Status1']."','".$file1['Type']."','".$file1['Related_species']."','".$file1['Natural_predators']."','".$file1['Diet']."','".$file1['Reproduction']."','".$file1['Lifespan']."','".$file1['Description']."');";
  echo"$sql1"; 
  $stmt1 = mysqli_stmt_init($con); 
       if(!mysqli_stmt_prepare($stmt1, $sql1)){
                echo "";
        }
        else {
          mysqli_stmt_execute($stmt1);
        }
          $result1 = mysqli_stmt_get_result($stmt1);    
  
      Header("Location:animals.php");
    }
 

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Upload</title>
        <link rel="stylesheet" href="style.css" type="text/css" />
        <meta http-equiv="X-UA-Compatible"
        content="IE=edge" />
        <meta name="viewport"
        content="width=device-width, initial-scale=1.0" />
        <link rel="stylesheet" href="./normalize.css" />
        <link rel="stylesheet" href="./main1.css" />
    </head>

    <body> 
        <form action="upload.php" method="post" enctype="multipart/form-data">
          <div class="box">
            <h2>Upload animal</h2>
            <label for="aname">Animal name:</label><br>
            <input type="text" name="animalname" placeholder="Animal name" id="aname">
            <label for="upic">Upload picture:</label><br>
            <input type="file" name="picture" id="upic">
            <label for="uanimal">Upload animal file:</label><br>
            <input type="file" name="page" id="uanimal">
            <button type="submit">Upload Animal</button>
          </div>
        </form>
   
    <!--sidebar-->
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

