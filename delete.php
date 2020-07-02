<?php

require("includes/common.php");;
$id=$_REQUEST['id'];
$query = "DELETE FROM items WHERE id=$id"; 
$result = mysqli_query($con,$query) or die ( mysqli_error()); 
    header("location:adm.php");
?>
