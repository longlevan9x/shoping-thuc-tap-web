<?php
$c = isset($_GET['c']) ? $_GET['c'] : 'index';
switch ($c) {
	case 'index':
		index();
		break;
}

function index()
{
	$prod = new database();
	require_once 'cart_v.php';
}


?>