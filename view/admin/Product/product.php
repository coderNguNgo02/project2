

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
                <a href="index.php?c=product&a=create" class="btn btn-success" style="margin-bottom: 20px;">Thêm sản phẩm</a>
                
                <table id="example2" class="table table-bordered table-hover">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>Tên sản phẩm</th>
                      <th>Ảnh sản phẩm</th>
                      <th>Giá sản phẩm</th>
                      <th>Nhãn hiệu</th>
                      <th>Danh mục</th>
                      <th>Số lượng</th>
                      <th>Hành động</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach ($data['product'] as $prd) { ?>
                        <?php if ($prd['is_delete'] !=0) {?> 
                      <tr>
                        <td style=""><?php echo $prd['id_prd']; ?></td>
                        <td style=""><?php echo $prd['name_prd']; ?></td>
                        <td style=""><img src='public/img/<?php echo $prd['img_prd']?>' width=100px; height=120px></td>
                        <td style=""><?php echo number_format($prd['price_prd']); ?> VND</td>
                        <td style=""><?php echo $prd['brand']; ?></td>
                        <td style=""><?php echo $prd['name_cate']; ?></td>
                        <td style=""><?php echo $prd['quanty']; ?></td>
                        <td class="form-group">  
                          <a href="index.php?c=product&a=edit&id=<?php echo $prd['id_prd']?>" class="btn btn-primary"><i class="glyphicon glyphicon-pencil"></i>
                          Sửa</a>
                          <a href="index.php?c=product&a=delete&id=<?php echo $prd['id_prd']?>&is_delete=0" class="btn btn-danger"><i class="glyphicon glyphicon-remove"></i>
                          Xóa</a>
                        </td>
                      </tr>
                    <?php }?>
                    <?php } ?>
                  </tbody>
                </table>
                <div class="panel-footer" style="margin-top:20px;">
                    <nav aria-label="Page navigation example">
                        <ul class="pagination">
                            <?php
                                if($data['page'] > 1 ) {
                                    $prev = $data['page'] - 1;
                                    echo '<li class="page-item"><a class="page-link" href="index.php?c=product&a=index&page='.$prev.'">&laquo;</a></li>';
                                }
                            ?>

                            <?php
                                for($i = 1; $i <= $data['totalPage']; $i++){
                                    $link = "index.php?c=product&a=index&page=$i";
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
  <!-- /.content-wrapper --
  