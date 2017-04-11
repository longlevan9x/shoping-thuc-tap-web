
<section>
		<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
			<div class="panel panel-info">
				<div class="panel-heading">
					<h3 class="panel-title">Thêm danh mục</h3>
				</div>
				<div class="panel-body">
					<form action="action.php" method="post" role="form" accept-charset="utf-8">
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
						<legend class="text-center">Thêm Danh mục</legend>
						<div class="form-group">
							<label for="">Tên danh mục</label>
							<input type="text" class="form-control" name="txtName" id="txtName" placeholder="Tên danh mục">
						</div>
						<div class="form-group">
							<label for="">Danh mục cha</label>

							<select name="txtParent" id="txtParent" class="form-control" required="required">
								<option value="0">Root</option>
								<?php print_r($info1); ?>
							</select>
						</div>
						<div class="form-group">
							<label for="">Trạng thái</label>
							<select name="txtStatus" id="txtStatus" class="form-control" required="required">
								<option value="prompt">---Chọn trạng thái---</option>
								<option value="1">Ẩn</option>
								<option value="2">Hiện</option>
							</select>
						</div>
						<button type="submit" name="btnAdd" class="btn btn-primary btn-block">Thêm</button>
					</form>
				</div>
			</div>
		</div>
</section>
<script type="text/javascript" charset="utf-8" async defer>
	
</script>

