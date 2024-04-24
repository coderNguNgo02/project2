<?php
    session_start();
    if(! isset($_SESSION['user'])) {
        header("location:login.php");
    }
    /**
     * ĐỊNH NGHĨA LẠI VÀ THÊM MỘT SỐ ĐƯỜNG DẪN CƠ SỞ
     */
    define('PATH_ROOT', __DIR__); 
    define('PATH_SYSTEM', __DIR__.'/system');
    define('PATH_PUBLIC', __DIR__.'/public');
    define('PATH_CONTROLLER', __DIR__.'/controller');
    define('PATH_VIEW',__DIR__.'/view');
    define('PATH_MODEL', __DIR__.'/model');
    define('PATH_APPLICATION', PATH_CONTROLLER. '/admin/'); //
    define('PATH_SITE', PATH_CONTROLLER.'/site/');
    // Lấy thông số cấu hình
    require (PATH_SYSTEM . '/config/config.php');

    // Danh sách tham số gồm hai phần
    //  - controller: controller hiện tại
    //  - action: action hiện tại
    $segments = array(
        'controller'    => '',
        'action'        => array()
    );

    // Nếu không truyền controller thì lấy controller mặc định
    $segments['controller'] = empty($_GET['c']) ? DEFAULT_CONTROLLER : $_GET['c'];
    // Nếu không truyền action thì lấy action mặc định 
    $segments['action'] = empty($_GET['a']) ? DEFAULT_ACTION : $_GET['a'];
    
    // Require controller
    require_once PATH_SYSTEM . '/core/loader/load.php';
    if($_SESSION['user']['level'] == 1){
        load($segments['controller'], $segments['action'], PATH_APPLICATION);
    }else{
        load($segments['controller'], $segments['action'], PATH_SITE);
    }
    
?>