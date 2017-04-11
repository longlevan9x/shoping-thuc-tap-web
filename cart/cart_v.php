
                <div class="content-section">
                    <h2></h2>
                    <div class="panel panel-info" style="border-radius: 0;">
                        <div class="panel-heading">
                            <h3 class="panel-title text-center" style="font-size: 25px;">Thông tin giỏ hàng</h3>
                        </div>
                        <div class="panel-body">
                        <form action="cart/cart.php?c=update" method="POST" role="form" id="c-form">
                            <table class="table table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Tên sản phẩm</th>
                                        <th>Hình ảnh</th>
                                        <th>Giá</th>
                                        <th>Số lượng</th>
                                        <th>Thành tiền</th>
                                        <th style="width: 100px;text-align: center;">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php $i = 1; ?>
                                <?php $totalmoney = 0; ?>
                                <?php if (isset($_SESSION['cart'])): ?>
                                    <?php foreach ($_SESSION['cart'] as $key => $item): ?>
                                        <tr>
                                            <td><?php echo $i;$i++; ?></td>
                                            <td><?php echo $item['name']; ?></td>
                                            <td><img src="uploads/imgProduct/<?php echo $item['image']; ?>" style="width:100px;height: 100px;" alt=""></td>
                                            <td id="price<?php echo $item['id']; ?>"><?php echo number_format($item['price']); ?></td>
                                            <td>
                                                <input type="text" maxlength="2" data-name="<?php echo $item['id']; ?>" name="txtSoluong[<?php echo $item['id']; ?>]" id="txtSoluong<?php echo $item['id']; ?>" style="width: 70px;border-radius: 0;" class="form-control" title="" value="<?php echo $item['qty']; ?>"></td>
                                            <td id="money<?php echo $item['id']; ?>"><?php echo number_format($item['qty'] * $item['price']); ?></td>
                                            <td>
                                                <a <?php echo ($item['qty'] < 50) ? 'onclick="plusMinus('.$item['id'].',\'plus\');"': ' disabled="disabled"' ; ?>  id="btnPlus<?php echo $item['id']; ?>" style="border-radius: 0;" class="btn btn-xs btn-success"><span class="glyphicon glyphicon-plus"></span></a>
                                                <a <?php echo ($item['qty'] > 1) ? 'onclick="plusMinus('.$item['id'].',\'minus\');"': ' disabled="disabled"' ; ?> id="btnMinis<?php echo $item['id']; ?>" style="border-radius: 0;" class="btn btn-xs btn-info"><span class="glyphicon glyphicon-minus"></span></a>
                                                <a onclick="deleteOne(<?php echo $item['id']; ?>);"  style="border-radius: 0;" class="btn btn-xs btn-danger"><span class="glyphicon glyphicon-trash"></span></a>
                                            </td>
                                        </tr>
                                        <?php $totalmoney += ($item['qty'] * $item['price']); ?>
                                    <?php endforeach ?>
                                <tr>
                                    <td colspan="6">
                                        <div class="pull-right">
                                            Tổng tiền:
                                        </div>
                                    </td>
                                    <td id="total-money">
                                        <?php echo number_format($totalmoney); ?>
                                    </td>
                                </tr>
                                <?php else: ?>
                                    <tr>
                                        <td colspan="8">
                                            Giỏ hàng rỗng. Vui lòng mua hàng.
                                        </td>
                                    </tr>
                                <?php endif ?>
                                <tr>
                                    <td colspan="7" rowspan="" headers="">
                                        <div class="pull-right">
                                            <a style="border-radius: 0;" class="btn btn-success" href="?action=index" role="button"><span class="glyphicon glyphicon-arrow-left"></span>Tiếp tục mua hàng</a>
                                            <?php if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])): ?>
                                                <button style="border-radius: 0;" type="submit" class="btn btn-primary" role="button"><span class="glyphicon glyphicon-edit"></span>Cập nhật giỏ hàng</button>
                                                <a style="border-radius: 0;" class="btn btn-danger" href="cart/cart.php?c=remove" role="button"><span class="glyphicon glyphicon-remove"></span>&nbsp;Xóa tất cả giỏ hàng</a>
                                            <?php endif ?>
                                        </div>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </form>
                        </div>
                    </div>
                </div>

                <div class="order col-xs-12 col-sm-12 col-md-12 col-lg-12 row" style="margin-bottom: 50px;">
                    <?php $mess = isset($_GET['m'])  ? $_GET['m'] : ''; ?>
                    <p class="text-center"><?php echo ($mess == 'empty') ? 'Các thông tin phải nhập chính xác định dạng' : ''; ?></p>
                    <p class="text-center"><?php echo ($mess == 'ok') ? 'Đặt hàng thành công. chúng t sẽ liên hệ bạn trong thời gian sớm nhất' : ''; ?></p>
                    <p class="text-center"><?php echo ($mess == 'err') ? 'Có lỗi xảy ra 1' : ''; ?></p>
                    <p class="text-center"><?php echo ($mess == 'fail') ? 'Có lỗi xảy ra 2' : ''; ?></p>
                    <form action="cart/cart.php?c=order" method="POST" role="form">
                        <legend class="text-center">Thông tin đặt hàng</legend>
                        <div class="form-group col-xs-6 col-sm-6 col-md-6 col-lg-6">
                            <label for="">Họ và tên</label>
                            <input value="<?php echo (isset($_SESSION['user']['fullname'])) ? $_SESSION['user']['fullname'] : ''; ?>" style="border-radius: 0;" type="text" class="form-control" name="txtFullname" id="txtFullname" placeholder="Họ tên">
                        </div>
                        <div class="form-group col-xs-6 col-sm-6 col-md-6 col-lg-6">
                            <label for="">Số điện thoại</label>
                            <input value="<?php echo (isset($_SESSION['user']['phone'])) ? $_SESSION['user']['phone'] : ''; ?>" style="border-radius: 0;" type="text" class="form-control" name="txtPhone" id="txtPhone" placeholder="Số điện thoại...(Là số điện thoại thuộc việt nam)">
                        </div>
                        <div class="form-group col-xs-6 col-sm-6 col-md-6 col-lg-6">
                            <label for="">Email</label>
                            <input value="<?php echo (isset($_SESSION['user']['email'])) ? $_SESSION['user']['email'] : ''; ?>" tyle="border-radius: 0;" type="email" class="form-control" name="txtEmail" id="txtEmail" placeholder="Email...(Vd: abc@gmail.com)">
                        </div>
                        <div class="form-group col-xs-6 col-sm-6 col-md-6 col-lg-6">
                            <label for="">Địa chỉ</label>
                            <input style="border-radius: 0;" type="text" class="form-control" name="txtAddress" id="txtAddress" placeholder="Địa chỉ">
                        </div>
                        <div class="form-group col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <label for="">Ghi chú</label>
                            <input style="border-radius: 0;" type="text" class="form-control" name="txtNote" id="txtNote" placeholder="Ghi chú">
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-offset-4 col-md-4 col-lg-4">
                            <button style="border-radius: 0;" name="btnOrder" type="submit" class="btn btn-primary btn-block">Đặt hàng</button>
                        </div>
                    </form>
                </div>
            </div>


        </div>

    </div>

