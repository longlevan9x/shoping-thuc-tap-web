<style type="text/css" media="screen">
	.menu-cart{
		left: 84%;
		width: 200px;
		margin-bottom: 10px;
		height: 100px;
		background: #CAACAC  0 0 no-repeat;
		border-radius: 30px 0;
	}
	.menu-cart a{
		color: white;
		width: 100%;
		height: 50%;
		top: 18%;
		left: 10%;
		position: absolute;
	}
	.menu-cart a#total-money{
		color: white;
		width: 100%;
		height: 50%;
		top: 55%;
		left: 5%;
		position: absolute;
	}
	.menu-cart a:hover{
		text-shadow: 4px 4px 7px rgba(0, 0, 0, 1);
		text-decoration: none;
	}
	.menu-cart #num-cart{
		color: white;
		background-color: #6CDA8E;
		font-size: 20px;
		width: 30px;
		height: 30px;
		border-radius: 30px;
		top: -15%;
		left: 60%;
		text-align: center;
		position: absolute;
	}
</style>
    <nav class="menu-cart navbar-fixed-bottom">
      <div class="container">
          <ul class="nav navbar-nav">
            <a href="?action=cart&c=index">
            	<span style="font-size: 20px;">Giỏ hàng<span style="font-size: 15px;" class="glyphicon glyphicon-option-vertical"></span> </span>
            	<span style="font-size: 25px;" class="glyphicon glyphicon-shopping-cart"></span>
            	<span id="num-cart">
            		<?php $totalMoney = 0; ?>
            		<?php if (isset($_SESSION['cart'])): ?>
            			<?php echo count($_SESSION['cart']); ?>
            			<?php foreach ($_SESSION['cart'] as $k => $cart): ?>
            				<?php $totalMoney += $cart['price'] * $cart['qty'];?>
            			<?php endforeach ?>
            		<?php else: ?>
            			0
            		<?php endif ?>
            	</span>
            </a>
            <a id="total-money">
            	<span style="font-size: 17px;">Tổng tiền:
            		<?php echo number_format($totalMoney); ?>
            	</span>
            </a>
          </ul>
      </div>
    </nav>