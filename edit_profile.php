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

// <!--=============== home section ===============-->
if(isset($_POST['update_about'])){
    $user_id = $_SESSION['user_id'];
   
    $update_about_me  = mysqli_real_escape_string($conn, $_POST['update_about_me']);
    $update_linkedin = mysqli_real_escape_string($conn, $_POST['update_linkedin']);
    $update_github = mysqli_real_escape_string($conn, $_POST['update_github']);
    $update_instagram = mysqli_real_escape_string($conn, $_POST['update_instagram']);
    $update_twitter = mysqli_real_escape_string($conn, $_POST['update_twitter']);

    mysqli_query($conn, "UPDATE `user_form` SET about_me = '$update_about_me', linkedin = '$update_linkedin', github = '$update_github', instagram = '$update_instagram', twitter = '$update_twitter' WHERE id = '$user_id'") or die('query failed');
    
    echo "<meta http-equiv='refresh' content='0'>";
    echo '<script>alert("Details updated successfully!");</script>';
}
// <!--=============== about section ===============-->
if(isset($_POST['update_details'])){
    $user_id = $_SESSION['user_id'];
   
    $update_name  = mysqli_real_escape_string($conn, $_POST['update_name']);
    $update_age = mysqli_real_escape_string($conn, $_POST['update_age']);
    $update_gender = mysqli_real_escape_string($conn, $_POST['update_gender']);
    $update_qualification = mysqli_real_escape_string($conn, $_POST['update_qualification']);
    $update_occupation = mysqli_real_escape_string($conn, $_POST['update_occupation']);
    $update_language = mysqli_real_escape_string($conn, $_POST['update_language']);

    mysqli_query($conn, "UPDATE `user_form` SET name = '$update_name', age = '$update_age', gender = '$update_gender', qualification = '$update_qualification', occupation = '$update_occupation', language = '$update_language' WHERE id = '$user_id'") or die('query failed');

   
    echo "<meta http-equiv='refresh' content='0'>";
    echo '<script>alert("Details updated successfully!");</script>';
}
// <!--=============== upload cv ===============-->
if(isset($_POST['update_pdf'])){
    $user_id = $_SESSION['user_id']; 
  
    $pdf_file = $_FILES['pdf_file']['name'];
    $pdf_file_size = $_FILES['pdf_file']['size'];
    $pdf_file_tmp_name = $_FILES['pdf_file']['tmp_name'];
    $pdf_file_folder = 'uploaded_pdf/'.$pdf_file;
  
    if(!empty($pdf_file)){
          $pdf_update_query = mysqli_query($conn, "UPDATE `user_form` SET pdf_file = '$pdf_file' WHERE id = '$user_id'") or die('query failed');
          if($pdf_update_query){
             move_uploaded_file($pdf_file_tmp_name, $pdf_file_folder);

          echo "<meta http-equiv='refresh' content='0'>";
          echo '<script>alert("Pdf Uploaded succssfully!");</script>';
       }
    }
  
}
// <!--=============== about section years ===============-->
if(isset($_POST['update_years'])){
    $user_id = $_SESSION['user_id'];
   
    $update_experience  = mysqli_real_escape_string($conn, $_POST['update_experience']);
    $update_project = mysqli_real_escape_string($conn, $_POST['update_project']);
    $update_clients = mysqli_real_escape_string($conn, $_POST['update_clients']);
    $update_awards = mysqli_real_escape_string($conn, $_POST['update_awards']);

    mysqli_query($conn, "UPDATE `user_form` SET experience = '$update_experience', project = '$update_project', clients = '$update_clients', awards = '$update_awards' WHERE id = '$user_id'") or die('query failed');
    
    echo "<meta http-equiv='refresh' content='0'>";
    echo '<script>alert("Details updated successfully!");</script>';
}

