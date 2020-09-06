<?php
require('db.php');
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>View Records</title>
<link rel="stylesheet" href="css/style.css" />
</head>
<body>
<div class="form">
<p><a href="Admin_Page.html">Dashboard</a> 
| <a href="insert.php">New Record</a>
| <a href="insertm.php">New Product</a> 
| <a href="viewm.php">View Products</a>  
| <a href="index.html">Logout</a></p>
<h2>View Records</h2>
<table width="100%" border="1" style="border-collapse:collapse;" align="center">
<thead>
<tr>
<th><strong>E.No</strong></th>
<th><strong>SSN</strong></th>
<th><strong>First Name</strong></th>
<th><strong>Last Name</strong></th>
<th><strong>DOB</strong></th>
<th><strong>Address</strong></th>
<th><strong>Phone</strong></th>
<th><strong>Salary</strong></th>
<th><strong>Edit</strong></th>
<th><strong>Delete</strong></th>
</tr>
</thead>
<tbody>
<?php
$count=1;
$sel_query="Select * from employee ORDER BY id desc;";
$result = mysqli_query($con,$sel_query);
while($row = mysqli_fetch_assoc($result)) { ?>
<tr><td align="center"><?php echo $count; ?></td>
<td align="center"><?php echo $row["ssn"]; ?></td>
<td align="center"><?php echo $row["fname"]; ?></td>
<td align="center"><?php echo $row["lname"]; ?></td>
<td align="center"><?php echo $row["dob"]; ?></td>
<td align="center"><?php echo $row["address"]; ?></td>
<td align="center"><?php echo $row["phone"]; ?></td>
<td align="center"><?php echo $row["salary"]; ?></td>
<td align="center">
<a href="edit.php?id=<?php echo $row["id"]; ?>">Edit</a>
</td>
<td align="center">
<a href="delete.php?id=<?php echo $row["id"]; ?>">Delete</a>
</td>
</tr>
<?php $count++; } ?>
</tbody>
</table>
</div>
</body>
</html>