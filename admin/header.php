<?php session_start(); ?>
<?php if (!isset($_SESSION['admin'])): ?>
	<?php header("Location: index.php"); ?>
<?php endif ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Quản lý bán sữa</title>
	<link rel="stylesheet" href="../css/bootstrap.min.css">
	<link rel="stylesheet" href="../font-awesome/css/font-awesome.min.css">
	<link rel="stylesheet" href="public/css/style.css">
	<script src="../js/jquery.js" type="text/javascript" charset="utf-8"></script>
	<script src="../js/bootstrap.min.js" type="text/javascript" charset="utf-8"></script>
    <script src="ckeditor/ckeditor.js"></script>
	<!-- <script src="../js/bootstrap.js" type="text/javascript" charset="utf-8"></script> -->
</head>
<body>

<?php require_once 'action.php'; ?>
 <?php
define('PATH_IMG_PROD', '../uploads/imgProduct/');

  ?>
<div class="container">
	<header id="header" class="">
		<nav class="navbar" role="navigation" style="background-color: #E7DCDC;">
			<div class="container-fluid">
				<!-- Brand and toggle get grouped for better mobile display -->
				<div class="navbar-header">
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
				</div>

				<!-- Collect the nav links, forms, and other content for toggling -->
				<div class="collapse navbar-collapse navbar-ex1-collapse">
					<!-- <ul class="nav navbar-nav">
						<li class="active"><a href="#">Link</a></li>
						<li><a href="#">Link</a></li>
					</ul> --><!--  -->
					<a class="navbar-brand" href="trang_chu.php">Trang chủ</a>
					<form class="navbar-form navbar-left" role="search">
						<div class="form-group">
							<input type="text" id="txtKey" class="form-control" placeholder="Tên sữa, Mã sữa, Loại sữa, Hãng sữa...">
						</div>
						<button type="submit" class="btn btn-default">Tìm kiếm</button>
					</form>
					<ul class="nav navbar-nav navbar-right">
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown">Xin chào <?php echo isset($_SESSION['admin']) ? $_SESSION['admin']['username'] : ''; ?><b class="caret"></b></a>
							<ul class="dropdown-menu">
								<li><a href="login.php?ac=logout">Đăng xuất (<?php echo isset($_SESSION['admin']) ? $_SESSION['admin']['username'] : ''; ?>)</a></li>
								<li><a href="dang_ky.php">Đăng ký</a></li>
							</ul>
						</li>
					</ul>
				</div><!-- /.navbar-collapse -->
			</div>
		</nav>
	</header><!-- /header -->
	<aside>
		<style type="text/css" media="screen">
			ul li{
				border-bottom: 1px solid #929FDF;
			}
			ul li:nth-last-child(1){
				border-bottom: none;
			}
		</style>
		<div class="col-xs-12 col-sm-12 col-md-2 col-lg-2" style="background-color: #DBD5D5;border-radius: 5px;">
			<ul class="nav nav-pills nav-stacked">
				<li><a href="?action=category">Quản lý danh mục</a></li>
				<li><a href="?action=product">Quản lý sản phẩm</a></li>
				<li><a href="?action=typeproduct">Loại sản phẩm</a></li>
				<li><a href="?action=order">Quản lý đặt hàng</a></li>
			</ul>
		</div>
	</aside>
	<script type="text/javascript" charset="utf-8" async defer>
		$(document).ready(function() {
			$("#txtKey").click(function () {
				$("#txtKey").width(350);
			});
			$("#txtKey").blur(function () {
				$("#txtKey").width(170);
			});
		});
	</script>

