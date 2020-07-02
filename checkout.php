<?php
require("includes/common.php");
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <?php include 'includes/links.php'; ?>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Merchant Checkout Page</title>
    </head>
    
    <body>
    <?php
date_default_timezone_set("Asia/Kolkata");   //India time (GMT+5:30)
$timestamp = date('d-m-Y H:i:s');
?>
        
<div class="container">
    <div class="row" style="margin-top:50px;">
        
      
                   <div class="well col-xs-10 col-sm-10 col-md-6 col-xs-offset-1 col-sm-offset-1 col-md-offset-3">

                         

                        <form method="post" action="pay.php">

                        <div class="row">
                            <div class="col-xs-6 col-sm-6 col-md-6">
                                
                                <small><img src="img/e_site_logo.png" style="width: 30px; height: 30px;"> My Lifestyle Store</small>
                                <br>
                                
                                <br> 
                                <small><i class="fa fa-info-circle" ></i> If you have specific video request then you may comment or message me on instagam.</small>
                                
                            
                        </div>
                        <div class="col-xs-6 col-sm-6 col-md-6 text-right">
                            <p>
                                <i>Date: <?php echo date("jS F, Y", strtotime($timestamp)); ?></i>
                            </p>
                            <p>
                            <i>Order Id: <?php echo "ORDS" . rand(10000,99999999)?></i>
                            </p>
                            <p>
                                <i>Cust Id: <?php echo  "CUST" . rand(10000,99999999)?></i>  
                            </p>
                        </div>
                    </div>

                    <div class="row">
                        <div class="text-center">
                            <h1>Standard Checkout</h1>
                        </div>
                        <table class="table table-hover">
                         <!--show table only if there are items added in the cart-->
                        <?php
                        $sum = 0;
                        $user_id = $_SESSION['user_id'];
                        $query = "SELECT items.price AS Price, items.id, items.name AS Name FROM users_items JOIN items ON users_items.item_id = items.id WHERE users_items.user_id='$user_id' and status='Added to cart'";
                        $result = mysqli_query($con, $query)or die($mysqli_error($con));
                        if (mysqli_num_rows($result) >= 1) {
                            ?>
                            <thead>
                                <tr>
                                    <th>Item Number</th>
                                    <th>Item Name</th>
                                    <th>Price</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                while ($row = mysqli_fetch_array($result)) {
                                    $sum+= $row["Price"];
                                    $id = $row["id"] . ", ";
                                    echo "<tr><td>" . "#" . $row["id"] . "</td><td>" . $row["Name"] . "</td><td>Rs " . $row["Price"];
                                }
                                $id = rtrim($id, ", ");
                                echo "<tr><td></td><td>Total</td><td>Rs " . $sum;
                     
                                ?>
                            </tbody>
                            <?php
                        } 
                        ?>
                    </table>
                        <button type="submit" value="CheckOut"  class="btn btn-success btn-lg btn-block">Pay Now <span class="glyphicon glyphicon-chevron-right"></span>
                        </button></td>
                    </div>
</form>
                </div>
    


    </div>        
</body>
</html>