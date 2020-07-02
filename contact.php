<?php
require("includes/common.php")
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
        <title>Contact | Satyam Lifestyle Store</title>
        <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="css/contact.css"
    </head>

    <body style="padding-top: 50px;">
        <?php include 'includes/header.php'; ?>
        
         <div class="contact_bg_img">
        <div id="content">
        <div class="sg_container">
                        <h1 style="color: gray">Contact Us</h1>
                      
                                <form action="contact_script.php" method="POST">
                                    <div class="form-group">
                                        <input type="text" class="form-control signup_style"  placeholder="Name" name="name" required = "true">
                                    </div>
                                    <div class="form-group">
                                        <input type="email" class="form-control signup_style"  placeholder="Email" name="e-mail" required = "true">
                                    </div>
                                    <div class="form-group">
                                        <textarea class="form-control signup_style" name="message" placeholder="Message" required></textarea>
                                        </div>
                                    <button type="submit" name="submit" class="btn btn-danger" style="border-radius: 15px;width: 80px;">Send</button><br><br>
                                    <?php echo $_GET['m']; ?>
                                </form>
                   
                </div>
            
            </div>
             
        </div>    
        

 <div class="contact-main">
        <div class="lets-talk">
          <h3>Let's talk</h3>
          <p>Query and Feedback ,We'd love to hear from your side.</p>
          <p>Please don't hesitate to get in touch with us.</p>
        <iframe width="600" height="500" src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d14231.14004902231!2d81.196795!3d26.9103173!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2sin!4v1591783266058!5m2!1sen!2sin" frameborder="0" allowfullscreen></iframe> </div><!--lets-talk-->
        <div class="sales-enquiries">
          <h3>Sales Enquiries</h3>
          <ul class="sales-ul clearfix">
            <li class="send">
              <span class="sprite-img"></span>
              <p class="first">Send a brief<a href="https://mail.google.com/mail/?view=cm&amp;fs=1&amp;to=sales@webloopinfotech.com" target="_blank">satyam12795@gmail.com</a></p>
            </li>
            <li>
              <span class="sprite-img"></span>
              <p>Barabanki<span>+91 7409608232 </span> 
            </p>
            </li>
          </ul>
        </div><!--sales-enquiries-->
      </div><!--Contact Main -->

   
        <?php include 'includes/footer.php'; ?>
    </body>
</html>
