<?php
    require_once PATH_SYSTEM.'/config/db.php';
    function getAll($table) {
        $data = [];
        $conn = getConnect();
        $sql = "SELECT * FROM $table";
        $query = mysqli_query($conn, $sql);
        if(mysqli_num_rows($query) > 0) {
            while($row = mysqli_fetch_assoc($query)) {
                $data[] = $row;
            }
        }
        closeConnect();
        return $data;
    }

    function getById($table, $id, $column) {
        $conn = getConnect();
        $sql = "SELECT * FROM $table WHERE `$column` = $id";
        $query = mysqli_query($conn, $sql);
        $row = [];
        if(mysqli_num_rows($query) > 0) {
            $row = mysqli_fetch_assoc($query);
        }
        return $row;
    }
    /***
     * function: store
     * desc: Lưu thông tin vào csdl
     * @param: $table, $data
     */
    function store($table, $data) {
        $columns = "$table(";
        $values = "(";
        foreach ($data as $column => $value) {
            $columns .= "$column,";
            $values .= "'$value',";
        }

        $columns = rtrim($columns, ','); 
        $columns .= ")";
        $values = rtrim($values, ','); 
        $values .= ")";
        $sqlInsert = "INSERT INTO $columns VALUES $values";
        die($sqlInsert);
        $conn = getConnect();
        mysqli_query($conn, $sqlInsert);
        return mysqli_insert_id($conn);
    }

    function deleteRecordById($table, $cond, $id) {
        $conn = getConnect();
        $sqlDelete = "DELETE FROM $table WHERE $cond = '$id'";
        mysqli_query($conn, $sqlDelete);
        closeConnect();
    }

    function destroyRecordById($table, $cond, $id,$data) {
        $conn = getConnect();
        $sqlDelete = "UPDATE $table  SET is_delete = '$data' WHERE $cond = '$id'";
        mysqli_query($conn, $sqlDelete);
        closeConnect();
    }
    /*
    * $table : tên bảng
    * $cond : tên cột điều kiện để update
    * $id: giá trị của cột điều kiện để update
    * $data: mảng kết hợp có key là tên cột, và value là giá trị của cột
    */
    function update($table, $cond, $id, $data) {
        //$data được tổ chức dưới dạng: Key => column, value => value
        $conn = getConnect();
        $str = " ";
        foreach ($data as $key => $value) {
            $str .= "$key = '$value',"; //user_mail = $user_mail
        }
        $str = rtrim($str, ",");
        $sqlUpdate = "UPDATE $table SET $str WHERE $cond = $id";
        $queryUpdate = mysqli_query($conn, $sqlUpdate);
        closeConnect();
    }

?>