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
	
	// awesomeness
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
	    $(this).parent().parent().parent().parent().fadeOut(function(){
	        $('.welcome-text').fadeIn();
	    })
	});
	
	$('.btn-login-submit').click(function(e){
	  e.preventDefault();
	 
	  var element = $(this).parent().parent().parent().parent();
	  
	  var fname = $('#tf_firstname').val();
	  var lname = $('#tf_lastname').val();
	  var email = $('#tf_email').val();
	  var password = $('#tf_password').val();
	  var website = $('#tf_website').val();
	  
	  var address = $('#tf_address').val();
	  var city = $('#tf_city').val();
	  var state = $('#select_state').val();
	  var zip = $('#tf_zip').val();
	  var phone = $('#tf_phone').val();
	  
	  console.log("First Name:", fname);
	  console.log("Last Name:", lname);
	  console.log("Email:", email);
	  console.log("Password:", password);
	  console.log("Website:", website);
	  console.log("Address:", address, city, state, zip);
	  console.log("Phone:", phone);
	  
	  if(fname == '' || lname == '' || email == '' || password == '' || website == '' || address == '' || city == '' || state == '' || zip == '' || phone == ''){
	    // Notification
	    // reset
	    $('.notification.login-alert').removeClass('bounceOutRight notification-show animated bounceInRight');
	    // show notification
	    $('.notification.login-alert').addClass('notification-show animated bounceInRight');
	    
	    $('.notification.login-alert').one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function(){
	        setTimeout(function(){
	            $('.notification.login-alert').addClass('animated bounceOutRight');
	        }, 2000);
	    });
	  }else{
		$('#registerForm').submit();
		// $(element).fadeOut(function(){
			
			// $('.logged-in').fadeIn();
	    //});
	  }//endif
	});
	
	
	$('.btn-logout').click(function(){
	   $('.logged-in').fadeOut(function(){
	     $('.welcome-text').fadeIn();
	     // Notification
	     $('.notification.logged-out').removeClass('bounceOutRight notification-show animated bounceInRight');
	    // show notification
	    $('.notification.logged-out').addClass('notification-show animated bounceInRight');
	    
	    $('.notification.logged-out').one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function(){
	        setTimeout(function(){
	            $('.notification.logged-out').addClass('animated bounceOutRight');
	        }, 2000);
	    });
	     
	   });
	});
})(jQuery);