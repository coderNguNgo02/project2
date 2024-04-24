<?php 
    require_once PATH_SYSTEM.'/config/db.php';
    require_once PATH_SYSTEM.'/core/model/model.php';

    function getAllCategory() {
        $data = [];
        $data = getAll('category');
        return $data;
    }

    function getCategoryById($id) {
        $data = [];
        $data = getById('category', $id, 'cate_id');
        return $data;
    }

     function storeCategory($data) {
        //gọi hàm store trong model.php để truyền tên bảng và data.
        store('category', $data);
    }

    function updateById($id, $data) {
        update('category', 'cate_id', $id, $data);
    }

    function deleteById($id,$data){
        destroyRecordById('category', 'cate_id', $id,$data);
    }
?>                            