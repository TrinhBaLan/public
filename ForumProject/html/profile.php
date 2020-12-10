<?php 
	include('../config.php');
	session_start();
	if(!isset($_SESSION["user"])){
		header("location: ../login.php");
	}
 ?>	
<title>Profile</title>

 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
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
		$sql1 = "SELECT * FROM profile join user on profile.userid = user.userid where profile.userid = '$userid'";
		$query = mysqli_query($conn, $sql1);
		$row = mysqli_fetch_array($query);
		
?>

	 <div class="content-page">
	 	
			<form action="../action/change_profile.php" method="POST"  enctype="multipart/form-data" class="profile profile-avatar">
					<div class="avatar">
						<img src="../images/<?php 
							$sql3 = "SELECT avatar FROM profile where userid ='$userid' ";
							$query3 = mysqli_query($conn, $sql3);

							$row3 = mysqli_fetch_array($query3);
							echo $row3['avatar']?>" onclick="triggerClick()" id="profileDisplay" style="width: 130px; height: 180px;" alt="">
						<input type="file" name="profileImage" id="profileImage" style="display: none" onchange="displayImage(this)" >
					</div>
					<button type="submit" name="save-user" class="change-avt choosen">
						<img src="../icons/icon-camera.png" style="width: 23px; height: 23px;">
						<div class="content-button">Change avatar</div>
					</button>
					<button class="edit-profile choosen" type="button"data-toggle="modal" data-target="#myModal">
						<img src="../icons/icon-edit.png" alt="" style="width: 23px; height: 23px;">
						<div class="content-button"> Edit profile</div>
					</button>
					<a href="logout.php" class="choosen">
						<div class="content-button" style="padding-left: 30px;padding-top: 7px"> Logout</div>
					</a>
			
			
			</form>

			<div class="profile profile-detail">
				<div class="user profile-input" >
						<div class="label-profile user-profile">
			 	 			<label  for="">User</label>
			 	 		</div>
			 	 		<div class="input-profile user-profile">
	                    	<input class="input" type="text" id="username" name="username" value="<?php echo $row['username']?>" readonly>
	                    </div>
				</div>
				<div class="fullname profile-input">
						<div class="label-profile name-profile">
			 	 			<label  for="">Fullname</label>
			 	 		</div>
			 	 		<div class="input-profile name-profile">
	                    	<input class="input" type="text" id="fullname" name="fullname" value="<?php echo $row['name']?>" readonly>
	                    </div>
				</div>
				<div class="gender profile-input">
						<div class="label-profile gender-profile">
			 	 			<labelfor="">Gender</label>
			 	 		</div>
			 	 		 <fieldset class="input-profile feildset" data-role="controlgroup">						       
						        <input type="radio" name="gender" id="male" value="male" <?php 
						        	if($row['gender']=='male'){
						        		echo 'checked';
						        	}

						         ?>>
						        <label for="male">Male</label>
						       
						        <input type="radio" name="gender" id="female" value="female"<?php 
						        	if($row['gender']=='female'){
						        		echo 'checked';
						        	}

						         ?>>
						         <label for="female">Female</label>
						  </fieldset>

				</div>
				<div class="dateofbirth profile-input">
						<div class="label-profile gender-profile">
			 	 			<label  for="">Dob</label>
			 	 		</div>
			 	 		<div class="input-profile gender-profile">
	                    	<input class="input" type="date" id="dateofbirth" name="dateofbirth" value="<?php echo $row['dateofbirth']?>" readonly>
	                    </div>
				</div>
				<div class="phonenumber profile-input">
						<div class="label-profile gender-profile">
			 	 			<label for="">Phone</label>
			 	 		</div>
			 	 		<div class="input-profile gender-profile">
	                    	<input class="input" type="text" id="phonenumber" name="phonenumber" value="<?php echo $row['phonenumber']?>" readonly>
	                    </div>
				</div>
			</div>


	 </div>
	 <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content" style="background: #FFEFEF !important;
	border-radius: 10px; ">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title" style="color: black;font-family: Roboto;font-style: normal;font-weight: bold;font-size: 28px;">Edit profile</h4>
        </div>
        <form action="../action/profile_submit.php" method="POST">
        <div class="modal-body" style="border: none">
        	
          <div class="user profile-input" >
						<div class="label-profile user-profile">
			 	 			<label  for="">User</label>
			 	 		</div>
			 	 		<div class="input-profile user-profile">
	                    	<input class="input" type="text" id="username" name="username" value="<?php echo $row['username']?>" readonly>
	                    </div>
				</div>
				<div class="password profile-input" >
						<div class="label-profile user-profile">
			 	 			<label  for="">Password</label>
			 	 		</div>
			 	 		<div class="input-profile user-profile">
	                    	<input class="input" type="password" id="password" name="password" value="<?php echo $row['password']?>" readonly>
	                    </div>
				</div>
				<div class="fullname profile-input">
						<div class="label-profile name-profile">
			 	 			<label  for="">Fullname</label>
			 	 		</div>
			 	 		<div class="input-profile name-profile">
	                    	<input class="input" type="text" id="fullname" name="fullname" value="<?php echo $row['name']?>" >
	                    </div>
				</div>
				<div class="gender profile-input">
						<div class="label-profile gender-profile">
			 	 			<labelfor="">Gender</label>
			 	 		</div>
			 	 		 <fieldset class="input-profile feildset" data-role="controlgroup">						       
						        <input type="radio" name="gender" id="male" value="male" <?php 
						        	if($row['gender']=='male'){
						        		echo 'checked';
						        	}

						         ?>>
						        <label for="male">Male</label>
						       
						        <input type="radio" name="gender" id="female" value="female"<?php 
						        	if($row['gender']=='female'){
						        		echo 'checked';
						        	}

						         ?>>
						         <label for="female">Female</label>
						  </fieldset>

				</div>
				<div class="dateofbirth profile-input">
						<div class="label-profile gender-profile">
			 	 			<label  for="">Dob</label>
			 	 		</div>
			 	 		<div class="input-profile gender-profile">
	                    	<input class="input" type="date" id="dateofbirth" name="dateofbirth" value="<?php echo $row['dateofbirth']?>">
	                    </div>
				</div>
				<div class="phonenumber profile-input">
						<div class="label-profile gender-profile">
			 	 			<label for="">Phone</label>
			 	 		</div>
			 	 		<div class="input-profile gender-profile">
	                    	<input class="input" type="text" id="phonenumber" name="phonenumber" value="<?php echo $row['phonenumber']?>">
	                    </div>
				</div>
          
        </div>
        
        <div class="modal-footer">
         
          <button type="submit" name="submit-profile" formaction="../action/profile_submit.php" formmethod="POST" class="create-button-post btn btn-success">Save</button>
        </div>
        </form>
      </div>
      
    </div>
  </div>
	
<script type="text/javascript">
	function triggerClick(){
		document.querySelector("#profileImage").click();
	}

	function displayImage(e){
		if(e.files[0]){
			var reader = new FileReader();
			reader.onload = function(e){
				document.querySelector("#profileDisplay").setAttribute('src', e.target.result);
			}
			reader.readAsDataURL(e.files[0]);
	
		}
	}

</script>
<?php 
	include("footer.php");
	
 ?>
