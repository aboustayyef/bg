<?php ;?>

<?php

function clean_input($input){
	if (get_magic_quotes_gpc()){
		$input = stripcslashes($input);
	}
	return mysql_real_escape_string($input);
}

function bg_url($room, $category, $product , $var){
	//outcome: http://localhost/browse.php?room=101&category=201&product=102&var=1
	$the_url = BASE_URL;
	$the_url .= "/browse.php?room=$room";
	if (isset($category) ) {
		$the_url .= "&category=$category";
	}
	if (isset($product) ) {
		$the_url .= "&product=$product";
		if (isset($var) ) {
			$the_url .= "&var=$var";
		} else {
			$the_url .= "&var=1";
		}
	}
	echo $the_url ;
}

function isactive($whichpage){
	global $thispage;
	if ($whichpage == $thispage){
		echo 'class = "active"';
	}
}

function available_variants($product){ 

		//returns an array with the available variants in a products
		
		$query = "Select * FROM Variants WHERE Parent_Product_ID =$product AND Amount_In_Stock > 0";
		$result = mysql_query($query);
		$variants = array();
		while($rows = mysql_fetch_array($result)) {
			$variants[] = substr($rows['Variant_ID'],3,2);
		}
		return $variants;
}

function build_carousel() {
?>

<?php
}


function the_thumbnail ($imgurl, $sizelimit) //
{
	echo '<img src ="'.$imgurl.'" >';
}

function load_stylesheet(){  ?>
<!-- === Stylesheets are being loaded === -->
	<link rel="stylesheet" href="<?php echo BASE_URL ; ?>/css/blueprint/screen.css" type="text/css" media="screen, projection">
	<link rel="stylesheet" href="<?php echo BASE_URL ; ?>/FlexSlider/css/flexslider.css" type="text/css" media="screen, projection">
	<link rel="stylesheet" href="<?php echo BASE_URL ; ?>/css/blueprint/print.css" type="text/css" media="print"> 
	<link href="<?php echo BASE_URL ; ?>/css/dcmegamenu.css" rel="stylesheet" type="text/css" />
	<link rel="stylesheet" type="text/css" href="<?php echo BASE_URL ; ?>/css/bg_style.css?<?php echo time(); ?>" /> <!-- This is where I put all custom stylesheet elements -->
	<!--[if lt IE 8]>
		<link rel="stylesheet" href="<?php echo BASE_URL ; ?>/css/blueprint/ie.css" type="text/css" media="screen, projection">
	<![endif]-->
<?php }

function bg_dbconnect() // connects to database
	{	
		global $link;
		$link=mysql_connect(DB_HOST,DB_USER,DB_PASS);
		if(!$link){die("Could not connect to MySQL");}
		mysql_select_db(DB_NAME,$link) or die ("could not open db".mysql_error());
	}


function room_name($room){ // returns the name of the room

		$query = "SELECT * FROM Rooms WHERE room_id = $room"; $result = mysql_query($query);
		$room_name = mysql_result($result, 0, "room_name");
		return $room_name;
}

function category_name($category) { //returns the name of a category

		$query = "SELECT * FROM Categories WHERE cat_id = $category"; $result = mysql_query($query);
		$category_name = mysql_result($result, 0, "cat_name");
		return $category_name;
}

function product_name($product){ //returns the name of a product

		$query = "SELECT * FROM Products WHERE Prod_ID = $product"; $result = mysql_query($query);
		$product_name = mysql_result($result, 0, "Prod_Name");
		return $product_name ;
}

function display_breadcrumbs($room, $category, $product){
	global $special;
	$breadcrumbs ="<a href =\"".BASE_URL."\">Home</a> >";
	if ($room) 
		{
		$room_name = room_name($room);
		$breadcrumbs = $breadcrumbs.'<a href ="browse.php?room='.$room.'" > '.$room_name.'</a>' ;
		}
	if ($category) 
		{
		$category_name = category_name($category);
		$breadcrumbs = $breadcrumbs.' > '.'<a href ="browse.php?room='.$room.'&category='.$category ;
		if ($special){
			$breadcrumbs = $breadcrumbs.'&special='.$special.'">'.$category_name.'</a>';
		} else {
			$breadcrumbs = $breadcrumbs.'">'.$category_name.'</a>';
		}
		}
	if ($product)
		{
		$product_name = product_name($product);
		$breadcrumbs = $breadcrumbs.' > '.'<a href ="browse.php?room='.$room.'&category='.$category.'&product='.$product.'&var=1">'.$product_name.'</a>' ;
		}

	echo "<p class =\"breadcrumbs\">".$breadcrumbs."</p>";

}

