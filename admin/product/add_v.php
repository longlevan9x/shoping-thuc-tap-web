<?php $baseUrl = 'http://'.$_SERVER['HTTP_HOST'].'myproject8032/shoping/admin'; ?>
<section>
		<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
			<div class="panel panel-info">
				<div class="panel-heading">
					<h3 class="panel-title">Thêm sản phẩm</h3>
				</div>
				<div class="panel-body">
					<form action="action.php" method="post" role="form" accept-charset="utf-8" enctype="multipart/form-data">
					<?php $mess = isset($_GET['mess']) ? $_GET['mess']: "" ?>
					<?php $mess1 = isset($_GET['mess1']) ? $_GET['mess1']: "" ?>
					<p class="text-center">
						<?php
							echo ($mess == "ok")
							? "Thêm thành công"
							: (($mess == "err")
							? "Tên danh mục đã tồn tại"
							: (($mess == "fail")
							? "Thêm thất bại" : '')) ;

							echo ($mess1 == "empty") ? "Dữ liệu không được để trống" : "";
						?>
					</p>
						<legend class="text-center">Thêm sản phẩm</legend>
						<div class="form-group">
							<label for="">Tên sản phẩm</label>
							<input type="text" class="form-control" name="txtName" id="txtName" placeholder="Tên sản phẩm">
						</div>
						<div class="form-group">
							<label for="">Giá</label>
							<input type="text" class="form-control" name="txtPrice" id="txtPrice" placeholder="Giá">
						</div>
						<div class="form-group">
							<label for="">Hình ảnh</label>
							<input type="file" name="txtFile1" id="txtFile1">
						</div>
						<div class="form-group">
							<label for="">Danh mục</label>
							<select name="txtIdCate" id="txtIdCate" class="form-control" required="required">
								<!-- <option value="0">Root</option> -->
								<?php print_r($info1); ?>
							</select>
						</div>
						<div class="form-group">
							<label for="">Loại sản phẩm</label>

							<select name="txtIdType" id="txtIdType" class="form-control" required="required">
								<?php foreach ($datatype as $key => $type): ?>
									<option value="<?php echo $type['id_type']; ?>"><?php echo $type['name_type']; ?></option>
								<?php endforeach ?>
							</select>
						</div>
						<div class="form-group">
							<label for="">Trạng thái</label>
							<select name="txtStatus" id="txtStatus" class="form-control" required="required">
								<option value="prompt">---Chọn trạng thái---</option>
								<option value="1">Ẩn</option>
								<option value="3">Hiện</option>
							</select>
						</div>
						<div class="form-group">
							<label for="">Miêu tả</label>
							<textarea name="txtDescript" id="txtDescript" class="form-control" rows="3" required="required"></textarea>
						</div>
						<div class="form-group">
							<label for="">Thông tin</label>
							<textarea name="txtContent" id="txtContent" class="form-control" rows="3" required="required"></textarea>
						</div>
						<button type="submit" name="btnAddPro" class="btn btn-primary btn-block">Thêm</button>
					</form>
				</div>
			</div>
		</div>
</section>

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
