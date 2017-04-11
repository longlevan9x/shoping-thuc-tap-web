<?php
session_start();
require_once '../config/database.php';
$c = isset($_GET['c']) ? $_GET['c'] : '';

switch ($c) {
	case 'addcart':
		addcart();
		break;
	case 'delete':
		delete();
		break;
	case 'remove':
		remove();
		break;
	case 'update':
		update();
		break;
	case 'order':
		order();
		break;
	case 'plus':
		plus();
		break;
	case 'minus':
		minus();
		break;

	default:
		# code...
		break;
}

function addcart()
{
	$id = isset($_GET['id']) ? $_GET['id'] : 0;

	$prod = new database();
	$alldata = $prod->getBySql("SELECT * FROM product WHERE id_prod = {$id}");
	if (!empty($alldata)) {
		$qty = isset($_POST['txtSoluong']) ? $_POST['txtSoluong'] : 1;
		if (isset($_SESSION['cart'][$id]) && !empty($_SESSION['cart'][$id])) {
			$qty = $_SESSION['cart'][$id]['qty'] += $qty;
		}
		else{
			$_SESSION['cart'][$id]['name']  = $alldata['name_prod'];
			$_SESSION['cart'][$id]['id']    = $id;
			$_SESSION['cart'][$id]['image'] = $alldata['image'];
			$_SESSION['cart'][$id]['price'] = $alldata['price'];
			$_SESSION['cart'][$id]['qty']   = $qty;
			// $_SESSION['cart'][$id]['totalMoney'] = $_SESSION['cart'][$id]['price'] * $_SESSION['cart'][$id]['qty'];
		}
		header("Location: ../index.php?action=cart&c=index");
		// echo "<script>window.location.reload(true);</script>";
	}
}

function update()
{
	$arrQty = isset($_POST['txtSoluong']) ? $_POST['txtSoluong'] : [];
	// print_r($arrQty);die;
	foreach ($_SESSION['cart'] as $k => $c) {
		foreach ($arrQty as $k1 => $qty) {
			if ($c['id'] == $k1 ) {
				$_SESSION['cart'][$c['id']]['qty'] = $qty;
			}
		}
	}
	header("Location: ../index.php?action=cart&c=index");
}
function delete()
{
	$id  = isset($_GET['id']) ? trim($_GET['id']) : 0;
	if (isset($_SESSION['cart'][$id]) && !empty($_SESSION['cart'][$id])) {
		unset($_SESSION['cart'][$id]);
	}
	header("Location: ../index.php?action=cart&c=index");
}
function remove()
{
	if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
		unset($_SESSION['cart']);
	}
	header("Location: ../index.php?action=cart&c=index");
}
function plus()
{
	if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
		$id = isset($_POST['id']) ? $_POST['id'] : 0;
		$_SESSION['cart'][$id]['qty'] += 1;
	}
	$totalMoney = 0;
	foreach ($_SESSION['cart'] as $k => $itemC) {
		$totalMoney += ($itemC['price']*$itemC['qty']);
	}
	echo json_encode(
		[
			'qty'        => $_SESSION['cart'][$id]['qty'],
			'id'         => $id,
			'money'      => number_format($_SESSION['cart'][$id]['price']*$_SESSION['cart'][$id]['qty']),
			'totalMoney' => number_format($totalMoney),
		]);
}
function minus()
{
	if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
		$id = isset($_POST['id']) ? $_POST['id'] : 0;
		$_SESSION['cart'][$id]['qty'] -= 1;
	}
	$totalMoney = 0;
	foreach ($_SESSION['cart'] as $k => $itemC) {
		$totalMoney += ($itemC['price']*$itemC['qty']);
	}
	echo json_encode(
		[
			'qty'        => $_SESSION['cart'][$id]['qty'],
			'id'         => $id,
			'money'      => number_format($_SESSION['cart'][$id]['price']*$_SESSION['cart'][$id]['qty']),
			'totalMoney' => number_format($totalMoney),
		]);
}

function order()
{
	if (isset($_POST['btnOrder'])) {
		if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
			$name = isset($_POST['txtFullname']) ? $_POST['txtFullname'] : '';
			$phone = isset($_POST['txtPhone'])  ? $_POST['txtPhone'] : '';
			$email = isset($_POST['txtEmail'])   ? $_POST['txtEmail'] : '';
			$address = isset($_POST['txtAddress']) ? $_POST['txtAddress'] : '';
			$note = isset($_POST['txtNote'])    ? $_POST['txtNote'] : '';

			$checkPhone = "/^[0][9]\d{8}|[0][1]\d{9}$/";
			$errorsphone = (preg_match($checkPhone, $phone) != 0) ? $phone : '';
			$checkEmail = filter_var($email,FILTER_VALIDATE_EMAIL);
			$errorsemail = ($checkEmail = TRUE) ? $email : '';
			if (empty($name) || empty($errorsemail) || empty($address)|| empty($errorsphone)) {
				header("Location: ../index.php?action=cart&c=index&m=empty");
			}
			else{
				$custom = new database();
				$data = array(
					'fullname' => $name,
					'email' => $email,
					'phone' => $phone,
					'address' => $address,
					'note' => $note,
					'created_date' =>date('Y-m-d H:i:s'),
				);
				$idcus = $custom->addInsetId('customer',$data);
				if (!empty($idcus)) {
					$addorder = FALSE;
					foreach ($_SESSION['cart'] as $key => $c) {
						$order1 = new database();
						$money = $c['qty'] * $c['price'];
						$data = array(
								'id_customer'  => $idcus,
								'money'        => $money,
								'qty'          => $c['qty'],
								'id_product'   => $c['id'],
								'status_order' => 1,
								'created_date' => date('Y-m-d H:i:s'),
								'update_date'  => 0,
							);
						$addorder = $order1->add('order_prod', $data);
					}
					// die;
					if ($addorder) {
						unset($_SESSION['cart']);
						header("Location: ../index.php?action=cart&c=index&m=ok");
					}
					else{
						header("Location: ../index.php?action=cart&c=index&m=err");
					}
				}else{
					header("Location: ../index.php?action=cart&c=index&m=fail");
				}

			}
		}
	}
}
 ?>