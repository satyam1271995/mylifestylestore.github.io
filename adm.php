<?php
require_once("includes/common.php");         
?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
        
  <!-- Custom styles for this template -->
  <link href="admin/style.css" rel="stylesheet">

</head>
<body>
    <div class="d-flex" id="wrapper">
        <div class="bg-light border-right" id="sidebar-wrapper">
      <div class="sidebar-heading">Start Bootstrap </div>
      <div class="list-group list-group-flush">
        <a href="#" class="list-group-item list-group-item-action bg-light">Dashboard</a>
        <a href="#" class="list-group-item list-group-item-action bg-light">Upload Products</a>
        <a href="#" class="list-group-item list-group-item-action bg-light">Overview</a>
        <a href="#" class="list-group-item list-group-item-action bg-light">Events</a>
        <a href="#" class="list-group-item list-group-item-action bg-light">Profile</a>
        <a href="#" class="list-group-item list-group-item-action bg-light">Status</a>
      </div>
    </div>
        <div id="page-content-wrapper">

      <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
        

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
            <li class="nav-item active">
              <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Link</a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Dropdown
              </a>
              <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="#">Action</a>
                <a class="dropdown-item" href="#">Another action</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#">Something else here</a>
              </div>
            </li>
          </ul>
        </div>
      </nav>

      <div class="container-fluid">
        <form method="post" action="" enctype="multipart/form-data">
        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table mr-1"></i>
                                Product Details
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>Name</th>
                                                <th>Price</th>
                                                <th>Image</th> 
                                                <th></th>
                                            </tr>
                                        </thead>
                                        
                                        <tbody>
                                            <tr>
                                                <td><input type="text" name="name"></td>
                                                <td><input type="text" name="price"></td>
                                                <td><input type="file" name="image"></td>
                                                <td><input type="submit" name="submit" value="upload"></td>
                                          </tr>
                                          
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
        </form>
          
          <?php
          if (isset($_FILES['image'])){
              $file_name = $_FILES['image']['name'];
              $file_temp = $_FILES['image']['tmp_name'];
              move_uploaded_file($file_temp, 'img/'. $file_name);
              $name = $_POST['name'];
              $price = $_POST['price'];
              $query = "INSERT INTO items (name,price,image) VALUES ('" . $name . "','" . $price . "','" . $file_name. "')";
              mysqli_query($con, $query) or die(mysqli_error($con));
          }
          ?>
          </div>
            
            
            <!-- Show Product Details -->
            <form method="post" action="<?php $_PHP_SELF ?>" enctype="multipart/form-data">
        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table mr-1"></i>
                                Product Details
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <?php
                        $query = "SELECT items.id, items.price, items.name FROM items";
                        $result = mysqli_query($con, $query) or die($mysqli_error($con));
                        if (mysqli_num_rows($result) >= 1) {
                            ?>
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Product Name</th>
                                    <th>Price</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                while ($row = mysqli_fetch_array($result)) {
           
                                    $id = $row["id"];
                                    echo "<tr><td>" . "#" . $row["id"] . "</td><td>" . $row["name"] . "</td><td>Rs " . $row["price"] . "</td><td><a href='delete.php?id={$row['id']}'> Remove</a></td></tr>";
                                }
                                
                                ?>
                               
                            </tbody>
                            <?php
                        } 
                        ?>
                        
                                    </table>
                                    
                                </div>
                            </div>
                        </div>
        </form>
             <!-- End Show Details -->
       <?php
       
       ?>
             
             
             
         <form method="post">
        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table mr-1"></i>
                                Product Details
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <?php
                        $query = "SELECT users_items.id,users_items.item_id, users_items.status FROM users_items";
                        $result = mysqli_query($con, $query) or die($mysqli_error($con));
                        if (mysqli_num_rows($result) >= 1) {
                            ?>
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Item Id</th>
                                    <th>Status</th>
                                    
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                while ($row = mysqli_fetch_array($result)) {
           
                                    $id = $row["id"];
                                    echo "<tr><td>" . "#" . $row["id"] . "</td><td>" . $row["item_id"] . "</td><td>" . $row["status"] . "</td></tr>";
                                }
                                
                                ?>
                               
                            </tbody>
                            <?php
                        } 
                        ?>
                        
                                    </table>
                                    
                                </div>
                            </div>
                        </div>
        </form>
             
             
             
         </div> 
    
   
  
  <!-- Menu Toggle Script -->
  <script>
    $("#menu-toggle").click(function(e) {
      e.preventDefault();
      $("#wrapper").toggleClass("toggled");
    });
  </script>
</body>
</html>