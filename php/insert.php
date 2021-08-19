<?php
    session_start();
    if(isset($_SESSION['unique_id'])){
        date_default_timezone_set("Asia/Kolkata");
        include_once "config.php";
        //outgoing msg id
        $oid=$_SESSION['unique_id'];
        //incoming msg id
        $iid=mysqli_real_escape_string($conn,$_POST['incomingchat']);
        //message
        $message = mysqli_real_escape_string($conn, $_POST['message']);
        $msg="";
        $dates=date("d/m/Y");

        $times=date("h:ia");
        $len=strlen($message);
        $point=0;

        while($point<$len){
            $msg=$msg.substr($message,$point,$point+50)." ";
            $point=$point+50;
        }

        if(!empty($msg)){
            $sql=mysqli_query($conn,"INSERT INTO `message` (`iid`, `oid` , `msg`,`date`,`time`) VALUES ('{$iid}','{$oid}','{$msg}','{$dates}','{$times}')") ;
            }
    }else{
        echo "<script> location.href='../login.php'; </script>";
    }
    

?>