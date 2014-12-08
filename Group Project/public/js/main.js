/*
 *	==================================
 *	PROJECT:	SSL - Lab 03
 *	FILE:		public/js/main.js
 *	AUTHOR: 	Lindsay Roberts
 *	CREATED:	12/03/2014
 *	==================================
 */
(function($) {	
/*
	$('.btn-login').click(function(){
	    $(this).parent().fadeOut(function(){
	        $('.login-box').fadeIn();
	    })
	});
	
	$('.btn-register').click(function() {
		$(this).parent().fadeOut(function() {
			$('.register-box').fadeIn();
		})
	});
*/
	$('.go-to-register').click(function() {
		$('#loginForm').fadeOut(function() {
			$('#registerForm').fadeIn();
		});
	});
	
	$('.go-to-login').click(function() {
		$('#registerForm').fadeOut(function() {
			$('#loginForm').fadeIn();
		});
	});
})(jQuery);