// <!--=============== upload projects ===============-->
if(isset($_POST['update_projects'])){
    $user_id = $_SESSION['user_id']; 
  
    $update_pone = $_FILES['update_pone']['name'];
    $update_pone_size = $_FILES['update_pone']['size'];
    $update_pone_tmp_name = $_FILES['update_pone']['tmp_name'];
    $update_pone_folder = 'uploaded_img/'.$update_pone;
    $update_pname1 = mysqli_real_escape_string($conn, $_POST['update_pname1']);
    $update_plink1 = mysqli_real_escape_string($conn, $_POST['update_plink1']);

    $update_ptwo = $_FILES['update_ptwo']['name'];
    $update_ptwo_size = $_FILES['update_ptwo']['size'];
    $update_ptwo_tmp_name = $_FILES['update_ptwo']['tmp_name'];
    $update_ptwo_folder = 'uploaded_img/'.$update_ptwo;
    $update_pname2 = mysqli_real_escape_string($conn, $_POST['update_pname2']);
    $update_plink2 = mysqli_real_escape_string($conn, $_POST['update_plink2']);

    $update_pthree = $_FILES['update_pthree']['name'];
    $update_pthree_size = $_FILES['update_pthree']['size'];
    $update_pthree_tmp_name = $_FILES['update_pthree']['tmp_name'];
    $update_pthree_folder = 'uploaded_img/'.$update_pthree;
    $update_pname3 = mysqli_real_escape_string($conn, $_POST['update_pname3']);
    $update_plink3 = mysqli_real_escape_string($conn, $_POST['update_plink3']);

    $update_pfour = $_FILES['update_pfour']['name'];
    $update_pfour_size = $_FILES['update_pfour']['size'];
    $update_pfour_tmp_name = $_FILES['update_pfour']['tmp_name'];
    $update_pfour_folder = 'uploaded_img/'.$update_pfour;
    $update_pname4 = mysqli_real_escape_string($conn, $_POST['update_pname4']);
    $update_plink4 = mysqli_real_escape_string($conn, $_POST['update_plink4']);

    $update_pfive = $_FILES['update_pfive']['name'];
    $update_pfive_size = $_FILES['update_pfive']['size'];
    $update_pfive_tmp_name = $_FILES['update_pfive']['tmp_name'];
    $update_pfive_folder = 'uploaded_img/'.$update_pfive;
    $update_pname5 = mysqli_real_escape_string($conn, $_POST['update_pname5']);
    $update_plink5 = mysqli_real_escape_string($conn, $_POST['update_plink5']);

    $update_psix = $_FILES['update_psix']['name'];
    $update_psix_size = $_FILES['update_psix']['size'];
    $update_psix_tmp_name = $_FILES['update_psix']['tmp_name'];
    $update_psix_folder = 'uploaded_img/'.$update_psix;
    $update_pname6 = mysqli_real_escape_string($conn, $_POST['update_pname6']);
    $update_plink6 = mysqli_real_escape_string($conn, $_POST['update_plink6']);

  
    if(!empty($update_pone)){
          $pone_update_query = mysqli_query($conn, "UPDATE `project_table` SET pone = '$update_pone', pname1 = '$update_pname1', plink1 = '$update_plink1' WHERE user_form_id = '$user_id'") or die('query failed');
          if($pone_update_query){
            move_uploaded_file($update_pone_tmp_name, $update_pone_folder);
       }
    }

    if(!empty($update_ptwo)){
        $ptwo_update_query = mysqli_query($conn, "UPDATE `project_table` SET ptwo = '$update_ptwo', pname2 = '$update_pname2', plink2 = '$update_plink2' WHERE user_form_id = '$user_id'") or die('query failed');
        if($ptwo_update_query){
          move_uploaded_file($update_ptwo_tmp_name, $update_ptwo_folder);
        }
    }

    if(!empty($update_pthree)){
        $pthree_update_query = mysqli_query($conn, "UPDATE `project_table` SET pthree = '$update_pthree', pname3 = '$update_pname3', plink3 = '$update_plink3' WHERE user_form_id = '$user_id'") or die('query failed');
        if($pthree_update_query){
          move_uploaded_file($update_pthree_tmp_name, $update_pthree_folder);
        }
    }

    if(!empty($update_pfour)){
        $pfour_update_query = mysqli_query($conn, "UPDATE `project_table` SET pfour = '$update_pfour', pname4 = '$update_pname4', plink4 = '$update_plink4' WHERE user_form_id = '$user_id'") or die('query failed');
        if($pfour_update_query){
          move_uploaded_file($update_pfour_tmp_name, $update_pfour_folder);
        }
    }

    if(!empty($update_pfive)){
        $pfive_update_query = mysqli_query($conn, "UPDATE `project_table` SET pfive = '$update_pfive', pname5 = '$update_pname5', plink5 = '$update_plink5' WHERE user_form_id = '$user_id'") or die('query failed');
        if($pfive_update_query){
          move_uploaded_file($update_pfive_tmp_name, $update_pfive_folder);
        }
    }

    if(!empty($update_psix)){
        $psix_update_query = mysqli_query($conn, "UPDATE `project_table` SET psix = '$update_psix', pname6 = '$update_pname6', plink6 = '$update_plink6' WHERE user_form_id = '$user_id'") or die('query failed');
        if($psix_update_query){
          move_uploaded_file($update_psix_tmp_name, $update_psix_folder);
        }
    }

    

    

              
    echo "<meta http-equiv='refresh' content='0'>";
    echo '<script>alert("Projects Updated succssfully!");</script>';
  
}  


