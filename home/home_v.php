<style type="text/css" media="screen">
    ul.paging{
        list-style-type: none;
        display: inline-block;
    }
    ul.paging li{
        padding: 10px;
        float: left;
    }

</style>
                <div class="content-section">
                    <h2 class="text-center">Sản phẩm mới</h2>
                </div>
            </div>
            <div class="img-section">
                <?php $data = get_all_data_new(); ?>
                <?php foreach ($data['dataBypage'] as $key => $val): ?>
                    <div class="img-properties col-xs-6 col-sm-6 col-md-3 col-lg-3">
                        <img style="width: 100%;height: 300px;" src="uploads/imgProduct/<?php echo $val['image']; ?><?php  ?>" class="img-responsive" alt="Image">
                        <div class="properties">
                            <a href=""><h1><?php echo $val['name_prod']; ?></h1></a>
                            <h3 class="price">Giá: <?php echo number_format($val['price']); ?></h3>
                            <h5 class="view">Số lượt xem: <?php echo number_format($val['view']); ?></h5>
                            <h5 class="type">Loại sản phẩm: <?php echo $val['name_type']; ?></h5>
                            <h5 class="type1">Hãng sản phẩm: <?php echo $val['name']; ?></h5>
                            <a href="?action=index&c=detail&id=<?php echo $val['id_prod']; ?>" class="btn btn-info detail"><span class="glyphicon glyphicon-eye-open"></span>&nbsp;Chi tiết</a>
                            <a href="cart/cart.php?action=cart&c=addcart&id=<?php echo $val['id_prod']; ?>" class="buy btn btn-success" id="btnBuy<?php echo $value['id_prod']; ?>"><span class="glyphicon glyphicon-shopping-cart"></span>&nbsp;Đặt hàng</a>
                        </div>
                    </div>
                <?php endforeach ?>
            </div>
        </div>
        <div class="clearfix"></div>
        <div class="text-center">
            <?php echo $data['page']; ?>
    </div>
    <div class="intro-section">
        <div class="container">
            <div class="row">
                <div class="content-section">
                    <h2 class="text-center">Sản phấm bán chạy</h2>
                </div>
            </div>
            <?php $data_view = get_all_data_view(); ?>
        <?php foreach ($data_view['dataBypage'] as $key => $value): ?>
            <div class="col-xs-6 col-sm-6 col-md-3 col-lg-3">
                <div class="recent">
                    <img style="width: 100%;height: 300px;" src="uploads/imgProduct/<?php echo $value['image']; ?><?php  ?>" class="img-responsive" alt="Image">
                    <div class="content-recent">
                        <a href="" style="color: #474141;"><h2><?php echo $value['name_prod']; ?></h2></a>
                        <h6><?php echo $value['create_date']; ?></h6>
                        <h4 style="font-size: 15px;">Giá: <?php echo number_format($value['price']); ?></h4>
                        <h4 style="font-size: 15px;">Số lượt xem: <?php echo number_format($value['view']); ?></h4>
                        <h4 style="font-size: 15px;">Loại sản phẩm: <?php echo $value['name_type']; ?></h4>
                        <h4 style="font-size: 15px;">Hãng sản phẩm: <?php echo $value['name']; ?></h4>
                    </div>
                    <a href="?action=index&c=detail&id=<?php echo $value['id_prod']; ?>" class="btn col-lg-6 btn-info"><span class="glyphicon glyphicon-eye-open"></span>&nbsp;Chi tiết</a>
                    <a href="cart/cart.php?action=cart&c=addcart&id=<?php echo $value['id_prod']; ?>" class="btn col-lg-6 btn-success" id="btnBuy<?php echo $value['id_prod']; ?>"><span class="glyphicon glyphicon-shopping-cart"></span>&nbsp;Đặt hàng</a>
                </div>
            </div>
        <?php endforeach ?>
        </div>
        </div>
        <div class="clearfix"></div>
        <div class="text-center">
            <?php echo $data_view['page']; ?>
        </div>
    </div>
    <div class="intro-section">
        <div class="container">
            <div class="row">
                <div class="col-xs-2 col-sm-2 col-md-2 col-md-offset-5 col-lg-2">
                    <a href="?action=search&c=index" style="border-radius: 0;margin-bottom: 50px;" class="btn btn-success btn-block loadmore">Xem tất cả <i class="fa fa-long-arrow-right"></i></a>
                </div>
            </div>
        </div>
    </div>
   <script type="text/javascript" charset="utf-8" async defer>
       function buy(id) {
           
       }
   </script>
  
