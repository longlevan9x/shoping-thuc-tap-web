<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title><?php echo (isset($title)) ? $title : "Web site điện máy"; ?></title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/landing-page.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
   <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>
    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
</head>

<body>
<div id="wraper">
    <!-- Navigation -->
    <nav class="  topnav" role="navigation" style="height: 80px;">
        <div class="container topnav">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand topnav" href="?action=index">
                    <img style="margin: 0 0 0 90px;width: 100px;float: left" src="logo.png" class="img-responsive" alt="Image">
                </a>
                <span style="line-height: 5;">Electric Store</span>
            </div>
            <?php
                $cate = new Database();
                $alldata = $cate->getAllData('category');
                menuMulti($alldata,$newMenu);
                for ($i=1; $i < 5; $i++) {
                    $menu = str_replace('</li>','',$newMenu);
                }
                // echo $menu;
             ?>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse menu-nav" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right category">
                    <li class="parent"><a href="?action=index">Trang chủ</a></li>
                    <li class="parent drop-down">
                        <a href="">Danh mục</a>
                        <?php echo $menu; ?>
                        <!-- <ul class="child1">
                            <li><a href="">Điện thoại</a></li>
                            <li><a>Máy tính</a>
                                <ul class="child2">
                                    <li><a>Dell</a></li>
                                    <li><a href="">HP</a>
                                        <ul class="child3">
                                            <li><a href="">100px;float</a></li>
                                            <li><a href="">2</a></li>
                                            <li><a href="">3</a></li>
                                            <li><a href="">4</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="">Vaio</a></li>
                                    <li><a href="">MAc</a></li>
                                </ul>
                            </li>
                            <li><a href="">Điện thoại</a></li>
                            <li><a href="">Máy tính</a></li>
                            <li><a href="">Điện thoại</a></li>
                            <li><a href="">Máy tính</a></li>
                        </ul> -->
                    </li>
                    <li class="parent">
                        <a>Thể loại</a>
                        <?php
                            $type = new Database();
                            $alldata = $type->getAllData('product_type'); ?>
                        <ul class="child1">
                        <?php foreach ($alldata as $key => $itemT): ?>
                            <li><a href="?action=search&c=index&id=<?php echo $itemT['id_type']; ?>"><?php echo $itemT['name_type']; ?></a></li>
                        <?php endforeach ?>
                        </ul>
                    </li>
                    <li class="parent"><a href="#contact">Giới thiệu</a></li>
                    <li class="parent"><a href="#contact">Liên hệ</a></li>
                </ul>
            </div>
            <div class="login">
                <?php if (isset($_SESSION['user']['username'])): ?>
                    <a href="#">Xin chào: <?php echo isset($_SESSION['user']['fullname']) ? $_SESSION['user']['fullname'] : ''; ?></a>
                    <a href="user/logout.php">Đăng xuất</a>
                <?php else: ?>
                    <a href="?action=user&c=login">Đăng nhập</a>
                <?php endif ?>
                <a href="?action=user&c=signup">Đăng ký</a>
                <a href="?action=cart&c=index"><span class="glyphicon glyphicon-shopping-cart"></span>Giỏ hàng <?php echo isset($_SESSION['cart']) ? count($_SESSION['cart']) : 0; ?></a>

            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

    <div class="intro-header">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <!-- <div class="intro-message">
                        <img src="Trayolo - Web Design - v3-17.png" class="img-responsive" alt="Image">
                        <h1>Malaysia Travel Guides</h1>
                        <h5>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</h5>
                    </div> -->
                </div>
            </div>

        </div>
        <!-- /.container -->
    </div>


    <div class="intro-section">
        <div class="container">
            <div class="row">
            </div>
        </div>
    </div>
