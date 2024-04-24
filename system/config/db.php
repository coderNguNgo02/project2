<?php
require_once 'config.php';
$conn = null;
/*
	Hàm getConnect trả về biến $conn chứa câu lệnh kết nối đến csdl
*/
	function getConnect(){
		$conn = mysqli_connect(DB_HOST,DB_USER,DB_PASS,DB_NAME);
		if($conn == null){
			die('Không thể kết nối đến database.');
		}

		return $conn;
	}

	function closeConnect(){
		global $conn;

		if($conn){
			mysqli_close($conn);
		}
	}
?>