BG_PRODUCTS = {
	init: function(){
		$('.thumbs img').on('click',function(){
		
		// get new values
			var id = $(this).data('id');
			var description = $(this).data('description');
			var technical = $(this).data('technical');
			var name = $(this).data('name');
			console.log(technical);
		// substitue present values
		$('.product-pic img').attr('src','../images/products/large/'+ id + '_large.jpg');
		$('h2.product-name').text(name);
		$('p.product-description').text(description);
		$('p.product-technical-details').text(technical);
		})
	}
}

$(window).load(function(){
	BG_PRODUCTS.init();
})