function display_title($room, $category, $product){
	global $thispage;
	$page_title ="";
	if ($room) 
		{
		$room_name = room_name($room);
		}
	if ($category) 
		{
		$category_name = category_name($category);
		}
	if ($product)
		{
		$product_name = product_name($product);
		}

	if ($thispage == "valentine") {
		$page_title = "Valentine's Day Gift Ideas, Blue Gallery Ghana";
		return $page_title;
	}else if (isset($product_name)) {
		$page_title = "$product_name , $category_name, Blue Gallery Ghana";
		return $page_title;
	} else if (isset($category_name)) {
		$page_title = "$category_name, Blue Gallery Ghana";
		return $page_title;
	} else if (isset($room_name)) {
		$page_title = "$room_name, Blue Gallery Ghana";
		return $page_title;
	} else {
		$page_title = "Blue Gallery Home &amp; Office - Contemporary furniture in Ghana";
		return $page_title;
	}

}

function display_headline($room, $category, $product){
	$headline ="";
	if ($room) 
		{
		$room_name = room_name($room);
		}
	if ($category) 
		{
		$category_name = category_name($category);
		}
	if ($product)
		{
		$product_name = product_name($product);
		}

	if (isset($product_name)) {
		$headline = "$product_name";
		return $headline;
	} else if (isset($category_name)) {
		$headline = "$category_name";
		return $headline;
	} else {
		$headline = "$room_name";
		return $headline;
	}

}



function get_random_room_item ($room_id) {


		/*
		******************* Function Reference ***********************************
		*		
		*	To Show a random item in a living room ($room= 101)
		*	
		*	$random_room = get_random_room_item(101); //living room is 101
		*	$random_room_url = $random_room[0]; // outputs l4.php?cat1=101&cat2=...
		*	$random_room_image_url = $random_room[1]; // outputs: images/000000_thumb.jpg
		*	$random_room_name = $random_room[2]; // outputs something like: Red Fabric.
		*
		************************************************************************* 
		*/
		
        $query = "SELECT * FROM Categories WHERE cat_parent_id = $room_id ORDER BY RAND() LIMIT 1";
   		$result = mysql_query($query);
        $category_id = mysql_result($result,0, "cat_id"); // picked a category ID 
         
        $query = "SELECT * FROM Products WHERE Prod_Parent_Category = $category_id ORDER BY RAND() LIMIT 1";
   		$result = mysql_query($query);
   		$prod_id = mysql_result($result, 0, "Prod_ID"); // picked a product ID
   		
   		$query = "SELECT * FROM Variants WHERE Parent_Product_ID = $prod_id";
   		$result = mysql_query($query);
   		$num = mysql_numrows($result);
   		$r = rand(1,$num);
   		$var_id = $prod_id.sprintf("%02d",($r)); //picked a variant
   		$var_name = mysql_result($result, ($r-1),'Variant_Name');
		
		$random_item_URL ='l4.php?room='.$room_id.'&category='.$cat2.'&product='.$prod_id.'&variant='.($r);
		$random_item_image_URL ='images/'.$var_id.'_thumb.jpg';
		$random_item_name = $var_name;
		
		$list = array($random_item_URL , $random_item_image_URL, $random_item_name);
		return $list;
}

function get_random_category_thumbnail ($cat_id) {  // returns a thumbnail URL for category , example:  "images/10401_thumb.jpg"
	
	$query = "SELECT * FROM Products WHERE Prod_Parent_Category =$cat_id ORDER BY RAND() LIMIT 1"; 
	$result = mysql_query($query);
	$product_id = mysql_result($result, 0, "Prod_ID");
	$thumb_url = "images/".$product_id."01_thumb.jpg";
	return $thumb_url;
}

