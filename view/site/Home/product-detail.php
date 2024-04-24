

  <!-- product category -->
  <section id="aa-product-details">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="aa-product-details-area">
            <div class="aa-product-details-content">
              <div class="row">
                <!-- Modal view slider -->
                <div class="col-md-5 col-sm-5 col-xs-12">                              
                  <div class="aa-product-view-slider">                                
                    <div id="demo-1" class="simpleLens-gallery-container">
                      <div class="simpleLens-container">
                        <div class="simpleLens-big-image-container">
                          <?php echo "<img width='330x' height='430px' src='public/img/".$data['img_prd']."'>"?>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- Modal view content -->
                <div class="col-md-7 col-sm-7 col-xs-12">
                  <div class="aa-product-view-content">
                    <h1><?php echo $data['name_prd']; ?></h1>
                    <div class="aa-price-block">
                      <span class="aa-product-view-price">Giá: <?php echo $data['price_prd']; ?> VND</span>

                      <p>Nhãn hiệu: <span><?php echo $data['brand'];?></span></p>
                      
                      <p class="aa-product-avilability">Tình trạng: <?php if($data['quanty'] > 0){echo "<span>Còn hàng</span>";}else{
                          echo "<span>hết hàng</span>";
                      }?></p>
                    </div>
                    
                    <p>Số lượng: <span><?php echo $data['quanty'];?></span></p>



                    <div class="aa-prod-view-bottom">
                      <a class="aa-add-to-cart-btn" href="index.php?c=cart&a=add&id=<?php echo $data['id_prd'];?>">Thêm vào giỏ hàng</a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="aa-product-details-bottom">
              <ul class="nav nav-tabs" id="myTab2">
                <li><a href="#description" data-toggle="tab">Description</a></li>          
              </ul>

              <!-- Tab panes -->
              <div class="tab-content">
                <div class="tab-pane fade in active" id="description">
                  <?php echo "<p>".$data['descript']."</p>"?>
                </div>
                <div class="tab-pane fade " id="review">
                 <div class="aa-product-review-area">
                 </div>
                </div>            
              </div>
            </div>
           
            