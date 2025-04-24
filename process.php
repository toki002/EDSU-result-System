<?php
if(isset($_POST["submit"])){
##checking for values safety
require("connection.php");

//$timer = DATE("Y-m-d H:i:s");	
$name = $_POST["name"];
$email = $_POST["email"];
$phone = $_POST["phone"];	
$message= $_POST["message"];


$select = "SELECT email FROM contactus WHERE email='$email'";
if($query = mysqli_query($connect,$select)){
	$num = mysqli_num_rows($query);
     if($num > 0){
		echo "<script>alert('Email already exists');
		window.location='about.html';     
	   </script>";
		
	}else{
		$ins = "INSERT  contactus (name,email,phone,message) VALUES('$name','$email','$phone', '$message')";
if($cmd = mysqli_query($connect,$ins)){
echo "<script>alert('Thanks, your message has been received');
       window.location='about.html';     
      </script>";
	
}else{
echo "Failed to execute query on the database!";
header("location:about.html");
	
}
		
	}
}else{
	echo "Failed to query database!";
header("location:about.html");
	
}

}else{
echo "Parameter Missing! Try again later";
header("location:about.html");
}

?>

##check this code later
//UPDATE `nicholascsc`.`obiora` SET `name` = 'obiora ozoemena' WHERE `obiora`.`user_id` = 1;