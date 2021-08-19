<?php
    session_start();
    $outgoing_id=$_SESSION['unique_id'];
    include_once "config.php";
    $searchTerm = mysqli_real_escape_string($conn, $_POST['searchterm']);
    $outgoing_id = $_SESSION['unique_id'];
    $output="";
    $sql = "SELECT * FROM users WHERE NOT unique_id = {$outgoing_id} AND (fname LIKE '%{$searchTerm}%' OR lname LIKE '%{$searchTerm}%') ";
    $query = mysqli_query($conn, $sql);
    if(mysqli_num_rows($query)>0){
        include "list.php";
    }else{
        $output .="No user found !";
    }
    echo $output;

?>