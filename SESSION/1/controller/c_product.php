<?php 
	$action = filter_input(INPUT_POST,'action');
		if (empty($action)){
			$action = filter_input(INPUT_GET,'action');
			if (empty($action)){
				$action = 'list_product';
			}
		}
	include ('view/header.php');
	switch ($action) {
			case 'list_product':
				$list_products = ProductDB::get_all_product();
				include('view/products/list_products.php');
				break;
			case 'add_cart':
				$cart =  array();
				$code = filter_input(INPUT_POST,'code');
				$products = ProductDB::get_product_by_code($code);
				$quantity = filter_input(INPUT_POST,'quantity');
				$cart = array('code'=>$code,'name'=>$product['name'],'price'=>$product['price'],'quantity'=>$quantity,'image'=>$product['image'],'total'=>$quantity*$product['price']);

				$_SESSION['my_cart'][] = $cart;
				$list_products = ProductDB::get_all_product();
				include('view/products/list_products.php');
				break;	
			case 'shop_cart':
				if (isset($_SESSION['my_cart'])){
					include ('view/products/shop_cart.php');
				}
				else{
					echo 'No Product.';
				}
				break;	
			default:
				// code...
				break;
		}
	include ('view/footer.php');		
		
 ?>