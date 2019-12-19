<?php 
	$lifetime= 5*24*3600;
	session_set_cookie_params($lifetime,"/");
	session_start();

	include ('model/data.php');
	include('model/account.php');
	include('model/m_product.php');

	$controller = filter_input(INPUT_POST,'controller');
		if (empty($controller)){
			$controller = filter_input(INPUT_GET,'controller');
			if (empty($controller)){
				$controller = 'c_product';
			}
		}

	switch ($controller) {
		case 'c_product':
			include('controller/c_product.php');
			break;
		default:
			// code...
			break;
	}

 ?>