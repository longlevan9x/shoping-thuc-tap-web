<?php
session_start();
require_once 'action.php';
if (isset($_POST['btnLogin'])) {
	$username = isset($_POST['txtTenTK']) ? $_POST['txtTenTK'] : '';
	$password = isset($_POST['txtMatKhau']) ? $_POST['txtMatKhau'] : '';

	$mess = '';
	if (empty($username) || empty($password)) {
		$mess = "Không được để rỗng";
	}
	else
	{
		$check = new Action();
		$login = $check->getAllDataWhere('admin',['username' => $username,'password' => $password]);
		if ($login) {
			$admin = new Action();
			$dataAdmin = $admin->get_all_data_by_id('admin',['username' => $username]);
			if (!isset($_SESSION['admin'])) {
				$_SESSION['admin']['username'] = $dataAdmin['username'];
				$_SESSION['admin']['fullname'] = $dataAdmin['fullname'];
				$_SESSION['admin']['email']    = $dataAdmin['email'];
				$_SESSION['admin']['phone']    = $dataAdmin['phone'];
				$_SESSION['admin']['status']   = $dataAdmin['status'];
				$_SESSION['admin']['image']    = $dataAdmin['avatar'];
			}
			header("Location: trang_chu.php?mess=ok");
		}
		else{
			header("Location: index.php?mess=fail");
		}
	}
}

$ac = isset($_GET['ac']) ? $_GET['ac'] : '';
switch ($ac) {
	case 'logout':
		logout();
		break;
}

function logout()
{
	if (isset($_SESSION['admin']) && !empty($_SESSION['admin'])) {
		unset($_SESSION['admin']);
		header("Location: index.php");
	}
}
?>