<?php

include 'config.php';
session_start();

if(isset($_POST['submit'])){

   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $pass = mysqli_real_escape_string($conn, md5($_POST['password']));

   $select = mysqli_query($conn, "SELECT * FROM `user_form` WHERE email = '$email' AND password = '$pass'") or die('query failed');

   if(mysqli_num_rows($select) > 0){
      $row = mysqli_fetch_assoc($select);
      $_SESSION['user_id'] = $row['id'];
      header('location:index.php');
   }else{
    echo '<script>alert("Email ID or Password is Invalid!");</script>';
   }

}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/login.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/crypto-js/4.1.1/crypto-js.min.js"></script>
  <!-- preloader -->
  <link rel="stylesheet" href="css/preloader/preloader.css">
  <title>Log In</title>
  <style>
    section{
        background-position: center;
        background-size: cover;
    }
    body{
        background: #222;
    }
  </style>
</head>
<body>

<!-- preloader -->
<div id="preloader"></div>

    <section>
        <div class="form-box">
            <div class="form-value">
                <!-- <form action=""> -->
                <form action="" method="post" enctype="multipart/form-data">
                    <h2>Login</h2>
                    <div class="inputbox">
                        <input type="email" name="email" class="form-control" placeholder="Email ID" required>
                        <ion-icon name="mail-outline"></ion-icon>
                    </div>
                    <div class="inputbox">
                        <ion-icon name="lock-closed-outline"></ion-icon>
                        <input type="password" name="password" placeholder="Password" class="form-control" required>
                    </div>
                    <button type="submit" name="submit" value="login now" >Log In</button>
                    <div class="register">
                        <p>Don't have a account? <a href="register.php">Register</a></p>
                    </div>
                </form>
            </div>
        </div>
    </section>
    
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <script src="js/preloader/script.js"></script>
</body>
</html>