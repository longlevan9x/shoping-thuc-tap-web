
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
	 		$category = new Action();
 			$data_cate = $category->get_all_data('category');
	 		$info1 = getParent($data_cate,$newMenu);
	 		require_once 'add_v.php';
	 	}
	 	function view()
	 	{
	 		$category = new Action();
 			$data_cate = $category->get_all_data('category');
	 		require_once 'view_v.php';
	 	}


	 	function edit()
	 	{
	 		$id = isset($_GET['id']) ? $_GET['id']: 0;
	 		$category = new Action();
 			$data_cate = $category->get_all_data_by_id('category',['id' => $id]);
 			$mess2 = '';
 			if (!empty($data_cate)) {
	 			$category1 = new Action();
	 			$data_cate1 = $category1->get_all_data('category');
		 		$info1 = getParent($data_cate1,$newMenu,$data_cate['parent']);
 			}
 			else
 			{
	 			$mess2 = 'Không tồn tại id';
 			}
	 		require_once 'edit_v.php';
	 	}
	 	function update()
	 	{
	 		$id     = isset($_POST['id'])     ? $_POST['id']     : 0;
	 		$status = isset($_POST['status']) ? $_POST['status'] : 0;
	 		$category = new Action();
 			$data_cate = $category->get_all_data_by_id('category',['id' => $id]);
 			$mess2 = '';
 			if (!empty($data_cate)) {
	 			$category1 = new Action();
	 			$updateS = $category1->update_info('category',['status_cate' => $status],['id' => $id]);
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
	 		$category = new Action();
 			$data_cate = $category->get_all_data_by_id('category',['id' => $id]);
 			$mess2 = '';
 			if (!empty($data_cate)) {
	 			$category1 = new Action();
	 			$del = $category1->delete_info('category',['id' => $id]);
	 			if ($del) {
	 				echo '<script type="text/javascript" charset="utf-8" async defer>alert("Xóa thành công");</script>';
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

