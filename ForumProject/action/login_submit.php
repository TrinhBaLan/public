<?php 

	session_start();
	include '../config.php';

	if(isset($_POST["submit"])&& $_POST["username"]!='' && $_POST["password"]!=''){
		
		$username = $_POST["username"];


		$password = $_POST["password"];	
		$password = md5($password);
		$sql = "SELECT * FROM user WHERE username = '$username' AND password = '$password'";
		$user = mysqli_query($conn, $sql);
	
	
			if(mysqli_num_rows($user) >0){
				$_SESSION["user"] = $username;
				header("location: ../html/newfeed.php");
			}
			else{
				
				$_SESSION["notice"]  =  "thông tin tài khoản mật khẩu không chính xác";
				header("location: ../login.php");
				
			}
	
	
	}
	else{
		$_SESSION["notice"]  =  "Vui lòng điền đầy đủ thông tin";
		header("location: ../login.php");
	}
	



 ?>