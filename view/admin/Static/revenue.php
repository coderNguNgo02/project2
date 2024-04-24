

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
              <li class="breadcrumb-item active">Doanh thu</li>
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
                <h3 class="card-title">Doanh thu</h3>
              </div>
              <!-- /.card-header -->
              <div class="row">
        <ul class="user-menu " style="list-style: none;">
            <li class="dropdown pull-right">
                <a href="#" class="dropdown-toggle" style="color: red;" data-toggle="dropdown">
                    --- Chọn năm ---
                </a>
                <ul class="dropdown-menu" role="menu">
                    <li>
                        <a href="index.php?c=static&a=revenue&year=<?php echo date('Y') - 2; ?>"> <?php echo date('Y') - 2; ?></a>
                    </li>
                    <li>
                        <a href="index.php?c=static&a=revenue&year=<?php echo date('Y') - 1; ?>"> <?php echo date('Y') - 1; ?></a>
                    </li>
                    <li>
                        <a href="index.php?c=static&a=revenue&year=<?php echo date('Y'); ?>"><?php echo date('Y'); ?></a>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
              <div class="card-body">
                <table id="example2" class="table table-bordered table-hover">
                  <thead>
                    <tr>
                      <th>STT</th>
                      <th>Tháng</th>
                      <th>Doanh thu</th>
                      <th>Hành động</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php 
                        $i = 1;
                        foreach ($data['records'] as $key => $revenue) { 
                    ?>
                        <tr>
                            <td><?php echo $i; ?></td>
                            <td><?php echo $revenue['monthRevenue']; ?></td>
                            <td><?php echo number_format($revenue['total']); ?> VND</td>
                            <td class="form-group">
                                <a href="index.php?c=static&a=detail&month=<?php echo $revenue['monthRevenue']?>&year=<?php echo $data['year']?>" class="btn btn-primary">Chi tiết</a>
                            </td>
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
 