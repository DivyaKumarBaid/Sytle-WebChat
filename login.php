<?php 
  session_start();
  if(isset($_SESSION['unique_id'])){
    echo "<script> location.href='users.php'; </script>";
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <meta http-equiv="refresh" content="3"> -->
    <link rel="stylesheet" href="style.css">
    <title>Chat Application</title>
</head>
<body>
    <div class="wrapper">
        <section class="form login">
            <header>Weebo</header>
            <h2 style="color:white;text-align:center;font-weight:200;font-size:20px">Login</h2>
            <br>
            <form action="#">
                <div class="error-txt">
                </div>
                <div class="field">
                    <input type="email" placeholder="Email" name="email" autocomplete="off">
                </div>
                <div class="field">
                        <input type="password" placeholder="Password" name="password" autocomplete="off" minlength="8">
                </div>
                    <div class="field" id="signupbutton">
                        <input type="submit" value="Login" class="signupbtn">
                    </div>
                </form>
                <div class="link" style="font-size:14px">Don't have an account? <a href="index.php">Signup Here</a></div>
            </section>
    </div>
    <script src="javascript/login.js"></script>
</body>
</html>