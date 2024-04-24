<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Sửa sản phẩm</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php?c=index&a=index">Trang chủ</a></li>
              <li class="breadcrumb-item"><a href="index.php?c=product&a=index">Quản lý sản phẩm</a></li>
              <li class="breadcrumb-item active">Sửa sản phẩm</li>
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
                <h3 class="card-title">Form sửa sản phẩm</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
	              <form role="form" action="index.php?c=product&a=update&id=<?php echo $_GET['id'] ?>" method="post" enctype="multipart/form-data">
	                <div class="card-body">

	                  <div class="form-group">
	                    <label for="exampleInputEmail1">Tên sản phẩm</label>
	                    <input value="<?php echo $data['product']['name_prd'] ?>" name="prd_name" type="text" class="form-control" id="exampleInputEmail1" placeholder="Nhập tên sản phẩm" required>
	                  </div>

                     <div class="form-group">
                      <label for="prd_price">Giá (VNĐ)</label>
                      <input value="<?php echo $data['product']['price_prd'] ?>" name="prd_price" type="number" class="form-control" id="prd_price" placeholder="Nhập giá sản phẩm" required>
                    </div>

                     <div class="form-group">
                      <label for="prd_brand">Nhãn hiệu</label>
                      <input value="<?php echo $data['product']['brand'] ?>" name="prd_brand" type="text" class="form-control" id="prd_brand" placeholder="Nhập nhãn hiệu" required>
                    </div>

                     <div class="form-group">
                      <label for="prd_qty">Số lượng</label>
                      <input value="<?php echo $data['product']['quanty'] ?>" name="prd_qty" type="number" class="form-control" id="prd_qty" placeholder="Nhập số lượng" required>
                    </div>
	                  

	                  <div class="form-group">
	                    <label for="prd_desc">Mô tả</label>
	                    <input value="<?php echo $data['product']['descript'] ?>" name="prd_desc" type="text" class="form-control" id="prd_desc" placeholder="Nhập mô tả" required>
	                  </div>


                    <div class="form-group">
                      <label for="prd_cate">Danh mục</label>
                      <br>
                      <select name="cate_name" id="prd_cate">
                        <?php foreach ($data['category'] as $key => $cate) { ?>
                          <?php if($cate['is_delete'] != 0) { ?>
                            <option value=<?php echo $data['product']['cate_id']; ?>><?php echo $cate['name_cate']; ?></option>
                          <?php } ?>
                        <?php } ?>
                      </select>
                    </div>

                    <div class="form-group">
                      <label for="prd_img">Hình ảnh</label>
                      <br>
                      <input name="prd_img" type="file" id="prd_img" accept="image/*" onchange="loadImage()">
                        <img src="public/img/<?php echo $data['product']['img_prd']?>" width="260px" height="300px" style="margin-left: 60px;">
                      
                    </div>

	                </div>
	                <!-- /.card-body -->

	                <div class="card-footer">
	                  <button type="submit" class="btn btn-primary" name="submit_edit_prd">Sửa sản phẩm</button>
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

    <script>
      function resetImg(){
        img = document.getElementById('img');
        img.src = 'public/img/no_img.png';
      }
      function loadImage(){ 
          img = document.getElementById('img');
          img.src=URL.createObjectURL(event.target.files[0]);
      }
      function reset(){
        resetImg();
      }
    </script>
   