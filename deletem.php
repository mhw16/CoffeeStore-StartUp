<?php
require('db.php');
$id=$_REQUEST['id'];
$query = "DELETE FROM product WHERE pid=$id"; 
$result = mysqli_query($con,$query) or die ( mysqli_error());
header("Location: viewm.php"); 
?>