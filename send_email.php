<?php

include 'config.php';
session_start();

if(isset($_POST['submit'])){
    $name = $_POST['cname'];
    $email = $_POST['cemail'];
    $csubject = $_POST['csubject'];
    $message = $_POST['cmessage'];

    // Set the recipient email address
    $to = "Portiogram";

    // Set the email subject
    $subject = "Portiogram: $csubject";

    // Build the email content
    $email_content = "Dear Portiogram User, \n";
    $email_content .= "\n$message\n";
    $email_content .= "\nRegards\n";
    $email_content .= "$name";

    // Set the email headers
    $headers = "From: $email";
    
    // Send the email
    if(mail($to, $subject, $email_content, $headers)){
        // Display success message if email is sent successfully
        echo '<script>alert("Your message has been sent successfully!\nYou will be redirected to Home Page"); window.location.href = "index.php";</script>';

    } else {
        // Display error message if email is not sent
        echo '<script>alert("Oops! Something went wrong. Please try again later!"); window.location.href = "index.php";</script>';
    }

}


?>