<?php 
// Kiểm nếu người dùng không phải là admin thì không được phép truy cập vào file này.
if($_SESSION['user']['level'] != 1) die('You have not permission!');
// Ngăn chặn người dùng truy cập trực tiếp vào file mà không thông qua file index.php
if ( ! defined('PATH_SYSTEM')) die ('Bad requested!');

function indexAction() {
    require_once PATH_MODEL.'/User.php';
    require_once PATH_SYSTEM.'/core/view/view.php';
    $data = [];

    $page = isset($_GET['page'])?$_GET['page']:1;

    $data = getAllUser($page);
    $data['page'] = $page;
    loadView('master','User/user', $data);
}

function createAction() {
    require_once PATH_SYSTEM.'/core/view/view.php';
    loadView('master','User/add_user');
}

function storeAction() {
    require_once PATH_MODEL.'/User.php';
    //xử lý lưu dữ liệu
    if(isset($_POST['submit_add'])) {
        $name = $_POST['name_add'];
        $email = $_POST['email_add'];
        $pass = md5($_POST['pass_add']);
        $level = $_POST['level_add'];

        $data = [
            'name' => $name,
            'email' => $email,
            'pass' => $pass,
            'level' => $level
        ];
        storeUser($data);
    }
    header("Location:index.php?c=user&a=index");
    //chuyển hướng
}

function editAction() {
    require_once PATH_MODEL.'/User.php';
    require_once PATH_SYSTEM.'/core/view/view.php';
    if(isset($_GET['id'])) {
        $id = $_GET['id'];
    }else{
        die('Không nhận được id cần tìm');
    }
    $data = getUserById($id);
    loadView('master','User/edit_user', $data);
}

function updateAction() {
    require_once PATH_MODEL.'/User.php';
    //Nhận được $_POST sau khi submit form edit bao gồm: user_full, user_mail, user_level, btn_update
    if(isset($_POST['submit_edit'])) {
        $name = $_POST['name_edit'];
        $email = $_POST['email_edit'];
        $pass = md5($_POST['pass_edit']);
        $level = $_POST['level_edit'];

        $data = [
            'name' => $name,
            'email' => $email,
            'pass' => $pass,
            'level' => $level
        ];
        updateById($_GET['id'], $data);
    }
    header("Location:index.php?c=user&a=index");
}

function deleteAction() {
    require_once PATH_MODEL.'/User.php';
    //xử lý lưu dữ liệu
    if(isset($_GET['id'])) {
        $id = $_GET['id'];
    }else{
        die('Không nhận được id cần tìm');
    }
    deleteById($id);
    //chuyển hướng
    header("Location:index.php?c=user&a=index");
}

function detailAction() {

}

?>