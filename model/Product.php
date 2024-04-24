<?php 
    require_once PATH_SYSTEM.'/config/db.php';
    require_once PATH_SYSTEM.'/core/model/model.php';

    /**
     * Trả về danh sách sản phẩm đã phân trang
     */
    function getAllProducts($page) {
        $data = [];
        
        $limit = 5;
        $current_page = $page; 

        $totalRecords = getTotalRecord(); 
        
        $totalPage = ceil($totalRecords/$limit);
        
        if($current_page < 1) {
            $current_page = 1;
        }

        if($current_page > $totalPage && $totalRecords > 0) {
            $current_page = $totalPage;
        }

        $start = ($current_page - 1) * $limit;

        $conn = getConnect();
        $sqlAllProduct = "SELECT p.*, c.name_cate FROM product p INNER JOIN category c ON p.cate_id = c.cate_id ORDER BY id_prd DESC LIMIT $start, $limit";
        $queryAllProduct = mysqli_query($conn, $sqlAllProduct);
        if(mysqli_num_rows($queryAllProduct) > 0) {
            while($row = mysqli_fetch_assoc($queryAllProduct)) {
                $data['product'][] = $row;
            }
        }else{
            $data['product'][] = [];
        }
        $data['totalPage'] = $totalPage;
        return $data;
    }
    /**
     * Trả về tổng số bản ghi trong bảng Product
    */
    function getAllProductSite($page) {
        $data = [];
        
        $limit = 3;
        $current_page = $page;
        $totalRecords = getTotalRecord();
        $totalPage = ceil($totalRecords/$limit);
        if($current_page < 1) {
            $current_page = 1;
        }

        if($current_page > $totalPage && $totalRecords > 0) {
            $current_page = $totalPage;
        }
        $start = ($current_page - 1) * $limit;
        $conn = getConnect();
        $sqlAllProduct = "SELECT p.*, c.name_cate FROM product p INNER JOIN category c ON p.cate_id = c.cate_id ORDER BY id_prd DESC LIMIT $start, $limit";
        $queryAllProduct = mysqli_query($conn, $sqlAllProduct);
        if(mysqli_num_rows($queryAllProduct) > 0) {
            while($row = mysqli_fetch_assoc($queryAllProduct)) {
                $data['product'][] = $row;
            }
        }
        $data['totalPage'] = $totalPage;
        return $data;
    }



    function getTotalRecord() {
        $conn = getConnect();
        $sqlProduct = "SELECT * FROM product";
        $queryProduct = mysqli_query($conn, $sqlProduct);
        $totalRecords = mysqli_num_rows($queryProduct);
        closeConnect();
        return $totalRecords;
    }
    /**
     * Trả về tổng số bản ghi trong bảng Product
    */
    function getTotalRecordByCategory($id_cate) {
        $conn = getConnect();
        $sqlProduct = "SELECT * FROM product WHERE cate_id = $id_cate";
        $queryProduct = mysqli_query($conn, $sqlProduct);
        $totalRecords = mysqli_num_rows($queryProduct);
        closeConnect();
        return $totalRecords;
    }

    /**
     * Trả về tổng số bản ghi trong bảng Product
    */
    function getTotalRecordByKeyword($keyword) {
        $conn = getConnect();
        $sqlProduct = "SELECT * FROM product WHERE name_prd LIKE '$keyword'";
        $queryProduct = mysqli_query($conn, $sqlProduct);
        $totalRecords = mysqli_num_rows($queryProduct);
        closeConnect();
        return $totalRecords;
    }

    function getProductById($id){
        $data = [];
        $data = getById('product', $id, 'id_prd');
        return $data;
    }

    
    function storeProduct($data) {
        //gọi hàm store trong model.php để truyền tên bảng và data.
        store('product', $data);
    }

    function updateProductById($id, $data) {
        update('product', 'id_prd', $id, $data);
    }

    function deleteProductById($id,$data){
        destroyRecordById('product', 'id_prd', $id,$data);
    }

    function getFeaturedProduct() {
        $conn = getConnect();
        $data = [];
        $sqlProduct = "SELECT * FROM product WHERE prd_featured=1
                        ORDER BY prd_id LIMIT 6";
        $queryProduct = mysqli_query($conn, $sqlProduct);
        if(mysqli_num_rows($queryProduct) > 0) {
            while($row = mysqli_fetch_assoc($queryProduct)) {
                $data[] = $row;
            }
        }
        closeConnect();
        return $data;
    }

    function getLastestProduct() {
        $conn = getConnect();
        $data = [];
        $sqlProduct = "SELECT * FROM product ORDER BY prd_id LIMIT 6";
        $queryProduct = mysqli_query($conn, $sqlProduct);
        if(mysqli_num_rows($queryProduct) > 0) {
            while($row = mysqli_fetch_assoc($queryProduct)) {
                $data[] = $row;
            }
        }
        closeConnect();
        return $data;
    }

    function getAllProductInList($ids) {
        $conn = getConnect();
        $data = [];
        $sqlProduct = "SELECT * FROM product WHERE id_prd IN $ids";
        $queryProduct = mysqli_query($conn, $sqlProduct);
        if(mysqli_num_rows($queryProduct) > 0) {
            while($row = mysqli_fetch_assoc($queryProduct)) {
                $data[] = $row;
            }
        }
        closeConnect();
        return $data;
    }


    /**
     * Trả về danh sách sản phẩm đã phân trang
     */
    function getAllProductsByCategory($page, $catId) {
        require_once PATH_MODEL.'/Category.php';
        $data = [];
        $limit = 6;
        $current_page = $page;
        $totalRecords = getTotalRecordByCategory($catId);
        $totalPage = ceil($totalRecords/$limit);
        if($current_page < 1) {
            $current_page = 1;
        }

        if($current_page > $totalPage && $totalRecords > 0) {
            $current_page = $totalPage;
        }
        $start = ($current_page - 1) * $limit;
        $conn = getConnect();
        $sqlAllProduct = "SELECT p.*, c.name_cate FROM product p INNER JOIN category c ON p.cate_id = c.cate_id WHERE p.cate_id = $catId ORDER BY id_prd DESC LIMIT $start, $limit";
        $queryAllProduct = mysqli_query($conn, $sqlAllProduct);
        if(mysqli_num_rows($queryAllProduct) > 0) {
            while($row = mysqli_fetch_assoc($queryAllProduct)) {
                $data['product'][] = $row;
            }
        }
        $data['name_cate'] = getCategoryById($catId)['name_cate'];
        $data['totalPage'] = $totalPage;
        $data['numberofProducts'] = $totalRecords;
        return $data;
    }

    /**
     * Trả về danh sách sản phẩm đã phân trang
     */
    function searchProductByName($page, $keyword) {
        require_once PATH_MODEL.'/Category.php';
        $data = [];
        $limit = 6;
        $current_page = $page;
        $totalRecords = getTotalRecordByKeyword($keyword);
        $totalPage = ceil($totalRecords/$limit);
        if($current_page < 1) {
            $current_page = 1;
        }

        if($current_page > $totalPage && $totalRecords > 0) {
            $current_page = $totalPage;
        }
        $start = ($current_page - 1) * $limit;
        $conn = getConnect();
        $sqlAllProduct = "SELECT p.*, c.name_cate FROM product p INNER JOIN category c ON p.cate_id = c.cate_id WHERE name_prd LIKE '$keyword' ORDER BY id_prd DESC LIMIT $start, $limit";
        $queryAllProduct = mysqli_query($conn, $sqlAllProduct);
        if(mysqli_num_rows($queryAllProduct) > 0) {
            while($row = mysqli_fetch_assoc($queryAllProduct)) {
                $data['prd'][] = $row;
            }
        }
        $data['totalPage'] = $totalPage;
        return $data;
    }
?>