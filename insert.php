<?php
require('db.php');
$status = "";
if(isset($_POST['new']) && $_POST['new']==1){
    $trn_date = date("Y-m-d H:i:s");
	$ssn =filter_input(INPUT_POST, 'ssn');
    $fname =filter_input(INPUT_POST, 'fname');
	$lname =filter_input(INPUT_POST, 'lname');
    $dob = filter_input(INPUT_POST, 'dob');
	$address =filter_input(INPUT_POST, 'address');
	$phone =filter_input(INPUT_POST, 'phone');
	$salary =filter_input(INPUT_POST, 'salary');
    $sql="INSERT INTO employee(trn_date,ssn,fname,lname,dob,address,phone,salary)VALUES('$trn_date','$ssn','$fname','$lname','$dob','$address','$phone','$salary')";
    if($con->query($sql) === TRUE){
    $status = "New Record Inserted Successfully.
    </br></br><a href='view.php'>View Inserted Record</a>";
	}else{
		echo "Error: " . $sql . "<br>" . $con->error;
	}
}
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Insert New Record</title>
<link rel="stylesheet" href="css/style.css" />
</head>
<body>
<div class="form">
<p><a href="Admin_Page.html">Dashboard</a> 
| <a href="view.php">View Records</a> 
| <a href="insertm.php">New Product</a> 
| <a href="viewm.php">View Products</a> 
| <a href="index.html">Logout</a></p>
<div>
<h1>Insert New Employee Record</h1>
<form name="form" method="post" action=""> 
<input type="hidden" name="new" value="1" />
<p><input type="text" name="ssn" placeholder="Enter SSN(###-##-####)" required /></p>
<p><input type="text" name="fname" placeholder="Enter First Name" required /></p>
<p><input type="text" name="lname" placeholder="Enter Last Name" required /></p>
<p><input type="text" name="dob" placeholder="Enter DOB(yyyy-mm-dd)" required /></p>
<p><input type="text" name="address" placeholder="Enter Full Address" required /></p>
<p><input type="text" name="phone" placeholder="Enter Phone(#######)" required /></p>
<p><input type="text" name="salary" placeholder="Enter Salary" required /></p>
<p><input name="submit" type="submit" value="Submit" /></p>
</form>
<p style="color:#FF0000;"><?php echo $status; ?></p>
</div>
</div>
</body>
</html>