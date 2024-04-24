<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Đăng ký</title>
  <link rel="stylesheet" href="public/css/admin/login.css">
  <script src="public/js/admin/login.js"></script>
</head>
<body>
<?php
		session_start();
		if(isset($_SESSION['validate'])){
			echo $_SESSION['validate'];
			unset($_SESSION['validate']);
		}
	?>
<div class="login-page">
  <h1 style="text-align: center; color: whitesmoke;">Đăng ký</h1>
  <div class="form">
    <form class="register-form" action="register_process.php" method="post">
      <input type="text" placeholder="email address" name="reg_email" type="email"/>
      <label style="color: red" for="name" id="err_name"></label>
      <input onchange="return validateName()" type="text" placeholder="name" name="reg_name" id="name"/>
      <label style="color: red" for="pass" id="err_pass"></label>
      <input onchange="return validatePass()" type="password" placeholder="password" name="reg_pass" id="pass"/>
      <button name="submit" type="submit">Đăng ký</button>
    </form>
    <p class="message">Bạn đã có tài khoản? <a href="login.php">Đăng nhập ngay.</a></p>
  </div>
</div>
</body>

<script>
	function validateName(){
		const regexName = /^[a-vxyỳọáầảấờễàạằệếýộậốũứĩõúữịỗìềểẩớặòùồợãụủíỹắẫựỉỏừỷởóéửỵẳẹèẽổẵẻỡơôưăêâđda-z ]+$/;
		if (regexName.exec(document.getElementById('name').value.toLowerCase()) == null ){
			document.getElementById('err_name').innerHTML ="*Họ tên không đúng định dạng !";
		}
		else{
			document.getElementById('err_name').innerHTML ="";
		}
	}

	function validatePass(){
		const regexPass = /^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$/;
		if(regexPass.exec(document.getElementById('pass').value) == null){
			document.getElementById('err_pass').innerHTML ="*Mật khẩu phải có 8 ký tự, 1 chữ số";
		}
		else{
			document.getElementById('err_pass').innerHTML ="";
		}
	}
</script>
</html>