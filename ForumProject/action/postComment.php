<?php 
	include '../config.php';
	session_start();
	if(!isset($_SESSION["user"])){
		header("location: ../login.php");
	}
	$username = $_SESSION["user"];
	$query = "SELECT profile.name FROM profile WHERE username = '$username'";
	$result = mysqli_query($conn, $query);
	$row = mysqli_fetch_array($result);
 ?>

<?php 
	if(isset($_POST['submit-comment']) && $_POST['comment']!=''){

		$postid = $_POST['input-postid'];
		$_SESSION['postid'] = $postid;
		$comment = $_POST['comment'];		

		$datepostcomment = date('Y-m-d H:i:s');
		$namecomment = $row['name'];
		
		$sql = "INSERT INTO postcomment(postid, comment, datepostcomment,namecomment) VALUES('$postid', '$comment', '$datepostcomment', '$namecomment')";
		$result = mysqli_query($conn, $sql);
		header("location: ../html/newfeed.php");
		
	}else{
		header('location: ../html/newfeed.php');
	}

 ?>