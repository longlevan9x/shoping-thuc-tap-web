<div class="col-xs-12 col-sm-12 col-md-9 col-lg-9">
	<div class="panel panel-primary">
		<div class="panel-heading">
			<h3 class="panel-title">Thông tin danh mục</h3>
		</div>
		<div class="panel-body">
		<!-- Table -->
			<a href="?action=category&c=add" class="btn btn-success">Thêm danh mục</a>
			<table class="table table-hover table-striped">
				<thead>
					<tr>
						<th>#</th>
						<th>Tên danh mục</th>
						<th>Danh mục cha</th>
						<th style="width: 100px;">Trạng thái</th>
						<th style="width: 170px;">Action</th>
					</tr>
				</thead>
				<tbody>
				<?php $i = 1; ?>
				<?php foreach ($data_cate as $key => $val): ?>
					<tr>
						<td><?php echo $i;$i++; ?></td>
						<td><?php echo $val['name']; ?></td>
						<td>
							<?php $string = ''; ?>
							<?php foreach ($data_cate as $k => $value): ?>
								<?php if ($val['parent'] == $value['id']): ?>
									<?php echo $value['name']; ?>
								<?php elseif($val['parent'] ==  0): ?>
									<?php $string = "Root"; ?>
								<?php endif ?>
							<?php endforeach ?>
							<?php echo $string; ?>
						</td>
						<td>
							<select name="txtStatus1" onchange="activec(<?php echo $val['id']; ?>);" id="txtStatus1" class="form-control" required="required">
								<option  value="1" <?php echo ($val['status_cate'] == 1) ? 'selected="selected"' : ''; ?>>Ẩn</option>
								<option  value="2" <?php echo ($val['status_cate'] == 2) ? 'selected="selected"' : ''; ?>>Hiện</option>
							</select>
						</td>
						<td>
							<a class="btn btn-warning" href="?action=category&c=edit&id=<?php echo $val['id']; ?>" role="button"><span class="glyphicon glyphicon-edit"></span>Sửa</a>
							<a class="btn btn-danger" onclick="deletec(<?php echo $val['id']; ?>);" role="button"><span class="glyphicon glyphicon-remove"></span>Xóa</a>
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
		var Url = "?action=category&c=update";
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
			window.location.href = "?action=category&c=delete&id=" + id;
		}
	}


</script>