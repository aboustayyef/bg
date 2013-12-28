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

	public static function get_category_details($id){
		/*get details of category $id*/
		$connection = DB::getInstance();
		$results = $connection->get('Categories', array('cat_id','=', $id))->results();
		return $results[0];
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

	public static function has_subcategories($id){
		/*check if category has subcategories*/
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

	public static function get_random_variant($prod_id){
		$all_variants = self::get_all_variants($prod_id);
		$howmany = count($all_variants);
		$random = rand(0, $howmany-1);
		return $all_variants[$random]->Variant_ID;
	}

	public static function get_thumb($kind, $id){ // $kind could be 'product' or 'category';
		
		/* This class takes an id and produces a thumbnail's url. 
		It does so by randomly drilling down the categories untill it arrives at a product*/
		
		// echo 'drilling-down '.$id.' > <br>'; // <- uncomment to debug
		switch ($kind) {
			case 'product':
				# code...
				$variant_code = self::get_random_variant($id);
				$path = WEBPATH.'images/products/thumbs/'.$variant_code.'_thumb.jpg';
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