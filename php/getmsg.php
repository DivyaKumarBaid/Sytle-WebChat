<?php
    session_start();
    if(isset($_SESSION['unique_id'])){
        include_once "config.php";
        //outgoing msg id
        $oid=$_SESSION['unique_id'];
        //incoming msg id
        $iid=mysqli_real_escape_string($conn,$_POST['incomingchat']);
     
        
        $dates="";

        $sql = mysqli_query($conn,"SELECT * FROM `message` WHERE (`iid` = {$iid} AND `oid` = {$oid}) OR (`iid` = {$oid} AND `oid` = {$iid}) ORDER BY msg_id");

        $output = "";

        if(mysqli_num_rows($sql)>0){
            while($row = mysqli_fetch_assoc($sql)){

                if($dates != $row['date']){
                    $output .="<div class='dateincase'>".$row['date']."</div>";
                    $dates=$row['date'];
                }

                if($row['oid'] === $oid){
                    //if this is send by the user
                    $output .='<div class="chat outgoing">
                                    <div class="details">
                                        <p>'.$row['msg'].'<sub>&nbsp;'.$row['time'].'</sub></p>
                                    </div>
                                </div>';
                }
                else{
                    //if this is send by the other side
                    $output .='<div class="chat incoming">
                                    <div class="details">
                                        <p>'.$row['msg'].'<sub>&nbsp'.$row['time'].'</sub>'.'</p>
                                    </div>
                                </div>';
                }
            }    
        }else{
            $output .= '<div class="text">No messages are available. Once you send message they will appear here.</div>';
        }
            echo $output;
    }else{
        echo "<script> location.href='../login.php'; </script>";
    }
    

?>