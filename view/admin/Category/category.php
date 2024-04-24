

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Quản lý danh mục</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Trang chủ</a></li>
              <li class="breadcrumb-item active">Danh sách danh mục</li>
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
                <h3 class="card-title">Danh sách danh mục</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <a href="index.php?c=category&a=create" class="btn btn-success" style="margin-bottom: 20px;">Thêm danh mục</a>
                
                <table id="example2" class="table table-bordered table-hover">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>Tên danh mục</th>
                      <th>Hành động</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach ($data as $key => $prd) { ?>
                    <?php if($prd['is_delete'] == 1){ ?> 
                      <tr>
                        <td style=""><?php echo $prd['cate_id']; ?></td>
                        <td style=""><?php echo $prd['name_cate']; ?></td>  

                        <td>
                          <a href="index.php?c=category&a=edit&id=<?php echo $prd['cate_id']?>" class="btn btn-primary"><i class="glyphicon glyphicon-pencil"></i>
                            Sửa</a>
                            <a onclick="return check_del()" href="index.php?c=category&a=delete&id=<?php echo $prd['cate_id']?>&is_delete=0" class="btn btn-danger"><i class="glyphicon glyphicon-remove"></i>
                            Xóa</a>
                        </td>
                      </tr>
                    <?php } ?>
                    <?php } ?>
                  </tbody>
                </table>
                <div class="panel-footer" style="margin-top:20px;">
                    <nav aria-label="Page navigation example">
                        <ul class="pagination">
                            
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
  <script type="text/javascript">
    function check_del(){
      confirm("Bạn có chắc chắn muốn tài khoản? ");
    }
  </script>