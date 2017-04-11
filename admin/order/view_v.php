<div class="col-xs-12 col-sm-12 col-md-10 col-lg-10">
	<div class="panel panel-primary">
		<div class="panel-heading">
			<h3 class="panel-title">Thông tin sản phẩm</h3>
		</div>
		<div class="panel-body">
		<!-- Table -->
		<style type="text/css" media="screen">
			.info-prod td{
				text-align: center;
			}
		</style>
			<form action="" method="POST" class="form-inline" role="form">
				<div class="form-group">
					<input type="email" class="form-control" id="" placeholder="Tìm kiếm">
				</div>
				<button type="submit" class="btn btn-primary">Tìm kiếm</button>
			</form>
			<h2></h2>
			<table class="table table-hover table-striped">
				<?php $j = 1; ?>
				<?php foreach ($data_customer as $kc => $itemCus): ?>
					<tr>
						<td># <?php echo $j;$j++; ?></td>
						<td style="width: 200px;">
							<table>
								<tbody>
									<tr>
										<th class="text-center">Thông tin khách hàng</th>
									</tr>
									<tr>
										<td><b>Họ tên:</b><br> <?php echo $itemCus['fullname']; ?></td>
									</tr>
									<tr>
										<td><b>Email:</b><br> <?php echo $itemCus['email']; ?></td>
									</tr>
									<tr>
										<td><b>Số điện thoại:</b><br> <?php echo $itemCus['phone']; ?></td>
									</tr>
									<tr>
										<td><b>Địa chỉ:</b><br> <?php echo $itemCus['address']; ?></td>
									</tr>
									<tr>
										<td><b>Ghi chú:</b><br> <?php echo $itemCus['note']; ?></td>
									</tr>
									<tr>
										<td><b>Ngày đặt:</b><br> <?php echo $itemCus['created_date']; ?></td>
									</tr>
									<tr>
										<td><button id="orderAll" onclick="order(<?php echo $itemCus['id']; ?>,'orderall');" type="button" class="btn btn-sm btn-success">Xác nhận tất cả</button></td>
									</tr>
								</tbody>
							</table>
						</td>
						<td>
							<table class="info-prod">
								<tbody>
									<tr>
										<th colspan="7" class="text-center">Thông tin sản phẩm</th>
									</tr>
									<tr>
										<td style="width:40px;">#</td>
										<td style="width:140px;">Tên sp</td>
										<td style="width:100px;">Hình ảnh</td>
										<td style="width:50px;">Số lượng</td>
										<td style="width:100px;">Giá</td>
										<td style="width:120px;">Tiền</td>
										<td>Action</td>
									</tr>
									<?php $i=1; ?>
									<?php foreach ($data_order[$itemCus['id']] as $k => $itemO): ?>
										<tr>
											<td><?php echo $i;$i++; ?></td>
											<td><?php echo $itemO['name_prod']; ?></td>
											<td><img style="width:70px;height: 70px;" src="../uploads/imgProduct/<?php echo $itemO['image']; ?>" alt=""></td>
											<td><?php echo number_format($itemO['qty']); ?></td>
											<td><?php echo number_format($itemO['price']); ?></td>
											<td><?php echo number_format($itemO['money']); ?></td>
											<td>
												<button type="button" onclick="order(<?php echo $itemCus['id']; ?>,'orderone',<?php echo $itemO['id_order']; ?>);" title="Xác nhận đơn hàng..." class="btn btn-xs btn-warning">
													<span class="glyphicon glyphicon-edit"></span>
												</button>
												<button type="button" onclick="order(<?php echo $itemCus['id']; ?>,'delete',<?php echo $itemO['id_order']; ?>);" title="Hủy bỏ đơn hàng..." class="btn btn-xs btn-danger">
													<span class="glyphicon glyphicon-remove-sign"></span>
												</button>
											</td>
										</tr>
									<?php endforeach ?>
								</tbody>
							</table>
						</td>
					</tr>
				<?php endforeach ?>
			</table>
		</div>
	</div>
</div>
<script type="text/javascript" charset="utf-8">
	function order(idCus = 0,type = '',idProd = 0) {
		if (type == 'delete') {
			if (confirm("Bạn có chắc chắn hủy đơn hàng?")) {
				window.location.href = "order/index.php?c="+type+"&idcus="+idCus+"&idprod="+idProd;
			}
		}
		else if(type == 'orderone'){
			if (confirm("Bạn có chắc chắn xác nhận đơn hàng này?")) {
				window.location.href = "order/index.php?c="+type+"&idcus="+idCus+"&idprod="+idProd;
			}
		}
		else if(type == 'orderall'){
			if (confirm("Bạn có chắc chắn xác nhận tất cả đơn hàng của "+idCus)) {
				window.location.href = "order/index.php?c="+type+"&idcus="+idCus+"&idprod="+idProd;
			}
		}
	}


</script>