<?php 
// Kiểm nếu người dùng không phải là admin thì không được phép truy cập vào file này.
if($_SESSION['user']['level'] != 1) die('You have not permission!');
// Ngăn chặn người dùng truy cập trực tiếp vào file mà không thông qua file index.php
if ( ! defined('PATH_SYSTEM')) die ('Bad requested!');

//Action mặc định khi người dùng truy cập vào đường dẫn ..index.php
function indexAction() {
    require_once PATH_SYSTEM.'/core/view/view.php';
    $data = [];
    loadView('master','Dashboard/home');
}

?>