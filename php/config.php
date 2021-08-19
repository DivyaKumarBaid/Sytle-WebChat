<?php

$server="---------";
$username="------------";
$password = "-------------";
$database="--------";

$conn=mysqli_connect($server,$username,$password,$database);
if(!$conn){
    echo"<script>alert('Connection Failed.')</script>";
}



?>