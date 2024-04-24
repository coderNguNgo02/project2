    <?php 
    //Bảo vệ file : Yêu cầu bắt buộc phải đi từ file index.php
    if(! defined('PATH_SYSTEM')) die("Bad request!");
 
    function indexAction() {
        require_once PATH_SYSTEM.'/core/view/view.php';
        require_once PATH_MODEL.'/Product.php';
        $data = [];
        $ids = [];
        if(isset($_SESSION['cart'])){
            foreach ($_SESSION['cart'] as $id_prd => $value) {
                $ids[] = $id_prd;
            }
            $ids = "(".implode(",", $ids).")";
            $data = getAllProductInList($ids);
        }
        loadView('master','cart/cart', $data);
    }
    
    function addAction() {
        require_once PATH_MODEL.'/Product.php';
        $id = $_GET['id']; //lấy id giỏ hàng trên đường dẫn
        if(isset($_SESSION['cart'][$id])){
            $_SESSION['cart'][$id]['qty']++;
        }else{
            $_SESSION['cart'][$id]['qty'] = 1;
            $data = getProductById($id);
            $_SESSION['cart'][$id]['price'] = $data['price_prd'];
            }
        header("Location:index.php?c=cart&a=index");
    }

   
    function updateAction() {
        foreach ($_POST['qty'] as $prd_id => $qty) {
            $_SESSION['cart'][$prd_id]['qty'] = $qty;   
        }
        header("Location:index.php?c=cart&a=index");
    }

   
    function deleteAction() {
        if(isset($_GET['id'])) {
            $id = $_GET['id'];
            if(isset($_SESSION['cart'][$id])) {
                unset($_SESSION['cart'][$id]);
            }
            if(count($_SESSION['cart']) == 0) {
                unset($_SESSION['cart']);
            }
            header("Location:index.php?c=cart&a=index");
        }else{
            header("Location:index.php?c=cart&a=index");
        }
    }


    function storeAction() {
        require_once PATH_MODEL.'/Order.php';
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $date = date('Y-m-d'); //2023-04-27

        $data = [
            'receiver_name' => $_POST['name_cart'],
            'receiver_email' => $_POST['email_cart'],
            'receiver_add' => $_POST['add_cart'],
            'receiver_phone' => $_POST['phone_cart'],
            'status' => 1,
            'total_price' => $_POST['total_price'],
            'order_date' => $date,
            'id_acc' => $_POST['id_acc']
        ];
        storeOrder($data);
        unset($_SESSION['cart']);
        header('Location:index.php');
    }

    function historyAction() {
        $userId = $_SESSION['user']['id'];
        require_once PATH_MODEL.'/Order.php';
        require_once PATH_SYSTEM.'/core/view/view.php';
        $data = [];
        //lấy dữ liệu
        $page = isset($_GET['page']) ? $_GET['page'] : 1;
        $data = getAllOrdersByUserId($page, $userId);
        $data['page'] = $page;
        //trả về view (hiển thị ra trình duyệt)
        loadView('master','cart/history',$data);
    }

    function detailAction() {
        require_once PATH_MODEL.'/Order.php';
        require_once PATH_SYSTEM.'/core/view/view.php';
        $data = [];
        if(isset($_GET['id'])) {
            $id = $_GET['id'];
            $data = getOrderDetailById($id);
               
            loadView('master','cart/detail_order',$data);
        }
        else{
            echo "Không tìm thấy id";
        }
       
    }

    function destroyAction(){
        require_once PATH_MODEL.'/Order.php';
        if(isset($_GET['id'])) {
            $id = $_GET['id'];
            $data['status'] = 6;
            updateOrderById($id,$data);
            header("location:index.php?c=cart&a=history");
        }else{
            echo "Không tìm thấy id đơn hàng.";
        }
    }


?>