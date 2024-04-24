<?php if(empty($data)) { ?>
    <section id="cart-view">
        <div class="container">
         <div class="row">
           <div class="col-md-12">
             <div class="cart-view-area">
               <div class="cart-view-table">
                    <h1 style="text-align:center;"> Không có sản phẩm trong giỏ hàng !</h1>
               </div> 
             </div>
           </div> 
         </div> 
        </div>         
    </section>
<?php } else { ?> 
   <section id="cart-view">
   <div class="container">
     <div class="row">
       <div class="col-md-12">
         <div class="cart-view-area">
           <div class="cart-view-table">
             <form action="index.php?c=cart&a=update" method="post">
               <div class="table-responsive">
                <h1 style="text-align: center;">Giỏ hàng</h1>
                  <table class="table">
                    <thead>
                      <tr>
                        <th></th>
                        <th>Ảnh sản phẩm</th>
                        <th>Tên</th>
                        <th>Giá</th>
                        <th>Số lượng</th>
                      </tr>
                    </thead>
                    <tbody>
                        <?php 
                            $price = 0;
                            $totalPrice = 0;
                            foreach($data as $key => $prd){
                                $qty = $_SESSION['cart'][$prd['id_prd']]['qty'];
                                $price = $_SESSION['cart'][$prd['id_prd']]['price'];
                                $prdTotal = $qty * $price;
                                $totalPrice = $totalPrice + $prdTotal;
                        ?>
                      <tr>

                        <td><a class="remove" href="<?php echo "index.php?c=cart&a=delete&id=".$prd['id_prd'].""; ?>"><fa class="fa fa-close"></fa></a></td>
                        <td><a href="#"><img src="public/img/<?php echo $prd['img_prd']; ?>"></a></td>
                        <td><a class="aa-cart-title" href="#"><?php echo $prd['name_prd'] ?></a></td>
                        <td><?php echo number_format($prd['price_prd']) ?> VND</td>
                        <td><input class="aa-cart-quantity" name="qty[<?php echo $prd['id_prd'] ?>]" type="number" value="<?php echo $qty; ?>" min='1'></td>

                      </tr>
                        <?php } ?>

                      <tr>
                        <td colspan="6" class="aa-cart-view-bottom">
                          <b style="font-size:30px">Tổng giá tiền: <span style="color: red;"> <?php echo number_format($totalPrice) ?> VND</span></b>
                          <input class="aa-cart-view-btn" type="submit" value="Cật nhập giỏ hàng">
                        </td>
                      </tr>
                      </tbody>
                  </table>
                </div>
             </form>
             <!-- Cart Total view -->
           </div>
         </div>
       </div>
     </div>
   </div>
 </section>

 <section id="checkout">
   <div class="container">
     <div class="row">
       <div class="col-md-12">
        <div class="checkout-area">
          <form action="index.php?c=cart&a=store" method="post" >
            <div class="row">
              <div class="col-md-12">
                <div class="checkout-left">
                  <div class="panel-group" id="accordion">
                    <!-- Billing Details -->
                    <div class="panel panel-default aa-checkout-billaddress">
                      <div class="panel-heading">
                        <h4 class="panel-title">
                          <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree">
                            Xác nhận đơn hàng
                          </a>
                        </h4>
                      </div>
                      <div id="collapseThree" class="panel-collapse collapse">
                        <div class="panel-body">
                          <div class="row">
                            <div class="col-md-8">
                              <div class="aa-checkout-single-bill">
                                <input type="text" placeholder="Họ và tên*" name="name_cart" required>
                              </div>                             
                            </div>
                          </div> 
                          <div class="row">
                            <div class="col-md-4">
                              <div class="aa-checkout-single-bill">
                                <input type="email" placeholder="Email*" name="email_cart" required>
                              </div>                             
                            </div>
                            <div class="col-md-4">
                              <div class="aa-checkout-single-bill">
                                <input type="tel" placeholder="Số điện thoại*" name="phone_cart" required>
                              </div>
                            </div>
                          </div> 
                          <div class="row">
                            <div class="col-md-8">
                              <div class="aa-checkout-single-bill">
                                <input type="text" placeholder="Địa chỉ*" name="add_cart" required>
                              </div>                             
                            </div>                            
                          </div>
                          <input type="hidden" name ="id_acc" value="<?php echo $_SESSION['user']['id']; ?>">   
                          <input type="hidden" name="total_price" value="<?php echo $totalPrice; ?>">
                          <button class="btn btn-success" name="submit_cart" type="submit">Đặt hàng</button>
                          </div>                                    
                        </div>
                      </div>
                    </div>
                </div>
              </div>
            </div>
          </form>
         </div>
       </div>
     </div>
   </div>
 </section>
<?php }?>
 <!-- / Cart view section -->
  <script type="text/javascript">
    function check_del(){
      confirm("Bạn có chắc chắn muốn tài khoản? ");
    }
  </script>
