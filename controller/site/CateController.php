<?php 
    if(! defined('PATH_SYSTEM')) die("Bad request!");
    function indexAction() {
        require_once PATH_SYSTEM.'/core/view/view.php';
        $data = [];
        loadView('master','home/cate', $data);
    }
?>