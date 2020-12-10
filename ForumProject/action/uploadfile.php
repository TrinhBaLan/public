<?php 
	include('../config.php');
	session_start();
	$username = $_SESSION["user"];

	$sql = "SELECT user.userid FROM user where username = '$username'";

	$query = mysqli_query($conn, $sql);
	$row = mysqli_fetch_array($query);
	$userid = $row['userid'];
	
	if(isset($_FILES['file']) && $_FILES['file']['name']!=''){
		if(isset($_SESSION["noticeupload"])){					
			unset($_SESSION['noticeupload']);
		}
		$file = $_FILES['file'];

		$fileName = $file['name'];
		
		if($file['size'] < 2097153){
			$validTypes = array('jpg', 'jpeg', 'png', 'bmp');
			$fileType = substr($fileName, strrpos($fileName, ".") + 1);
			if(isset($_SESSION["noticeupload"])){					
				unset($_SESSION['noticeupload']);
			}
			if(in_array($fileType, $validTypes)){
				
				if(isset($_SESSION["noticeupload"])){					
					unset($_SESSION['noticeupload']);
				}
				$date = date('Y-m-d H:i:s');
				$sql = "INSERT INTO post(userid, datepost, image) VALUES('$userid','$date' ,'$fileName')";
				$query = mysqli_query($conn, $sql);
				$path = "../images/".$fileName;
				
				var_dump();				
				if(!file_exists($path)){
					move_uploaded_file($file['tmp_name'], '../images/'.$fileName);
				}
				
				header('location: ../html/Photos.php');
			}
			else{
				$_SESSION["noticeupload"] = "Định dạng ảnh không hợp lệ!";
				header('location: ../html/Photos.php');
			}
		}
		else{
			$_SESSION["noticeupload"] = "Dung lượng ảnh vượt quá mức cho phép!";
			header('location: ../html/Photos.php');
		}
	
	}
	else{
		$_SESSION["noticeupload"] = "Vui lòng chọn ảnh để upload!";
		header('location: ../html/Photos.php');
	}
	


 ?>