<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Cập nhật đơn hàng</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php?c=index&a=index">Trang chủ</a></li>
              <li class="breadcrumb-item"><a href="index.php?c=order&a=index">Quản lý đơn hàng</a></li>
              <li class="breadcrumb-item active">Cập nhật đơn hàng</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-6">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Cập nhật đơn hàng</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
	              <form role="form" action="index.php?c=order&a=update&id=<?php echo $_GET['id'] ?>" method="post" enctype="multipart/form-data">
	                <div class="card-body">

	                  <div class="form-group">
	                    <label for="exampleInputEmail1">Tên người nhận</label>
	                    <input value="<?php echo $data['order']['receiver_name'] ?>" name="name_order" type="text" class="form-control" id="exampleInputEmail1">
	                  </div>

                    <div class="form-group">
                      <label for="exampleInputEmail1">Địa chỉ người nhận</label>
                      <input value="<?php echo $data['order']['receiver_add'] ?>" name="add_order" type="text" class="form-control" id="exampleInputEmail1">
                    </div>

                    <div class="form-group">
                      <label for="exampleInputEmail1">Số điện thoại người nhận</label>
                      <input value="<?php echo $data['order']['receiver_phone'] ?>" name="phone_order" type="text" class="form-control" id="exampleInputEmail1">
                    </div>

                    <div class="form-group">
                        <label>Trạng thái</label>
                        <select name="status_order" class="form-control">
                            <option value=1>Chờ xử lý</option>
                            <option value=2 selected>Đang xử lý</option>
                            <option value=3>Đang giao hàng</option>
                            <option value=4>Đã giao hàng</option>
                            <option value=5>Đã thanh toán</option>
                            <option value=6>Đã hủy</option>
                        </select>
                    </div>

	                </div>
	                <!-- /.card-body -->

	                <div class="card-footer">
	                  <button type="submit" class="btn btn-primary" name="submit_edit_od">Cập nhật</button>
	                  <button type="reset" class="btn btn-primary" id="reset" onclick="return reset()">Làm mới</button>
	                </div>
	              </form>
            </div>
              <!-- /.card-body -->
           </div>
            <!-- /.card -->
        </div>
          <!--/.col (right) -->
      </div>
        <!-- /.row -->
     <!-- /.container-fluid -->
    </section>
   