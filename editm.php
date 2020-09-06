<?php
require('db.php');
$id=$_REQUEST['id'];
$query = "SELECT * from product where pid='".$id."'"; 
$result = mysqli_query($con, $query) or die ( mysqli_error());
$row = mysqli_fetch_assoc($result);
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Update Product</title>
<link rel="stylesheet" href="css/style.css" />
</head>
<body>
<div class="form">
<p><a href="Admin_Page.html">Dashboard</a> 
| <a href="insert.php">New Record</a> 
| <a href="view.php">View Records</a>
| <a href="insertm.php">New Product</a>
| <a href="viewm.php">View Products</a> 
| <a href="index.html">Logout</a></p>
<h1>Update Product</h1>
<?php
$status = "";
if(isset($_POST['new']) && $_POST['new']==1)
{
$id=$_REQUEST['id'];
	$pname =filter_input(INPUT_POST, 'pname');
    $isAvailable =filter_input(INPUT_POST, 'isAvailable');
	$description =filter_input(INPUT_POST, 'description');
    $img = filter_input(INPUT_POST, 'img');
	$catid =filter_input(INPUT_POST, 'catid');
$update="update product set
pname='".$pname."', isAvailable='".$isAvailable."', description='".$description."', img='".$img."',
catid='".$catid."' where pid='".$id."'";
mysqli_query($con, $update) or die(mysqli_error());
$status = "Product Updated Successfully. </br></br>
<a href='viewm.php'>View Updated Product</a>";
echo '<p style="color:#FF0000;">'.$status.'</p>';
}else {
?>
<div>
<form name="form" method="post" action=""> 
<input type="hidden" name="new" value="1" />
<input name="pid" type="hidden" value="<?php echo $row['pid'];?>" />
<p><input type="text" name="pname" placeholder="Enter Product Name" 
required value="<?php echo $row['pname'];?>" /></p>
<p><input type="text" name="isAvailable" placeholder="Enter Product Availability" 
required value="<?php echo $row['isAvailable'];?>" /></p>
<p><input type="text" name="description" placeholder="Enter Product Description" 
required value="<?php echo $row['description'];?>" /></p>
<p><input type="text" name="catid" placeholder="Enter Category ID" 
required value="<?php echo $row['catid'];?>" /></p>
Select Image to Upload:
<p><input type="file" name="img" required
required value="<?php echo $row['img'];?>" /></p>
<p><input name="submit" type="submit" value="Update" /></p>
</form>
<?php } ?>
</div>
</div>
</body>
</html>