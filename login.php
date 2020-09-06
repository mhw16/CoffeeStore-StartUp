<?php

$servername = "localhost";
$dbusername = "root";
$dbpassword = "";
$dbname = "coffeeshop";

$conn = new mysqli($servername, $dbusername, $dbpassword, $dbname);
session_start();



 if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form 
      
      $myusername = mysqli_real_escape_string($conn,$_POST['userid']);
      $mypassword = mysqli_real_escape_string($conn,$_POST['pswrd']); 
	  
	  if($myusername == "admin" && $mypassword == "123"){
		header("location: Admin_Page.html");
		}
      
      $sql = "SELECT cid FROM coffeeshop.customer WHERE username = '$myusername' and pw = '$mypassword'";
      $mysqli_result = mysqli_query($conn,$sql);
      $row = mysqli_fetch_array($mysqli_result,MYSQLI_ASSOC);
      //$active = $row['active'];
      
      $count = mysqli_num_rows($mysqli_result);
      
      // If result matched $myusername and $mypassword, table row must be 1 row
		
      if($count == 1) {
        // session_register("myusername");
        $_SESSION['login_user'] = $myusername;
         
        header("location: Home_Page.html");
      }else {
		echo "Username and/or Password incorrect. <a href=\"index.html\">Try again.</a>";
      }
   }
?>