

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Chi tiết đơn hàng</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Trang chủ</a></li>
              <li class="breadcrumb-item"><a href="index.php?c=order&a=index">Quản lý đơn hàng</a></li>
              <li class="breadcrumb-item active">Chi tiết đơn hàng</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Thông tin đơn hàng và khách hàng </h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                
                <table id="example2" class="table table-bordered table-hover">
                  <h1>Thông tin khách hàng</h1>
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>Tên khách hàng</th>
                      <th>Email khách hàng</th>
                      <th>Địa chỉ khách hàng</th>
                      <th>Số điện thoại khách hàng</th>
                      <th>Ngày đặt hàng</th>
                      <th>Trạng thái</th>
                      <th>Tổng giá tiền đơn hàng</th>
                    </tr>
                  </thead>
                  <tbody>
                            
                      <tr>
                        <td style=""><?php echo $data['order']['id_order']; ?></td>
                        <td style=""><?php echo $data['order']['receiver_name']; ?></td>
                        <td style=""><?php echo $data['order']['receiver_email']; ?></td>
                        <td style=""><?php echo $data['order']['receiver_add']; ?></td>
                        <td style=""><?php echo $data['order']['receiver_phone']; ?></td>
                        <td style=""><?php echo $data['order']['order_date']; ?></td>
                        <td>
                          <?php 
                          switch ($data['order']['status']) {
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
                        <td style=""><?php echo number_format($data['order']['total_price']); ?> VND</td>
                      </tr>
          
                  </tbody>
                </table>

                <br>
                <h1>Thông tin đơn hàng</h1>
                <table id="example2" class="table table-bordered table-hover">
                  <thead>
                    <tr>
                      <th>Tên sản phẩm</th>
                      <th>Giá sản phẩm</th>
                      <th>Ảnh sản phẩm</th>
                      <th>Số lượng mua</th>
                    </tr>
                  </thead>
                  <tbody style="text-align: center;">
                      <?php foreach($data['detail'] as $d)   {?>
                      <tr>
                        <td style=""><b><?php echo $d['name_prd']; ?></b></td>
                        <td style=""><b><?php echo number_format($d['price']) ?> VND</b></td>
                        <td style=""><img src='public/img/<?php echo $d['img_prd']?>' width=100px; height=120px></td>
                        <td style=""><b><?php echo $d['qty']; ?> sản phẩm</b></td>
                        
                        
                      </tr>
                      <?php } ?>
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  /.content-wrapper --
<!--   <script type="text/javascript">
    function check_del(){
      confirm("Bạn có chắc chắn muốn tài khoản? ");
    }
  </script>