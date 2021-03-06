<div class="col-xs-12 col-sm-12 col-md-10 col-lg-10">
	<div class="panel panel-primary">
		<div class="panel-heading">
			<h3 class="panel-title">Thông tin sản phẩm</h3>
		</div>
		<div class="panel-body">
		<!-- Table -->
			<a href="?action=product&c=add" class="btn btn-success">Thêm sản phẩm</a>
			<table class="table table-hover table-striped">
				<thead>
					<tr>
						<th>#</th>
						<th>Tên sản phẩm</th>
						<th>Hình ảnh</th>
						<th>Loại sản phẩm</th>
						<th>Số lượt xem</th>
						<th style="width: 100px;">Trạng thái</th>
						<th style="width: 170px;">Action</th>
					</tr>
				</thead>
				<tbody>
				<?php $i = 1; ?>
				<?php foreach ($data_prod as $key => $val): ?>
					<tr>
						<td><?php echo $i;$i++; ?></td>
						<td><?php echo $val['name_prod']; ?></td>
						<td><img src="../uploads/imgProduct/<?php echo $val['image']; ?>" style="width:100px;height: 100px;" alt=""></td>
						<td><?php echo $val['name']; ?></td>
						<td><?php echo number_format($val['view']); ?></td>
						<td>
							<select name="txtStatus1" onchange="activec(<?php echo $val['id_prod']; ?>);" id="txtStatus1" class="form-control" required="required">
								<option  value="1" <?php echo ($val['status_prod'] == 1) ? 'selected="selected"' : ''; ?>>Ẩn</option>
								<option  value="2" <?php echo ($val['status_prod'] == 2) ? 'selected="selected"' : ''; ?>>Kiểm duyệt</option>
								<option  value="3" <?php echo ($val['status_prod'] == 3) ? 'selected="selected"' : ''; ?>>Hiện</option>
							</select>
						</td>
						<td>
							<a class="btn btn-warning" href="?action=product&c=edit&id=<?php echo $val['id_prod']; ?>" role="button"><span class="glyphicon glyphicon-edit"></span>Sửa</a>
							<a class="btn btn-danger" onclick="deletec(<?php echo $val['id_prod']; ?>);" role="button"><span class="glyphicon glyphicon-remove"></span>Xóa</a>
						</td>
					</tr>
					<!-- <?php  ?> -->
				<?php endforeach ?>
				</tbody>
			</table>
		</div>
	</div>
</div>
<script type="text/javascript" charset="utf-8">
	function activec(id) {
		var status = $.trim($('#txtStatus1').val());
		var Url = "?action=product&c=update";
		$.ajax({
			url: Url,
			type: 'POST',
			data: {'status' : status,'id' : id},
			success: function (res) {
				window.location.reload(true);
			}
		});
	}
	function deletec(id){
		if (confirm("Bạn có muốn xóa?")) {
			window.location.href = "?action=product&c=delete&id=" + id;
		}
	}


</script>