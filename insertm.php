<?php
require('db.php');
$status = "";
if(isset($_POST['new']) && $_POST['new']==1){
	//product table
	//$pid =filter_input(INPUT_POST, 'pid');
	$pname =filter_input(INPUT_POST, 'pname');
    $isAvailable =filter_input(INPUT_POST, 'isAvailable');
	$description =filter_input(INPUT_POST, 'description');
    $img = filter_input(INPUT_POST, 'img');
	$catid =filter_input(INPUT_POST, 'catid');
    $sql="INSERT INTO product(pname,isAvailable,description,img,catid)VALUES('$pname','$isAvailable','$description','$img','$catid')";
    /*size table
	$pid =filter_input(INPUT_POST, 'pid');
	$sid =filter_input(INPUT_POST, 'sid');
	$price =filter_input(INPUT_POST, 'price');
	$sql1="INSERT INTO productsize(pid,sid,price)VALUES('$pid','$sid','$price')";
	*/
	if($con->query($sql) === TRUE){  //&& $con->query($sql1) === TRUE){
	$status = "New Product Inserted Successfully.
    </br></br><a href='viewm.php'>View Inserted Product</a>";
	}else{
		echo "Error: " . $sql . "<br>" . $con->error;
	}
}
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Insert New Menu Product</title>
<link rel="stylesheet" href="css/style.css" />
</head>
<body>
<div class="form">
<p><a href="Admin_Page.html">Dashboard</a> 
| <a href="viewm.php">View Products</a> 
| <a href="insert.php">New Record</a> 
| <a href="view.php">View Records</a> 
| <a href="index.html">Logout</a></p>
<div>
<h1>Insert New Menu Product</h1>
<form name="form" method="post" action=""> 
<input type="hidden" name="new" value="1" />
<h3>Product Information</h3>
<p><input type="text" name="pname" placeholder="Enter Product Name" required /></p>
<p><input type="text" name="isAvailable" placeholder="Enter Product Availability" required /></p>
<p><input type="text" name="description" placeholder="Enter Product Description" required /></p>
<p><input type="text" name="catid" placeholder="Enter Category ID" required /></p>
Select Image to Upload:
<p><input type="file" name="img" required /></p>
<!--<h3>Size Information</h3>
<p><input type="text" name="pid" placeholder="Enter Product ID" required /></p>
<p><input type="text" name="sid" placeholder="Enter Product Size ID" required /></p>
<p><input type="text" name="price" placeholder="Enter Product Price" required /></p>-->
<p><input name="submit" type="submit" value="Submit" /></p>
</form>
<p style="color:#FF0000;"><?php echo $status; ?></p>
</div>
</div>
</body>
</html>