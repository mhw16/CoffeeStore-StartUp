<?php

$servername = "localhost";
$dbusername = "root";
$dbpassword = "";
$dbname = "coffeeshop";

$First_Name = filter_input(INPUT_POST, 'First_Name');
$Last_Name = filter_input(INPUT_POST, 'Last_Name');
$Street = filter_input(INPUT_POST, 'Street');
$City = filter_input(INPUT_POST, 'City');
$State = filter_input(INPUT_POST, 'State');
//$Zip_Code = filter_input(INPUT_POST, 'Zip_Code');
$Phone_Number = filter_input(INPUT_POST, 'Phone_Number');
$DOB = filter_input(INPUT_POST, 'DOB(yyyy-mm-dd)');
$Sex = filter_input(INPUT_POST, 'sex');
$Email = filter_input(INPUT_POST, 'Email');
//$Marital_Status = filter_input(INPUT_POST, 'Marital_Status(S,M,W,D)');
//$Annual_Income = filter_input(INPUT_POST, 'Annual_Income');
$Bank_Account = filter_input(INPUT_POST, 'Bank_Account');

//New Login information
$Username = filter_input(INPUT_POST, 'Username');
$Password = filter_input(INPUT_POST, 'Password');
//$Re_Enter = filter_input(INPUT_POST, 'Re_Enter Password');

//Create connection
$conn = new mysqli($servername, $dbusername, $dbpassword, $dbname);

//Check connection
//if($conn->connect_error){
//	die("Connection failed: . $conn->connect_error;
//};

//Functions
if(empty($First_Name)){
	echo "First name cannot be blank.";
	die();
}

if(empty($Last_Name)){
	echo "Last name cannot be blank.";
	die();
}

if(empty($Street)){
	echo "Street cannot be blank.";
	die();
}

if(empty($City)){
	echo "City cannot be blank.";
	die();
}

if(empty($State)){
	echo "State cannot be blank.";
	die();
}

if(empty($Phone_Number)){
	echo "Phone Number cannot be blank.";
	die();
}

if(empty($DOB)){
	echo "Date of Birth cannot be blank.";
	die();
}

if(empty($Sex)){
	echo "Sex cannot be blank.";
	die();
}

if(empty($Email)){
	echo "Email cannot be blank.";
	die();
}

if(empty($Username)){
	echo "Username cannot be blank.";
	die();
}

if(empty($Password)){
	echo "Password cannot be blank.";
	die();
}

$sql = "SELECT * FROM coffeeshop.customer WHERE username = '$Username'";
      $mysqli_result = mysqli_query($conn,$sql);
      $row = mysqli_fetch_array($mysqli_result,MYSQLI_ASSOC);
	  
$count = mysqli_num_rows($mysqli_result);

if($count >= 1){
	echo "Username already exists. <a href=\"index.html\">Try again.</a>";
	die();
}

$sql = "INSERT INTO customer(fname, lname, street, city, state, phone, dob, sex, email, username, pw, bankaccno)
VALUES ('$First_Name', '$Last_Name', '$Street', '$City', '$State', '$Phone_Number', '$DOB', '$Sex','$Email', '$Username', '$Password', '$Bank_Account')";

if($conn->query($sql) === TRUE){
	//echo "Thank You! Your information has been entered into our database! You may proceed to login!";
	header("Location: Registration.html");
}else{
	echo "Error: " . $sql . "<br>" . $conn->error;
}
$conn->close();

?>