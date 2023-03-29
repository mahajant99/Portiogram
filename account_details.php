<?php

include 'config.php';
session_start();

if(isset($_SESSION['user_id'])) {
  $user_id = $_SESSION['user_id'];
  $select = mysqli_query($conn, "SELECT * FROM `user_form` WHERE id = '$user_id'") or die('query failed');
  if(mysqli_num_rows($select) > 0){
      $fetch = mysqli_fetch_assoc($select);
  }

  if(isset($_GET['logout'])){
    unset($user_id);
    session_destroy();
    header('location:login.php');
 }

}

if(isset($_POST['update_profile'])){
  $user_id = $_SESSION['user_id'];
 
  $update_name = mysqli_real_escape_string($conn, $_POST['update_name']);
  $update_username = mysqli_real_escape_string($conn, $_POST['update_username']);
  $update_email = mysqli_real_escape_string($conn, $_POST['update_email']);

  mysqli_query($conn, "UPDATE `user_form` SET name = '$update_name', username = '$update_username', email = '$update_email' WHERE id = '$user_id'") or die('query failed');

  echo "<meta http-equiv='refresh' content='0'>";
  echo '<script>alert("Details updated successfully!");</script>';

}

if(isset($_POST['update_password'])){
  $user_id = $_SESSION['user_id']; 

  $old_pass = $_POST['old_pass'];
  $update_pass = mysqli_real_escape_string($conn, md5($_POST['update_pass']));
  $new_pass = mysqli_real_escape_string($conn, md5($_POST['new_pass']));
  $confirm_pass = mysqli_real_escape_string($conn, md5($_POST['confirm_pass']));

  if(!empty($update_pass) || !empty($new_pass) || !empty($confirm_pass)){
     if($update_pass != $old_pass){
        echo "<meta http-equiv='refresh' content='0'>";
        echo '<script>alert("Old password not matched!");</script>';
     }elseif($new_pass != $confirm_pass){
        echo "<meta http-equiv='refresh' content='0'>";
        echo '<script>alert("Confirm password not matched!");</script>';
     }else{
        mysqli_query($conn, "UPDATE `user_form` SET password = '$confirm_pass' WHERE id = '$user_id'") or die('query failed');
        echo "<meta http-equiv='refresh' content='0'>";
        echo '<script>alert("Password updated successfully!");</script>';
     }
  }
}

