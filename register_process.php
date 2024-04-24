<?php
	if(!isset($_POST['submit'])){
		die('Không có quyền truy cập !');
	}

	require_once 'system/config/db.php';

	$name = $_POST['reg_name'];
	$email = $_POST['reg_email'];
	$pass = $_POST['reg_pass'];
	$md5 = md5($pass);
	$conn = getConnect();

	if (!preg_match("/^[a-vxyỳọáầảấờễàạằệếýộậốũứĩõúữịỗìềểẩớặòùồợãụủíỹắẫựỉỏừỷởóéửỵẳẹèẽổẵẻỡơôưăêâđda-z ]+$/", strtolower($name))) {
		session_start();
		$_SESSION['validate'] = "<script>alert('Đăng ký không thành công, Kiểm tra lại các trường thông tin!')</script>'";
		header('Location: ' . $_SERVER['HTTP_REFERER']);
	}else if(!preg_match("/^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$/",$pass)){
		session_start();
		$_SESSION['validate'] = "<script>alert('Đăng ký không thành công, Kiểm tra lại các trường thông tin!')</script>'";
		header('Location: ' . $_SERVER['HTTP_REFERER']);	
	}else{
	$sql = "INSERT INTO acc (id_acc,name,email,pass,level) VALUES ('','$name','$email','$md5','2')";
	mysqli_query($conn,$sql);
	
	header("location: login.php");
	}

?>