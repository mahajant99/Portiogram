<?php

include 'config.php';

if(isset($_POST['submit'])){
   $name = mysqli_real_escape_string($conn, $_POST['name']);
   $username = mysqli_real_escape_string($conn, $_POST['username']);
   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $pass = mysqli_real_escape_string($conn, md5($_POST['password']));
   $cpass = mysqli_real_escape_string($conn, md5($_POST['cpassword']));
   $occupation = mysqli_real_escape_string($conn, ($_POST['occupation']));
   $image = $_FILES['image']['name'];
   $image_size = $_FILES['image']['size'];
   $image_tmp_name = $_FILES['image']['tmp_name'];
   $image_folder = 'uploaded_img/'.$image;

   $select = mysqli_query($conn, "SELECT * FROM `user_form` WHERE email = '$email' AND password = '$pass'") or die('query failed');

    // Storing google recaptcha response 
    // in $recaptcha variable 
    $recaptcha = $_POST['g-recaptcha-response']; 
  
    // Put secret key here, which we get 
    // from google console 
    $secret_key = '6LeTD8InAAAAAJQS7CiuaDtuG9Mu5afW9rM21dr7'; 
  
    // Hitting request to the URL, Google will 
    // respond with success or error scenario 
    $url = 'https://www.google.com/recaptcha/api/siteverify?secret='
          . $secret_key . '&response=' . $recaptcha; 
  
    // Making request to verify captcha 
    $response = file_get_contents($url); 
  
    // Response return by google is in 
    // JSON format, so we have to parse 
    // that json 
    $response = json_decode($response); 
  
    // Checking, if response is true or not 
    if ($response->success == true) { 
        if(mysqli_num_rows($select) > 0){
            echo '<script>alert("User already exists!");</script>';
          }else{
            if($pass != $cpass){
                echo '<script>alert("Confirm password not matched!");</script>';
            }elseif($image_size > 2000000){ //bytes
                echo '<script>alert("Image size is too large!");</script>';
            }else{
              $insert = mysqli_query($conn, "INSERT INTO `user_form`(name, username, email, password, occupation, image, linkedin, github, twitter, instagram, about_me, age, gender, qualification, language, experience, project, clients, awards, pdf_file, year1, degree1, year2, degree2, year3, degree3, year4, degree4, location) VALUES('$name', '$username', '$email', '$pass', '$occupation', '$image', 'https://www.linkedin.com/', 'https://www.github.com/', 'https://www.twitter.com/', 'https://www.instagram.com/', 'Write Here About Yourself!', 'Enter Age', 'Enter Gender', 'Enter Qualification', 'Enter Prefered Language', '', '', '', '', 'empty', 'Enter Year', 'Enter Education Qualification', 'Enter Year', 'Enter Education Qualification', 'Enter Year', 'Enter Education Qualification', 'Enter Year', 'Enter Education Qualification', 'Enter Location')") or die('query failed');
              
                  if($insert){
                      // Fetch the ID of the newly inserted record from the user_form table
                      $user_form_id = mysqli_insert_id($conn);
                  
                      // Insert a new record into the project_table with the fetched user_form ID
                      $insert_project = mysqli_query($conn, "INSERT INTO `project_table` (pone, ptwo, pthree, pfour, pfive, psix, user_form_id, plink1, plink2, plink3, plink4, plink5, plink6, pname1,  pname2, pname3, pname4, pname5, pname6) VALUES ('', '', '', '', '', '', '$user_form_id', 'http://portiogram.rf.gd/', 'http://portiogram.rf.gd/', 'http://portiogram.rf.gd/', 'http://portiogram.rf.gd/', 'http://portiogram.rf.gd/', 'http://portiogram.rf.gd/', 'Enter Project Name', 'Enter Project Name', 'Enter Project Name', 'Enter Project Name', 'Enter Project Name', 'Enter Project Name')") or die('query failed');
                  
                      if($insert_project){
                          move_uploaded_file($image_tmp_name, $image_folder);
                          echo '<script>alert("Registered successfully!");</script>';
                      }
                      else{
                          echo '<script>alert("Registration failed!");</script>';
                      }
                  }
                  
            }  
          }
    } else { 
        echo '<script>alert("Error in Google reCAPTACHA")</script>'; 
    }


   
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/reg.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/crypto-js/4.1.1/crypto-js.min.js"></script>
  <script src="https://www.google.com/recaptcha/api.js" async defer></script>
  <!-- preloader -->
  <link rel="stylesheet" href="css/preloader/preloader.css">
  <title>Registration</title>
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
			<form action="?" method="post" enctype="multipart/form-data">
                    <h2>Sign Up</h2>
                    <div class="inputbox">
                        <ion-icon name="person-circle-outline"></ion-icon>
						<input type="text" name="name" id="name" class="form-control" placeholder="Full Name" required />
                    </div>
                    <div class="inputbox">
                        <ion-icon name="person-outline"></ion-icon>
                        <input type="text" name="username" class="form-control" placeholder="Username" required />
                    </div>
                    <div class="inputbox">
                        <ion-icon name="mail-outline"></ion-icon>
                        <input type="email" name="email" class="form-control" placeholder="Email ID" required />
                    </div>
                    <div class="inputbox">
                        <ion-icon name="lock-closed-outline"></ion-icon>
                        <input name="password" type="password" class="form-control" placeholder="Password" required>
                    </div>
                    <div class="inputbox">
                        <ion-icon name="lock-closed-outline"></ion-icon>
                        <input name="cpassword" type="password" class="form-control" placeholder="Confirm Password" required>
                    </div>
                    <div class="form-control">
                        <p>Choose your Occupation</p>  
                        <select name="occupation" id="occupation" class="form-control" required>
                            <option class="form-control" value="Others">Occupation</option>
                            <option class="form-control" value="Dancer">Dancer</option>
                            <option class="form-control" value="Artist">Artist</option>
                            <option class="form-control" value="Photographer">Photographer</option>'
                            <option class="form-control" value="Freelancer">Freelancer</option>
                            <option class="form-control" value="Developer">Developer</option>
                            <option class="form-control" value="Graphic Designer">Graphic Designer</option>
                            <option class="form-control" value="Architecture">Architecture</option>
                            <option class="form-control" value="Writer">Writer</option>
                            <option class="form-control" value="Professor">Professor</option>
                            <option class="form-control" value="Businesses">Businesses</option>
                            <option class="form-control" value="Others">Others</option>
                        </select>
                    </div>
                    <div class="inputbox">
                        <ion-icon name="image-outline"></ion-icon>
                        <input type="file" name="image" class="form-control" placeholder="Image" accept="image/jpg, image/jpeg, image/png" required />
                    </div>
                    <div class="g-recaptcha" data-sitekey="6LeTD8InAAAAAGo_iRs68p7WV55YwwbwQEOCSlet"></div>
					<br/>
                    <button type="submit" name="submit" value="register now">Sign Up</button>
					<div class="register">
                        <p>Don't have a account? <a href="login.php">Login Now</a></p>
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