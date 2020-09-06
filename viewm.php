<?php
require('db.php');
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>View Menu Products</title>
<link rel="stylesheet" href="css/style.css" />
</head>
<body>
<div class="form">
<p><a href="Admin_Page.html">Dashboard</a> 
| <a href="insert.php">New Record</a> 
| <a href="view.php">View Records</a> 
| <a href="insertm.php">New Product</a> 
| <a href="index.html">Logout</a></p>
<h2>View Products</h2>
<table width="100%" border="1" style="border-collapse:collapse;" align="center">
<thead>
<tr>
<th><strong>PID</strong></th>
<th><strong>PName</strong></th>
<th><strong>isAvailable</strong></th>
<th><strong>Description</strong></th>
<th><strong>Img</strong></th>
<th><strong>CatID</strong></th>
<th><strong>Edit</strong></th>
<th><strong>Delete</strong></th>
</tr>
</thead>

<tbody>

<?php
$count=1;
$sel_query="Select * from product ORDER BY pid desc;";
$result = mysqli_query($con,$sel_query);
while($row = mysqli_fetch_assoc($result)) { ?>
<tr><td align="center"><?php echo $count; ?></td>
<td align="center"><?php echo $row["pname"]; ?></td>
<td align="center"><?php echo $row["isAvailable"]; ?></td>
<td align="center"><?php echo $row["description"]; ?></td>
<td align="center"><?php echo $row["img"]; ?></td>
<td align="center"><?php echo $row["catid"]; ?></td>
<td align="center">
<a href="editm.php?id=<?php echo $row["pid"]; ?>">Edit</a>
</td>
<td align="center">
<a href="deletem.php?id=<?php echo $row["pid"]; ?>">Delete</a>
</td>
</tr>
<?php $count++; } ?>
</tbody>
</table><br><br><br>
<!--
<table width="100%" border="1" style="border-collapse:collapse;" align="relative">
<thead>
<tr>
<th><strong>PID</strong></th>
<th><strong>SID</strong></th>
<th><strong>Price</strong></th>
<th><strong>Edit</strong></th>
<th><strong>Delete</strong></th>
</tr>
</thead>

<tbody>

<?php
$count=1;
$sel_query="Select * from productsize ORDER BY pid desc;";
$result = mysqli_query($con,$sel_query);
while($row = mysqli_fetch_assoc($result)) { ?>
<tr><td align="center"><?php echo $count; ?></td>
<td align="center"><?php echo $row["sid"]; ?></td>
<td align="center"><?php echo $row["price"]; ?></td>
<td align="center">
<a href="editm.php?id=<?php echo $row["pid"]; ?>">Edit</a>
</td>
<td align="center">
<a href="deletem.php?id=<?php echo $row["pid"]; ?>">Delete</a>
</td>
</tr>
<?php $count++; } ?>
</tbody>
</table>
-->
</div>
</body>
</html>