
<?php require_once 'header.php'; ?>
<?php if (!isset($_SESSION['admin']) || empty($_SESSION['admin'])): ?>
	<?php header("Location: index.php"); ?>
<?php endif ?>
	<section style="min-height: 500px">

	<?php
		$action = isset($_GET['action']) ? $_GET['action'] : 'index';
		switch ($action) {
			case 'category':
				require_once 'category/index.php';
				break;
			case 'product':
				require_once 'product/index.php';
				break;
			case 'typeproduct':
				require_once 'typeproduct/index.php';
				break;
			case 'order':
				require_once 'order/index.php';
				break;
			case 'index':
				index();
				break;
		}
	 ?>


	 <?php
	 	function index()
	 	{
	 		echo '		<div class="col-xs-12 col-sm-12 col-md-offset-2 col-md-8 col-lg-8">
							<img src="../image/admin_1.png" class="text-center" alt="">
						</div>';
	 	}

	 	function getParent($data1,&$newMenu,$selected = 0,$parent = 0, $level = '')
	 	{
			$data = array();
	 		// $data2 = [];
	 		// echo"<pre>";print_r($data_cate);
	 		if (count($data1) > 0) {
		 		foreach ($data1 as $key => $item) {
		 			if ($item['parent'] == $parent) {
			 			$data[] = $item;
			 			unset($data1[$key]);
		 			}
		 		}
	 		}
	 		if ($data) {
	 			$level .=  "-- ";
	 			foreach ($data as $key => $item) {
	 				if ($item['parent'] == 0) {
	 					$level = '';
		 			}
		 			$select = ($item['id'] == $selected) ? 'selected="selected"' : '';
		 			$newMenu[$item['id']] = "<option {$select} value='{$item['id']}'>".$level.$item['name']."</option>"
		 			;
		 			getParent($data1,$newMenu,$selected,$item['id'],$level);
	 			}
	 		}
	 		return $newMenu;
	 	}
	  ?>

	</section>
<?php require_once 'footer.php'; ?>