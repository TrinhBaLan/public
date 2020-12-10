<div class="content">
	 
		 
	

	<?php 
		include("../config.php");
		$sql = "SELECT user.userid, profile.name, post.* FROM post JOIN user ON post.userid = user.userid JOIN profile ON user.username = profile.username where ltrim(rtrim(content)) != '' ORDER BY post.datepost DESC ";

		$query = mysqli_query($conn, $sql);
 	?>	
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
	 				<button style="background-color:  #FAF6F6;border: none;">
	 				 <img src="../icons/icon-heart.png" style="width:12px;height: 12px" alt="tha tim">
	 				</button>
	 				<?php echo $row["numberLike"] ?>

	 			</div>
	 			
	 			<div class="number numberComment">	
	 				<button type="button" name="buttonComment"class="buttonComment"
	 				value="<?php echo $row["postid"] ?>"
	 				 >
	 				<img src="../icons/icon-message.png" style="width:12px;height: 12px" alt="binh luan">
	 				</button>
	 				<?php echo $row["numberComment"];
	 				 ?>

	 			</div>

	 		</div>

	 	</div>
	<?php } ?>		

</div>
<!-- Modal -->
		  <div class="modal fade" id="myModal11" role="dialog">
		    <div class="modal-dialog">
		    
		      <!-- Modal content-->
		      <div class="modal-content" style="background: #FFEFEF !important;
			border-radius: 10px; ">
		        <div class="modal-header">
		          <button type="button" class="close" data-dismiss="modal">&times;</button>
		          <h4 class="modal-title" style="color: black;font-family: Roboto;font-style: normal;font-weight: bold;font-size: 28px;"></h4>
		        </div>
		        <form action="../action/postComment.php" method="POST">
		        <div class="modal-body" style="border: none">
		        		          	
		       <div id="my-content">
		          		<div id="content-detail">
		          			<div id="post-content">
		          				
		          			</div>

		          		<div class="likeAndCmt">
				 			<div class="number numberLike">
				 				
				 				 <img src="../icons/icon-heart.png" style="width:12px;height: 12px" alt="tha tim">	 				
				 				1000k
				 			</div>	 			
				 			<div class="number numberComment">	<img src="../icons/icon-message.png" style="width:12px;height: 12px" alt="binh luan">
				 				100k
				 			</div>

				 		</div>


		          		</div>

		        	<div id="listcomment">
		        		
		        	</div>
		  		</div>
		 	  <div class="comment-bottom">
		          	<div class="input-comment">
		          		<label for=""> Your comment: </label>
		          	</div>
		          	<input type="text" id="postid-cmt" name="input-postid" style="display: none">
		          	<textarea  type="text" class="input-comment" id="input-comment" name="comment" placeholder="Enter your comment"></textarea>
		        </div>   
		          	<!-- <div class="button-post">         		
		        		
		        	</div> -->
		          
		        </div>
		        
		        <div class="modal-footer">
		          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
		          <button type="submit" name="submit-comment" formaction="../action/postComment.php" formmethod="POST" class="create-button-post">Comment</button>
		        </div>
		        </form>
		      </div>
		      
		    </div>

		  </div>
<script type="text/javascript">
	$(document).ready(function(){

		$('.buttonComment').click(function(){

			let postid = this.value;

			$.ajax({
				url:"../action/getListComment.php",
				method: 'POST',
				data: {postid:postid},
				dataType: "json",
				success: function(data){
					var $comment = $('#myModal11 .modal-dialog .modal-content .modal-body #listcomment');
					$comment.html('');
					for(var i = 0; i<data.length;i++){
						let item = data[i];
						let $item = $('<div>', {class: 'comment-item'
						});

						let $name = $('<div>', {class: 'comment-name', text: item.namecomment,
						});

						let $text = $('<div>', {class: 'comment-text', text: item.comment,
						});
$item.append($name).append($text);
$comment.append($item);

					}
	
				}

			});

			$.ajax({
				url : "../action/getComment.php",
				method: 'POST',
				data: {postid:postid},
				dataType: "json",
				success: function(data){
					
					$('#myModal11 .modal-dialog .modal-content .modal-header .modal-title').text(data.name);
					$('#myModal11 .modal-dialog .modal-content .modal-body #post-content').text(data.content);
					$('#myModal11 .modal-dialog .modal-content .modal-body #postid-cmt').val(data.postid);
					$("#myModal11").modal('show');
				}
			});

		

		})

	})

</script>