<?php

$dbhost = "localhost";
$dbuser = "root";
$dbpswd = "";
$dbname = "proiect_tw";

if(!$con = mysqli_connect($dbhost, $dbuser, $dbpswd, $dbname)){

    die("failed to connect");
}