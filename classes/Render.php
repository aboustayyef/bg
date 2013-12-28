<?php 
/**
* This class draws complicated items like grids.. etc
*/
class Render
{
	
	public static function draw_grid($items, $poster=NULL){
		
		echo '<ul>';
		$map= "11110111101111011110111101111011110111101111011110111101111011110111101111011110";
		
		if (isset($poster)) { // first two rows are shifted right by two columns
			$map= "110110111101111011110111101111011110111101111011110111101111011110111101111011110";
			echo '<img src = "'.$poster.'" style ="float:left;margin-right:17px">';
		}
		
		foreach ($items as $key => $item) {
			echo '<li class ="square_box';
			if (substr($map, $key,1) == 0) {
				echo ' last';
			}
			echo '">';
			echo '<img src ="',$item['thumb'],'">';
			echo '</li>';
		}
		echo '</ul>';
	
	}

	public static function draw_breadcrumbs($id, $product_or_category){
		#action goes here
	}
}

?>