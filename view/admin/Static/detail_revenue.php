

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Doanh thu</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Trang chủ</a></li>
              <li class="breadcrumb-item"><a href="index.php?c=static&a=revenue">Doanh thu</a></li>
              <li class="breadcrumb-item active">Chi tiết</li>
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
                <h3 class="card-title">Doanh thu tháng <?php echo $_GET['month'] ?>  năm <?php echo $_GET['year'] ?></h3>
              </div>
              <!-- /.card-header -->
              
              <div class="card-body">
                <table id="example2" class="table table-bordered table-hover">
                  <thead>
                    <tr>
                      <th>STT</th>
                      <th>Tên sản phẩm</th>
                      <th>Số lượng bán</th>
                      <th>Tổng tiền</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php 
                        $i = 1;
                        foreach ($data as $key => $detail) { 
                    ?>
                        <tr>
                            <td><?php echo $i; ?></td>
                            <td><?php echo $detail['name_prd']; ?></td>
                            <td><?php echo $detail['qty']; ?></td>
                            <td><?php echo number_format($detail['price']); ?> VND</td>
                        </tr>
                    <?php 
                        $i++;
                    } 
                    ?>
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
