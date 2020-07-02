<?php
require("includes/common.php");
if (isset($_SESSION['email'])) {
    header('location: products.php');
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
         <?php include 'includes/links.php'; ?>
        
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        
        <title>Singup | Lifestyle Store</title>
      
    </head>
    <body style="padding-top: 50px;">
        <?php include 'includes/header.php'; ?>
        
        
        <div class="signup_bg_img">
        <div id="content">
        <div class="sg_container">
            <h1 style="color: gray">Registration</h1>
            <br>
                        <form  action="signup_script.php" method="POST">
                            <div class="form-group">
                                <input class="form-control signup_style" placeholder="Name" name="name"  required = "true" pattern="^[A-Za-z\s]{1,}[\.]{0,1}[A-Za-z\s]{0,}$">
                            </div>
                            <div class="form-group">
                                <input type="email" class="form-control signup_style"  placeholder="Email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$"  name="e-mail" required = "true">
                                <?php
                                if(isset($_GET['m1'])){
                                 echo $_GET['m1'];
                                }
                                ?>
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control signup_style" placeholder="Password" pattern=".{6,}" name="password" required = "true">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control signup_style"  placeholder="Contact" maxlength="10" size="10" name="contact" required = "true">
                                <?php
                                if(isset($_GET['m2'])){
                                 echo $_GET['m2'];
                                }
                                ?>
                            </div>
                            <div class="form-group">
                                <input  type="text" class="form-control signup_style"  placeholder="City" name="city" required = "true">
                            </div>
                            <div class="form-group">
                                <input  type="text" class="form-control signup_style"  placeholder="Address" name="address" required = "true">
                            </div>
                            <button type="submit" name="submit" class="btn btn-primary signup_style">Submit</button>
                        </form>
                   
                </div>
            </div>
        </div>
        <?php include "includes/footer.php"; ?>
    </body>
</html>