<?php 
	include '../config.php';
	session_start();
	if(!isset($_SESSION["user"])){
		header("location: ../login.php");
	}
	
 ?>
<?php 
	
	if(isset($_POST['postid'])){
		$postid = $_POST['postid'];
		$sql = "SELECT post.*, profile.name from post join profile on post.userid = profile.userid where post.postid = '$postid'";
		$result = mysqli_query($conn, $sql);
		$row = mysqli_fetch_array($result);

		echo json_encode($row);
		
	}

 ?>
