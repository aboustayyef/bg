CONTACT = {
	init: function(){
			$(document).on('click','#submit',function(){
				/* Remove pending alerts */
				$('.error').remove();

				CONTACT.errors = "";
				if (CONTACT.emailIsValid() && CONTACT.messageIsValid()) {
					CONTACT.sendEmails();
				}else{
					$('.emailform').prepend('<div class="error"><i class ="fa fa-warning"></i> Please check: email could be invalid or message too short</div>');
				}
			});
	},
	emailIsValid: function(){
		if( /(.+)@(.+){2,}\.(.+){2,}/.test($('#email').val()) ) {
			return true;
		} else {
			return false;
		}
	},
	messageIsValid: function(){
		if( /(.+){25,}/.test($('#message').val()) ) {
			return true;
		} else {
			return false;
		}
	},
	sendEmails: function(){
		var formData = {
			key: 'qsdAljkhSDFqepoi3420$98FF#$346adfs34',
			from: $('#email').val(),
			message: $('#message').val(),
			subject: 'Blue Gallery Contact'
		};
		$.ajax({
			url: "mailer.php",
			type: "POST",
			data: formData,
			success: function(data){
				$('#email').val('');
				$('#message').val('');
				$('.emailform').append('<p>'+data+'</p>');
			}
		});

	}
};

$(document).ready(function(){
	CONTACT.init();
});