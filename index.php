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
        <section class="form signup">
            <header>Sytes</header>
            <h2 style="color:white;text-align:center;font-weight:200;font-size:20px">Signup</h2>
            <br>
            <form action="#" enctype="multipart/form-data">
                <div class="error-txt">
                    This is an error message!
                </div>
                <div class="name-details">
                    <div class="field">
                        <input type="text" placeholder="First Name" name="fname" autocomplete="off" required>
                    </div>
                    <div class="field">
                        <input type="text" placeholder="Last Name" name="lname" autocomplete="off" required>
                    </div>
                </div>
                <div class="field">
                    <input type="email" placeholder="Email" name="email" autocomplete="off" required>
                </div>
                <div class="field">
                        <input type="password" placeholder="password" name="password" autocomplete="off"  minlength="8" required>
                    </div>
                    <div class="field" id="profile">
                        <label>Select Profile picture</label>
                        <input type="file" name="image" required>
                    </div>
                    <div class="field" id="signupbutton">
                        <input type="submit" value="Signup" class="signupbtn">
                    </div>
                </form>
                <div class="link">Have an account? <a href="login.php">Login Here</a></div>
            </section>
    </div>

    <script src="javascript/signup.js"></script>
</body>
</html>