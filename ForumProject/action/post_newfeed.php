<?php 
	include('../config.php');
	session_start();
	$username = $_SESSION["user"];

	$sql = "SELECT user.userid FROM user where username = '$username'";

	$query = mysqli_query($conn, $sql);
	$row = mysqli_fetch_array($query);
	$userid = $row['userid'];
	
	if($_POST['title']!='' && $_POST['content']!='')
	{	

		$title = $_POST['title'];
		$content = $_POST['content'];
		
		$date = date('Y-m-d H:i:s');

		$sql = "INSERT INTO post(userid, content, datepost, title) VALUES('$userid', '$content', '$date', '$title')";
		mysqli_query($conn, $sql);

		header('location: ../html/newfeed.php');
	}
	
	


 ?>