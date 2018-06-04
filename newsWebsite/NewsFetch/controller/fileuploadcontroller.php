<?php

include("../model/Profile.php");

$title = $_POST["title"];
$description = $_POST["description"];
$date =  $_POST["date"];

// echo $title;
// echo $description;
// echo $date;

Profile::uploadpar($title,$description,$date);

?>
