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

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Contact Us</title>
  <!-- Contact -->
  <link href="css/contact/bootstrap.min.css" rel="stylesheet">
  <link href="css/contact/icofont.min.css" rel="stylesheet">
  <link href="css/contact/contact.css" rel="stylesheet">
  <!-- navbar -->
  <link rel="stylesheet" href="css/navbar/style.css">
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
    <div class="fas fa-bars"></div>
    <a data-aos="zoom-in-left" data-aos-delay="150" href="index.php" class="logo">Portiogram </a>
    <nav class="navbar">
        <a data-aos="zoom-in-left" data-aos-delay="300" href="index.php">Home</a>
        <a data-aos="zoom-in-left" data-aos-delay="450" href="category.php">Categories</a>
        <a data-aos="zoom-in-left" data-aos-delay="600" href="recent.php">Recent</a>
        <a data-aos="zoom-in-left" data-aos-delay="750" href="about.php">About</a>
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

<br><br><br><br><br>
 <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
      <div class="container">

        <div class="section-title">
          <h2>Contact Us</h2>
        </div>

        <div class="row" data-aos="fade-in">

          <div class="col-lg-5 d-flex align-items-stretch">
            <div class="info">
              <div class="address">
                <i class="icofont-google-map"></i>
                <h4>Location:</h4>
                <p>SICSR, Pune, Maharashtra, India</p>
              </div>

              <div class="email">
                <i class="icofont-envelope"></i>
                <h4>Email:</h4>
                <p>tum2121193@sicsr.ac.in</p>
              </div>

              <div class="phone">
                <i class="icofont-phone"></i>
                <h4>Call:</h4>
                <p>+91-8955816898 </p>
              </div>

              <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3782.8994750900733!2d73.83160881471295!3d18.533444287401483!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3bc2bf797c679e05%3A0x2579cb5b06c4d90b!2sSymbiosis%20Institute%20of%20Computer%20Studies%20and%20Research!5e0!3m2!1sen!2sin!4v1678735871539!5m2!1sen!2sin" style="border:0; width: 100%; height: 290px;" allowfullscreen="" loading="lazy"></iframe>
            </div>

          </div>

          <div class="col-lg-7 mt-5 mt-lg-0 d-flex align-items-stretch">
            <form action="contact_email.php" method="post" enctype="multipart/form-data" class="php-email-form">
              <div class="form-row">
                <div class="form-group col-md-6">
                  <label for="name">Your Name</label>
                  <input type="text" name="cname" class="form-control" id="name" />
                </div>
                <div class="form-group col-md-6">
                  <label for="name">Your Email</label>
                  <input type="email" class="form-control" name="cemail" id="email" />
                </div>
              </div>
              <div class="form-group">
                <label for="name">Subject</label>
                <input type="text" class="form-control" name="csubject" id="subject" />
              </div>
              <div class="form-group">
                <label for="name">Message</label>
                <textarea class="form-control" name="cmessage" rows="10" ></textarea>
              </div>
              <div class="text-center"><button button type="submit" name="submit" value="submit">Send Message</button></div>
            </form>
          </div>
        </div>
      </div>
    </section>

<script src="js/dropdown.js"></script>
<script src="js/preloader/script.js"></script>
</body>

</html>
