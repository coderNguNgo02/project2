

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Quản lý tài khoản</h1>
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
                <h3 class="card-title">Danh sách tài khoản</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <a href="index.php?c=user&a=create" class="btn btn-success" style="margin-bottom: 20px;">Thêm tài khoản</a>
                
                <table id="example2" class="table table-bordered table-hover">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>Họ và tên</th>
                      <th>Email</th>
                      <th>Quyền</th>
                      <th>Hành động</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach ($data['user'] as $user) { ?>
                            
                      <tr>
                        <td style=""><?php echo $user['id_acc']; ?></td>
                        <td style=""><?php echo $user['name']; ?></td>
                        <td style=""><?php echo $user['email']; ?></td>
                        <td>
                            <?php 
                              if($user['level'] == 1) {
                                echo '<span class="label label-danger">Admin</span>';
                              }else{
                                echo '<span class="label label-success">Member</span>';
                              }
                            ?>           
                        </td>
                        <td class="form-group">  
                          <a href="index.php?c=user&a=edit&id=<?php echo $user['id_acc']?>" class="btn btn-primary"><i class="glyphicon glyphicon-pencil"></i>
                          Sửa</a>
                          <a onclick="return check_del()" href="index.php?c=user&a=delete&id=<?php echo $user['id_acc']?>" class="btn btn-danger"><i class="glyphicon glyphicon-remove"></i>
                          Xóa</a>
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
                                    echo '<li class="page-item"><a class="page-link" href="index.php?c=user&a=index&page='.$prev.'">&laquo;</a></li>';
                                }
                            ?>

                            <?php
                                for($i = 1; $i <= $data['totalPage']; $i++){
                                    $link = "index.php?c=user&a=index&page=$i";
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
                                    echo '<li class="page-item"><a class="page-link" href="index.php?c=user&a=index&page='.$next.'">&raquo;</a></li>';
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
 
  <script type="text/javascript">
    function check_del(){
      confirm("Bạn có chắc chắn muốn xóa tài khoản? ");
    }
  </script>