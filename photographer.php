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

$users = mysqli_query($conn, "select * from user_form where occupation='Photographer'");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Photographer</title>
    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <script src="https://kit.fontawesome.com/5043d6fc8c.js" crossorigin="anonymous"></script>
    <!-- custom css file link  -->
    <link rel="stylesheet" href="css/index/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css">
    <!-- custom js file link  -->
    <script src="js/index/script.js" defer></script>
    <!-- dropdown  -->
    <link rel="stylesheet" href="css/dropdown.css">
    <!-- preloader -->
    <link rel="stylesheet" href="css/preloader/preloader.css">
</head>
<body>

<!-- preloader -->
<div id="preloader"></div>

<!-- header section starts  -->
<header class="header">
    <div id="menu-btn" class="fas fa-bars"></div>
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
                    <a href="profile.php">My Profile</a>
                    <a href="account_details.php">Account Details</a>
                    <a href="index.php?logout=<?php echo $user_id; ?>">Logout</a>
                </div>
        </div>
            <?php } else { ?>
                <button data-aos="zoom-in-left" data-aos-delay="1300" class="btn" onclick="redirectToLogin()">Login </button>
            <?php } ?>
</header>
<!-- header section ends -->

<br><br><br><br><br><br>


<!-- blogs section starts  -->
<section class="blogs" id="blogs">
    <div class="heading">
        <span>Explore</span>
        <h1>Photographer's</h1>
    </div>

    <div class="box-container">
        <?php 
    if(!$users)
    {
    echo '<p>No data found</p>';
    }
    else{
        foreach($users as $key=>$value)
        {
            ?>
        <div class="box" data-aos="fade-up" data-aos-delay="150">
            <div class="image">
                <img src=<?php echo 'uploaded_img/'.$value['image'];?> alt="">
            </div>
            <div class="content">
                <a href="./userprofile.php?user_id=<?php echo $value['id'];?>" class="link"><?php echo $value['name'];?></a>
                <p><?php echo $value['about_me'];?></p>
                <p>Age :  <?php echo $value['age'];?></p>
                <p>Gender :  <?php echo $value['gender'];?></p>
                <p>qualification :  <?php echo $value['qualification'];?></p>
                <p>years of experience :  <?php echo $value['experience'];?>+</p>

                <a href="./userprofile.php?user_id=<?php echo $value['id'];?>"><button class="btn"> View Profile  <i class="fas fa-address-card"></i> </button></a>
                <br><br>
                <div class="icon">
                    <a href="./userprofile.php?user_id=<?php echo $value['id'];?>"><i class="fas fa-user"></i></i><?php echo $value['username'];?></a>
                    <a><i class="fas fa-envelope"></i></i><?php echo $value['email'];?></a>
                </div>
                
            </div>
        </div>
        
        <?php
    }
}
?>	
    </div>

</section>
<!-- blogs section ends -->

<!-- footer section starts  -->
<section class="footer">

    <div class="box-container">

        <div class="box" data-aos="fade-up" data-aos-delay="150">
            <a href="index.php" class="logo">Portiogram </a>
            <br><br>
            <div class="share">
                <a href="#" class="fab fa-facebook-f"></a>
                <a href="#" class="fab fa-twitter"></a>
                <a href="#" class="fab fa-instagram"></a>
                <a href="#" class="fab fa-linkedin"></a>
            </div>
        </div>

        <div class="box" data-aos="fade-up" data-aos-delay="300">
            <h3>quick links</h3>
            <a href="index.php" class="links"> <i class="fas fa-arrow-right"></i> home </a>
            <a href="category.php" class="links"> <i class="fas fa-arrow-right"></i> categories </a>
            <a href="recent.php" class="links"> <i class="fas fa-arrow-right"></i> Recent </a>
            <a href="about.php" class="links"> <i class="fas fa-arrow-right"></i> about </a>
            <a href="contact.php" class="links"> <i class="fas fa-arrow-right"></i> contact </a>
        </div>

        <div class="box" data-aos="fade-up" data-aos-delay="450">
            <h3>contact info</h3>
            <p> <i class="fas fa-map"></i> SICSR, Pune, Maharashtra, India </p>
            <p> <i class="fas fa-phone"></i> +91-8955816898 </p>
            <p> <i class="fas fa-envelope"></i> tum2121193@sicsr.ac.in </p>
        </div>

    </div>
    <div class="credit">all rights reserved!</div>
</section>
<!-- footer section ends -->



<script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
<script src="js/dropdown.js"></script>
<script src="js/preloader/script.js"></script>
<script>

    AOS.init({
        duration: 800,
        offset:150,
    });

</script>

</body>
</html>