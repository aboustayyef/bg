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
		

		// first, handle exception, special categories like light and worksations that don't have pages.

		if ($kind == 'category') {
			$details = Products::get_category_details($id);
			if ($details->cat_special) {
				return  WEBPATH.'images/products/special/'.$details->cat_special.'.jpg';
			}
		}

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

	public static function product_collection($id){
		$connection = DB::getInstance();
		$result = $connection->query('SELECT * FROM Products WHERE Prod_ID = "'.$id.'" AND Collection_Name IS NOT NULL')->results();
		if (count($result)>0) {
			return $result[0];
		}else{
			return NULL;
		}
	}

	public static function get_collection($Collection_Name){
		/* Will return all products that have the collection collection name*/
		$connection = DB::getInstance();
		$products = $connection->query('SELECT * FROM Products WHERE Collection_Name = "'.$Collection_Name.'"')->results();
		return $products;	
	}

	public static function get_product_siblings($id, $howmany=5){
		$dad = self::get_parent('product', $id);

		//$siblings is an array with all products
		$siblings = self::get_descendants($dad);
		
		// clean up to only show products with stock
		$new_siblings = array();
		foreach ($siblings as $key => $sibling) {
			if (self::product_has_stock($sibling->Prod_ID)) {
				$new_siblings[]=$sibling;
			}
		}

		// slice array to return wanted amount only
		$siblings = array_slice($new_siblings, 0, $howmany);
		return $siblings;
	}

	public static function get_related_products($id){
		#code
	}

	public static function get_product_grandpa($productID){
		$grandpaCat = self::get_parent('category',self::get_parent('product',$productID));
		$grandpaName = self::get_category_details($grandpaCat)->cat_name;
		$grandpa = array(
			'category'	=>	$grandpaCat,
			'name'		=>	$grandpaName
			);
		return $grandpa;
	}
	public static function get_uncle_categories($productID, $howmany=5){
		$grandpa = self::get_product_grandpa($productID);
		$grandpaCat = $grandpa['category'];
		$uncles = self::get_descendants($grandpaCat);
		$uncles = array_slice($uncles, 0, $howmany);
		return $uncles;
	}

	public static function convert_to_items($kind, $data){
		/*This function takes raw data as returned by functions here 
		and converts them to the format used by the grid layout,
		IE array items[]['name'] , ['thumb'], ['link'], ['description']*/

		if ($kind == 'category') {
			$type = 'category';
			$thekey = 'cat_id';
			$name = 'cat_name';
			$description= 'cat_description';
		} else {
			$type = 'product';
			$thekey = 'Prod_ID';
			$name = 'Prod_Name';
			$description= 'Prod_Description';
		}

		/* Collect descendent details, to use for rendering */
		$items = array();
		$count = 0;
		foreach ($data as $key => $item) {
			//Skip Products that don't have stock
			if ($kind == 'product') {
				if (!self::product_has_stock($item->$thekey)) {
					//ignore products that don't have stock
					continue;
				}
			}

			$items[$count]['name'] =  $item->$name;
			$items[$count]['thumb'] = self::get_thumb($kind, $item->$thekey);
			$items[$count]['link'] = Render::make_link($kind, $item->$thekey);
			$items[$count]['description'] = $item->$description;
			$count +=1;
		}
		return $items;
	}

}

?>