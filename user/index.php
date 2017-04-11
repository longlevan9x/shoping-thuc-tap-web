<?php
$c = isset($_GET['c']) ? $_GET['c'] : 'login';
switch ($c) {
	case 'login':
		require_once 'login.php';
		break;
	case 'signup':
		require_once 'signup.php';
		break;
	case 'logout':
		require_once 'logout.php';
		break;
}

 ?>