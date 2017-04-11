    <div class="intro-section">
        <div class="container">
            <div class="content-section">
                <h2 class="text-center">Chi tiết sản phẩm</h2>
            </div>
            <div class="detail">
                <div class="panel panel-info" style="border-radius: 0;">
                    <div class="panel-heading">
                        <h3 class="panel-title" style="font-size: 20px;">Thông tin chi tiết sản phẩm</h3>
                    </div>
                    <div class="panel-body">
                        <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                            <img src="uploads/imgProduct/<?php echo $data['image']; ?>" alt="" style="width: 250px;">
                        </div>
                        <div class="col-xs-9 col-sm-9 col-md-9 col-lg-9">
                            <h2>Tên sản phẩm: <?php echo $data['name_prod']; ?></h2>
                            <h4>Giá: <?php echo number_format($data['price']); ?></h4>
                            <h4>Số lượt xem: <?php echo number_format($data['view']); ?></h4>
                            <h4>Loại sản phẩm: <?php echo $data['name_type']; ?></h4>
                            <h4>Hãng sản phẩm: <?php echo $data['name']; ?></h4>
                            <h4>Thông tin: <?php echo $data['description']; ?></h4>
                            <form action="cart/cart.php?c=addcart&id=<?php echo $data['id_prod']; ?>" method="POST" role="form">
                                <label for="" class="pull-left">Số lượng</label>
                                <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                                    <input type="text" maxlength="2" name="txtSoluong" id="txtSoluong" class="form-control" value="1" style="border-radius: 0;">
                                </div>
                                <button type="submit" class="btn btn-info" style="border-radius: 0;">Đặt hàng</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>