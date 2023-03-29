<?php

include 'config.php';
session_start();

if(isset($_SESSION['user_id'])) {
  $user_id = $_SESSION['user_id'];
  $select = mysqli_query($conn, "SELECT * FROM `user_form` INNER JOIN `project_table` ON `user_form`.`id` = `project_table`.`user_form_id` WHERE `user_form`.`id` = '$user_id'") or die('query failed');
  if(mysqli_num_rows($select) > 0){
      $fetch = mysqli_fetch_assoc($select);
  }

  if(isset($_GET['logout'])){
    unset($user_id);
    session_destroy();
    header('location:login.php');
 }

}

$user_id = $_GET['user_id'];
  $select = mysqli_query($conn, "SELECT * FROM `user_form` INNER JOIN `project_table` ON `user_form`.`id` = `project_table`.`user_form_id` WHERE `user_form`.`id` = '$user_id'") or die('query failed');
if(mysqli_num_rows($select) > 0){
    $fetch = mysqli_fetch_assoc($select);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $fetch['username']; ?></title>
    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css">

    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/styles.css">

    <!-- custom css file link  -->
    <link rel="stylesheet" href="css/profile/style.css">
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
        <p class="post"><?php echo $fetch['username']; ?></p>
        <p class="post"><?php echo $fetch['occupation']; ?></p>
    </div>

    <nav class="navbarr">
        <ul>
            <li><a href="#home">home</a></li>
            <li><a href="#about">about</a></li>
            <li><a href="#education">education</a></li>
            <li><a href="#projects">projects</a></li>
            <li><a href="#contact">contact</a></li>
        </ul>
    </nav>
</headerr>
<!-- header section ends -->

<div id="menu" class="fas fa-bars"></div>

<!-- home section starts  -->
<section class="home" id="home">

    <h3>HI THERE !</h3>
    <h1>I'M <span><?php echo $fetch['name']; ?></span></h1>
    <p><?php echo $fetch['about_me']; ?></p>
    <div class="box">
    <br><br><br>
        <div class="share">
            <a href="<?php echo $fetch['linkedin']; ?>" class="fab fa-linkedin"></a>
            <a href="<?php echo $fetch['github']; ?>" class="fab fa-github"></a>
            <a href="<?php echo $fetch['twitter']; ?>" class="fab fa-twitter"></a>
            <a href="<?php echo $fetch['instagram']; ?>" class="fab fa-instagram"></a>
        </div>
    </div><br><br><br>
    <a href="#about"><button class="btn">about me <i class="fas fa-user"></i></button></a>
</section>
<!-- home section ends -->

<!-- about section starts  -->
<section class="about" id="about">
<h1 class="heading"> <span>about</span> me </h1>
<div class="row">

    <div class="info">
        <h3> <span> name : </span> <?php echo $fetch['name']; ?> </h3>
        <h3> <span> age : </span> <?php echo $fetch['age']; ?> </h3>
        <h3> <span> gender : </span> <?php echo $fetch['gender']; ?> </h3>
        <h3> <span> qualification : </span> <?php echo $fetch['qualification']; ?> </h3>
        <h3> <span> occupation : </span> <?php echo $fetch['occupation']; ?> </h3>
        <h3> <span> language : </span> <?php echo $fetch['language']; ?> </h3>
        <a href="<?php echo 'uploaded_pdf/'.$fetch['pdf_file']; ?>"><button class="btn"> download CV <i class="fas fa-download"></i> </button></a>
    </div>

    <div class="counter">

        <div class="box">
            <span><?php echo $fetch['experience']; ?>+</span>
            <h3>years of experience</h3>
        </div>

        <div class="box">
            <span><?php echo $fetch['project']; ?>+</span>
            <h3>project completed</h3>
        </div>

        <div class="box">
            <span><?php echo $fetch['clients']; ?>+</span>
            <h3>happy clients</h3>
        </div>

        <div class="box">
            <span><?php echo $fetch['awards']; ?>+</span>
            <h3>awards won</h3>
        </div>

    </div>

</div>
</section>
<!-- about section ends -->

<!-- education section starts  -->
<section class="education" id="education">
<h1 class="heading"> my <span>education</span> </h1>
<div class="box-container">

    <div class="box">
        <i class="fas fa-graduation-cap"></i>
        <span><?php echo $fetch['year1']; ?></span>
        <h3><?php echo $fetch['degree1']; ?></h3>
    </div>

    <div class="box">
        <i class="fas fa-graduation-cap"></i>
        <span><?php echo $fetch['year2']; ?></span>
        <h3><?php echo $fetch['degree2']; ?></h3>
    </div>

    <div class="box">
        <i class="fas fa-graduation-cap"></i>
        <span><?php echo $fetch['year3']; ?></span>
        <h3><?php echo $fetch['degree3']; ?></h3>
    </div>

    <div class="box">
        <i class="fas fa-graduation-cap"></i>
        <span><?php echo $fetch['year4']; ?></span>
        <h3><?php echo $fetch['degree4']; ?></h3>
    </div>
</div>
</section>
<!-- education section ends -->

<!-- projects section starts  -->
<section class="portfolio" id="projects">
<h1 class="heading"> my <span>projects</span> </h1>
        <main class="main">
            <section class="filters container">
                <div class="filters__sections">
                    <!--=============== PROJECTS ===============-->
                    <div class="projects__content grid filters__active" data-content id="projects">
                        <article class="projects__card">
                            <img src="<?php                
                                        if($fetch['pone'] == ''){
                                            echo 'images/project.png';
                                        }else{
                                            echo 'uploaded_img/'.$fetch['pone'];
                                        }
                                    ?>" alt="" class="projects__img">
                            <div class="projects__modal">
                                <div>
                                    <h3 class="projects__title"><?php echo $fetch['pname1']; ?></h3>
                                    <a href="<?php echo $fetch['plink1']; ?>" class="projects__button button button__small">
                                        <i class="ri-link"></i>
                                    </a>
                                </div>
                            </div>
                        </article>
                        <article class="projects__card">
                            <img src="<?php                
                                        if($fetch['ptwo'] == ''){
                                            echo 'images/project.png';
                                        }else{
                                            echo 'uploaded_img/'.$fetch['ptwo'];
                                        }
                                    ?>" alt="" class="projects__img">
                            <div class="projects__modal">
                                <div>
                                    <h3 class="projects__title"><?php echo $fetch['pname2']; ?></h3>
                                    <a href="<?php echo $fetch['plink2']; ?>" class="projects__button button button__small">
                                        <i class="ri-link"></i>
                                    </a>
                                </div>
                            </div>
                        </article>
                        <article class="projects__card">
                            <img src="<?php                
                                        if($fetch['pthree'] == ''){
                                            echo 'images/project.png';
                                        }else{
                                            echo 'uploaded_img/'.$fetch['pthree'];
                                        }
                                    ?>" alt="" class="projects__img">
                            <div class="projects__modal">
                                <div>
                                    <h3 class="projects__title"><?php echo $fetch['pname3']; ?></h3>
                                    <a href="<?php echo $fetch['plink3']; ?>" class="projects__button button button__small">
                                        <i class="ri-link"></i>
                                    </a>
                                </div>
                            </div>
                        </article>
                        <article class="projects__card">
                            <img src="<?php                
                                        if($fetch['pfour'] == ''){
                                            echo 'images/project.png';
                                        }else{
                                            echo 'uploaded_img/'.$fetch['pfour'];
                                        }
                                    ?>" alt="" class="projects__img">
                            <div class="projects__modal">
                                <div>
                                    <h3 class="projects__title"><?php echo $fetch['pname4']; ?></h3>
                                    <a href="<?php echo $fetch['plink4']; ?>" class="projects__button button button__small">
                                        <i class="ri-link"></i>
                                    </a>
                                </div>
                            </div>
                        </article>
                        <article class="projects__card">
                            <img src="<?php                
                                        if($fetch['pfive'] == ''){
                                            echo 'images/project.png';
                                        }else{
                                            echo 'uploaded_img/'.$fetch['pfive'];
                                        }
                                    ?>" alt="" class="projects__img">
                            <div class="projects__modal">
                                <div>
                                    <h3 class="projects__title"><?php echo $fetch['pname5']; ?></h3>
                                    <a href="<?php echo $fetch['plink5']; ?>" class="projects__button button button__small">
                                        <i class="ri-link"></i>
                                    </a>
                                </div>
                            </div>
                        </article>
                        <article class="projects__card">
                            <img src="<?php                
                                        if($fetch['psix'] == ''){
                                            echo 'images/project.png';
                                        }else{
                                            echo 'uploaded_img/'.$fetch['psix'];
                                        }
                                    ?>" alt="" class="projects__img">
                            <div class="projects__modal">
                                <div>
                                    <h3 class="projects__title"><?php echo $fetch['pname6']; ?></h3>
                                    <a href="<?php echo $fetch['plink6']; ?>" class="projects__button button button__small">
                                        <i class="ri-link"></i>
                                    </a>
                                </div>
                            </div>
                        </article>
                    </div>
                </div>
            </section>
        </main>
</section>
<!-- projects section ends -->
<!-- contact section starts  -->
<section class="contact" id="contact">
<h1 class="heading"> <span>contact</span> me </h1>
<div class="row">
    <div class="content">

        <h3 class="title">contact info</h3>

        <div class="info">
            <h3> <i class="fas fa-map-marker-alt"></i> <?php echo $fetch['location']; ?> </h3>
        </div>

    </div>
    <form action="send_email.php" method="post" enctype="multipart/form-data">
        <input type="text" placeholder="name" name="cname" class="box">
        <input type="email" placeholder="email" name="cemail" class="box">
        <input type="text" placeholder="subject" name="csubject" class="box">
        <textarea id="" cols="30" rows="10" name="cmessage" class="box message" placeholder="message"></textarea>
        <button type="submit" name="submit" value="submit" class="btn"> send <i class="fas fa-paper-plane"></i> </button>
    </form>
</div>
</section>
<!-- contact section ends -->

<!-- jquery cdn link  -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<!-- custom js file link  -->
<script src="js/profile/script.js"></script>
<script src="js/dropdown.js"></script>
<script src="js/preloader/script.js"></script>
        <!--=============== SCROLLREVEAL ===============-->
        <script src="assets/js/scrollreveal.min.js"></script>

        <!--=============== MAIN JS ===============-->
        <script src="assets/js/main.js"></script>
</body>
</html>