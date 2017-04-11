
<section>
		<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
			<div class="panel panel-info">
				<div class="panel-heading">
					<h3 class="panel-title">Sửa thông tin sản phẩm</h3>
				</div>
				<div class="panel-body">
					<form action="action.php?id=<?php echo $data['id_prod']; ?>" method="post" role="form" accept-charset="utf-8" enctype="multipart/form-data">
					<?php $mess = isset($_GET['mess']) ? $_GET['mess']: "" ?>
					<?php $mess1 = isset($_GET['mess1']) ? $_GET['mess1']: "" ?>
					<p class="text-center">
						<?php
							echo ($mess == "ok")
							? "Sửa thành công"
							: (($mess == "err")
							? "Tên danh mục đã tồn tại"
							: (($mess == "fail")
							? "Sửa thất bại" : '')) ;

							echo ($mess1 == "empty") ? "Dữ liệu không được để trống" : "";
						?>
					</p>
						<legend class="text-center">Sửa thông tin sản phẩm</legend>
						<div class="form-group">
							<label for="">Tên sản phẩm</label>
							<input type="text" class="form-control" name="txtName" id="txtName" placeholder="Tên sản phẩm" value="<?php echo $data['name_prod']; ?>">
						</div>
						<div class="form-group">
							<label for="">Giá</label>
							<input type="text" class="form-control" name="txtPrice" id="txtPrice" placeholder="Giá" value="<?php echo $data['price']; ?>">
						</div>
						<div class="form-group">
							<label for="">Hình ảnh mới</label>
							<input type="file" name="txtFile1" id="txtFile1">
							<input type="hidden" name="txtImageCur" id="txtImageCur" value="<?php echo $data['image']; ?>">
							<label for="">Hình ảnh hiện tại</label><br>
							<img src="../uploads/imgProduct/<?php echo $data['image']; ?>" style="width: 100px;height: 100px;" alt="">
						</div>
						<div class="form-group">
							<label for="">Danh mục</label>
							<select name="txtIdCate" id="txtIdCate" class="form-control" required="required">
								<?php foreach ($data_cate as $key => $value): ?>
									<option <?php echo ($value['id'] == $data['id_category']) ? 'selected="selected"' : ''; ?> value="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></option>
								<?php endforeach ?>
								<!-- <option value="0">Root</option> -->
							</select>
						</div>
						<div class="form-group">
							<label for="">Loại sản phẩm</label>
							<select name="txtIdType" id="txtIdType" class="form-control" required="required">
								<?php foreach ($datatype as $key => $type): ?>
									<option <?php echo ($data['id_typeprod'] == $type['id_type']) ? 'selected="selected"' : ''; ?> value="<?php echo $type['id_type']; ?>"><?php echo $type['name_type']; ?></option>
								<?php endforeach ?>
								<!-- <option value="0">Root</option> -->
							</select>
						</div>
						<div class="form-group">
							<label for="">Trạng thái</label>
							<select name="txtStatus" id="txtStatus" class="form-control" required="required">
								<option value="prompt">---Chọn trạng thái---</option>
								<option <?php echo ($data['status_prod'] == 1) ? 'selected="selected"' : ''; ?> value="1">Ẩn</option>
								<option <?php echo ($data['status_prod'] == 3) ? 'selected="selected"' : ''; ?> value="3">Hiện</option>
							</select>
						</div>
						<div class="form-group">
							<label for="">Miêu tả</label>
							<textarea name="txtDescript" id="txtDescript" class="form-control" rows="3" required="required"><?php echo $data['description']; ?></textarea>
						</div>
						<div class="form-group">
							<label for="">Thông tin</label>
							<textarea name="txtContent" id="txtContent" class="form-control" rows="3" required="required"><?php echo $data['content']; ?></textarea>
						</div>
						<button type="submit" name="btnEditPro" class="btn btn-primary btn-block">Thêm</button>
					</form>
				</div>
			</div>
		</div>
</section>
<script type="text/javascript" charset="utf-8" async defer>
	
</script>
<script type="text/javascript">CKEDITOR.replace('txtDescript'); </script>
<!-- <script type="text/javascript">CKEDITOR.replace('txtContent'); </script> -->
<script type="text/javascript" charset="utf-8" async defer>
    // $(function() {
    //     var editor =  CKEDITOR.replace('txtDescript',
    //     {
    //         filebrowserBrowseUrl : '<?php echo $baseUrl."ckfinder/ckfinder.html"; ?>',
    //         filebrowserImageBrowseUrl : '<?php echo $baseUrl."ckfinder/ckfinder.html?Type=Images";?>',
    //         filebrowserFlashBrowseUrl : '<?php echo $baseUrl."ckfinder/ckfinder.html?Type=Flash" ?>',
    //         filebrowserUploadUrl : '<?php echo $baseUrl."ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files"?>',
    //         filebrowserImageUploadUrl : '<?php echo $baseUrl."ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images";?>',
    //         filebrowserFlashUploadUrl : '<?php echo $_SERVER['HTTP_HOST']."ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash";?>',
    //         filebrowserWindowWidth : '800',
    //         filebrowserWindowHeight : '480'
    //     });
    //     CKFinder.setupCKEditor( editor, "<?php echo $baseUrl.'ckfinder/'?>" );
    // });
</script>
<script type="text/javascript" charset="utf-8" async defer>
    $(function() {
        var editor =  CKEDITOR.replace('txtContent',
        {
            filebrowserBrowseUrl : '<?php echo $baseUrl."ckfinder/ckfinder.html"; ?>',
            filebrowserImageBrowseUrl : '<?php echo $baseUrl."ckfinder/ckfinder.html?Type=Images";?>',
            filebrowserFlashBrowseUrl : '<?php echo $baseUrl."ckfinder/ckfinder.html?Type=Flash" ?>',
            filebrowserUploadUrl : '<?php echo $baseUrl."ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files"?>',
            filebrowserImageUploadUrl : '<?php echo $baseUrl."ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images";?>',
            filebrowserFlashUploadUrl : '<?php echo $baseUrl."ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash";?>',
            filebrowserWindowWidth : '800',
            filebrowserWindowHeight : '480'
        });
        CKFinder.setupCKEditor( editor, "<?php echo $baseUrl.'ckfinder/'?>" );
    });
</script>
