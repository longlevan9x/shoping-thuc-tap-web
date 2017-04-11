<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Đăng ký</title>
	<link rel="stylesheet" href="../css/bootstrap.min.css">
</head>
<body>
	<div class="col-xs-12 col-sm-12 col-md-offset-3 col-md-6 col-lg-6">
		<div class="panel panel-primary">
			<div class="panel-heading">
				<h3 class="panel-title text-center" style="font-size: 20px;">Đăng ký tài khoản</h3>
			</div>
			<div class="panel-body">
				<div class="container">
					<form action="signup.php" method="POST" class="form-horizontal" role="form">
							<div class="form-group">
								<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
									<label>Tên tài khoản</label>
									<input type="text" name="txtTenTK" id="txtTenTK" class="form-control" value="" required="required" placeholder="Tên tài khoản" title="">
								</div>
							</div>
							<div class="form-group">
								<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
									<label>Tên hiển thị</label>
									<input type="text" name="txtTenHT" id="txtTenHT" class="form-control" value="" required="required" placeholder="Tên hiển thị" title="">
								</div>
							</div>
							<div class="form-group">
								<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
									<label>Mật khẩu</label>
									<input type="password" name="txtMatKhau" id="txtMatKhau" class="form-control" value="" required="required" placeholder="Mật khẩu" title="">
								</div>
							</div>
							<div class="form-group">
								<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
									<label>Mật khẩu nhập lại</label>
									<input type="password" name="txtMKnhaplai" id="txtMKnhaplai" class="form-control" value="" required="required" placeholder="Mật khẩu nhập lại" title="">
								</div>
							</div>
							<div class="form-group">
								<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
									<label>Giới tính</label>
									<label>
										<input type="radio" name="txtGioiTinh" value="1">
										Nam
									</label>
									<label>
										<input type="radio" name="txtGioiTinh" value="2">
										Nữ
									</label>
								</div>
							</div>
							<div class="form-group">
								<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
									<label>Số điện thoại</label>
									<input type="tel" name="txtSDT" id="txtSDT" class="form-control" value="" required="required" placeholder="Tên tài khoản" title="">
								</div>
							</div>
							<div class="form-group">
								<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
									<label>Email</label>
									<input type="email" name="txtEmail" id="txtEmail" class="form-control" value="" required="required" placeholder="Tên tài khoản" title="">
								</div>
							</div>
							<div class="form-group">
								<div class="col-sm-2 col-sm-offset-1">
									<button type="submit" name="btnSignup" class="btn btn-success btn-block">Đăng ký</button>
								</div>
								<div class="col-sm-2">
									<a href="index.php" class="btn btn-info btn-block">Đăng nhập</a>
								</div>
							</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</body>
</html>