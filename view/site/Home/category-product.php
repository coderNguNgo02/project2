 <!-- catg header banner section -->
  <section id="aa-catg-head-banner">
   <img h src="public/img/banner2.jpg" alt="fashion img">
   <div class="aa-catg-head-banner-area">
     <div class="container">
      <div class="aa-catg-head-banner-content">
        <h2><?php echo $data['name_cate']?></h2>
        <ol class="breadcrumb">
          <li><a href="index.php?c=index&a=index">Trang chủ</a></li>         
          <li class="active">Danh mục (<?php echo $data['name_cate']?>)</li>
        </ol>
      </div>
     </div>
   </div>
  </section>
  <!-- / catg header banner section -->

  <!-- product category -->
  <section id="aa-product-category">
    <div class="container">
      <div class="row">
        <div class="col-lg-9 col-md-9 col-sm-8 col-md-push-3">
          <div class="aa-product-catg-content">
            <div class="aa-product-catg-head">
              <div class="aa-product-catg-head-left">
                
              </div>
              <div class="aa-product-catg-head-right">
                <a id="grid-catg" href="#"><span class="fa fa-th"></span></a>
                <a id="list-catg" href="#"><span class="fa fa-list"></span></a>
              </div>
            </div>
            <div class="aa-product-catg-body">

              <ul class="aa-product-catg">
                <!-- start single product item -->
                <?php
                foreach($data['product'] as $key => $prd){
                  if($prd['is_delete']!=0){
                  echo'<li>
                    <figure>
                      <a class="aa-product-img" href="index.php?c=product&a=detail&id='.$prd['id_prd'].'"><img width="255px" height="255px" src="public/img/'.$prd["img_prd"].'"></a>
                      <a class="aa-add-card-btn"href="index.php?c=cart&a=add&id='.$prd['id_prd'].'"><span class="fa fa-shopping-cart"></span>Thêm vào giỏ hàng</a>
                      <figcaption>
                        <h4 class="aa-product-title"><a href="#">'.$prd['name_prd'].'</a></h4>
                        <span class="aa-product-price">'.$prd['price_prd'].' VND</span>
                      </figcaption>
                    </figure>                         
                  </li>';
                  };
                };
                ?>                                          
              </ul>


              <!-- quick view modal -->                  
            
            </div>
            <div class="aa-product-catg-pagination">
              <nav>
                <ul class="pagination">
                  <?php
                    if($data['page'] > 1 ) {
                      $prev = $data['page'] - 1;
                      echo '<li class="page-item"><a class="page-link" href="index.php?c=product&a=index&page='.$prev.'">&laquo;</a></li>';
                    }
                  ?>

                  <?php
                    for($i = 1; $i <= $data['totalPage']; $i++){
                      $link = "index.php?c=product&a=category&id=1&page=$i";
                      if($i == $data['page']){
                        echo '<li class="page-item active" ><a class="page-link" href="">'.$i.'</a></li>';
                      }else{
                        echo '<li class="page-item"><a class="page-link" href="'.$link.'">'.$i.'</a></li>';
                      }
                      }
                  ?>
                            

                  <?php
                      if($data['page'] < $data['totalPage'] ) {
                        $next = $data['page'] + 1;
                        echo '<li class="page-item"><a class="page-link" href="index.php?c=product&a=index&page='.$next.'">&raquo;</a></li>';
                      }
                  ?>
                </ul>
              </nav>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-4 col-md-pull-9">
          <aside class="aa-sidebar">
            <!-- single sidebar -->
            <div class="aa-sidebar-widget">
              <h3>Danh mục</h3>
              <ul class="aa-catg-nav">
                <?php include_once PATH_SYSTEM.'/core/helper/lib.php'; menuCategory();?>
              </ul>
            </div>
            <!-- single sidebar -->
          </aside>
        </div>
       
      </div>
    </div>
  </section>
  <!-- / product category -->