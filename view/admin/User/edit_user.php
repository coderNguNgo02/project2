<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Sửa thông tin tài khoản</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php?c=index&a=index">Trang chủ</a></li>
              <li class="breadcrumb-item"><a href="index.php?c=user&a=index">Quản lý tài khoản</a></li>
              <li class="breadcrumb-item active">Sửa thông tin tài khoản</li>
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
                <h3 class="card-title">Form sửa thông tin tài khoản</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
	              <form role="form" action="index.php?c=user&a=update&id=<?php echo $data['id_acc']?>" method="post">
	                <div class="card-body">
	                  <div class="form-group">
	                    <label for="exampleInputEmail1">Họ và tên</label>
	                    <input name="name_edit" type="text" class="form-control" id="exampleInputEmail1" placeholder="Nhập họ và tên" required>
	                  </div>
	                  <div class="form-group">
	                    <label for="exampleInputEmail1">Email</label>
	                    <input name="email_edit" type="email" class="form-control" id="exampleInputEmail1" placeholder="Nhập email" required>
	                  </div>
	                  <div class="form-group">
	                    <label for="exampleInputEmail1">Mật khẩu</label>
	                    <input name="pass_edit" type="password" class="form-control" id="exampleInputEmail1" placeholder="Nhập mật khẩu" required>
	                  </div>
	                  <div class="form-group">
	                    <label for="exampleInputEmail1">Quyền</label>
	                    <br>
	                    <select name="level_edit">
	                    	<option value="1">Admin</option>
	                    	<option value="2">Member</option>
	                    </select>
	                  </div>
	                </div>
	                <!-- /.card-body -->

	                <div class="card-footer">
	                  <button type="submit" class="btn btn-primary" name="submit_edit">Sửa</button>
	                  <button type="reset" class="btn btn-primary">Làm mới</button>
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
   