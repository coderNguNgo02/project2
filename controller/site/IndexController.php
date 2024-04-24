<?php 
    if(! defined('PATH_SYSTEM')) die("Bad request!");
    function indexAction() {
        require_once PATH_MODEL.'/Home.php';
        require_once PATH_SYSTEM.'/core/view/view.php';
        $data = [];
        $data['new'] = getNewPrd();
        $data['hot'] = getHotPrd();
        loadView('master','home/home', $data);
    }
?>