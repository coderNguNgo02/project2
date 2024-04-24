

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Quản lý sản phẩm</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Trang chủ</a></li>
              <li class="breadcrumb-item active">Danh sách thành viên</li>
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
                <h3 class="card-title">Danh sách sản phẩm</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                
                <table id="example2" class="table table-bordered table-hover">
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
                      <th>Hành động</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach ($data['order'] as $od) { ?>
                            
                      <tr>
                        <td style=""><?php echo $od['id_order']; ?></td>
                        <td style=""><?php echo $od['receiver_name']; ?></td>
                        <td style=""><?php echo $od['receiver_email']; ?></td>
                        <td style=""><?php echo $od['receiver_add']; ?></td>
                        <td style=""><?php echo $od['receiver_phone']; ?></td>
                        <td style=""><?php echo $od['order_date']; ?></td>
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
                        <td style=""><?php echo number_format($od['total_price']) ?> VND</td>
                        <td class="form-group">  
                          <a href="index.php?c=order&a=detail&id=<?php echo $od['id_order']?>" class="btn btn-success"><i class="glyphicon glyphicon-pencil"></i>
                          Chi tiết</a>
                          <?php if($od['status'] != 5 && $od['status'] != 6) { ?>
                          <a href="index.php?c=order&a=edit&id=<?php echo $od['id_order']?>" class="btn btn-primary"><i class="glyphicon glyphicon-pencil"></i>
                          Sửa</a>
                          <?php } ?>
                          <?php if($od['status'] != 5 && $od['status'] != 6) { ?>
                          <a onclick="return check_del()" href="index.php?c=order&a=delete&id=<?php echo $od['id_order']?>" class="btn btn-danger"><i class="glyphicon glyphicon-remove"></i>
                          Hủy</a>
                          <?php } ?>
                        </td>
                      </tr>
                    <?php } ?>
                  </tbody>
                </table>
                <div class="panel-footer" style="margin-top:20px;">
                    <nav aria-label="Page navigation example">
                        <ul class="pagination">
                            <?php
                                if($data['page'] > 1 ) {
                                    $prev = $data['page'] - 1;
                                    echo '<li class="page-item"><a class="page-link" href="index.php?c=order&a=index&page='.$prev.'">&laquo;</a></li>';
                                }
                            ?>

                            <?php
                                for($i = 1; $i <= $data['totalPage']; $i++){
                                    $link = "index.php?c=order&a=index&page=$i";
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
                                    echo '<li class="page-item"><a class="page-link" href="index.php?c=order&a=index&page='.$next.'">&raquo;</a></li>';
                                }
                            ?>
                        </ul>
                    </nav>
                </div>
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