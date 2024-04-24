<section id="cart-view">
   <div class="container">
     <div class="row">
       <div class="col-md-12">
         <div class="cart-view-area">
           <div class="cart-view-table aa-wishlist-table">
               <div class="table-responsive">
                <h1>Chi tiết đơn hàng mã <?php echo $data['order']['id_order'] ?></h1>
                  <table class="table">
                    <thead>
                      <tr>
                        <th>STT</th>
                        <th>Tên sản phẩm</th>
                        <th>Giá</th>
                        <th>Ảnh</th>
                        <th>Số lượng mua</th>
                        <th>Danh mục</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php 
                       $i = 1;
                       foreach ($data['detail'] as $key => $detail) {
                      ?>
                      <tr>
                        <td><?php echo $i; ?></td>
                        <td><?php echo $detail['name_prd']; ?></td>
                        <td><?php echo $detail['price']; ?> VND</td>
                        <td style="text-align: center" id="product-img"><img width="50" height="75" src="<?php echo 'public/img/'.$detail['img_prd'];?>" /></td>
                        <td><?php echo $detail['qty']; ?></td>
                        <td><?php echo $detail['name_cate']; ?></td>
                      </tr>
                      <?php
                        $i++;
                      }
                      ?>
                    </tbody>
                  </table>
                </div>           
           </div>
         </div>
       </div>
     </div>
   </div>
 </section>
 