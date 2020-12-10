<?php 
	session_start();
	if(!isset($_SESSION["user"])){
		header("location: ../login.php");
	}
 ?>	
 <title>Forum</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
 <?php 
 	include("header.php");

 ?>


	
 	<form action="" method="" class="content-page">

 		<div class="content-top">
 			<button class="create-button" type="button"data-toggle="modal" data-target="#myModal" id="click-post" style="border: none">
 				Create
 			</button>
 			<!-- Modal -->
		  <div class="modal fade" id="myModal" role="dialog">
		    <div class="modal-dialog">
		    
		      <!-- Modal content-->
		      <div class="modal-content" style="background: #FFEFEF !important;
			border-radius: 10px; ">
		        <div class="modal-header">
		          <button type="button" class="close" data-dismiss="modal">&times;</button>
		          <h4 class="modal-title" style="color: black;font-family: Roboto;font-style: normal;font-weight: bold;font-size: 28px;">Create a new post</h4>
		        </div>
		        <form action="../action/post_newfeed.php" method="POST">
		        <div class="modal-body" style="border: none">
		        	
		          	<div class="label-dialog">
		          		<label for="">Title:</label>
		          	</div>
		          	<input type="text" style="margin-bottom: 21px" class="input-dialog" id="title" name="title" placeholder="Enter the title">
		          	<div class="label-dialog">
		          		<label for="">Content: </label>
		          	</div>
		          	<textarea  type="text" class="input-dialog" id="content-input" name="content" placeholder="Enter the content"></textarea>
		          	<!-- <div class="button-post">         		
		          		
		          	</div> -->
		          
		        </div>
		        
		        <div class="modal-footer">
		          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
		          <button type="submit" name="submit-post" formaction="../action/post_newfeed.php" formmethod="POST" class="create-button-post btn btn-success">Create</button>
		        </div>
		        </form>
		      </div>
		      
		    </div>
		  </div>
		  
 		<input class="input-search" type="text" placeholder="Search">


 		</div>
 		
 	 	
 	 	<?php 
 	 		include("listPost.php");
 	 	 ?>

 	</form>



<?php 
	include("footer.php");
	
 ?>
