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
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Categories</title>
    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
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

<br><br><br><br><br><br>

<!-- Categories section starts  -->
<section class="destination" id="destination">

    <div class="heading">
        <h1>Categories</h1>
    </div>
    <div class="box-container">
        <div class="box" data-aos="fade-up" data-aos-delay="150">
            <div class="image">
                <img src="images/categories/dancer.jpg" alt="">
            </div>
            <div class="content">
                <h3>Dancer</h3>
                <p>“There are shortcuts to happiness, and dancing is one of them.”</p><p> — Vicki Baum</p>
                <a href="dancer.php">view <i class="fas fa-angle-right"></i></a>
            </div>
        </div>

        <div class="box" data-aos="fade-up" data-aos-delay="300">
            <div class="image">
                <img src="images/categories/artist.jpg" alt="">
            </div>
            <div class="content">
                <h3>Artist</h3>
                <p>“If I could say it in words there would be no reason to paint.”</p><p> — Edward Hopper</p>
                <a href="artist.php">view <i class="fas fa-angle-right"></i></a>
            </div>
        </div>

        <div class="box" data-aos="fade-up" data-aos-delay="450">
            <div class="image">
                <img src="images/categories/photo.jpg" alt="">
            </div>
            <div class="content">
                <h3>Photographer</h3>
                <p>“In a portrait, I'm looking for the silence in somebody.”</p><p> — Henri Cartier-Bresson</p>
                <a href="photographer.php">view <i class="fas fa-angle-right"></i></a>
            </div>
        </div>

        <div class="box" data-aos="fade-up" data-aos-delay="600">
            <div class="image">
                <img src="images/categories/freelancer.jpg" alt="">
            </div>
            <div class="content">
                <h3>Freelancer</h3>
                <p>"The work of freelancer is never done."</p><p> — Coach Ludiah</p>
                <a href="freelancer.php">view <i class="fas fa-angle-right"></i></a>
            </div>
        </div>

        <div class="box" data-aos="fade-up" data-aos-delay="750">
            <div class="image">
                <img src="images/categories/dev.jpg" alt="">
            </div>
            <div class="content">
                <h3>Developer</h3>
                <p>"It's not a bug. It's an undocumented feature!"</p><p> — Anonymous</p>
                <a href="developer.php">view <i class="fas fa-angle-right"></i></a>
            </div>
        </div>

        <div class="box" data-aos="fade-up" data-aos-delay="900">
            <div class="image">
                <img src="images/categories/graphic.jpg" alt="">
            </div>
            <div class="content">
                <h3>Graphic Designer</h3>
                <p>"Good design is all about making other designers feel like idiots because that idea wasn't theirs."</p><p> — Frank Chimero</p>
                <a href="graphicdesigner.php">view <i class="fas fa-angle-right"></i></a>
            </div>
        </div>

        <div class="box" data-aos="fade-up" data-aos-delay="1050">
            <div class="image">
                <img src="images/categories/architech.jpg" alt="">
            </div>
            <div class="content">
                <h3>Architecture</h3>
                <p>"Architecture should speak of its time and place, but yearn for timelessness."</p><p> — Frank Gehry</p>
                <a href="architecture.php">view <i class="fas fa-angle-right"></i></a>
            </div>
        </div>

        <div class="box" data-aos="fade-up" data-aos-delay="1100">
            <div class="image">
                <img src="images/categories/writer.jpg" alt="">
            </div>
            <div class="content">
                <h3>Writer</h3>
                <p>"Write quickly and you will never write well; write well, and you will soon write quickly."</p><p> ― Marcus Fabius Quintilianus</p>
                <a href="writer.php">view <i class="fas fa-angle-right"></i></a>
            </div>
        </div>

        <div class="box" data-aos="fade-up" data-aos-delay="1200">
            <div class="image">
                <img src="images/categories/professor.jpg" alt="">
            </div>
            <div class="content">
                <h3>Professor</h3>
                <p>"Life is a sage's university; hardship is his professor."</p><p> ― Matshona Dhliwayo</p>
                <a href="professor.php">view <i class="fas fa-angle-right"></i></a>
            </div>
        </div>

        <div class="box" data-aos="fade-up" data-aos-delay="1300">
            <div class="image">
                <img src="images/categories/businesses.jpg" alt="">
            </div>
            <div class="content">
                <h3>Businesses</h3>
                <p>"Success is not final; failure is not fatal: it is the courage to continue that counts."</p><p> ― Winston Churchill</p>
                <a href="businesses.php">view <i class="fas fa-angle-right"></i></a>
            </div>
        </div>

        <div class="box" data-aos="fade-up" data-aos-delay="1400">
            <div class="image">
                <img src="images/categories/more.jpg" alt="">
            </div>
            <div class="content">
                <h3>Other's ...</h3>
                <p>Alot More To Explore!</p>
                <a href="others.php">view <i class="fas fa-angle-right"></i></a>
            </div>
        </div>
    </div>
</section>
<!-- Categories section ends -->

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
    <div class="credit">Copyright©2023 Portiogram, All Rights Reserved!</div>
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