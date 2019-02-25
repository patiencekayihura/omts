<?php
$host_name = 'localhost';
$database_user = "root";
$database_password = "";
$database_name = "omts";

$connection = new mysqli($host_name,$database_user,$database_password,$database_name);
if ($connection->connect_error) die ("Failled to connect to the database ". mysqli_error());
?>

