<?php 
	session_start();
	if(!isset($_SESSION["user"])){
		header("location: ../login.php");
	}
 ?>	

 <title>Photos</title>
 <?php 
 	include("header.php");

 ?>

	 <form action="../action/uploadfile.php" method="POST" role="form" enctype="multipart/form-data" class="content-page">
	 	<div id="notice-upload" class="notice-upload">
				<?php 
					if(isset($_SESSION["noticeupload"])){
						echo $_SESSION["noticeupload"];
						unset($_SESSION['noticeupload']);
					}
				 ?>
		</div>
	 	<div class="upload-image"> 
	 		
	 		<div class="input-image" for="upload">
	 			<input type="file" class="form-control" id="upload" name = "file" style="display: none" >
	 			<label for="upload" id="upload-file">
	 				<button  class="inlabel" id="submit-upload" type="submit">
	 					<img src="../icons/icon-upload.png" id="icon-upload" style="width: 44px;height: 31px" alt="upload image">
	 				</button>
	 				<div class="inlabel" id="label-content">Upload photo from your computer
	 				</div>
	 				<div id="img-up" class="d-none" style="padding-top: 62px">
	 					<i>Image upload: </i>
	 					<span id="file-name">none</span>
	 				</div>
	 			</label>

	 			
	 		</div>



	 	 </div>
	 			
	 	 <?php 
 	 		include("getListPhoto.php");
 	 	 ?>
	 </form>
	

<?php 
	include("footer.php");
	
 ?>

  <script type="">
	 	let inputFile = document.getElementById('upload');
	 	let inputFileChoose = document.getElementById('img-up');
	 	let noticeUpload = document.getElementById('notice-upload');
	 	let fileChoosenName = document.getElementById('file-name');
	 	 inputFile.addEventListener('change', function(event){
	 	 	let fileName = event.target.files[0].name;
	 	 	fileChoosenName.textContent = fileName;	 	 	
	 	 	inputFileChoose.classList.remove("d-none");
	 	 	noticeUpload.classList.add("d-none");
	 	 })	

 </script>

