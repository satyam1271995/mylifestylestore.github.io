<?php
require("includes/common.php");
// Redirects the user to products page if logged in.
if (isset($_SESSION['email'])) {
    header('location: products.php');
}
?>
<!DOCTYPE html>
<html lang="en">

    <head>
        <!-- Bootstrap-->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        
        <!-- Jquery library-->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        
        <!-- JavaScript-->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" >
       
        
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="SHORTCUT ICON" href="img/e_site_logo.png" type="image/ico">
        <title>Login | Satyam Lifestyle Store</title>
        <link rel="stylesheet" href="css/style.css">
        
        <style>
    body{
       padding-top:50px;
    }
        </style>
    </head>

    <body>
        <?php include 'includes/header.php'; ?>
        
        <div class="login_bg_img">
        <div id="content">
                            <div class="lg_container">
                                <h1 style="color: gray">User Login</h1>
                                <p class="text-warning"><i>Login to make a purchase</i><p>
                                <form action="login_submit.php" method="POST">
                                    <div class="form-group">
                                        <input type="email" class="form-control login_style"  placeholder="Email" name="e-mail" required = "true">
                                    </div>
                                    <div class="form-group">
                                        <input type="password" class="form-control login_style" placeholder="Password" name="password" required = "true">
                                    </div>
                                    <button type="submit" name="submit" class="btn btn-danger" style="border-radius: 15px;width: 80px;">Login</button><br><br>
                                    <?php
                                if(isset($_GET['error'])){
                                 echo $_GET['error'];
                                }
                                ?>
                                </form>
                                <div><h4 style="color: gray">Don't have an account? <a href="signup.php">Register</h4></div>
                            </div> 
        </div>
        </div>
        <?php include 'includes/footer.php'; ?>
    </body>
</html>
