<?php
	if ( ! defined('PATH_SYSTEM')) die ('Bad requested!');

    function load($controller, $action, $path) {
        // Chuyển đổi tên controller vì nó có định dạng là {Name}Controller.
        $controller = ucfirst(strtolower($controller)) . 'Controller';

        // chuyển đổi tên action vì nó có định dạng {name}Action.
        $action = strtolower($action) . 'Action';

        // Kiểm tra file controller có tồn tại hay không
        if (!file_exists($path . $controller . '.php')){ 
            die ('Controller không tồn tại');
        }
    
        require_once $path . $controller . '.php';

        // Kiểm tra function có tồn tại hay không
        if(!function_exists($action)) {
            die('Action không tồn tại');
        }
        $action();
    }
?>