<!-- Start slider -->
  <section id="aa-slider">
    <div class="aa-slider-area">
      <div id="sequence" class="seq">
        <div class="seq-screen">
          <ul class="seq-canvas">
            <!-- single slide item -->
            <li>
              <div class="seq-model">
                <img data-seq src="public/img/banner2.jpg" alt="Men slide img" />
              </div>
              <div class="seq-title">
               <span data-seq>Sản phẩm mới</span>                
                <h2 data-seq>Bộ sưu tập hè 2023</h2>                
                <a data-seq href="#" class="aa-shop-now-btn aa-secondary-btn">Xem ngay</a>
              </div>
            </li>
            <!-- single slide item -->
            <li>
              <div class="seq-model">
                <img data-seq src="public/img/banner3.jpg" alt="Wristwatch slide img" />
              </div>
              <div class="seq-title">
                <span data-seq>Các mẫu son đẹp</span>                
                <h2 data-seq>Bộ sưu tập hè 2023</h2>                
                <a data-seq href="index.php?c=product&a=category&id=1" class="aa-shop-now-btn aa-secondary-btn">Xem ngay</a>
              </div>
            </li>
            <!-- single slide item -->
                 
          </ul>
        </div>
        <!-- slider navigation btn -->
        <fieldset class="seq-nav" aria-controls="sequence" aria-label="Slider buttons">
          <a type="button" class="seq-prev" aria-label="Previous"><span class="fa fa-angle-left"></span></a>
          <a type="button" class="seq-next" aria-label="Next"><span class="fa fa-angle-right"></span></a>
        </fieldset>
      </div>
    </div>
  </section>
  <!-- / slider -->

  
  <section id="aa-latest-blog">
    <div class="aa-latest-blog-area">
      <?php if(isset($_data['keyword'])){?>
      <h2>Kết quả tìm kiếm của ' <?php echo $data['keyword'];?> '</h2>
      <?php }?>
      <h2>Kết quả tìm kiếm của ' <?php echo $data['keyword'];?> '</h2>
    </div>
  </section>

  <section id="aa-product-category">
    <div class="container">
      <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 ">
          <div class="aa-product-catg-content">
            <div class="aa-product-catg-head">
              <div class="aa-product-catg-head-left">
                
              <div class="aa-product-catg-head-right">
                <a id="grid-catg" href="#"><span class="fa fa-th"></span></a>
                <a id="list-catg" href="#"><span class="fa fa-list"></span></a>
              </div>
            </div>
            <div class="aa-product-catg-body">
              <ul class="aa-product-catg">
              <?php foreach ($data['prd'] as $key => $prd) { ?>
                <li>
                  <figure>
                    <a class="aa-product-img" href="index.php?c=product&a=detail&id=<?php echo $prd['id_prd']; ?>"><img width="270px" height="300px" src="public/img/<?php echo $prd['img_prd'];?>"></a>
                    <a class="aa-add-card-btn" href="index.php?c=cart&a=add&id=<?php echo $prd['id_prd']?>"><span class="fa fa-shopping-cart"></span>Thêm vào giỏ hàng</a>
                    <figcaption>
                      <h4 class="aa-product-title"><a><?php echo $prd['name_prd']; ?></a></h4>
                      <span class="aa-product-price"><?php echo $prd['price_prd']; ?> VND<span class="aa-product-price"></span>
                  </figure>                         
                  <!-- product badge -->
                </li>
              <?php } ?>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div> 
    <div class="aa-product-catg-pagination">
              <nav>
                <ul class="pagination">
                  <?php
                                if($data['page'] > 1 ) {
                                    $prev = $data['page'] - 1;
                                    echo '<li class="page-item"><a class="page-link" href="index.php?c=product&a=search&page='.$prev.'&kw='.$data['keyword'].'">&laquo;</a></li>';
                                }
                            ?>

                            <?php
                                for($i = 1; $i <= $data['totalPage']; $i++){
                                    $link = "index.php?c=product&a=search&page=$i&kw=".$data['keyword']."";
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
                                    echo '<li class="page-item"><a class="page-link" href="index.php?c=product&a=search&page='.$next.'">&raquo;</a></li>';
                                }
                            ?>
                </ul>
              </nav>
            </div>
  </section>
  