// <!--=============== education ===============-->
if(isset($_POST['update_education'])){
    $user_id = $_SESSION['user_id'];
   
    $update_year1  = mysqli_real_escape_string($conn, $_POST['update_year1']);
    $update_year2  = mysqli_real_escape_string($conn, $_POST['update_year2']);
    $update_year3  = mysqli_real_escape_string($conn, $_POST['update_year3']);
    $update_year4  = mysqli_real_escape_string($conn, $_POST['update_year4']);
    $update_degree1  = mysqli_real_escape_string($conn, $_POST['update_degree1']);
    $update_degree2  = mysqli_real_escape_string($conn, $_POST['update_degree2']);
    $update_degree3  = mysqli_real_escape_string($conn, $_POST['update_degree3']);
    $update_degree4  = mysqli_real_escape_string($conn, $_POST['update_degree4']);

    mysqli_query($conn, "UPDATE `user_form` SET year1 = '$update_year1', year2 = '$update_year2', year3 = '$update_year3', year4 = '$update_year4', 
    degree1 = '$update_degree1', degree2 = '$update_degree2', degree3 = '$update_degree3', degree4 = '$update_degree4' WHERE id = '$user_id'") or die('query failed');
    
    echo "<meta http-equiv='refresh' content='0'>";
    echo '<script>alert("Details updated successfully!");</script>';
}
// <!--=============== Contact ===============-->
if(isset($_POST['update_contact'])){
    $user_id = $_SESSION['user_id'];
   
    $update_location  = mysqli_real_escape_string($conn, $_POST['update_location']);

    mysqli_query($conn, "UPDATE `user_form` SET location = '$update_location' WHERE id = '$user_id'") or die('query failed');
    
    echo "<meta http-equiv='refresh' content='0'>";
    echo '<script>alert("Details updated successfully!");</script>';
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profile</title>

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
            <li><a href="myprofile.php">Back to Profile</a></li>

        </ul>
    </nav>
</headerr>
<!-- header section ends -->

<div id="menu" class="fas fa-bars"></div>

<!-- home section starts  -->
<section class="home" id="home">
<br><br><br><br><br><br><br><br><br><br><br><br><br><br>
    <h3>HI THERE !</h3>
    <h1>I'M <span><?php echo $fetch['name']; ?></span></h1>
    <br><br><br><br>
    <div class="info">
        <form action="" method="post" enctype="multipart/form-data">
        <div>
            <label class="label">About  : </label><br>
            <textarea class="form-control" type="text" name="update_about_me" value="<?php echo $fetch['about_me']; ?>"><?php echo $fetch['about_me']; ?></textarea>
        </div><br>
        <div>    
            <label class="label">linkedin account  : </label><br>
            <input class="form-control" type="text" name="update_linkedin" value="<?php echo $fetch['linkedin']; ?>" />
        </div><br>
        <div>    
            <label class="label">Github account  : </label><br>
            <input class="form-control" type="text" name="update_github" value="<?php echo $fetch['github']; ?>" />
        </div><br>
        <div>    
            <label class="label">twitter account  : </label><br>
            <input class="form-control" type="text" name="update_twitter" value="<?php echo $fetch['twitter']; ?>" />
        </div><br>
        <div>    
            <label class="label">instagram account  : </label><br>
            <input class="form-control" type="text" name="update_instagram" value="<?php echo $fetch['instagram']; ?>" />
        </div><br>
        <button class="btn" value="update about" name="update_about" type="submit"> Save Changes <i class="fas fa-paper-plane"></i> </button>
        </form>
    </div>
</div>
</section>
<!-- home section ends -->

<!-- about section starts  -->
<section class="about" id="about">
<h1 class="heading"> <span>about</span> me </h1>
<div class="row">    

    <div class="info">
        <form action="" method="post" enctype="multipart/form-data">
        <div>    
            <label class="label">Full Name  : </label><br>
            <input class="form-control" type="text" name="update_name" value="<?php echo $fetch['name']; ?>" />
        </div><br>
        <div>
            <label class="label">Age : </label><br>
            <input class="form-control" type="text" name="update_age" value="<?php echo $fetch['age']; ?>" />
        </div><br>
        <div>
            <label class="label">Gender : </label><br>
            <input class="form-control" type="text" name="update_gender" value="<?php echo $fetch['gender']; ?>" />
        </div><br>
        <div>    
            <label class="label">qualification  : </label><br>
            <input class="form-control" type="text" name="update_qualification" value="<?php echo $fetch['qualification']; ?>" />
        </div><br>
        <div>    
            <label class="label">occupation  : </label><br>
            <input class="form-control" type="text" name="update_occupation" value="<?php echo $fetch['occupation']; ?>" />
        </div><br>
        <div>    
            <label class="label">language  : </label><br>
            <input class="form-control" type="text" name="update_language" value="<?php echo $fetch['language']; ?>" />
        </div><br>
        <button class="btn" value="update details" name="update_details" type="submit"> Save Changes <i class="fas fa-paper-plane"></i> </button>
        </form>
    </div>
</div>

<div class="row">    
    <div class="info">
        <form action="" method="post" enctype="multipart/form-data">
        <div>    
            <label class="label">Upload CV  : </label><br>
            <input class="form-control" type="file" name="pdf_file" accept=".pdf" value="<?php echo $fetch['pdf_file']; ?>" />
        </div><br>
        <button class="btn" value="update pdf" name="update_pdf" type="submit"> Upload CV <i class="fas fa-paper-plane"></i> </button>
        </form>
    </div>
</div>

<div class="row">    
    <div class="info">
        <form action="" method="post" enctype="multipart/form-data">
        <div>    
            <label class="label">years of experience  : </label><br>
            <input class="form-control" type="text" name="update_experience" value="<?php echo $fetch['experience']; ?>" />
        </div><br>
        <div>
            <label class="label">project completed : </label><br>
            <input class="form-control" type="text" name="update_project" value="<?php echo $fetch['project']; ?>" />
        </div><br>
        <div>    
            <label class="label">happy clients  : </label><br>
            <input class="form-control" type="text" name="update_clients" value="<?php echo $fetch['clients']; ?>" />
        </div><br>
        <div>    
            <label class="label">awards won  : </label><br>
            <input class="form-control" type="text" name="update_awards" value="<?php echo $fetch['awards']; ?>" />
        </div><br>
        <button class="btn" value="update years" name="update_years" type="submit"> Save Changes <i class="fas fa-paper-plane"></i> </button>
        </form>
    </div>
</div>
</section>
<!-- about section ends -->

<!-- education section starts  -->
<section class="about" id="education">
    <h1 class="heading"> my <span>education</span> </h1>
    <div class="row">

    <div class="info">
        <form action="" method="post" enctype="multipart/form-data">
        <div>    
            <label class="label">Enter Year  : </label><br>
            <input class="form-control" type="text" name="update_year1" value="<?php echo $fetch['year1']; ?>" />
        </div><br>
        <div>    
            <label class="label">Enter Education qualification  : </label><br>
            <input class="form-control" type="text" name="update_degree1" value="<?php echo $fetch['degree1']; ?>" />
        </div><br>
        <div>    
            <label class="label">Enter Year  : </label><br>
            <input class="form-control" type="text" name="update_year2" value="<?php echo $fetch['year2']; ?>" />
        </div><br>
        <div>    
            <label class="label">Enter Education qualification  : </label><br>
            <input class="form-control" type="text" name="update_degree2" value="<?php echo $fetch['degree2']; ?>" />
        </div><br>
        <div>    
            <label class="label">Enter Year  : </label><br>
            <input class="form-control" type="text" name="update_year3" value="<?php echo $fetch['year3']; ?>" />
        </div><br>
        <div>    
            <label class="label">Enter Education qualification  : </label><br>
            <input class="form-control" type="text" name="update_degree3" value="<?php echo $fetch['degree3']; ?>" />
        </div><br>
        <div>    
            <label class="label">Enter Year  : </label><br>
            <input class="form-control" type="text" name="update_year4" value="<?php echo $fetch['year4']; ?>" />
        </div><br>
        <div>    
            <label class="label">Enter Education qualification  : </label><br>
            <input class="form-control" type="text" name="update_degree4" value="<?php echo $fetch['degree4']; ?>" />
        </div><br>
        <button class="btn" value="update education" name="update_education" type="submit"> Save Changes <i class="fas fa-paper-plane"></i> </button>
        </form>
    </div>

    </div>
</section>
<!-- education section ends -->

<!-- projects section starts  -->
<section class="about" id="projects">
    <h1 class="heading"> my <span>projects</span> </h1>
    <div class="row">

    <div class="info">
        <form action="" method="post" enctype="multipart/form-data">
        <h3> Project 1 </h3>
        <div>    
            <label class="label">Project Name  : </label><br>
            <input class="form-control" type="text" name="update_pname1" value="<?php echo $fetch['pname1']; ?>"  />
        </div><br>
        <div>    
            <label class="label">Project Link  : </label><br>
            <input class="form-control" type="text" name="update_plink1" value="<?php echo $fetch['plink1']; ?>"  />
        </div><br>
        <div>    
            <label class="label">Project Image  : </label><br>
            <input class="form-control" type="file" name="update_pone" accept="image/jpg, image/jpeg, image/png" text="Upload new image"  />
        </div><br>
        <h3> Project 2 </h3>
        <div>    
            <label class="label">Project Name  : </label><br>
            <input class="form-control" type="text" name="update_pname2" value="<?php echo $fetch['pname2']; ?>"  />
        </div><br>
        <div>    
            <label class="label">Project Link  : </label><br>
            <input class="form-control" type="text" name="update_plink2" value="<?php echo $fetch['plink2']; ?>"  />
        </div><br>
        <div>    
            <label class="label">Project Image  : </label><br>
            <input class="form-control" type="file" name="update_ptwo" accept="image/jpg, image/jpeg, image/png" text="Upload new image"  />
        </div><br>
        <h3> Project 3 </h3>
        <div>    
            <label class="label">Project Name  : </label><br>
            <input class="form-control" type="text" name="update_pname3" value="<?php echo $fetch['pname3']; ?>"  />
        </div><br>
        <div>    
            <label class="label">Project Link  : </label><br>
            <input class="form-control" type="text" name="update_plink3" value="<?php echo $fetch['plink3']; ?>"  />
        </div><br>
        <div>    
            <label class="label">Project Image  : </label><br>
            <input class="form-control" type="file" name="update_pthree" accept="image/jpg, image/jpeg, image/png" text="Upload new image"  />
        </div><br>
        <h3> Project 4 </h3>
        <div>    
            <label class="label">Project Name  : </label><br>
            <input class="form-control" type="text" name="update_pname4" value="<?php echo $fetch['pname4']; ?>"  />
        </div><br>
        <div>    
            <label class="label">Project Link  : </label><br>
            <input class="form-control" type="text" name="update_plink4" value="<?php echo $fetch['plink4']; ?>"  />
        </div><br>
        <div>    
            <label class="label">Project Image  : </label><br>
            <input class="form-control" type="file" name="update_pfour" accept="image/jpg, image/jpeg, image/png" text="Upload new image"  />
        </div><br>
        <h3> Project 5 </h3>
        <div>    
            <label class="label">Project Name  : </label><br>
            <input class="form-control" type="text" name="update_pname5" value="<?php echo $fetch['pname5']; ?>"  />
        </div><br>
        <div>    
            <label class="label">Project Link  : </label><br>
            <input class="form-control" type="text" name="update_plink5" value="<?php echo $fetch['plink5']; ?>"  />
        </div><br>
        <div>    
            <label class="label">Project Image  : </label><br>
            <input class="form-control" type="file" name="update_pfive" accept="image/jpg, image/jpeg, image/png" text="Upload new image"  />
        </div><br>
        <h3> Project 6 </h3>
        <div>    
            <label class="label">Project Name  : </label><br>
            <input class="form-control" type="text" name="update_pname6" value="<?php echo $fetch['pname6']; ?>"  />
        </div><br>
        <div>    
            <label class="label">Project Link  : </label><br>
            <input class="form-control" type="text" name="update_plink6" value="<?php echo $fetch['plink6']; ?>"  />
        </div><br>
        <div>    
            <label class="label">Project Image  : </label><br>
            <input class="form-control" type="file" name="update_psix" accept="image/jpg, image/jpeg, image/png" text="Upload new image"  />
        </div><br>

        <button class="btn" value="update projects" name="update_projects" type="submit"> Save Changes <i class="fas fa-paper-plane"></i> </button>
        </form>
    </div>

    </div>
</section>
<!-- projects section ends -->

<!-- contact section starts  -->
<section class="about" id="contact">
<h1 class="heading"> <span>contact</span> me </h1>
<div class="row">    

    <div class="info">
        <form action="" method="post" enctype="multipart/form-data">
        <div>
            <label class="label">Location : </label><br>
            <input class="form-control" type="text" name="update_location" value="<?php echo $fetch['location']; ?>" />
        </div><br>
        <button class="btn" value="update contact" name="update_contact" type="submit"> Save Changes <i class="fas fa-paper-plane"></i> </button>
        </form>
    </div>

</div>
</section>
<!-- contact section ends -->

<!-- jquery cdn link  -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<!-- custom js file link  -->
<script src="js/profile/script.js"></script>
<script src="js/dropdown.js"></script>
<script src="js/preloader/script.js"></script>
</body>
</html>