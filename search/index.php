<?php
$c = isset($_GET['c']) ? $_GET['c'] : 'index';
switch ($c) {
	case 'index':
		index();
		break;

	default:
		# code...
		break;
}

function index($value='')
{
	$prod = new Database();
	$prod1 = new Database();
	$id = isset($_GET['id']) ? $_GET['id'] : 0;
	$page  = isset($_GET['page']) ? $_GET['page'] : 1;
	$limit = 8;
	$start = ($page - 1) * $limit;

	if (!empty($id) && is_numeric($id)) {
		$alldata = $prod->getAllBySql("
				SELECT * FROM product
				JOIN category     ON product.id_category = category.id
				JOIN product_type ON product.id_typeprod = product_type.id_type
				WHERE product.id_category = '$id'
				OR product.id_typeprod    = '$id'
				ORDER BY view DESC");

		$dataByPage = $prod1->getAllBySql("SELECT * FROM product JOIN category ON product.id_category = category.id JOIN product_type ON product.id_typeprod = product_type.id_type WHERE product.id_category = '$id' OR product.id_typeprod = '$id' ORDER BY view DESC LIMIT $start,$limit");

		$link = "?action=search&c=index&id&{$id}&page=";
	}
	else{
		if (isset($_POST['btnSearch'])) {
			$keyword = isset($_POST['txtKeyword']) ? $_POST['txtKeyword'] : '';

			$alldata = $prod->getAllBySql("SELECT * FROM product JOIN category ON product.id_category = category.id JOIN product_type ON product.id_typeprod = product_type.id_type WHERE name_prod LIKE '%$keyword%' OR category.name LIKE '%$keyword%' OR price LIKE '%$keyword%' OR product_type.name_type LIKE '%$keyword%' ORDER BY view DESC");

			$dataByPage = $prod1->getAllBySql("SELECT * FROM product JOIN category ON product.id_category = category.id JOIN product_type ON product.id_typeprod = product_type.id_type WHERE name_prod LIKE '%$keyword%' OR category.name LIKE '%$keyword%' OR price LIKE '%$keyword%' OR product_type.name_type LIKE '%$keyword%' ORDER BY view DESC LIMIT $start,$limit");
			$link = "?action=search&c=index&keyword={$keyword}&page=";
		}
		else{
			$alldata = $prod->getAllBySql("SELECT * FROM product JOIN category ON product.id_category = category.id JOIN product_type ON product.id_typeprod = product_type.id_type ORDER BY view DESC");

			$dataByPage = $prod1->getAllBySql("SELECT * FROM product JOIN category ON product.id_category = category.id JOIN product_type ON product.id_typeprod = product_type.id_type ORDER BY view DESC LIMIT $start,$limit");
			$link = "?action=search&c=index&page=";
		}
	}

	$totalRecord = count($alldata);
	$totalPage   = ceil($totalRecord / $limit);

	$html = nextPrev($page, $totalPage,$link);

	require_once 'index_v.php';
}
 ?>