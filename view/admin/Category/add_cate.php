<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Thêm danh mục</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php?c=index&a=index">Trang chủ</a></li>
              <li class="breadcrumb-item"><a href="index.php?c=category&a=index">Quản lý danh mục</a></li>
              <li class="breadcrumb-item active">Thêm danh mục</li>
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
                <h3 class="card-title">Form thêm danh mục</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
	              <form role="form" action="index.php?c=category&a=store" method="post" enctype="multipart/form-data">
	                <div class="card-body">

	                  <div class="form-group">
	                    <label for="exampleInputEmail1">Tên danh mục</label>
	                    <input name="cate_name" type="text" class="form-control" id="exampleInputEmail1" placeholder="Nhập tên danh mục" required>
	                  </div>

	                </div>
	                <!-- /.card-body -->

	                <div class="card-footer">
	                  <button type="submit" class="btn btn-primary" name="submit_add_prd">Tạo danh mục</button>
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


   