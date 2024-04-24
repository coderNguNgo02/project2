<?php 
    require_once PATH_SYSTEM.'/core/model/model.php';
    function getAllUser($page){
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
        $sqlAllProduct = "SELECT * FROM acc LIMIT $start, $limit";
        $queryAllProduct = mysqli_query($conn, $sqlAllProduct);
        if(mysqli_num_rows($queryAllProduct) > 0) {
            while($row = mysqli_fetch_assoc($queryAllProduct)) {
                $data['user'][] = $row;
            }
        }else{
            header("location: error.php");
        }
        $data['totalPage'] = $totalPage;
        return $data;
    }

    function getTotalRecord() {
        $conn = getConnect();
        $sqlProduct = "SELECT * FROM acc";
        $queryProduct = mysqli_query($conn, $sqlProduct);
        $totalRecords = mysqli_num_rows($queryProduct);
        closeConnect();
        return $totalRecords;
    }

    function getUserById($id){
        $data = getById('acc', $id, 'id_acc');
        return $data;
    }

    function storeUser($data) {
        //gọi hàm store trong model.php để truyền tên bảng và data.
        store('acc', $data);
    }

    function updateById($id, $data) {
        update('acc', 'id_acc', $id, $data);
    }

    function deleteById($id){
        deleteRecordById('acc', 'id_acc', $id);
    }

   
?>