function get_random_set_item ($cat1, $cat2) { 

		/*
		******************* Function Reference ***********************************
		*		
		*	To Show a random item in sofa sets (cat2= 201)
		*	
		*	$random_set = get_random_set_item(201); //sofa sets is 201
		*	$random_set_url = $random_set[0]; // outputs l4.php?cat1=101&cat2=201&...
		*	$random_set_image_url = $random_set[1]; // outputs: images/000000_thumb.jpg
		*	$random_set_name = $random_set[2]; // outputs something like: Red Fabric.
		*
		************************************************************************* 
		*/
		
		        
        $query = 'SELECT * FROM `Products` WHERE `Prod_Parent_Category` ='.$cat2.' ORDER BY RAND() LIMIT 1';
   		$result = mysql_query($query);
   		$prod_id = mysql_result($result, 0, "Prod_ID"); // picked a model from that class (ex: molto)
   		
   		$query = 'Select * FROM `Variants` WHERE `Parent_Product_ID` ='.$prod_id;
   		$result = mysql_query($query);
   		$num = mysql_numrows($result);
   		$r = rand(1,$num);
   		$var_id = $prod_id.sprintf("%02d",($r)); //picked a variant
   		$var_name = mysql_result($result, ($r-1),'Variant_Name');
		
		$random_item_URL ='l4.php?cat1='.$cat1.'&cat2='.$cat2.'&prod='.$prod_id.'&var='.($r);
		$random_item_image_URL ='images/'.$var_id.'_thumb.jpg';
		$random_item_name = $var_name;
		
		$list = array($random_item_URL , $random_item_image_URL, $random_item_name);
		return $list;
}

function display_thumbnails_of_same_category($category, $number_of_items) {
?>
	
	<hr/>
<?php 
	$category_name = category_name($category);

?>
	<h2 class ="page_section"><?php echo "More $category_name" ; ?></h2>
	<div id ="bg_thumbnails" class ="span-24">
<?php		
	$room= $_GET["room"];
	$product= $_GET["product"];

	$query = "SELECT * FROM Products WHERE Prod_Parent_Category = $category AND Soldout IS NULL ORDER BY RAND()";
	$result = mysql_query($query);
	$num = mysql_numrows($result) < $number_of_items ? mysql_numrows($result) : $number_of_items ;
		
	$i=0;
	echo "<ul class = \"thumbnails\">";
	while ($i < $num) {
		
		$prod_id =mysql_result($result, $i, "Prod_ID");
		$prod_name =mysql_result($result, $i, "Prod_Name");
		$prod_description =mysql_result($result, $i, "Prod_Description");
		$first_variant_array = available_variants($prod_id);
		$first_variant = $first_variant_array[0];
		$prod_url = "browse.php?room=$room&category=$category&product=$prod_id&var=$first_variant" ;
		if ($prod_id !== $product) {
		
		?>
			
			<li class ="square_box <?php if (($i+1)%5 ==0){echo "last";} ?>">
			<a href = "<?php echo $prod_url ; ?>">
				<img src ="images/<?php echo $prod_id ; ?><?php echo $first_variant; ?>_thumb.jpg" ><br/>
			<strong class ="product_description"><?php echo $prod_name ; ?></strong>
			</a>
			</li>
			
			<?php

			} 
			// echo '<p>' .
			// $prod_description . '</p>';
			$i++;
		};
?>
</div> <!-- /bg_thumbnails -->
<?php $category_url = "browse.php?room=$room&category=$category" ; ?>
<div class ="even-more span-22 last">
	<a href ="<?php echo $category_url ;?>">Even more <?php echo $category_name ;?> >> </a>
</div>



<?php 
} 

