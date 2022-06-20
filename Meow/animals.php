<?php
         include("connection.php");
         include("functions.php");
   
         if(isset($_POST['Filter'])){
         $filter_origin=$_POST['origin'];
         $filter_habitate=$_POST['habitate'];
         $filter_type=$_POST['type'];
         $filter_covered=$_POST['covered'];
         $filter_food=$_POST['food'];
         $filter_situation=$_POST['situation'];

         }
         else{
          $filter_origin='Origin';
          $filter_habitate='Habitate';
          $filter_type='Type';
          $filter_covered='Covered_in';
          $filter_food='Alimentation';
          $filter_situation='Situation';
         }
echo'
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Your Account</title>
        <link rel="stylesheet" href="style3.css" type="text/css" />
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible"
        content="IE=edge" />
        <meta name="viewport"
        content="width=device-width, initial-scale=1.0" />
        <link rel="stylesheet" href="./normalize.css" />
        <link rel="stylesheet" href="./main1.css" />
    </head>

    <body> 
      
      <form method="post">
      <div class="filter">
          <select id="origin" class="options" name="origin">
          <option value="Origin">Origin</option>
          <option value="Central Asia">Central Asia</option>
          <option value="Australia">Australia</option>
          <option value="North America">North America</option>
          <option value="South America">South America</option>
          <option value="Central America">Central America</option>
          <option value="Europe">Europe</option>
          <option value="Asia">Asia</option>
          <option value="North Africa">North Africa</option>
          <option value="South Africa">South Africa</option>
          <option value="New Zealand">New Zealand</option>
        </select>
        <select id="habitate" class="options" name="habitate">
          <option value="Habitate">Habitate</option>
          <option value="Desert">Desert</option>
          <option value="Tropical">Tropical</option>
          <option value="Forrest">Forrest</option>
          <option value="Savanah">Savanah</option>
        </select>
        <select id="type" class="options" name="type">
          <option value="Type">Type</option>
          <option value="Bird">Bird</option>
          <option value="Reptile">Reptile</option>
          <option value="Mammal">Mammal</option>
          <option value="Fish">Fish</option>
        </select>
        <select id="covered" class="options" name="covered">
          <option value="Covered_in">Covered in</option>
          <option value="Fur">Fur</option>
          <option value="Scales">Scales</option>
          <option value="Feathers">Feathers</option>
        </select>
        <select id="food" class="options" name="food">
          <option value="Alimentation">Alimentation</option>
          <option value="Herbivore">Herbivore</option>
          <option value="Carnivore">Carnivore</option>
          <option value="Omnivore">Omnivore</option>
        </select>
        <select id="situation" class="options" name="situation">
          <option value="Situation">Situation</option>
          <option value="Endangered">Endangered</option>
          <option value="Disappearing">Disappearing</option>
          <option value="Safe">Safe</option>
          <option value="Conservation">Conservation</option>
        </select>
        <button type="submit" name="Filter">Filter</button>
        </div>
        </form>
      
      <table class="box">

          <thead class="tableHeader">
          </thead>
          <tbody class="tbody">';
        

          if($filter_origin == 'Origin'){

              $filter_origin='\'Central Asia\',\'Australia\',\'North America\',\'South America\',\'Central America\',\'Europe\',\'Asia\',\'North Africa\',\'South Africa\',\'New Zealand\'';
          }
          else{
            $filter_origin="'$filter_origin'";
          }
          if($filter_habitate == 'Habitate'){
            $filter_habitate='\'Desert\',\'Tropical\',\'Forrest\',\'Savanah\'';
          }
          else{
            $filter_habitate="'$filter_habitate'";
          }
          if($filter_type == 'Type'){
            $filter_type='\'Bird\',\'Reptile\',\'Mammal\',\'Fish\'';
          }
          else{
            $filter_type="'$filter_type'";
          }
          if($filter_covered == 'Covered_in'){
            $filter_covered='\'Fur\',\'Scales\',\'Feathers\'';
          }
          else{
            $filter_covered="'$filter_covered'";     
          }
          if($filter_food == 'Alimentation'){
            $filter_food='\'Herbivore\',\'Carnivore\',\'Omnivore\'';
          }
          else{
            $filter_food="'$filter_food'";
          }
          if($filter_situation == 'Situation'){
            $filter_situation='\'Endangered\',\'Disappearing\',\'Safe\',\'Conservation\'';

          }
          else{
            $filter_situation="'$filter_situation'";
          }
          $sql= "SELECT * FROM gallery  WHERE Origin in ($filter_origin) AND Habitate in ($filter_habitate) AND Type in ($filter_type) AND Covered_in in ($filter_covered) AND Alimentation in ($filter_food) AND Situation in ($filter_situation);";
          $stmt = mysqli_stmt_init($con);

          if(!mysqli_stmt_prepare($stmt, $sql)){
                  echo "";
          }
          else {
            mysqli_stmt_execute($stmt);

            $result = mysqli_stmt_get_result($stmt);
            $nr=0;
            while($row = mysqli_fetch_assoc($result)){
               
               if($nr==0){
                echo '<tr class="row">';
               }
               echo '<td class="animal">
               <a href="animal_page.php?animal='.$row["Name"].'"><img src="./animals/'.$row["FileName"].'" class="animale" alt="'.$row["Name"].'"></a>
               <br>'.$row["Name"].'
             </td>';
             $nr++;
             if($nr==4){
              echo '</tr>';
              $nr=0;
             }
            }
          }
          
        ?>  
         </tbody>
      </table>

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
