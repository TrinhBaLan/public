<?php 
	include('../config.php');
	session_start();
	$username = $_SESSION["user"];

	$sql = "SELECT user.userid FROM user where username = '$username'";

	$query = mysqli_query($conn, $sql);
	$row = mysqli_fetch_array($query);
	$userid = $row['userid'];
	
	if(isset($_POST['submit-profile']))
	{	

		$name = $_POST['fullname'];
		if(isset($_POST['gender']))
		{
			$gender = $_POST['gender'];
		}else{
			$gender = "male";
		}
		

		if(isset($_POST['dateofbirth'])){
			$dateofbirth = $_POST['dateofbirth'];
		}
		else{

			$dateofbirth = date('Y-m-d H:i:s');
		}
		
				
		$phonenumber=  $_POST['phonenumber'];
		$passs =  $_POST['password'];
		$sql = "UPDATE profile SET name = '$name', gender = '$gender', dateofbirth = '$dateofbirth', phonenumber = '$phonenumber' where userid = '$userid'";
		
		$sql1 = "UPDATE user SET password = '$passs' where userid = '$userid'";
	
		mysqli_query($conn, $sql);
		mysqli_query($conn, $sql1);

		header('location: ../html/profile.php');
	}
	
	


 ?>