<?php session_start(); ?>
<?php if (isset($_SESSION['user'])): ?>
	<?php header("Location: trang_chu.php"); ?>
<?php endif ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Đăng nhập</title>
	<link rel="stylesheet" href="../css/bootstrap.min.css">
</head>
<body>
	<div class="col-xs-12 col-sm-12 col-md-offset-3 col-md-6 col-lg-6">
		<div class="panel panel-primary">
			<div class="panel-heading">
				<h3 class="panel-title text-center" style="font-size: 20px;">Đăng nhập</h3>
			</div>
			<div class="panel-body">
				<div class="container">
					<form action="login.php" method="POST" class="form-horizontal" role="form">
							<div class="form-group">
								<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
									<label>Tên tài khoản</label>
									<input type="text" name="txtTenTK" id="txtTenTK" class="form-control" value="" required="required" placeholder="Tên tài khoản" title="" maxlength="50">
								</div>
							</div>
							<div class="form-group">
								<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
									<label>Mật khẩu</label>
									<input type="password" name="txtMatKhau" id="txtMatKhau" class="form-control" value="" required="required" placeholder="Mật khẩu" title="" maxlength="50">
								</div>
							</div>
							<div class="form-group">
								<div class="col-sm-2 col-sm-offset-1">
									<button type="submit" name="btnLogin" class="btn btn-success btn-block">Đăng nhập</button>
								</div>
								<div class="col-sm-2">
									<a href="dang_ky.php" class="btn btn-info btn-block">Đăng ký</a>
								</div>
							</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</body>
</html>