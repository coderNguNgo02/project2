<?php
	require_once 'system/config/db.php';
	session_start();
	if(!isset($_POST['submit_login'])){
		die("Bạn không có quyền truy cập");
	}

	$email = $_POST['login_email'];
	$pass = md5($_POST['login_pass']);
	$conn = getConnect();

	$sql = "SELECT * FROM acc WHERE email ='".$email."' AND pass ='".$pass."'"; 
	$query = mysqli_query($conn, $sql);
        if(mysqli_num_rows($query) > 0) {
            //xoá các session thông báo lỗi khi đã đăng nhập thành công.
            if(isset($_SESSION['error_login'])) {
                unset($_SESSION['error_login']);
            }
            //Lấy thông tin người dùng vừa đăng nhập
            $result = mysqli_fetch_assoc($query);
            //lưu thông tin vào session
            $_SESSION['user']['user_mail'] = $result['email'];
            $_SESSION['user']['level'] = $result['level'];
            $_SESSION['user']['id'] = $result['id_acc'];
            header("location:index.php");
        }else{
            $_SESSION['error_login'] = '<div class="alert alert-danger">Tài khoản không hợp lệ !</div>';
            //Điều hướng quay trở lại trang trước đó 
            if(isset($_SERVER['HTTP_REFERER'])) {
                header("Location:".$_SERVER['HTTP_REFERER']);
            }
        }
        closeConnection();
?>