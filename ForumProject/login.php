<?php 
	session_start();
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Đăng nhập</title>
	<link rel="stylesheet" href="./css/index.css">
	<script type=”text/javascript” src="/js/jquery-3.5.1.min.js"></script>
</head>
<body>
	
	<div class="container">
		<div class="header-top">
			<div class="title-page">
				WELCOME!
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
			<form action="./action/login_submit.php" method="POST">
			 	<div class="login-top">
			 	 	<div class="label-login">
			 	 		<div class="label label-user">
			 	 			<label for="">User</label>
			 	 		</div>
			 	 		<div class="label label-password">
			 	 			<label for="">Password</label>
			 	 		</div>
			 	 	</div>
			 	 	<div class="input-login">
	                    <div class="input-container">
	                    	<input class="input" type="text" id="username" name="username" placeholder="Số điện thoại / Email">
	                    </div>
	                    <div class="input-container">
	                    	
	                        <input class="input" type="password" id="password" name="password" placeholder="Mật khẩu">
	                    </div >

	                 </div>
		            </div>
	            <div class="login-bottoms">        
	                <div class="button-login-a">
	                    <div class="button-login">
	                        <button class="buttonLogin" id="login"  name="submit" type="submit">LOGIN</button>
	                    </div>
	                    <div class="button-login">
	                    	<a href="./html/signup.php">
	                         	<button class="buttonLogin" id="signup" name="buttonLogin" type="button" >SIGN UP</button>
	                       </a>
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