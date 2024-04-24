<?php 
    require_once PATH_SYSTEM.'/core/model/model.php';
    function getNewPrd(){
        $conn = getConnect();
        $data = [];
        $sqlProduct = "SELECT * FROM  product ORDER BY id_prd DESC LIMIT 6";
        $queryProduct = mysqli_query($conn, $sqlProduct);
        if(mysqli_num_rows($queryProduct) > 0) {
            while($row = mysqli_fetch_assoc($queryProduct)) {
                $data[] = $row;
            }
        }
        closeConnect();
        return $data;
    }

    function getHotPrd(){
        $conn = getConnect();
        $data = [];
        $sqlProduct = "SELECT *,SUM(qty) FROM product INNER JOIN order_detail ON product.id_prd = order_detail.id_prd GROUP BY order_detail.id_prd LIMIT 6";
        $queryProduct = mysqli_query($conn, $sqlProduct);
        if(mysqli_num_rows($queryProduct) > 0) {
            while($row = mysqli_fetch_assoc($queryProduct)) {
                $data[] = $row;
            }
        }
        closeConnect();
        return $data;
    }
?>