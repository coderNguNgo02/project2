<?php 
    if(! defined('PATH_SYSTEM')) die("Bad request!");
    function indexAction() {
        require_once PATH_MODEL.'/Product.php';
        require_once PATH_SYSTEM.'/core/view/view.php';
        $data = [];
        loadView('master','home/product', $data);
    }

    function categoryAction() {
        require_once PATH_SYSTEM.'/core/view/view.php';
        require_once PATH_MODEL.'/Product.php';
        $data = [];
        //lấy dữ liệu
        $page = isset($_GET['page']) ? $_GET['page'] : 1;
        $catId = $_GET['id'];
        $data = getAllProductsByCategory($page, $catId);
        $data['page'] = $page;
        loadView('master','home/category-product', $data);
    }

    function productAction(){
        require_once PATH_SYSTEM.'/core/view/view.php';
        require_once PATH_MODEL.'/Product.php';
        $data = [];
        $page = isset($_GET['page']) ? $_GET['page'] : 1;
        $data = getAllProductSite($page);
        $data['page'] = $page;
        loadView('master','home/product', $data);
    }

     function detailAction(){
        require_once PATH_SYSTEM.'/core/view/view.php';
        require_once PATH_MODEL.'/Product.php';
        $data = [];
        $id = $_GET['id'];
        $data = getProductById($id);
        loadView('master','home/product-detail', $data);
    }

    function searchAction() {
        require_once PATH_SYSTEM.'/core/view/view.php';
        require_once PATH_MODEL.'/Product.php';
        if(isset($_POST['kw'])){
        $keyword = explode(" ", $_POST['kw']);
        }
        else {
        $keyword = explode(" ", $_GET['kw']);
        }
        $keyword = "%".implode("%",$keyword)."%";
        $page = isset($_GET['page']) ? $_GET['page'] : 1;
        $data = searchProductByName($page, $keyword);
        $data['page'] = $page;
        if(isset($_POST['kw'])){
            $data['keyword']=$_POST['kw'];
            }
            else {
            $data['keyword']=$_GET['kw'];
            }
        loadView('master','home/search', $data);
    }
?>