    <?php 
    require_once PATH_SYSTEM.'/config/db.php';
    require_once PATH_SYSTEM.'/core/model/model.php';

    /**
     * Trả về danh sách sản phẩm đã phân trang
     */
    function getAllOrder($page) {
        $data = [];
        
        $limit = 5;
        $current_page = $page;
        $totalRecords = getTotalRecord();
        $totalPage = ceil($totalRecords/$limit);
        if($current_page < 1) {
            $current_page = 1;
        }

        if($current_page > $totalPage) {
            $current_page = $totalPage;
        }
        $start = ($current_page - 1) * $limit;
        $conn = getConnect();
        $sqlAllProduct = "SELECT * FROM order1 ORDER BY id_order DESC LIMIT $start, $limit";
        $queryAllProduct = mysqli_query($conn, $sqlAllProduct);
        if(mysqli_num_rows($queryAllProduct) > 0) {
            while($row = mysqli_fetch_assoc($queryAllProduct)) {
                $data['order'][] = $row;
            }
        }else{
            $data['order'][] = [];
        }
        $data['totalPage'] = $totalPage;
        return $data;
    }
    /**
     * Trả về tổng số bản ghi trong bảng Product
    */
    function getTotalRecord() {
        $conn = getConnect();
        $sqlProduct = "SELECT * FROM order1";
        $queryProduct = mysqli_query($conn, $sqlProduct);
        $totalRecords = mysqli_num_rows($queryProduct);
        closeConnect();
        return $totalRecords;
    }

    /**
     * Lấy chi tiết của một đơn hàng
     */

     function getOrderDetailById($id) {
        $data = [];
        //Lấy thông tin đơn hàng theo Id
        $data['order'] = getById('order1', $id, 'id_order');
        //Lấy chi tiết đơn hàng (các sản phẩm được mua bởi đơn hàng có id là $id) từ bảng orderdetail
        //Chi tiết đơn hàng cần thông tin từ bảng sản phẩm, và bảng danh mục nên phải join với các bảng product, category
        $conn = getConnect();
        $sqlDetail = "SELECT * FROM order_detail od 
                        INNER JOIN product p ON od.id_prd = p.id_prd
                        INNER JOIN category c ON c.cate_id
                         = p.cate_id
                        WHERE od.id_order = $id";
                       
        $sqlQuery = mysqli_query($conn, $sqlDetail);
        if(mysqli_num_rows($sqlQuery) > 0) {
            while($row = mysqli_fetch_assoc($sqlQuery)) {
                $data['detail'][] = $row;
            }
        }
        return $data;
     }

     /***
      * Lấy chi tiết đơn hàng theo id
      */

      function getOrderById($id) {
        $data = [];
        //Lấy thông tin đơn hàng theo Id
        $data['order'] = getById('order1', $id, 'id_order');
        return $data;
      }

      /**
       * Thêm thông tin vào bảng order
       */

    function storeOrder($data) {
        //gọi hàm store trong model.php để truyền tên bảng và data.
        $insertedID = store('order1', $data);
        if(isset($_SESSION['cart'])) {
            foreach ($_SESSION['cart'] as $prd_id => $item) {
                $data_item = [
                    'id_order' => $insertedID,
                    'id_prd' => $prd_id,
                    'price' => $item['price'],
                    'qty' => $item['qty']
                ];
                store('order_detail', $data_item);
            }
        }
    }


    /**
     * Trả về danh sách sản phẩm đã phân trang
     */
    function getAllOrdersByUserId($page, $userId) {
        $data = [];
        
        $limit = 5;
        $current_page = $page;
        $totalRecords = getTotalRecord();
        $totalPage = ceil($totalRecords/$limit);
        if($current_page < 1) {
            $current_page = 1;
        }

        if($current_page > $totalPage) {
            $current_page = $totalPage;
        }
        $start = ($current_page - 1) * $limit;
        $conn = getConnect();
        $sqlAllProduct = "SELECT * FROM order1 WHERE id_acc = $userId ORDER BY id_order DESC LIMIT $start, $limit";
        $queryAllProduct = mysqli_query($conn, $sqlAllProduct);
        if(mysqli_num_rows($queryAllProduct) > 0) {
            while($row = mysqli_fetch_assoc($queryAllProduct)) {
                $data['order'][] = $row;
            }
        }else{
            header("location: error.php");
        }
        $data['totalPage'] = $totalPage;
        return $data;
    }

    /**
     * Trả về thống kê doanh thu theo tháng trong năm
    */
    function getRevenue($year) {
        $conn = getConnect();
        $data = [];
        $sqlRevenue = "SELECT SUM(total_price) as 'total', month(order_date) as 'monthRevenue' FROM `order1` WHERE year(order_date)= '$year' AND status = 5 GROUP BY month(order_date);";
        $queryRevenue = mysqli_query($conn, $sqlRevenue);
        if(mysqli_num_rows($queryRevenue) > 0) {
            while($row = mysqli_fetch_assoc($queryRevenue)) {
                $data[] = $row;
            }
        }else{
            header("location: error.php");
        }
        return $data;
        closeConnect();
        return $data;
    }

    function updateOrderById($id, $data) {
        update('order1', 'id_order', $id, $data);
    }

    function getRevenueDetail($year,$month){
        $conn = getConnect();
        $data = [];
        $sqlRevenue = "SELECT * FROM product
        INNER JOIN order_detail
        ON product.id_prd = order_detail.id_prd
        INNER JOIN order1
        ON order_detail.id_order = order1.id_order
        WHERE month(order_date) = '$month'
        AND year(order_date) = '$year'";
        $queryRevenue = mysqli_query($conn, $sqlRevenue);
        if(mysqli_num_rows($queryRevenue) > 0) {
            while($row = mysqli_fetch_assoc($queryRevenue)) {
                $data[] = $row;
            }
        }else{
            header("location: error.php");
        }
        return $data;
        closeConnect();
        return $data;
    }

?>