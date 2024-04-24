<?php 
    session_start();
    if(isset($_SESSION['user'])){
        header("location:index.php");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Đăng nhập</title>
  <link rel="stylesheet" href="public/css/admin/login.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
  <script src="public/js/admin/login.js"></script>
</head>
<body>
<div class="login-page">
  <?php 
    if(isset($_SESSION['error_login'])){
      echo $_SESSION['error_login'];
    }
    ?>
  <h1 style="text-align: center; color: whitesmoke;">Đăng nhập</h1>
  <div class="form">
    <form class="login-form" action="login_process.php" method="post">
      <input type="email" placeholder="email" id="login_email" name="login_email"/>
      <input type="password" placeholder="password" id="login_pass" name="login_pass"/>
      <button type="submit" name="submit_login">Đăng nhập</button>
      <p class="message">Chưa có tài khoản? <a href="register.php">Đăng ký ngay.</a></p>
    </form>
  </div>
</div>
</body>
</html>