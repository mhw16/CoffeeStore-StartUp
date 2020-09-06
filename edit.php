<?php
require('db.php');
$id=$_REQUEST['id'];
$query = "SELECT * from employee where id='".$id."'"; 
$result = mysqli_query($con, $query) or die ( mysqli_error());
$row = mysqli_fetch_assoc($result);
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Update Record</title>
<link rel="stylesheet" href="css/style.css" />
</head>
<body>
<div class="form">
<p><a href="Admin_Page.html">Dashboard</a> 
| <a href="insert.php">New Record</a> 
| <a href="view.php">View Records</a>
| <a href="index.html">Logout</a></p>
<h1>Update Record</h1>
<?php
$status = "";
if(isset($_POST['new']) && $_POST['new']==1)
{
$id=$_REQUEST['id'];
    $trn_date = date("Y-m-d H:i:s");
	$ssn =filter_input(INPUT_POST, 'ssn');
    $fname =filter_input(INPUT_POST, 'fname');
	$lname =filter_input(INPUT_POST, 'lname');
    $dob = filter_input(INPUT_POST, 'dob');
	$address =filter_input(INPUT_POST, 'address');
	$phone =filter_input(INPUT_POST, 'phone');
	$salary =filter_input(INPUT_POST, 'salary');
$update="update employee set trn_date='".$trn_date."',
ssn='".$ssn."', fname='".$fname."', lname='".$lname."', dob='".$dob."',
address='".$address."', salary='".$salary."', salary='".$salary."' where id='".$id."'";
mysqli_query($con, $update) or die(mysqli_error());
$status = "Record Updated Successfully. </br></br>
<a href='view.php'>View Updated Record</a>";
echo '<p style="color:#FF0000;">'.$status.'</p>';
}else {
?>
<div>
<form name="form" method="post" action=""> 
<input type="hidden" name="new" value="1" />
<input name="id" type="hidden" value="<?php echo $row['id'];?>" />
<p><input type="text" name="ssn" placeholder="Enter SSN(###-##-####)" 
required value="<?php echo $row['ssn'];?>" /></p>
<p><input type="text" name="fname" placeholder="Enter First Name" 
required value="<?php echo $row['fname'];?>" /></p>
<p><input type="text" name="lname" placeholder="Enter Last Name" 
required value="<?php echo $row['lname'];?>" /></p>
<p><input type="text" name="dob" placeholder="Enter DOB(yyyy-mm-dd)" 
required value="<?php echo $row['dob'];?>" /></p>
<p><input type="text" name="address" placeholder="Enter Address" 
required value="<?php echo $row['address'];?>" /></p>
<p><input type="text" name="phone" placeholder="Enter phone(#######)" 
required value="<?php echo $row['phone'];?>" /></p>
<p><input type="text" name="salary" placeholder="Enter Salary" 
required value="<?php echo $row['salary'];?>" /></p>
<p><input name="submit" type="submit" value="Update" /></p>
</form>
<?php } ?>
</div>
</div>
</body>
</html>