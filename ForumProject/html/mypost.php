<?php 
	include('../config.php');

	session_start();
	if(!isset($_SESSION["user"])){
		header("location: ../login.php");
	}
 ?>	
 <title>Posts</title>
 <link rel="stylesheet" href="../css/mypost.css">
 <?php 
 	include("header.php");

 ?>

<?php 

	
	$username = $_SESSION["user"];

	$sql = "SELECT user.userid FROM user where username = '$username'";

	$query = mysqli_query($conn, $sql);
	$row = mysqli_fetch_array($query);
	$userid = $row['userid'];


 ?>

 <?php 
		
		$sql = "SELECT user.userid, profile.name, post.* FROM post JOIN user ON post.userid = user.userid JOIN profile ON user.username = profile.username where  ltrim(rtrim(content)) != '' and post.userid = '$userid' ORDER BY post.datepost DESC ";

		$query = mysqli_query($conn, $sql);
 	?>	
	
 	<form action="" method="" class="content-page-post">
 		<div class="page-post">
 		<?php 
		while ($row = mysqli_fetch_array($query)) {

	 ?>
	 	<div class="listPost">
	 		
	 		<div class="datepost">	 			
	 			<?php 

	 				$date1 = strtotime($row["datepost"]);
					$date2 = strtotime(date('Y-m-d'));
					if($date2-$date1 == 0){
						echo "Today";
					}
					else if ($date2-$date1 == 86400) {
						echo "Yesterday";
					}
					else {
						echo $row["datepost"];
					}
	 			 ?>
	 		</div>

	 		<div class="nameaccount">
	 			<?php echo $row["name"] ?>
	 		</div>
	 		<div class="contentpost">
	 			<?php echo $row["content"] ?>
	 		</div>
	 		<div class="likeAndCmt">
	 			<div class="number numberLike">
	 				<button style="background-color:  #FAF6F6;border: none;"> <img src="../icons/icon-heart.png" style="width:12px;height: 12px" alt="tha tim">
	 				</button>
	 				<?php echo $row["numberLike"] ?>

	 			</div>
	 			
	 			<div class="number numberComment">
	 				<button type="submit " >
	 				<img src="../icons/icon-message.png" style="width:12px;height: 12px" alt="binh luan">
	 				</button>
	 				<?php echo $row["numberComment"];


	 				 ?>

	 			</div>

	 		</div>

	 	</div>

	


	<?php } ?>
 		
		</div>
 	</form>


<?php 
	include("footer.php");
	
 ?>
