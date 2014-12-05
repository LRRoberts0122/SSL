/*
 *	==================================
 *	PROJECT:	SSL - Lab 02
 *	FILE:		public/js/main.js
 *	AUTHOR: 	Lindsay Roberts
 *	CREATED:	12/01/2014
 *	==================================
 */
(function($) {
	function varticalCenterStuff() {
		$('.login-box').css('margin-top', "100px");
		$('.welcome-text').css('margin-top', "300px");
		$('.logged-in').css('margin-top', "100px");
	}
	
	$(window).resize(function () {
	    varticalCenterStuff();
	});
	
	varticalCenterStuff();
	
	$('#tf_phone').mask("(999) 999-9999", {placeholder:" "});
	
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
	
	$('.btn-cancel-action').click(function(e){
	    e.preventDefault();
	    $(this).parent().parent().parent().fadeOut(function(){
	        $('.welcome-text').fadeIn();
	    })
	});
	
	$('.btn-login-submit').click(function(e){
		e.preventDefault();
		
		var element = $(this).parent().parent().parent().parent();
		
		var username = $('#tf_username').val();
		var password = $('#tf_password').val();
		var file = $('#tf_file').val();
		
		if(username == '' || password == '' || file == ''){
			$('.notification.login-alert').removeClass('bounceOutRight notification-show animated bounceInRight');
			$('.notification.login-alert').addClass('notification-show animated bounceInRight');
			$('.notification.login-alert').one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function(){
			    setTimeout(function(){
			        $('.notification.login-alert').addClass('animated bounceOutRight');
			    }, 2000);
			});
		}else{
			$('#registerForm').submit();
		}
	});
		
	$('.btn-logout').click(function(){
		$('.logged-in').fadeOut(function(){
			$('.welcome-text').fadeIn();
			$('.notification.logged-out').removeClass('bounceOutRight notification-show animated bounceInRight');
			$('.notification.logged-out').addClass('notification-show animated bounceInRight');
			$('.notification.logged-out').one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function(){
				setTimeout(function(){
				    $('.notification.logged-out').addClass('animated bounceOutRight');
				}, 2000);
			});
		});
	});
})(jQuery);