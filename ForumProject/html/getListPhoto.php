<div class="content-image">
		

	<?php 
		
		include("../config.php");

		
		$sql1 = "SELECT post.datepost FROM post WHERE ltrim(rtrim(image)) != '' GROUP BY datepost";		
		$query1 = mysqli_query($conn, $sql1);
 	?>	
 	
 	
 		<?php 
 			while ( $row1= mysqli_fetch_array($query1)) {

 		 ?>
 		 <div class="listImagePost">
	 		<div class="time-upload" style="color: #BCB4B4; font-size: 15px;">
	 			
				<?php 
					$date = $row1["datepost"];
					$date1 = strtotime($row1["datepost"]);
					$date2 = strtotime(date('Y-m-d'));
					if($date2-$date1 == 0){
						echo "Today";
					}
					else if ($date2-$date1 == 86400) {
						echo "Yesterday";
					}
					else {
						echo $row1["datepost"];
					}
				?>		 		
			</div>
			
			<div class="img-upload">
					 <?php 
					 	$sql = "SELECT image FROM post WHERE ltrim(rtrim(image)) != '' and datepost = '$date'";
					 	$query = mysqli_query($conn, $sql);

						while ($row = mysqli_fetch_array($query)) {	 		
								
					?> 	
					<div class="show-image">	 
					 			<img src="../images/<?php echo $row['image'] ?>" class="image" style="height: 200px" alt="">						 		
					 </div>
					<?php } ?>
			</div>

		</div>	

		<?php } ?>		
					 					
	

</div>