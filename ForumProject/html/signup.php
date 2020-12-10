<?php 
	session_start();
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Đăng ký</title>
	<link rel="stylesheet" href="../css/index.css">
	<script type=”text/javascript” src="/js/jquery-3.5.1.min.js"></script>
</head>
<body>
	
	<div class="container">
		<div class="header-top">
			<div class="title-page">
				SIGN UP
			</div>
			<div class="notice">
				<?php 
					if(isset($_SESSION["notice"])){
						echo $_SESSION["notice"];
						unset($_SESSION['notice']);
					}
				 ?>
			</div>
		</div>
	
		<div class="header-bottom">
			<form action="../action/signup_submit.php" method="POST">
			 	<div class="login-top">
			 	 	<div class="label-login">
			 	 		<div class="label label-account">
			 	 			<label for="">Name</label>
			 	 		</div>

			 	 		<div class="label label-user">
			 	 			<label for="">User</label>

			 	 		</div>
			 	 		<div class="label label-password">
			 	 			<label for="">Password</label>
			 	 		</div>
			 	 		<div class="label label-password">
			 	 			<label for="">Confirm password</label>
			 	 		</div>
			 	 	</div>
			 	 	<div class="input-login">
			 	 		 <div class="input-container">
	                    	<input class="input" type="text" id="accname" name="name" placeholder="Tên">
	                    </div>

	                    <div class="input-container">
	                    	<input class="input" type="text" id="username" name="username" placeholder="Số điện thoại / Email">
	                    </div>
	                    <div class="input-container">
	                    	
	                        <input class="input" type="password" id="password" name="password" placeholder="Mật khẩu">
	                    </div >
	                     <div class="input-container">
	                    	
	                        <input class="input" type="password" id="repassword" name="repassword" placeholder="Nhập lại mật khẩu">
	                    </div >

	                 </div>
	            </div>
            <div class="login-bottoms">        
                <div class="button-login-a">                 
                    <div class="button-login">
                         <button class="buttonLogin" id="signup" name="submit" type="submit">SIGN UP</button>
                       
                    </div>
                </div>
             </div>      
                  
           </form>	   
		</div>
		
		
		</div>

	</div>


</body>

<script type="text/javascript" src="../js/index.js"></script>
</html>