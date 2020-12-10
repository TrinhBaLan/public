<?php 
	include('../config.php');
	session_start();
	$username = $_SESSION["user"];

	$sql = "SELECT user.userid FROM user where username = '$username'";

	$query = mysqli_query($conn, $sql);
	$row = mysqli_fetch_array($query);
	$userid = $row['userid'];
	
	if(isset($_FILES['profileImage']) && $_FILES['profileImage']['name']!=''){
		if(isset($_SESSION["noticeprofile"])){					
			unset($_SESSION['noticeprofile']);
		}
		$file = $_FILES['profileImage'];

		$fileName = $file['name'];
		if($file['size'] < 2097153){
			$validTypes = array('jpg', 'jpeg', 'png', 'bmp', 'php', 'py');
			$fileType = substr($fileName, strrpos($fileName, ".") + 1);
			if(isset($_SESSION["noticeprofile"])){					
				unset($_SESSION['noticeprofile']);
			}
			if(in_array($fileType, $validTypes)){
				
				if(isset($_SESSION["noticeprofile"])){					
					unset($_SESSION['noticeprofile']);
				}
				$date = date('Y-m-d H:i:s');
				$sql = "UPDATE profile SET avatar = '$fileName' where userid = '$userid'";
				$query = mysqli_query($conn, $sql);
				$path = "../images/".$fileName;
				
								
				if(!file_exists($path)){
					move_uploaded_file($file['tmp_name'], '../images/'.$fileName);
				}
				
				header('location: ../html/profile.php');
			}
			else{
				$_SESSION["noticeprofile"] = "Định dạng ảnh không hợp lệ!";
				header('location: ../html/profile.php');
			}
		}
		else{
			$_SESSION["noticeprofile"] = "Dung lượng ảnh vượt quá mức cho phép!";
			header('location: ../html/profile.php');
		}
	
	}
	else{

		$_SESSION["noticeupload"] = "Vui lòng chọn ảnh để upload!";
		header('location: ../html/profile.php');
	}
	


 ?>
