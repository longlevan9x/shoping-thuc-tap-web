
<section>
	<?php
		$c = isset($_GET['c']) ? $_GET['c'] : 'index';
		switch ($c) {
			case 'index':
				view();
				break;
			case 'orderall':
				orderAll();
				break;
			case 'orderone':
				orderOne();
				break;
			default:
				view();
				break;
		}
	 ?>

	 <?php
	 	function view()
	 	{
	 		$customer = new database();
 			$data_customer = $customer->getAllById("customer");
 			$data_order = array();
 			foreach ($data_customer as $k => $vC) {
 				$order = new database();
 				$data_order[$vC['id']] = $order->getAllById("order_prod",['id_customer' => $vC['id'],'status_order' => 1],['product.id_prod' => 'order_prod.id_product']);
 			}
 			// $data_order = $order->get_all_data_by("order_prod",['customer.id' => 'order_prod.id_customer','product.id_prod' => 'order_prod.id_product']);
 			// echo "<pre>";print_r($data);
	 		require_once 'view_v.php';
	 	}



	 	function orderAll()
	 	{
	 		require_once '../action.php';
	 		$idCus = isset($_GET['idcus']) ? $_GET['idcus'] : 0;
	 		$order = new Action();
	 		$orderall = $order->update_info('order_prod',['status_order' => 2],['id_customer' => $idCus]);
	 		if ($orderall) {
	 			header("Location: ../trang_chu.php?action=order&mess=ok");
	 		}
	 		else{
	 			header("Location: ../trang_chu.php?action=order&mess=err");
	 		}
	 	}

	 	function orderOne()
	 	{
	 		require_once '../action.php';
	 		$idCus = isset($_GET['idcus']) ? $_GET['idcus'] : 0;
	 		$idProd = isset($_GET['idcus']) ? $_GET['idcus'] : 0;
	 		$order = new Action();
	 		$orderall = $order->update_info('order_prod',['status_order' => 2],['id_customer' => $idCus]);
	 		if ($orderall) {
	 			header("Location: ../trang_chu.php?action=order&mess=ok");
	 		}
	 		else{
	 			header("Location: ../trang_chu.php?action=order&mess=err");
	 		}
	 	}
	  ?>
</section>

