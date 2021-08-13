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
        <section class="users">
            <header>

            <?php 
                include_once "php/config.php";
                 $sql = mysqli_query($conn, "SELECT * FROM users WHERE unique_id = {$_SESSION['unique_id']}");
                if(mysqli_num_rows($sql) > 0){
                    $row = mysqli_fetch_assoc($sql);
                }
            ?>

                <div class="content">
                    
                    <div class="details">
                        
                        <span>
                            <img src="php/profileimage/<?php echo $row['img'];?>" alt="Something went Wrong" width="60" height="60" class="profilepic"> 
                            <div>
                                <?php echo $row['fname']." ".$row['lname'] ?><br>
                                <p>
                                     <img src="pics/greencircle.png" alt="" width="15" height="15px"      style="transform: translateY(2.2px);"> <?php echo $row['status']; ?>
                                </p> 
                            </div> 
                        </span>

                        
                    </div>
                </div>
                <a href="php/logout.php?logoutid=<?php echo $_SESSION['unique_id']?>" class="logout" style="margin-left:5%;">Logout</a>
            </header>
            <div class="search">
                <span class="text">Search a user</span>
                <div>
                <input type="text" placeholder="Enter the Email to search">
                <button id="searchbutton"><img src="search1.png" width="20"></button>
                </div>
            </div>

            <div class="users-list" id="lists">
                
            </div>

        </section>
    </div>

    <script src="javascript/users.js"></script>
</body>
</html>