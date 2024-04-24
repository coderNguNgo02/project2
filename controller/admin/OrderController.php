<?php 
    if($_SESSION['user']['level'] != 1) die('You have not permission!');
    // Ngăn chặn người dùng truy cập trực tiếp vào file mà không thông qua file index.php
    if ( ! defined('PATH_SYSTEM')) die ('Bad requested!');


    function indexAction(){
        require_once PATH_MODEL.'/Order.php';
        require_once PATH_SYSTEM.'/core/view/view.php';
        $data = [];
        $page = isset($_GET['page'])?$_GET['page']:1;
        $data = getAllOrder($page);
        $data['page'] = $page;
        loadView('master','Order/order_list',$data);
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
        storeCategory($data);
        header("location:index.php?c=category&a=index");
    }

    function editAction() {
        require_once PATH_SYSTEM.'/core/view/view.php';
        require_once PATH_MODEL.'/Order.php';
        $data = [];
        if(isset($_GET['id'])) {
            $id = $_GET['id'];
            $data = getOrderById($id);
            loadView('master','order/edit_order', $data);
        }
    }

    function updateAction() {
        if (!isset($_GET['id'])) {
            die("Cần truyển id");
        }
        require_once PATH_MODEL.'/Order.php';
        if(isset($_POST['submit_edit_od'])){
            $id = $_GET['id'];
            $data['receiver_name'] = $_POST['name_order'];
            $data['receiver_add'] = $_POST['add_order'];
            $data['receiver_phone'] = $_POST['phone_order'];
            $data['status'] = $_POST['status_order'];
        }
        updateOrderById($id,$data);
        header("location:index.php?c=order&a=index");
    }

    function deleteAction() {
        require_once PATH_MODEL.'/Order.php';
        //xử lý lưu dữ liệu
        if(isset($_GET['id'])) {
            $id = $_GET['id'];
            $data['status'] = 6;
            updateOrderById($id,$data);
            header("location:index.php?c=order&a=index");
        }else{
            echo "Không tìm thấy id đơn hàng.";
        }
    }

     function detailAction() {
            require_once PATH_MODEL.'/Order.php';
            require_once PATH_SYSTEM.'/core/view/view.php';
            $data = [];
            if(isset($_GET['id'])) {
                $id = $_GET['id'];
                $data = getOrderDetailById($id);
                loadView('master','order/order_detail', $data);
            }else{
                echo "Không tìm thấy id.";
            }
           
        }
?>