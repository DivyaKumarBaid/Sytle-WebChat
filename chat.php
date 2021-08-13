<?php
session_start();
include_once "php/config.php";
if(!isset($_SESSION['unique_id'])){
     echo "<script> location.href='login.php'; </script>";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <meta http-equiv="refresh" content="3"> -->
    <link rel="stylesheet" href="style2.css">
    <title>Chat Application</title>
</head>
<body>
    <div class="wrapper">
        <section class="chat-area">
            <header>

                <?php 
                include_once "php/config.php";
                $userid = mysqli_real_escape_string($conn, $_GET['userid']);
                $sql = mysqli_query($conn, "SELECT * FROM users WHERE unique_id = {$userid}");
                if(mysqli_num_rows($sql) > 0){
                    $row=mysqli_fetch_assoc($sql);
                    $cssprop="";
                    $imgsrc="";
                    ($row['status']=="offline")?$cssprop="offline":$cssprop="";
                    ($row['status']=="offline")?$imgsrc="pics/grey.png":$imgsrc="pics/greencircle.png";

                }else{
                    echo "<script> location.href='.php'; </script>";
                }

                ?>

                <div class="content">
                    
                    <div class="details">
                        
                        <span>
                            <a href="users.php">
                                <img src="pics/arrow.png" alt="" style="transform:rotate(180deg);">
                            </a>
                            <img src="php/profileimage/<?php echo $row['img']?>" alt="" width="50" class="profilepic">
                            <div class="<?php echo $cssprop?>">
                                <?php echo $row['fname']." ".$row['lname'] ?><br>
                                <p>
                                     <img src="<?php echo $imgsrc?>" alt="" width="15" height="15px" style="transform: translateY(2.2px);"><?php echo $row['status'] ?>
                                </p> 
                            </div> 
                        </span>
                    </div>
                </div>
            </header>
            <div class="chat-box">
                
            </div>
            <form action="" class="typing-area">
                <input type="text" name="outgoingchat" value="<?php echo $_SESSION['unique_id']; ?>" style="display:none;">
                <input type="text" name="incomingchat" value="<?php echo $userid;?>" style="display:none;">
                <input type="text" placeholder="Type a Message...." class="infield" name="message" autocomplete="off">
                <button class="msgbtn"><img src="pics/send.png" alt="" width="32" style="transform:rotate(90deg)"></button>
            </form>
        </section>
    </div>

    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="javascript/chat.js"></script>
</body>
</html>