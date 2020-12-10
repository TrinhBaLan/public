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

 		$sql = "SELECT * from postcomment where postid ='$postid' ";
 		$query = mysqli_query($conn, $sql);

 		
 		$result = [];
	    while ($row2 = $query->fetch_array(MYSQLI_ASSOC)) { // 
	        $result [] = $row2;
	    }
 		if($result){
 			echo json_encode($result);
 		}
 	}


 ?>