<?php 
	class Product{
		private $code, $name, $decription,$category,$price,$image;

		public function __construct($code, $name, $decription, $category,$price, $image){
			$this->code = $code;
			$this->name = $name;
			$this->category = $category;
			$this->price = $price;
			$this->decription = $decription;

		}

		public function get_code(){
			return $this->code;
		}
		public function get_name(){
			return $this->name;
		}
		public function get_category(){
			return $this->category;
		}
		public function get_price(){
			return $this->price;
		}
		public function get_image(){
			return $this->image;
		}
		public function get_decription(){
			return $this->decription;
		}

		public function set_code($value){
			$this->code = $value;
		}
		public function set_name($value){
			$this->name = $value;
		}
		public function set_category($value){
			$this->category = $value;
		}
		public function set_price($value){
			$this->price = $value;
		}
		public function set_decription($value){
			$this->decription = $value;
		}
		public function set_image($value){
			$this->image = $value;
		}
	}

	class ProductDB{
		public static function get_all_product(){
			global $products;
			$list_products = array();
			foreach ($products as $key => $value) {
				$p = new Product($value['code'],$value['name'],$value['decription'],$value['category'],$value['price'],$value['image']);
				$list_products[] = $p;
			}

			return $list_products;
		}

		public static function get_product_by_code($code){
			global $products;
			foreach ($products as $key => $value){
				if($value['code']== $code){
					$p = $value;
					break;
				}
			}
			// $result = new Product($p['code'],$p['name'],$p['decription'],$p['category'],$p['price'],$p['image']);
			return $p;
		}
	}

	
 ?>