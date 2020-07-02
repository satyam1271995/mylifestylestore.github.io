<?php
require("includes/common.php");
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <?php include 'includes/links.php'; ?>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        
        <title>Products | Satyam Lifestyle Store</title>
        
    </head>

    <body>
        <?php
        include 'includes/header.php';
        include 'includes/check-if-added.php';
        ?>
        <div class="container" id="content">
            <!-- Jumbotron Header -->
            <div class="jumbotron home-spacer" id="products-jumbotron">
                <h1>Welcome to our Lifestyle Store!</h1>
                <p>We have the best cameras, watches and shirts for you. No need to hunt around, we have all in one place.</p>

            </div>
            <hr>

            <div class="row text-center" id="cameras">
                
                <?php

	$query = " SELECT * FROM items order by id ASC ";

	$result = mysqli_query($con, $query);

	$num = mysqli_num_rows($result);

	if($num > 0){
		while($product = mysqli_fetch_array($result)){
			?>
                
                
                
                <div class="col-md-3 col-sm-6 home-feature">
                    <form>
                    <div class="thumbnail">
                        <img src="img/<?php echo $product['image'];  ?>" alt="">
                        <div class="caption">
                            <h3> <?php echo $product['name'];  ?>   </h3>
                            <p>Price: &#8377; <?php echo $product['price'];  ?> </p>
                            <input type="hidden" name="name" value="<?php echo $product['name']; ?>">
                            <input type="hidden" name="price" value="<?php echo $product['price']; ?>">
                            <?php if (!isset($_SESSION['email'])) { ?>
                                <p><a href="login.php" role="button" class="btn btn-primary btn-block">Buy Now</a></p>
                                <?php
                            } else {
                                //We have created a function to check whether this particular product is added to cart or not.
                                if (check_if_added_to_cart !=0) {
                                    //echo '<a href="#" class="btn btn-block btn-success" disabled>Added to cart</a>';
                                } else {
                                    ?>
                                <a href="cart-add.php?id=<?php echo $product['id']; ?>" name="add" value="add" class="btn btn-block btn-primary"><span class = "glyphicon glyphicon-shopping-cart"></span> Add to cart</a>
                                
                                    <?php
                                }
                            }
                            ?>
                            
                        </div>
                    </div>
                    </form>
                </div>
                 <?php		
		}
	}
	?>
            </div>
            <hr>
        </div>
                

        <?php include("includes/footer.php"); ?>
    </body>

</html>