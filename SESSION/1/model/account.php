<?php 
	class Account{
		private $user_name, $password, $email, $image;

		public function __contructor($user_name, $password, $email, $image){
			$this->user_name = $user_name;
			$this->password = $password;
			$this->email = $email;
		}

		public function get_user_name(){
			return $this->user_name;
		}
		public function get_password(){
			return $this->password;
		}
		public function get_image(){
			return $this->image;
		}
		public function get_email(){
			return $this->email;
		}

		public function set_user_name($value){
			$this->user_name = $value;
		}
		public function set_password($value){
			$this->password = $value;
		}
		public function set_email($value){
			$this->email = $value;
		}
		public function set_image($value){
			$this->image = $value;
		}
	}

	class AccountDB{
		public function __construct(){}
		public static function get_all_account(){
			global $accounts;

			$list_users = array();
			foreach ($accounts as $key => $value) {
				$user = new Account($value['user_name'],$value['password'],$value['email']);
				$user->set_image($value['image']);
				$list_users[] = $user;
			}

			return $list_users;
		}

		public static function check_user($user_name,$password){
			global $accounts;
			$result = false;
			foreach ($accounts as $key =>$value) {
				if ($value['user_name'] == $user_name && $value['password'] == $password){
					$result = true;
					break;
				}
			}
			return $result;
		}
	}

	
 ?>