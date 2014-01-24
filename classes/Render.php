<?php 
/**
* This class draws complicated items like grids.. etc
*/
class Render
{
	
	public static function draw_grid($items, $poster=NULL){
		echo '<ul>';
		
		if (isset($poster)) { // if there's a poster, shift grid by 2x2 to the right
			$map= "110110111101111011110111101111011110111101111011110111101111011110111101111011110";
			echo '<img src = "'.$poster.'" style ="float:left;margin-right:17px">';
		} else {
			$map= "11110111101111011110111101111011110111101111011110111101111011110111101111011110";
		}
		
		foreach ($items as $key => $item) {
			echo '<a href ="'.$item['link'].'" title="'.$item['description'].'">';
			echo '<li class ="square_box';
			if (substr($map, $key,1) == 0) {
				echo ' last';
			}
			echo '">';
			echo '<img src ="',$item['thumb'],'">';
			echo '<h4 class ="productname">'.$item['name'].'</h4>';
			echo '</li>';
			echo '</a>';
		}
		echo '</ul>';
	}

	public static function draw_list($items, $poster=NULL){
		?>
			<div class="poster-sidebar">
				<img src="<?php echo $poster; ?>" alt="">
			</div>
			<div class="list-items">
				<?php 
					echo '<ul class ="items-list">';
					foreach ($items as $key => $item) {
						?>
							<li>
								<div class="item">
									<a href ="<?php echo $item['link']?>"><img src="<?php echo $item['thumb']; ?>"></a>
									<h4 class="productname">
										<a href ="<?php echo $item['link']?>"><?php echo $item['name']?></a>
									</h4>
									<p class="item-description">
										<?php echo $item['description']?>
									</p>							
								</div>
							</li>
						<?php
					}
					echo '</ul>'
				?>
			</div>
		<?php
	}

	public static function draw_navbar(){

		$ids = array(101,102,103,104,105); // list of rooms

		echo '<div id ="navbar-l2">';
		
		echo '<ul class="left-panel">';
		foreach ($ids as $key => $id) {
			// get room detail
			$details = Products::get_category_details($id);
			echo '<li><a href="'.self::make_link('category', $details->cat_id).'">'.$details->cat_name.'</a>';

			// get descendant details
			$results = Products::get_descendants($id);
			echo '<ul class="right-panel">';
			foreach ($results as $key => $result) {
				echo '<li><a href ="'.self::make_link('category', $result->cat_id).'">'.$result->cat_name.'</a></li>';
			}
			echo '</ul>';
		}
		echo '</ul></div>';
	}

	public static function draw_breadcrumbs($kind, $id){
		$breadcrumbs=array();
		
		// first item, the current item, is always the same as $id;
		if ($kind == 'product') {
			$name = Products::get_product_name($id);
		} else {
			$name = Products::get_category_name($id);
		}
		$breadcrumbs[] 	= array(
			'category' 	=> $id,
		 	'link'		=> NULL, // current item is not a link
		 	'name'		=> $name
		 );

		// The first parent category depends on whether child kind is a product or category;
		if ($kind=='product') {
			$id = Products::get_parent('product',$id);
			$breadcrumbs[] 	= array(
				'category' 	=> $id,
			 	'link'		=> self::make_link('category',$id),
			 	'name'		=> Products::get_category_name($id)
			 );
		} else {
			$id = Products::get_parent('category',$id);
			$breadcrumbs[] 	= array(
				'category' 	=> $id,
			 	'link'		=> self::make_link('category',$id),
			 	'name'		=> Products::get_category_name($id)
			 );
		}

		// the rest are always categories, keep looping until id = 0 (home);
		while (1) {
			if ($id == 0) { // we have reached the top
				break;
			}
			$id = Products::get_parent('category',$id);
			$breadcrumbs[] 	= array(
				'category' 	=> $id,
			 	'link'		=> self::make_link('category',$id),
			 	'name'		=> Products::get_category_name($id)
			 );
		}

		// render the actual thing
		$br_html = "";
		$breadcrumbs = array_reverse($breadcrumbs);
		foreach ($breadcrumbs as $key => $crumb) {
			if ($crumb['link']) {
				$br_html .= '<a href ="'.$crumb['link'].'">'.$crumb['name'].'</a> > ';
			}else{
				$br_html .= $crumb['name'];
			}
		}
		return $br_html;

	}

	public static function make_link($kind, $id){
		
		/*This creates links for use throughout the site*/

		// First, Handle exceptions

		// Exception 1: If Category is 0, go to home page
		if ($id == 0) {
			return WEBPATH.'.';
		}

		// Exception 2: If Category is an exception (i.e has a static page) 
		if ($kind == 'category') {
			$details = Products::get_category_details($id);
			if ($details->cat_special) {
				return  WEBPATH.'collection/special/'.$details->cat_special.'.php';
			}
		}

		// If not an exception, handle normally 
		switch ($kind) {
			case 'category':
				$url = WEBPATH.'collection/?cat='.$id;
				return $url;
				break;
			case 'product':
				$url = WEBPATH.'collection/?prod='.$id;
				return $url;
				break;
			default:
				$url = WEBPATH.'collection/?cat='.$id;
				return $url;
				break;
		}
	}
}

?>