<?php 
    if($_SESSION['user']['level'] != 1) die('Bạn không có quyền truy cập.');

    function revenueAction() {
        require_once PATH_MODEL.'/Order.php';
        require_once PATH_SYSTEM.'/core/view/view.php';
        $data = [];
        $year = isset($_GET['year']) ? $_GET['year'] : date('Y');
        $data['records'] = getRevenue($year);
        $data['year'] = $year;
        loadView('master','static/revenue', $data);
    }

    function detailAction(){
        require_once PATH_MODEL.'/Order.php';
        require_once PATH_SYSTEM.'/core/view/view.php';
        $data = [];
        $year = $_GET['year'] ? $_GET['year'] : date('Y');
        $month = $_GET['month'] ? $_GET['month'] : date('M');
       
        $data = getRevenueDetail($year,$month);
        loadView('master','static/detail_revenue', $data);
    }
?>