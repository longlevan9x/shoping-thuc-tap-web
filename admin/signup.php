<?php

require_once 'action.php';
if (isset($_POST['btnSignup'])) {
	$username = isset($_POST['txtTenTK']) ? $_POST['txtTenTK'] : '';
	$fullname = isset($_POST['txtTenHT']) ? $_POST['txtTenHT'] : '';
	$password = isset($_POST['txtMatKhau']) ? $_POST['txtMatKhau'] : '';
	$repass   = isset($_POST['txtMKnhaplai']) ? $_POST['txtMKnhaplai'] : '';
	$gender   = isset($_POST['txtGioiTinh']) ? $_POST['txtGioiTinh'] : '';
	$phone    = isset($_POST['txtSDT']) ? $_POST['txtSDT'] : '';
	$email    = isset($_POST['txtEmail']) ? $_POST['txtEmail'] : '';

	$mess = '';
	if (empty($username) || empty($fullname) || empty($password) || empty($repass) || empty($gender) || empty($phone) || empty($email)) {
		$mess = "Không được để rỗng";
	}
	else
	{
		$data = array(
			'username' => $username,
			'fullname' => $fullname,
			'password' => $repass,
			'gender'   => $gender,
			'phone'    => $phone,
			'email'    => $email,
			'created_date' => date("Y-m-d H:i:s"),
			'update_date'  => 0,
		);
		$check = new Action();
		$num = $check->check_info('admin',['username' => $username]);
		if ($num == FALSE) {
			$signup = new Action();
			$dangky = $signup->add_info('admin',$data);
			if ($dangky) {
				header("Location: index.php?mess=ok");
			}
			else{
				header("Location: dang_ky.php?mess=fail");
			}
		}
		else{
			$mess = "Tên tài khoản đã tồn tại";
		}
	}
}
 ?>