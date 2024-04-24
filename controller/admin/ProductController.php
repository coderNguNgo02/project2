<?php 
    // Kiểm nếu người dùng không phải là admin thì không được phép truy cập vào file này.
    if($_SESSION['user']['level'] != 1) die('You have not permission!');
    // Ngăn chặn người dùng truy cập trực tiếp vào file mà không thông qua file index.php
    if ( ! defined('PATH_SYSTEM')) die ('Bad requested!');

    function indexAction() {
        require_once PATH_MODEL.'/Product.php';
        require_once PATH_SYSTEM.'/core/view/view.php';
        $data = [];
        //lấy dữ liệu
        $page = isset($_GET['page']) ? $_GET['page'] : 1;
        $data = getAllProducts($page);
        $data['page'] = $page;
        loadView('master','Product/product', $data);
    }

    /**
     * Hiển thị giao diện thêm mới sản phẩm
     */
    function createAction() {
        $data = [];
        require_once PATH_SYSTEM.'/core/view/view.php';
        require_once PATH_MODEL.'/Category.php';
        $data['cate'] = getAllCategory();
        loadView('master','product/add_product', $data);
    }

    /**
     * Thực hiện việc lưu sản phẩm vào CSDL
     */
    function storeAction() {
        require_once PATH_MODEL.'/Product.php';
        $data['name_prd'] = $_POST['prd_name'];
        $data['price_prd'] = $_POST['prd_price'];
        if(!empty($_FILES['prd_img']['name'])) {
            $data['img_prd'] = $_FILES['prd_img']['name'];
            $tmp_name = $_FILES['prd_img']['tmp_name'];
            move_uploaded_file($tmp_name, 'public/img/'.$data['img_prd']);
        }else{
            $data['img_prd'] = "no-img.jpg";
        }
        $data['quanty'] = $_POST['prd_qty'];
        $data['brand'] = $_POST['prd_brand'];
        $data['descript'] = $_POST['prd_desc'];
        $data['is_delete'] = 1;
        $data['cate_id'] = $_POST['cate_name'];
        
        storeProduct($data);
        header("location:index.php?c=product&a=index");
    }

    function editAction() {
        $data = [];
        require_once PATH_SYSTEM.'/core/view/view.php';
        require_once PATH_MODEL.'/Category.php';
        require_once PATH_MODEL.'/Product.php';
        if(isset($_GET['id'])) {
            $id = $_GET['id'];
            $data['product'] = getProductById($id);
            $data['category'] = getAllCategory();
            loadView('master','product/edit_product',$data);
        }else{
            header("location:error.php");
        }
       
    }

    function updateAction() {
        if (!isset($_GET['id'])) {
            die("err_404");
        }
        require_once PATH_MODEL.'/Product.php';
        $data['name_prd'] = $_POST['prd_name'];
        $data['price_prd'] = $_POST['prd_price'];
        if(!empty($_FILES['prd_img']['name'])) {
            $data['img_prd'] = $_FILES['prd_img']['name'];
            $tmp_name = $_FILES['prd_img']['tmp_name'];
            move_uploaded_file($tmp_name, 'public/img/'.$data['img_prd']);
        }
        $data['quanty'] = $_POST['prd_qty'];
        $data['brand'] = $_POST['prd_brand'];
        $data['descript'] = $_POST['prd_desc'];
        $data['cate_id'] = $_POST['cate_name'];
        updateProductById($_GET['id'],$data);
        header("location:index.php?c=product&a=index");
    }

    function deleteAction() {
        require_once PATH_MODEL.'/Product.php';
        require_once PATH_SYSTEM.'/core/view/view.php';
        //xử lý lưu dữ liệu
        if(isset($_GET['id'])) {
            $id = $_GET['id'];
            $data = $_GET['is_delete'];
            deleteProductById($id,$data);
            header("location:index.php?c=product&a=index");
        }else{
            echo "Không tìm thấy id.";
        }
    }
?>