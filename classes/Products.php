<?php 

class Products
{
	
	public static function category_exists($id){
		/*	check if category $id exists. */
		$result = DB::getInstance()->get('Categories', array('cat_id','=',$id))->results();
		if (isset($result[0]->cat_name)) {
			return TRUE;
		}else{
			return FALSE;
		}
	}

	public static function category_has_poster($id){
		$result = DB::getInstance()->get('Categories', array('cat_id','=',$id))->results();
		if ((isset($result[0]->cat_poster)) && (!empty($result[0]->cat_poster))) {
			return TRUE;
		}else{
			return FALSE;
		}
	}

	public static function get_category_poster($id){
		if (self::category_has_poster($id)) {
			$result = DB::getInstance()->get('Categories', array('cat_id','=',$id))->results();
			return WEBPATH.'images/posters/'.$result[0]->cat_poster;
		} else {
			return NULL;
		}
	}

	public static function get_room_poster($id){
		$result = DB::getInstance()->get('Rooms', array('room_id','=',$id))->results();
		return WEBPATH.'images/posters/'.$result[0]->room_poster;
	}

	public static function get_category_details($id){
		/*get details of category $id*/
		$connection = DB::getInstance();
		$results = $connection->get('Categories', array('cat_id','=', $id))->results();
		return $results[0];
	}

	public static function get_category_name($id){
		if ($id==0) {
			return 'Home';
		}
		$results = self::get_category_details($id);
		return $results->cat_name;
	}

	public static function product_exists($id){
		$result = DB::getInstance()->get('Products', array('prod_ID','=',$id))->results();
		if (isset($result[0]->Prod_Name)) {
			return TRUE;
		}else{
			return FALSE;
		}
	}

	public static function get_product_details($id){
		/*get details of category $id*/
		$connection = DB::getInstance();
		$results = $connection->get('Products', array('Prod_ID','=', $id))->results();
		return $results[0];
	}

	public static function get_product_name($id){
		if ($id==0) {
			return 'Home';
		}
		$results = self::get_product_details($id);
		return $results->Prod_Name;
	}

	public static function has_subcategories($id){
		/* check if category has subcategories, if not, it is a product */
		$connection = DB::getInstance();
		$results = $connection->get('Categories', array('cat_parent_id', '=', $id))->results();
		if (count($results) > 0) { // has subcategories
			return TRUE;
		} else {
			return FALSE;
		}
	}

	public static function get_descendants($id){
		// First, check for subcategories;
		$connection = DB::getInstance();
		$results = $connection->get('Categories', array('cat_parent_id', '=', $id))->results();
		if (count($results) > 0) { // has subcategories
			return $results;
		} else {
			$results = $connection->get('Products', array('Prod_Parent_Category', '=', $id))->results();
			return $results;
		}
	}


	public static function get_parent($kind, $id){
		$connection = DB::getInstance();
		if ($kind == 'product') { // it's a product, get parent from products table
			$result = $connection->get('Products',array('Prod_ID','=',$id))->results();
			return $result[0]->Prod_Parent_Category;
		} else { // it's a category, get parent from categories table
			$result = $connection->get('Categories',array('cat_id','=',$id))->results();
			return $result[0]->cat_parent_id;
		}
	}	

	public static function get_parent_details($kind, $id){
		$parent_id = self::get_parent($kind,$id);
		return self::get_category_details($parent_id);
	}

	public static function get_random_descendant($id){
		$all_descendants = self::get_descendants($id);
		$howmany = count($all_descendants);
		$random = rand(0, $howmany-1);
		if (isset($all_descendants[$random]->cat_id)) {
			return $all_descendants[$random]->cat_id;
		} else {
			return $all_descendants[$random]->Prod_ID;
		}
	}

	public static function get_all_variants($prod_id){
		$connection = DB::getInstance();
		$results = $connection->get('Variants', array('Parent_Product_ID', '=', $prod_id))->results();
		return $results;
	}

	public static function get_available_variants($product){
		$connection = DB::getInstance();
		$results = $connection->query('SELECT * FROM Variants WHERE Parent_Product_ID ="'.$product.'" AND Amount_In_Stock > 0')->results();
		return $results;
	}

	public static function get_random_variant($prod_id){
		$all_variants = self::get_all_variants($prod_id);
		$howmany = count($all_variants);
		$random = rand(0, $howmany-1);
		return $all_variants[$random]->Variant_ID;
	}


	public static function product_has_stock($product){
		$available_variants = self::get_available_variants($product);
		if (count($available_variants) > 0) {
			return TRUE;
		}else{
			return FALSE;
		}
	}
	public static function get_thumb($kind, $id){ // $kind could be 'product' or 'category';
		
		/* This class takes an id and produces a thumbnail's url. 
		It does so by randomly drilling down the categories untill it arrives at a product*/
		
		// echo 'drilling-down '.$id.' > <br>'; // <- uncomment to debug
		switch ($kind) {
			case 'product':
				# code...
				$variant = self::get_random_variant($id);
				$path = WEBPATH.'images/products/thumbs/'.$variant.'_thumb.jpg';
				return $path;
				break;
			
			case 'category':
				if (self::has_subcategories($id)) {
					return self::get_thumb('category', self::get_random_descendant($id));
				} else {
					return self::get_thumb('product', self::get_random_descendant($id));
				}

				break;
		}
	}

}

?>