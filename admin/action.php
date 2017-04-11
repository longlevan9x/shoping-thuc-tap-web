<?php
/**
*
*/
require_once 'database.php';
require_once 'pagination.php';
$paging = new Pagination();
$baseUrl = $_SERVER['PHP_SELF'];
class action extends Database
{
	function __construct()
	{
		parent::__construct();
	}
	public function add_info($table, $data)
	{
		return $this->add($table, $data);
	}
	public function update_info($table, $data,$where = [])
	{
		return $this->update($table, $data,$where);
	}

	public function delete_info($table, $where = [])
	{
		return $this->delete($table,$where);
	}

	public function check_info($table, $where)
	{
		return $this->getDataByUsername($table, $where);
	}
	public function get_all_info($table)
	{
		return $this->getAllData($table);
	}

	public function get_all_data($table,$where =[])
	{
		return $this->getAllData($table,$where);
	}

	public function get_all_info_by_page($table, $where = [], $baseUrl)
	{
		$data = $this->getAllData($table);
		$page = isset($_GET['page']) ? $_GET['page'] : 1;
		$link = Pagination::createLink($baseUrl, array("page"=>"{page}"));

		$dataPaging = Pagination::paging($link, count($data), $page, 3);
		$dataMilkByPage = $this->getAllDataMilkByPage($table, $where, $dataPaging['limit'], $dataPaging['start']);
		$data = array(
			'paging'   => $dataPaging,
			'dataMilk' => $dataMilkByPage,
		);
		return $data;
	}

	public function get_all_data_milk_by_page($table, $where = [], $baseUrl)
	{
		$dataMilk = $this->getAllDataBy($table, $where);
		$page = isset($_GET['page']) ? $_GET['page'] : 1;
		$link = Pagination::createLink($baseUrl, array("page"=>"{page}"));

		$dataPaging = Pagination::paging($link, count($dataMilk), $page, 5);
		$dataMilkByPage = $this->getAllDataMilkByPage($table, $where, $dataPaging['limit'], $dataPaging['start']);
		$data = array(
			'paging'   => $dataPaging,
			'dataMilk' => $dataMilkByPage,
		);
		return $data;
	}

	public function get_all_data_by($table, $where = [])
	{
		return $this->getAllDataBy($table, $where);
	}

	public function get_all_data_by_id($table,$id = array(), $where =[])
	{
		return $this->getAllDataById($table,$id, $where);
	}

	public function get_all_data_by_search($table,$likeWhere = [], $joinWhere = [], $where = [])
	{
		return $this->getAllDataBySearch($table,$likeWhere, $joinWhere, $where);
	}

}

