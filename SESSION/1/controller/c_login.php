<?php 
	$action = filter_input(INPUT_POST,'action');
		if (empty($action)){
			$action = filter_input(INPUT_GET,'action');
			if (empty($action)){
				$action = 'form_login';
			}
		}
	
	switch ($action) {
			case 'form_login':
				include ('view/login.php');
				//Get Cookies
				if (isset($_COOKIE['user_name']) && isset($_COOKIE['password'])){
					$user_name = $_COOKIE['user_name'];
					$password = $_COOKIE['password'];
					//Kiem tra cookies neu ton tai va hop le cho vao he thong 
					//Nguoc lai cho form login
					if (AccountDB::check_user($user_name,$password)){
						include ('view/main.php');
					}
					else{
						include('view/login.php');
					}
				}
				

				break;
			case 'check_login':
				$user_name = filter_input(INPUT_POST,'user_name');
				$password = filter_input(INPUT_POST,'password');
				if (AccountDB::check_user($user_name,$password)){

					//Save cookies
					$remember_me= filter_input(INPUT_POST,'remember_me');
					if ($remember_me == 'remember_user'){
						$name ='user_name';
						$value = $user_name;
						setcookie($name,$value,time()+5*24*3600,"/");

						$name ='password';
						$value = $password;
						setcookie($name,$value,time()+5*24*3600,"/");
					}
					include('view/main.php');
				}
				else{
					echo 'error';
					include ('view/login.php');
				}
				break;
			case 'logout':
					$name = 'user_name';
					$value = '';
					setcookie($name,$value,time()-5*24*3600,"/");

					$name = 'password';
					$value = '';
					setcookie($name,$value,time()-5*24*3600,"/");
					include('view/login.php');	
					break;	
			default:
				// code...
				break;
		}		
		
 ?>