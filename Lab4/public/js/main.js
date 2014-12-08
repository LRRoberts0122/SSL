/*
 *	==================================
 *	PROJECT:	SSL - Lab 03
 *	FILE:		public/js/main.js
 *	AUTHOR: 	Lindsay Roberts
 *	CREATED:	12/03/2014
 *	==================================
 */
(function($) {
	
	function varticalCenterStuff() {
	    $('.login-box').css('margin-top', "100px");
	    $('.register-box').css('margin-top', "100px");
	    $('.welcome-text').css('margin-top', "300px");
	    $('.logged-in').css('margin-top', "100px");
	    $('.profile').css('margin-top', "100px");
	}
	
	$(window).resize(function () {
	    varticalCenterStuff();
	});
	
	varticalCenterStuff();
	
	$('.welcome-text').fadeIn();
	$('.profile').fadeIn();
	
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
	    });
	});
	
	$('.btn-login-submit').click(function(e) {
		e.preventDefault();
		
		var element = $(this).parent().parent().parent().parent();
		
		var username = $('#loginForm #tf_username').val();
		var password = $('#loginForm #tf_password').val();
		
		if(username == '' || password == '') {
			if(username == '' && password == '') {
				$('.notification.login-alert').html('Please enter your username and password!');
			} else if(username == '') {
				$('.notification.login-alert').html('Please enter your username!');
			} else if(password == '') {
				$('.notification.login-alert').html('Please enter your password!');
			}
			
			$('.notification.login-alert').removeClass('bounceOutRight notification-show animated bounceInRight');
			$('.notification.login-alert').addClass('notification-show animated bounceInRight');
			$('.notification.login-alert').one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function() {
				setTimeout(function() {
					$('.notification.login-alert').addClass('animated bounceOutRight');
				}, 2000);
			});
		} else {
			$(this).parent().parent().parent().fadeOut(function() {
				$('#loginForm').submit();
			});
		}
	});
	
	$('.btn-register-submit').click(function(e){
		e.preventDefault();
		
		var element = $(this).parent().parent().parent().parent();
		
		var username = $('#registerForm #tf_username').val();
		var password = $('#registerForm #tf_password').val();
		var ver_pass = $('#registerForm #tf_verify_password').val();
		var email = $('#registerForm #tf_email').val();
		var file = $('#registerForm #tf_file').val();
		
		if(username == '' || password == '' || ver_pass == ''){
			if(username == '' && password != '' && ver_pass != '') {
				$('.notification.login-alert').html('Please enter your username!');
			} else if(username != '' && password == '' && ver_pass != '') {
				$('.notification.login-alert').html('Please enter your password!');
			} else if(username != '' && password != '' && ver_pass == '') {
				$('.notification.login-alert').html('Please verify your password!');
			} else {
				$('.notification.login-alert').html('Please enter your username and password!');
			}
			
			$('.notification.login-alert').removeClass('bounceOutRight notification-show animated bounceInRight');
			$('.notification.login-alert').addClass('notification-show animated bounceInRight');
			$('.notification.login-alert').one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function(){
				setTimeout(function(){
				    $('.notification.login-alert').addClass('animated bounceOutRight');
				}, 2000);
			});
		} else {
			$.post('./public/api/check_username.php', {un: username}, function(data){
			    if(data.valid) {
				    if(password != ver_pass) {
						$('.notification.login-alert').html('Your passwords don\'t match!');
						$('.notification.login-alert').removeClass('bounceOutRight notification-show animated bounceInRight');
						$('.notification.login-alert').addClass('notification-show animated bounceInRight');
						$('.notification.login-alert').one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function(){
							setTimeout(function(){
							    $('.notification.login-alert').addClass('animated bounceOutRight');
							}, 2000);
						});
					} else {
						$('#registerForm').submit();
					}
			    } else {
				    $('.notification.login-alert').html('This username is taken!');
					$('.notification.login-alert').removeClass('bounceOutRight notification-show animated bounceInRight');
					$('.notification.login-alert').addClass('notification-show animated bounceInRight');
					$('.notification.login-alert').one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function(){
						setTimeout(function(){
						    $('.notification.login-alert').addClass('animated bounceOutRight');
						}, 2000);
					});
			    }
			}, "json");
		}
	});
	
	
	$('.btn-edit-submit').click(function(e){
		e.preventDefault();
				
		var username = $('#editProfile #tf_username').val();
		var current_username = $('#editProfile #tf_current_username').val();
		var uid = $('#editProfile #tf_id').val();
		
		if(username == '') {
			
		} else {
			if(username == current_username) {
				$('.notification.login-alert').html('Please enter a new username!');
			
				$('.notification.login-alert').removeClass('bounceOutRight notification-show animated bounceInRight');
				$('.notification.login-alert').addClass('notification-show animated bounceInRight');
				$('.notification.login-alert').one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function(){
					setTimeout(function(){
					    $('.notification.login-alert').addClass('animated bounceOutRight');
					}, 2000);
				});
			} else {
				$.post('./public/api/check_username.php', {un: username}, function(data){
				    if(data.valid) {
						$('#editProfile').submit();
				    } else {
					    $('.notification.login-alert').html('This username is taken!');
						$('.notification.login-alert').removeClass('bounceOutRight notification-show animated bounceInRight');
						$('.notification.login-alert').addClass('notification-show animated bounceInRight');
						$('.notification.login-alert').one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function(){
							setTimeout(function(){
							    $('.notification.login-alert').addClass('animated bounceOutRight');
							}, 2000);
						});
				    }
				}, "json");
			}
		}
	});
	
	$('.btn-logout').click(function(){
		$('.well').fadeOut();
		$('.logged-in').fadeOut(function(){
			window.location.href = '/ssl/Lab4/?action=logout';
		});
	});
	
	$('.table-link').click(function(e) {
		e.preventDefault();
		
		var link = $(this).attr("href");
		$(this).parent().parent().children().wrapInner('<div style="display:block;" class="table-item" />');
		var count = $('.table-item').length;
		var i = 0;
		
		$('.table-item').slideUp(200, function() {
			i++;
			$(this).parent().parent().remove();
			
			if(i == count) {
				window.location.href = link;
			}
		});
	});
	
	$('.edit-link').click(function(e) {
		e.preventDefault();
		
		var link = $(this).attr("href");
		$('.well').fadeOut(function() {
			window.location.href = link;
		});
	});
	
	$('.btn-cancel-edit-action').click(function(e) {
		e.preventDefault();
	    $(this).parent().parent().parent().fadeOut(function(){
	        window.location.href = "/ssl/Lab4/?action=dashboard";
	    });
	});
})(jQuery);