<?php 
	function menuCategory(){
		require_once PATH_MODEL.'/Category.php';
		$menu = getAllCategory();
		foreach($menu as $key => $category){
			if($category['is_delete'] != 0){
				echo '              
	                  <li><a href="index.php?c=product&a=category&id='.$category['cate_id'].'">'.$category['name_cate'].'</a></li>
	                ';
            }
		}
	}
?>
