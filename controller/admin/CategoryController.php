<?php 
    if($_SESSION['user']['level'] != 1) die('You have not permission!');
    // Ngăn chặn người dùng truy cập trực tiếp vào file mà không thông qua file index.php
    if ( ! defined('PATH_SYSTEM')) die ('Bad requested!');


    function indexAction(){
        require_once PATH_MODEL.'/Category.php';
        require_once PATH_SYSTEM.'/core/view/view.php';

        $data = [];
        $data = getAllCategory();

        loadView('master','Category/Category',$data);
    }

    function createAction() {
        $data = [];
        require_once PATH_SYSTEM.'/core/view/view.php';
        require_once PATH_MODEL.'/Category.php';
        $data['cate'] = getAllCategory();
        loadView('master','category/add_cate', $data);
    }

    function storeAction() {
        require_once PATH_MODEL.'/Category.php';
        $data['name_cate'] = $_POST['cate_name'];
        $data['is_delete'] = 1;
        storeCategory($data);
        header("location:index.php?c=category&a=index");
    }

    function editAction() {
        $data = [];
        require_once PATH_SYSTEM.'/core/view/view.php';
        require_once PATH_MODEL.'/Category.php';
        if(isset($_GET['id'])) {
            $id = $_GET['id'];
            $data['cate'] = getCategoryById($id);
            loadView('master', 'category/edit_cate', $data);
        }else{
            header("Location: error.php");
        }
    }

    function updateAction() {
        require_once PATH_MODEL.'/Category.php';
        $data['name_cate'] = $_POST['cate_name'];
        updateById($_GET['id'],$data);
        header("location:index.php?c=category&a=index");
    }

     function deleteAction() {
        require_once PATH_MODEL.'/Category.php';
        require_once PATH_SYSTEM.'/core/view/view.php';
        //xử lý lưu dữ liệu
        if(isset($_GET['id'])) {
            $id = $_GET['id'];
            $data = $_GET['is_delete'];
            deleteById($id,$data);
            header("location:index.php?c=category&a=index");
        }else{
            echo "Không tìm thấy id.";
        }
    }
?>