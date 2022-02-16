<?php
$servername = "localhost";
$username = "root";
$password = "";
$db = "spark_bank";
$conn = new mysqli($servername,$username,$password,$db);
if(!$conn){
    die("Error on the Connection".$conn->connect_error);
}

?>