<?php
session_start();
require_once '../config/database.php';
$user = new database();
if (isset($_POST['btnSignup'])) {
	$username = isset($_POST['txtUsername']) ? $_POST['txtUsername'] : '';
	$fullname = isset($_POST['txtFullname']) ? $_POST['txtFullname'] : '';
	$password = isset($_POST['txtPassword']) ? $_POST['txtPassword'] : '';
	$repass   = isset($_POST['txtRepass']) ? $_POST['txtRepass'] : '';
	$phone    = isset($_POST['txtPhone']) ? $_POST['txtPhone'] : '';
	$email    = isset($_POST['txtEmail']) ? $_POST['txtEmail'] : '';
	$gender   = isset($_POST['txtGender']) ? $_POST['txtGender'] : '';


	$checkPhone  = "/^[0][9]\d{8}|[0][1]\d{9}$/";
	$errorsphone = (preg_match($checkPhone, $phone) == 0) ? '' : $phone;
	$checkEmail  = filter_var($email,FILTER_VALIDATE_EMAIL);
	$errorsemail = ($checkEmail = TRUE) ? $email : '';
	if (empty($username) || empty($fullname)  || empty($password)  || empty($repass)  || empty($errorsphone)  || empty($errorsemail)) {
		header("Location: ../index.php?action=user&c=signup&mess=empty");
	}
	else{
		if ($password  != $repass) {
			header("Location: ../index.php?action=user&c=signup&mess=failpass");
		}
		else{
			$ckeckuser = $user->getBySql("SELECT * FROM user WHERE username = '$username'");
			if ($checkuser) {
				header("Location: ../index.php?action=user&c=signup&mess=failuser");
			}
			else{
				$user1 = new database();
				$data = [
					'username' => $username,
					'password' => md5($password),
					'fullname' => $fullname,
					'email'    => $email,
					'phone'    => $phone,
					'gender'   => $gender,
					'status'   => 0,
					'created_date' => date('Y-m-d H:i:s'),
				];
				$signupU = $user1->add('user',$data);
				if ($signupU) {
					header("Location: ../index.php?action=user&c=signup&mess=ok");
				}
				else{
					header("Location: ../index.php?action=user&c=signup&mess=err");
				}
			}
		}
	}
}
if (isset($_POST['btnLogin'])) {
	$username = isset($_POST['txtUsername']) ? $_POST['txtUsername'] : '';
	$password = isset($_POST['txtPassword']) ? $_POST['txtPassword'] : '';
	if (empty($username) || empty($password)) {
		header("Location: ../index.php?action=user&c=login&mess=empty");
	}
	else{
		$checklogin = $user->getBySql("SELECT * FROM user WHERE username = '$username' AND password = md5('$password')");
		if (!empty($checklogin)) {
			if (!isset($_SESSION['user']) && empty($_SESSION['user'])) {
				$_SESSION['user']['username'] = $checklogin['username'];
				$_SESSION['user']['email']    = $checklogin['email'];
				$_SESSION['user']['fullname'] = $checklogin['fullname'];
				$_SESSION['user']['phone']    = $checklogin['phone'];
				$_SESSION['user']['id']       = $checklogin['id'];
			}
			header("Location: ../index.php?action=index");
		}
		else{
			header("Location: ../index.php?action=user&c=login&mess=fail");
		}
	}
}
 ?>