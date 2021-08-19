<?php 

    session_start();
    if(isset($_SESSION['unique_id'])){
        include_once "config.php";
        $logoutid=mysqli_real_escape_string($conn , $_GET['logoutid']);

        if(isset($logoutid)){
        $status="offline";
        $sql = mysqli_query($conn , "UPDATE users SET status = '{$status}' WHERE unique_id = '{$_SESSION['unique_id']}'");
        
            if($sql){
                session_unset();
                session_destroy();
                echo "<script type='text/javascript'>location.href = '../login.php';</script>";
            }
        }else{
            echo "<script type='text/javascript'>location.href = '../users.php';</script>";
        }

    }else{
        echo "<script type='text/javascript'>location.href = '../login.php';</script>";
    }
    

?>