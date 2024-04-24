<section id="cart-view">
   <div class="container">
     <div class="row">
       <div class="col-md-12">
         <div class="cart-view-area">
           <div class="cart-view-table aa-wishlist-table">
               <div class="table-responsive">
                  <table class="table">
                    <thead>
                      <tr>
                        <th>Tên người đặt</th>
                        <th>Số điện thoại</th>
                        <th>Trạng thái</th>
                        <th>Tổng tiền</th>
                        <th>Địa chỉ</th>
                        <th>Hành động</th>
                      </tr>
                    </thead>
                    <tbody>
                       <?php 
                        foreach($data['order'] as $od){
                       ?>
                          <tr>
                            <td><?php echo $od['receiver_name']; ?></td>
                            <td><?php echo $od['receiver_phone']; ?></td>
                            <td>
                              <?php 
                                  switch ($od['status']) {
                                    case 1:
                                      echo '<span class="label label-success">Chưa xử lý</span>';
                                      break;
                                    case 2:
                                      echo '<span class="label label-success">Đang xử lý</span>';
                                      break;
                                    case 3:
                                      echo '<span class="label label-warning">Đang giao hàng</span>';
                                      break;
                                    case 4:
                                      echo '<span class="label label-success">Đã giao hàng</span>';
                                      break;
                                    case 5:
                                      echo '<span class="label label-primary">Đã thanh toán</span>';
                                      break;
                                    case 6:
                                      echo '<span class="label label-danger">Đã hủy</span>';
                                      break;
                                  }
                              ?>
                            </td>
                            <td><?php echo $od['total_price']; ?> VND</td>
                            <td><?php echo $od['receiver_add']; ?></td>
                            <td>
                              <?php if($od['status'] != 5 && $od['status'] != 6) { ?>
                              <a href="index.php?c=cart&a=destroy&id=<?php echo $od['id_order'] ?>" class="btn btn-danger">Hủy</a>
                              <?php }?>

                              <a href="index.php?c=cart&a=detail&id=<?php echo $od['id_order'] ?>" class="btn btn-primary">Chi tiết</a>
                            </td> 
                          </tr>
                        <?php } ?>
                    </tbody>
                  </table>
                </div>           
           </div>
         </div>
       </div>
     </div>
   </div>
 </section>
 