if(isset($_POST['update_photo'])){
  $user_id = $_SESSION['user_id']; 

  $update_image = $_FILES['update_image']['name'];
  $update_image_size = $_FILES['update_image']['size'];
  $update_image_tmp_name = $_FILES['update_image']['tmp_name'];
  $update_image_folder = 'uploaded_img/'.$update_image;

  if(!empty($update_image)){
     if($update_image_size > 2000000){
        echo "<meta http-equiv='refresh' content='0'>";
        echo '<script>alert("Image is too large!");</script>';
     }else{
        $image_update_query = mysqli_query($conn, "UPDATE `user_form` SET image = '$update_image' WHERE id = '$user_id'") or die('query failed');
        if($image_update_query){
           move_uploaded_file($update_image_tmp_name, $update_image_folder);
        }
        echo "<meta http-equiv='refresh' content='0'>";
        echo '<script>alert("Image updated succssfully!");</script>';
     }
  }

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Account Details</title>

    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css">

    <!-- custom css file link  -->
    <link rel="stylesheet" href="css/edit_profile/style.css">
    <link rel="stylesheet" href="css/navbar/style.css">
    <!-- dropdown  -->
    <link rel="stylesheet" href="css/dropdown.css">
    <!-- preloader -->
    <link rel="stylesheet" href="css/preloader/preloader.css">
</head>
<body>
<!-- preloader -->
<div id="preloader"></div>

<header class="header">
    <div class="fas fa-bars"></div>
    <a data-aos="zoom-in-left" data-aos-delay="150" href="index.php" class="logo">Portiogram </a>
    <nav class="navbar">
        <a data-aos="zoom-in-left" data-aos-delay="300" href="index.php">home</a>
        <a data-aos="zoom-in-left" data-aos-delay="450" href="category.php">Categories</a>
        <a data-aos="zoom-in-left" data-aos-delay="600" href="recent.php">Recent</a>
        <a data-aos="zoom-in-left" data-aos-delay="750" href="about.php">about</a>
        <a data-aos="zoom-in-left" data-aos-delay="900" href="contact.php">Contact</a>
    </nav>
        <div class="dropdown">
            <?php if(isset($_SESSION['user_id'])) { ?>
                <button data-aos="zoom-in-left" data-aos-delay="1300" class="btn"><?php echo $fetch['username']; ?><i class="fa fa-caret-down"></i></button>
            <?php if($fetch['image'] == ''){ ?>
                <img data-aos="zoom-in-left" data-aos-delay="1500" class="profile-image" src="images/default-avatar.png">
            <?php } else { ?>
                <img data-aos="zoom-in-left" data-aos-delay="1500" class="profile-image" src="uploaded_img/<?php echo $fetch['image']; ?>">
            <?php } ?>
                <div class="dropdown-content">
                    <a></a>
                    <a href="myprofile.php">My Profile</a>
                    <a href="account_details.php">Account Details</a>
                    <a href="index.php?logout=<?php echo $user_id; ?>">Logout</a>
                </div>
        </div>
            <?php } else { ?>
                <button data-aos="zoom-in-left" data-aos-delay="1300" class="btn" onclick="redirectToLogin()">Login </button>
            <?php } ?>
</header>
<!-- header section ends -->

<!-- header section starts  -->
<headerr>
    <div class="user">
        <img src="<?php
                    if($fetch['image'] == ''){
                        echo 'images/default-avatar.png';
                    }else{
                        echo 'uploaded_img/'.$fetch['image'];
                    }
                  ?>" alt="">
        <h3 class="name"><?php echo $fetch['name']; ?></h3>
        <p class="post">(<?php echo $fetch['username']; ?>)</p>
        <p class="post"><?php echo $fetch['occupation']; ?></p>
    </div>
</headerr>
<!-- header section ends -->

<div id="menu" class="fas fa-bars"></div>

<!-- home section starts  -->
<section class="home" id="home">

    <h3>HI THERE !</h3>
    <h1>I'M <span><?php echo $fetch['name']; ?></span></h1>
    <p><?php echo $fetch['about_me']; ?></p>
    <br><br><br><br>
    <div class="info">
        <form action="" method="post" enctype="multipart/form-data">
        <div>    
            <label class="label">Upload new picture  : </label><br>
            <input class="form-control" type="file" name="update_image" accept="image/jpg, image/jpeg, image/png" text="Upload new image"  />
        </div><br>
        <button class="btn" value="update photo" name="update_photo" type="submit"> Update picture <i class="fas fa-paper-plane"></i> </button>
        </form>
    </div>
</section>
<!-- home section ends -->

<!-- Account Details section starts  -->
<section class="about" id="account">
<h1 class="heading"> <span>Account</span> Details </h1>
<div class="row">    

    <div class="info">
        <form action="" method="post" enctype="multipart/form-data">
        <div>    
            <label class="label">Full Name  : </label><br>
            <input class="form-control" type="text" name="update_name" value="<?php echo $fetch['name']; ?>" />
        </div><br>
        <div>
            <label class="label">Username : </label><br>
            <input class="form-control" type="text" name="update_username" value="<?php echo $fetch['username']; ?>" />
        </div><br>
        <div>    
            <label class="label">Email ID  : </label><br>
            <input class="form-control" type="text" name="update_email" value="<?php echo $fetch['email']; ?>" />
        </div><br>
        <button class="btn" value="update profile" name="update_profile" type="submit"> Save Changes <i class="fas fa-paper-plane"></i> </button>
        </form>
    </div>
</div>
</section>
<!-- Account Details section ends  -->

<!-- Change Password section starts  -->
<section class="about" id="education">
    <h1 class="heading"> Change <span>Password</span> </h1>
    <div class="row">

    <div class="info">
        <form action="" method="post" enctype="multipart/form-data">
        <input type="hidden" name="old_pass" value="<?php echo $fetch['password']; ?>">
        <div>    
            <label class="label">Old Password  : </label><br>
            <input class="form-control" type="password" name="update_pass" placeholder="Enter your old password"/>
        </div><br>
        <div>    
            <label class="label">New Password  : </label><br>
            <input class="form-control" type="password" name="new_pass" placeholder="Enter your new password"/>
        </div><br>
        <div>    
            <label class="label">Confirm Password  : </label><br>
            <input class="form-control" type="password" name="confirm_pass" placeholder="Confirm new password"/>
        </div><br>
        <button class="btn" value="update password" name="update_password" type="submit"> Change Password <i class="fas fa-paper-plane"></i> </button>
        </form>
    </div>
    </div>
</section>
<!-- Change Password section ends -->


<!-- jquery cdn link  -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<!-- custom js file link  -->
<script src="js/profile/script.js"></script>
<script src="js/dropdown.js"></script>
<script src="js/preloader/script.js"></script>
</body>
</html>