$category = new action();
if (isset($_POST['btnAdd'])) {
	$name  = isset($_POST['txtName'])  ? $_POST['txtName']  : '';
	$parent = isset($_POST['txtParent']) ? $_POST['txtParent'] : '';
	$status = isset($_POST['txtStatus']) ? $_POST['txtStatus'] : '';

	if (empty($name)) {
		header("Location: trang_chu.php?action=category&c=add&mess1=empty");
	}
	else{
		$info = $category->check_info("category", ['name' => $name]);
		if ($info) {
			header("Location: trang_chu.php?action=category&c=add&mess=err");
		}
		else
		{
			$data = array(
				'name'        => $name,
				'parent'      => $parent,
				'status_cate' => $status,
			);
			$category2 = new action();
			$addInfo = $category2->add_info('category', $data);
			if($addInfo){
				header("Location: trang_chu.php?action=category&c=add&mess=ok");
			}
			else{
				header("Location: trang_chu.php?action=category&c=add&mess=fail");
			}
		}
	}
}
$type = new action();
if (isset($_POST['btnAddType'])) {
	$name  = isset($_POST['txtName'])  ? $_POST['txtName']  : '';
	$status = isset($_POST['txtStatus']) ? $_POST['txtStatus'] : '';

	if (empty($name)) {
		header("Location: trang_chu.php?action=typeproduct&c=add&mess1=empty");
	}
	else{
		$info = $type->check_info("product_type", ['name_type' => $name]);
		if ($info) {
			header("Location: trang_chu.php?action=typeproduct&c=add&mess=err");
		}
		else
		{
			$data = array(
				'name_type'   => $name,
				'status_type' => $status,
			);
			$type2 = new action();
			$addInfo = $type2->add_info('product_type', $data);
			if($addInfo){
				header("Location: trang_chu.php?action=typeproduct&c=add&mess=ok");
			}
			else{
				header("Location: trang_chu.php?action=typeproduct&c=add&mess=fail");
			}
		}
	}
}
$categoryedit = new action();
if (isset($_POST['btnEdit'])) {
	$id = isset($_GET['id']) ? $_GET['id'] : 0;
	$c = new Action();
	$c1 = $c->get_all_data_by_id('category',['id'=>$id]);
	if (!empty($c1)) {
		$name  = isset($_POST['txtName'])  ? $_POST['txtName']  : '';
		$parent = isset($_POST['txtParent']) ? $_POST['txtParent'] : '';
		$status = isset($_POST['txtStatus']) ? $_POST['txtStatus'] : '';

		if (empty($name)) {
			header("Location: trang_chu.php?action=category&c=edit&id={$id}&mess1=empty");
		}
		else{
			$data = array(
				'name'        => $name,
				'parent'      => $parent,
				'status_cate' => $status,
			);
			$category2edit = new action();
			$edit = $category2edit->update_info('category', $data,['id' => $id]);
			if($edit){
				header("Location: trang_chu.php?action=category&c=edit&id={$id}&mess=ok");
			}
			else{
				header("Location: trang_chu.php?action=category&c=edit&id={$id}&mess=fail");
			}
		}
	}
	else{
		header("Location: trang_chu.php?action=category&c=edit&id={$id}&mess=err");
	}
}
if (isset($_POST['btnEditType'])) {
	$id = isset($_GET['id']) ? $_GET['id'] : 0;
	$name  = isset($_POST['txtName'])  ? $_POST['txtName']  : '';
	$status = isset($_POST['txtStatus']) ? $_POST['txtStatus'] : '';

	if (empty($name)) {
		header("Location: trang_chu.php?action=typeproduct&c=edit&id={$id}&mess1=empty");
	}
	else{
		$data = array(
			'name_type'   => $name,
			'status_type' => $status,
		);
		$type2 = new action();
		$edit = $type2->update_info('product_type', $data,['id_type' => $id]);
		if($edit){
			header("Location: trang_chu.php?action=typeproduct&c=edit&id={$id}&mess=ok");
		}
		else{
			header("Location: trang_chu.php?action=typeproduct&c=edit&id={$id}&mess=fail");
		}
	}
}
$product = new action();
if (isset($_POST['btnAddPro'])) {
	$name     = isset($_POST['txtName'])      ? $_POST['txtName']     : '';
	$idCate   = isset($_POST['txtIdCate'])    ? $_POST['txtIdCate']   : '';
	$idType   = isset($_POST['txtIdType'])    ? $_POST['txtIdType']   : '';
	$idCate   = is_numeric($idCate) ? $idCate : 0;
	$price    = isset($_POST['txtPrice'])     ? $_POST['txtPrice']    : '';
	$price    = is_numeric($price) ? $price   : 0;
	$descript = isset($_POST['txtDescript'])  ? $_POST['txtDescript'] : '';
	$content  = isset($_POST['txtContent'])   ? $_POST['txtContent']   : '';
	$status   = isset($_POST['txtStatus'])    ? $_POST['txtStatus']   : '';
	$status   = is_numeric($status) ? $status : 0;
	$image = "";
	if (isset($_FILES['txtFile1'])) {
		if ($_FILES['txtFile1']['error'] == 0) {
			if (!empty($_FILES['txtFile1']['tmp_name'])) {
				$image = $_FILES['txtFile1']['name'];
				$upload = move_uploaded_file($_FILES['txtFile1']['tmp_name'], '../uploads/imgProduct/'.$_FILES['txtFile1']['name']);
			}
		}
	}

	if (empty($name) || empty($idCate) || empty($price) || empty($descript) || empty($image)|| empty($status)) {
		header("Location: trang_chu.php?action=product&c=add&mess1=empty");
	}
	else{
		$info = $product->check_info("product", ['name' => $name]);
		if ($info) {
			header("Location: trang_chu.php?action=product&c=add&mess=err");
		}
		else
		{

			$data = array(
				'name_prod'   => $name,
				'status_prod' => $status,
				'id_category' => $idCate,
				'id_typeprod' => $idType,
				'id_admin' 	  => 0,
				'image'       => $image,
				'price'       => $price,
				'view'        => 0,
				'description' => $descript,
				'content'     => $content,
				'create_date' => date("Y-m-d H:i:s"),
				'update_date' => 0,
			);
			$product2 = new action();
			$addInfo = $product2->add_info('product', $data);
			if($addInfo){
				header("Location: trang_chu.php?action=product&c=add&mess=ok");
			}
			else{
				header("Location: trang_chu.php?action=product&c=add&mess=fail");
			}
		}
	}
}
$product = new action();
if (isset($_POST['btnEditPro'])) {
	$id = isset($_GET['id']) ? $_GET['id'] : 0;
	$p = new Action();
	$p1 = $p->get_all_data_by_id('product',['id_prod'=>$id]);
	if (!empty($p1)) {
		$name     = isset($_POST['txtName'])      ? $_POST['txtName']     : '';
		$idCate   = isset($_POST['txtIdCate'])    ? $_POST['txtIdCate']   : '';
		$idType   = isset($_POST['txtIdType'])    ? $_POST['txtIdType']   : '';
		$idCate   = is_numeric($idCate) ? $idCate : 0;
		$price    = isset($_POST['txtPrice'])     ? $_POST['txtPrice']    : '';
		$price    = is_numeric($price) ? $price   : 0;
		$descript = isset($_POST['txtDescript'])  ? $_POST['txtDescript'] : '';
		$content  = isset($_POST['txtContent'])   ? $_POST['txtContent']   : '';
		$status   = isset($_POST['txtStatus'])    ? $_POST['txtStatus']   : '';
		$status   = is_numeric($status) ? $status : 0;
		$image = "";
		$currentImage = isset($_POST['txtImageCur'])  ? $_POST['txtImageCur'] : '';
		if (isset($_FILES['txtFile1'])) {
			if ($_FILES['txtFile1']['error'] == 0) {
				if (!empty($_FILES['txtFile1']['tmp_name'])) {
					$image = $_FILES['txtFile1']['name'];
					$upload = move_uploaded_file($_FILES['txtFile1']['tmp_name'], '../uploads/imgProduct/'.$_FILES['txtFile1']['name']);
				}
			}
			else{
				$image = $currentImage;
			}
		}

		if (empty($name) || empty($idCate) || empty($price) || empty($descript) || empty($image)|| empty($status)) {
			header("Location: trang_chu.php?action=product&c=edit&id={$id}&mess1=empty");
		}
		else{
			$data = array(
				'name_prod'   => $name,
				'status_prod' => $status,
				'id_category' => $idCate,
				'id_typeprod' => $idType,
				'id_admin' 	  => 0,
				'image'       => $image,
				'price'       => $price,
				'view'        => 0,
				'description' => $descript,
				'content'     => $content,
				'update_date' => date("Y-m-d H:i:s"),
			);
			$product2 = new action();
			$edit = $product2->update_info('product', $data,['id_prod' => $id]);
			if($edit){
				header("Location: trang_chu.php?action=product&c=edit&id={$id}&mess=ok");
			}
			else{
				header("Location: trang_chu.php?action=product&c=edit&id={$id}&mess=fail");
			}
		}
	}
}
 ?>
