<?php 
	include '../config.php';
	session_start();

	if(isset($_POST["submit"])&& $_POST["username"]!='' && $_POST["password"]!='' && $_POST["repassword"]!='' && $_POST["name"] !=''){
		$name = $_POST["name"];
		$username = $_POST["username"];
		$password = $_POST["password"];	
		$repassword = $_POST["repassword"];
		$lever = 0;
		if($password != $repassword){
		$_SESSION["notice"] = "Password nhập lại không chính xác";
			header("location: ../html/signup.php");
			die();
		}
		else{
			$password = md5($password);
			$sql = "SELECT * FROM user WHERE username = '".$username."'";
			$query = mysqli_query($conn, $sql);

			if(mysqli_num_rows($query) >0){
	
				$_SESSION["notice"] = "Tài khoản đăng ký đã tồn tại";
				header("location: ../html/signup.php");
	
			}
			else{
				$sql = "INSERT INTO user(username,password,lever) VALUES ('$username','$password','$lever')";
				mysqli_query($conn, $sql);
				$sql2 = "SELECT userid from user WHERE username = '$username'";
				$query = mysqli_query($conn, $sql2);
				$row = mysqli_fetch_array($query);
				$userid = $row['userid'];
				$avatar = "profile-nochoose.jpg";
				$sql1 = "INSERT INTO profile(username, name, userid ,avatar) VALUES ('$username','$name', '$userid', '$avatar')";
				mysqli_query($conn, $sql1);
				$_SESSION["notice"] = "Bạn đã đăng ký thành công tài khoản";
				header("location: ../login.php");
			
			}
		}
	
	}
	else{
		$_SESSION["notice"] = "Vui lòng nhập đầy đủ thông tin";
		header("location: ../html/signup.php");
	}
	

?>