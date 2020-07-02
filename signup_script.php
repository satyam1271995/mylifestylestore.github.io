<?php

require("includes/common.php");

  // Getting the values from the signup page using $_POST[] and cleaning the data submitted by the user.
  $name = $_POST['name'];
  $name = mysqli_real_escape_string($con, $name);

  $email = $_POST['e-mail'];
  $email = mysqli_real_escape_string($con, $email);

  $password = $_POST['password'];
  $password = mysqli_real_escape_string($con, $password);
  $password = MD5($password);

  $contact = $_POST['contact'];
  $contact = mysqli_real_escape_string($con, $contact);

  $city = $_POST['city'];
  $city = mysqli_real_escape_string($con, $city);

  $address = $_POST['address'];
  $address = mysqli_real_escape_string($con, $address);
  
  $token = bin2hex(random_bytes(12));

  $regex_email = "/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/";
  $regex_num = "/^[6789][0-9]{9}$/";

  $query = "SELECT * FROM users WHERE email='$email'";
  $result = mysqli_query($con, $query)or die($mysqli_error($con));
  $num = mysqli_num_rows($result);
  
  if ($num != 0) {
    $m = "<span class='red'>Email Already Exists</span>";
    header('location: signup.php?m1='.$m);
  } else if (!preg_match($regex_email, $email)) {
    $m = "<span class='red'>Not a valid Email Id</span>";
    header('location: signup.php?m1='.$m);
  } else if (!preg_match($regex_num, $contact)) {
    $m = "<span class='red'>Not a valid phone number</span>";
    header('location: signup.php?m2='.$m);
  } else {
    
    $query = "INSERT INTO users (name,email,password,contact,city,address,token) VALUES ('" . $name . "','" . $email . "','" . $password . "','" . $contact . "','" . $city . "','" . $address . "','" . $token . "')";
    $query_result = mysqli_query($con, $query) or die(mysqli_error($con));
    if($query_result){
        $subject = "Account Verification";
        $body = "Dear, $name this is account verification. Click the link to verify it. http://localhost/satyamlifstylestore/activate.php?token=$token ";
        $sender_email = "From: satyam12795@gmail.com";
        
        if(mail($email, $subject, $body, $sender_email)){
           
            header('location: login.php');
        } else {
           echo 'Email Sending Fail';
       }
   }
    $user_id = mysqli_insert_id($con);
    $_SESSION['email'] = $email;
    $_SESSION['user_id'] = $user_id;
   header('location: login.php'); 
  }
?>