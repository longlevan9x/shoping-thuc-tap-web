
            <div class="content-section">
                <h2 class="text-center">Danh sách tất cả sản phẩm</h2>
            </div>
        <?php if (isset($dataByPage) && !empty($dataByPage)): ?>
            <?php foreach ($dataByPage as $key => $value): ?>
                <div class="col-xs-6 col-sm-6 col-md-3 col-lg-3" style="margin-bottom:50px;">
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
                        <a href="cart/cart.php?action=cart&c=addcart&id=<?php echo $value['id_prod']; ?>" class="btn col-lg-6 btn-success"><span class="glyphicon glyphicon-shopping-cart"></span>&nbsp;Đặt hàng</a>
                    </div>
                </div>
            <?php endforeach ?>
        <?php else: ?>
            <div style="padding: 30px;">
                <h4>Không tìm thấy sản phẩm nào</h4>
            </div>
        <?php endif ?>
                <div class="clearfix"></div>
                <div class="text-center">
                    <?php echo $html; ?>
                </div>
        </div>
    </div>