<script type="text/javascript" charset="utf-8" async defer>
    function deleteOne(id) {
        if (confirm("Bạn có muốn xóa sản phẩm?")) {
            window.location.href="cart/cart.php?c=delete&id="+id;
        }
    }
    function plusMinus(id,type) {
        var qty = $("#c-form").find('#txtSoluong'+id).val();
        var data = $("#c-form").find('#txtSoluong'+id).data('name');
        var price = $("#c-form").find('#price'+id).text();
        $.ajax({
            url: 'cart/cart.php?c='+type,
            type: 'POST',
            data: {'id': id},
            success:function (res) {
                var obj = $.parseJSON(res);
                if ($.isNumeric(obj.qty)) {
                    if (obj.id == data) {
                        $("#c-form").find('#txtSoluong'+id).val(obj.qty);
                        $("#c-form").find('#money'+id).text(obj.money);
                        $("#total-money").text(obj.totalMoney);
                        if (obj.qty <= 1 || qty <= 0) {
                            $("#c-form").find('#btnMinis'+id).removeAttr('onclick');
                            $("#c-form").find('#btnMinis'+id).attr('disabled','disabled');
                        }
                        else if(obj.qty >= 50 || qty >= 51){
                            $("#c-form").find('#btnPlus'+id).removeAttr('onclick');
                            $("#c-form").find('#btnPlus'+id).attr('disabled','disabled');
                        }
                        else{
                            $("#c-form").find('#btnMinis'+id).attr('onclick','plusMinus('+id+',"minus")');
                            $("#c-form").find('#btnMinis'+id).removeAttr('disabled');
                            $("#c-form").find('#btnPlus'+id).attr('onclick','plusMinus('+id+',"plus")');
                            $("#c-form").find('#btnPlus'+id).removeAttr('disabled');
                        }
                    }
                }
            }
        });
    }
</script>