function display_thumbnails_of_same_room($room, $number_of_items){
?>
	<hr/>
<?php 
	$room_name = room_name($room);
?>
	<h2 class ="page_section"><?php echo "More in $room_name"."s" ; ?></h2>
	<div id ="bg_thumbnails" class ="span-24">

				<?php 
			   bg_dbconnect() ;
			
				$room = $_GET["room"];
				$query = 'SELECT * FROM `Categories` WHERE `cat_parent_id` ='.$room;
				$result = mysql_query($query);
				$num = mysql_numrows($result) < $number_of_items ? mysql_numrows($result) : $number_of_items ;
				
				$i =0;
				echo "<ul class =\"thumbnails\">";
				while ($i < $num) {
				
					$cat_id =mysql_result($result, $i, "cat_id");
					$cat_name =mysql_result($result, $i, "cat_name");
					$cat_description =mysql_result($result, $i, "cat_description");
					$cat_special = mysql_result($result,$i,"cat_special");
					$cat_poster = mysql_result($result,$i,"cat_poster");

					if (strlen($cat_special)<1) { // category is normal, proceed
						$random_set = get_random_set_item($room, $cat_id); //sofa set is 201
						$random_set_image_url = $random_set[1]; // outputs: images/000000_thumb.jpg
						$cat_url = "browse.php?room=$room&category=$cat_id" ;
					} else{
						$random_set_image_url = "posters/$cat_poster";
						$cat_url ="browse.php?room=$room&category=$cat_id&special=$cat_special"; 
					}
					?>

						<li class ="square_box <?php if (($i+1)%5 ==0){echo "last";} ?>">
							<a href ="<?php echo $cat_url ;?>">
							<img src ="<?php echo $random_set_image_url ;?>" style ="max-width:165px"><br/>
							<strong class ="product_description"><?php echo $cat_name ; ?></strong>
							</a>
						</li>
					
					<?php
					$i++;
					}
				echo "</div>";
			; ?>
			</ul>
<?php 
}

function display_thumbnails_of_same_collection($collection, $collection_type, $number_of_items) {
?>
	
	<hr/>
	<h2 class ="page_section">
		<?php 
		switch ($collection_type) {
			
			case 'model':
				echo "Also in the $collection collection" ;
				break;

			case 'comes_with':
				echo "This item is sold with with these $collection products:";
				break;			
		}
		 
		?>
	</h2>
	<div id ="bg_thumbnails" class ="span-24">
<?php		

	$query = 'SELECT * FROM `Products` WHERE `Collection_Name` =\''.$collection.'\' ORDER BY Prod_Name';
	$result = mysql_query($query);
	$num = mysql_numrows($result) < $number_of_items ? mysql_numrows($result) : $number_of_items ;
		
	$i=0;
	echo "<ul class = \"thumbnails\">";
	while ($i < $num) {
		$product = $_GET["product"];
		$prod_id =mysql_result($result, $i, "Prod_ID");
		$prod_name =mysql_result($result, $i, "Prod_Name");
		$prod_description =mysql_result($result, $i, "Prod_Description");
		$prod_url = get_product_url($prod_id);
		/*$prod_url = "browse.php?room=$room&category=$category&product=$prod_id&var=1" ;*/
		if ($prod_id !== $product) {
		
		?>
			
			<li class ="square_box <?php if (($i+1)%5 ==0){echo "last";} ?>">
			<a href = "<?php echo $prod_url ; ?>">
				<img src ="images/<?php echo $prod_id ; ?>01_thumb.jpg" ><br/>
			<strong class ="product_description"><?php echo $prod_name ; ?></strong>
			</a>
			</li>
			
			<?php

			} 
			// echo '<p>' .
			// $prod_description . '</p>';
			$i++;
		};
?>
</div> <!-- /bg_thumbnails -->

<?php 
} 

function get_product_url($product) {
 	bg_dbconnect();
 	$query = "SELECT * FROM Products WHERE Prod_ID = $product";
 	$result = mysql_query($query);
 	$category = mysql_result($result, 0, "Prod_Parent_Category");
 	$query2 = "SELECT * FROM Categories WHERE cat_id = $category";
 	$result2 = mysql_query($query2);
 	$room = mysql_result($result2, 0, "cat_parent_id");

 	$url = BASE_URL."/browse.php?room=$room&category=$category&product=$product&var=1";
 	return $url;
}


?>
