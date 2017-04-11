
<section>
		<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
			<div class="panel panel-info">
				<div class="panel-heading">
					<h3 class="panel-title">Sửa loại sản phẩm</h3>
				</div>
				<div class="panel-body">
					<form action="action.php?id=<?php echo isset($data['id_type']) ? $data['id_type'] : ''; ?>" method="post" role="form" accept-charset="utf-8">
					<?php $mess = isset($_GET['mess']) ? $_GET['mess']: "" ?>
					<?php $mess1 = isset($_GET['mess1']) ? $_GET['mess1']: "" ?>
					<p class="text-center">
						<?php
							echo ($mess == "ok")
							? "Sửa thành công"
							: (($mess == "err")
							? "Tên loại sản phẩm đã tồn tại"
							: (($mess == "fail")
							? "Sửa thất bại" : '')) ;

							echo ($mess1 == "empty") ? "Dữ liệu không được để trống" : "";
							echo $mess2;
						?>
					</p>
						<legend class="text-center">Sửa loại sản phẩm</legend>
						<div class="form-group">
							<label for="">Tên loại sản phẩm</label>
							<input type="text" class="form-control" name="txtName" id="txtName" placeholder="Tên loại sản phẩm" value="<?php echo isset($data['name_type']) ? $data['name_type'] : ''; ?>">
						</div>
						<div class="form-group">
							<label for="">Trạng thái</label>
							<select name="txtStatus" id="txtStatus" class="form-control" required="required">
								<option value="prompt">---Chọn trạng thái---</option>
								<option <?php echo ($data['status_type'] == 1) ? 'selected="selected"':''; ?> value="1">Ẩn</option>
								<option <?php echo ($data['status_type'] == 2) ? 'selected="selected"':''; ?> value="2">Hiện</option>
							</select>
						</div>
						<button type="submit" name="btnEditType" class="btn btn-primary btn-block">Sửa</button>
					</form>
				</div>
			</div>
		</div>
</section>

