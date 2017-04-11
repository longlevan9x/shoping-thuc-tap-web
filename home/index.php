<?php
$c = isset($_GET['c']) ? $_GET['c'] : 'home';
switch ($c) {
	case 'home':
		require_once 'home_v.php';
		break;
	case 'detail':
		$data = get_data_by_id();
		require_once 'detail_v.php';
		break;
}

function get_all_data_new()
{
	$home = new database();
	$page  = isset($_GET['page1']) ? $_GET['page1'] : 1;
	$limit = 8;
	$start = ($page - 1) * $limit;
	$alldata = $home->getAllBySql("SELECT * FROM product JOIN category ON product.id_category = category.id JOIN product_type ON product_type.id_type = product.id_typeprod ORDER BY create_date DESC");

	$totalRecord = count($alldata);
	$totalPage   = ceil($totalRecord / $limit);
	$home1 = new database();
	$dataByPage = $home1->getAllBySql("SELECT * FROM product JOIN category ON product.id_category = category.id JOIN product_type ON product_type.id_type = product.id_typeprod ORDER BY create_date DESC LIMIT $start,$limit");
	$link = '?action=index&page1=';
	$html = nextPrev($page, $totalPage, $link);
	return ['dataBypage' => $dataByPage, 'page' => $html];
	// print_r($alldata);
}
function get_all_data_view()
{
	$home = new database();
	$alldata = $home->getAllBySql("SELECT * FROM product JOIN category ON product.id_category = category.id JOIN product_type ON product_type.id_type = product.id_typeprod  ORDER BY view DESC");

	$home = new database();
	$page  = isset($_GET['page2']) ? $_GET['page2'] : 1;
	$limit = 8;
	$start = ($page - 1) * $limit;

	$totalRecord = count($alldata);
	$totalPage   = ceil($totalRecord / $limit);
	$home1 = new database();
	$dataByPage = $home1->getAllBySql("SELECT * FROM product JOIN category ON product.id_category = category.id JOIN product_type ON product_type.id_type = product.id_typeprod  ORDER BY view DESC LIMIT $start,$limit");
	$link = '?action=index&page2=';
	$html = nextPrev($page, $totalPage, $link);
	return ['dataBypage' => $dataByPage, 'page' => $html];
	// print_r($alldata);
}

function get_data_by_id()
{
	$id = isset($_GET['id']) ? $_GET['id'] : 0;
	$home = new database();
	$alldata = $home->getBySql("SELECT * FROM product JOIN category ON product.id_category = category.id  JOIN product_type ON product_type.id_type = product.id_typeprod WHERE id_prod = {$id} ORDER BY view DESC");
	return $alldata;
}
 ?>