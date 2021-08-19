<?php
    while($row = mysqli_fetch_assoc($query)){

        $sql2 = "SELECT * FROM `message` WHERE (`iid` = {$row['unique_id']} OR `oid` = {$row['unique_id']}) AND (`oid` = {$outgoing_id} OR `iid` = {$outgoing_id}) ORDER BY msg_id DESC LIMIT 1";

        $query2 = mysqli_query($conn, $sql2);

        $row2 = mysqli_fetch_assoc($query2);

        (mysqli_num_rows($query2) > 0) ? $result = $row2['msg'] : $result ="No message available";

        $cssprop="";

        ($row['status']=="offline")?$cssprop="offline":$cssprop="";

        (strlen($result)>28)?$msg=substr($result,0,28)."...":$msg=$result;

        $output .='<a href="chat.php?userid='.$row['unique_id'].'" class="rep">
                            <div class="content '.$cssprop.'" id="listing" >
                                <img src="php/profileimage/'.$row['img'].'" alt="" width="75" heigh="75">
                                <div class="details">
                                    <p><h4 style="margin-bottom:-10%;">'.$row['fname'].' '.$row['lname'].'</h4><br>
                                    '.$msg.'</p>
                                    
                                </div>
                            </div>
                        </a>';
        }

?>






