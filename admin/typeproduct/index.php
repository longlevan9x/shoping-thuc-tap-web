
<section>
	<?php
		$c = isset($_GET['c']) ? $_GET['c'] : 'index';
		switch ($c) {
			case 'add':
				add();
				break;
			case 'edit':
				edit();
				break;
			case 'delete':
				delete();
				break;
			case 'update':
				update();
				break;
			case 'index':
				view();
				break;
			default:
				view();
				break;
		}
	 ?>

	 <?php
	 	function add()
	 	{
	 		require_once 'add_v.php';
	 	}
	 	function view()
	 	{
	 		$type = new Action();
 			$data = $type->get_all_data('product_type');
	 		require_once 'view_v.php';
	 	}


	 	function edit()
	 	{
	 		$id = isset($_GET['id']) ? $_GET['id']: 0;
	 		$type = new Action();
 			$data = $type->get_all_data_by_id('product_type',['id_type' => $id]);
 			$mess2 = '';
	 		require_once 'edit_v.php';
	 	}
	 	function update()
	 	{
	 		$id     = isset($_POST['id'])     ? $_POST['id']     : 0;
	 		$status = isset($_POST['status']) ? $_POST['status'] : 0;
	 		$type = new Action();
 			$data = $type->get_all_data_by_id('product_type',['id' => $id]);
 			$mess2 = '';
 			if (!empty($data)) {
	 			$type1 = new Action();
	 			$updateS = $type1->update_info('product_type',['status_type' => $status],['id_type' => $id]);
	 			if ($updateS) {
	 				$mess2 = 'ok';
	 			}
	 			else{
	 				$mess2 = 'fail';
	 			}
 			}
 			else
 			{
	 			$mess2 = 'err';
 			}
 			echo $mess2;
	 	}

	 	function delete()
	 	{
	 		$id = isset($_GET['id']) ? $_GET['id']: 0;
	 		$type = new Action();
 			$data = $type->get_all_data_by_id('product_type',['id_type' => $id]);
 			$mess2 = '';
 			if (!empty($data)) {
	 			$type1 = new Action();
	 			$del = $type1->delete_info('product_type',['id_type' => $id]);
	 			if ($del) {
	 				echo '<script type="text/javascript" charset="utf-8" async defer>alert("Xóa thành công");</script>';
	 				echo "<script>windown.loacation.reload(true);</script>";
	 			}
 			}
 			else
 			{
	 			$mess2 = 'Không tồn tại id';
 			}
 			require_once 'view_v.php';
	 	}
	  ?>
</section>

