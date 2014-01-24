BG_PRODUCTS = {
	init: function(){
		$('.thumbs img').on('click',function(){
			$('.thumbs img').css('opacity','1');
			$(this).css('opacity', '0.3');
			// get new values
			var id = $(this).data('id');
			var description = $(this).data('description');
			var technical = $(this).data('technical');
			var name = $(this).data('name');
			console.log(technical);
			// substitue present values
			$('.product-pic img').attr('src','../images/products/large/'+ id + '_large.jpg');
			$('h3.variant-name').text(name);
			$('p.product-description').text(description);
			$('p.product-technical-details').text(technical);
		});
	}
};

$(window).load(function(){
	BG_PRODUCTS.init();
});