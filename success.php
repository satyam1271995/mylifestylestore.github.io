<?php

require("includes/common.php");
require_once("./paytm/PaytmKit/lib/config_paytm.php");
require_once("./paytm/PaytmKit/lib/encdec_paytm.php");

$paytmChecksum = "";
$paramList = array();
$isValidChecksum = "FALSE";

$paramList = $_POST;
$paytmChecksum = isset($_POST["CHECKSUMHASH"]) ? $_POST["CHECKSUMHASH"] : ""; //Sent by Paytm pg

//Verify all parameters received from Paytm pg to your application. Like MID received from paytm pg is same as your application’s MID, TXN_AMOUNT and ORDER_ID are same as what was sent by you to Paytm PG for initiating transaction etc.
$isValidChecksum = verifychecksum_e($paramList, PAYTM_MERCHANT_KEY, $paytmChecksum); //will return TRUE or FALSE string.



if (!isset($_SESSION['email'])) {
    header('location: index.php');
}
$user_id = $_SESSION['user_id'];


//We will change the status of the items purchased by the user to 'Confirmed'
$query = "UPDATE users_items SET status='Confirmed' WHERE user_id=" . $user_id . " and status='Added to cart'";
mysqli_query($con, $query) or die($mysqli_error($con));
?>

<!DOCTYPE html>
<html lang="en">
    <head>
       <?php include 'includes/links.php'; ?>
        
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
       
        <title>Order | Satyam Lifestyle Store</title>
        
    </head>
    <body>
        <?php include 'includes/header.php'; ?>
        <div class="container-fluid" id="content">
            <div class="col-md-12">
			<?php 
				if($isValidChecksum == "TRUE") {

                if ($_POST["STATUS"] == "TXN_SUCCESS"){
			
			 
                echo '<div class="jumbotron">
                      <h3 align="center">Your order is confirmed. Thank you for shopping with us.</h3><hr>
                    <p align="center">Click <a href="products.php">here</a> to purchase any other item.</p>
                </div>';
				?>
				
            </div>
        </div>
		
		
		<?php        
        }
        else {
        //if failure

           echo '<div class="jumbotron text-center">
                <i class="fa fa-times-circle text-danger" style="font-size: 78px;"></i>
                  <h1>Transaction status failure!</h1> 
                   <a href="cart.php" class="btn btn-success"><i class="fa fa-arrow-circle-left" ></i> Back</a> 
                </div>';
?>
		<?php
        }
?>




<?php
}
else {
       //if checksum not match
 
           echo '<div class="jumbotron text-center">
                <i class="fas fa-times-circle text-danger" style="font-size: 78px;"></i>
                  <h1>Checksum mismatched.!</h1> 
                     <small style="padding:10px;background:#ddd;color:#7f7f7f;border-radius:5px;">Process transaction is suspicious. Someone altered the transaction details.</small> 
                      <a href="cart.php" class="btn btn-success"><i class="fa fa-arrow-circle-left" ></i> Back</a> 
                </div>';
}

?>
		
		
        <?php include("includes/footer.php");
        ?>
    </body>
</html>