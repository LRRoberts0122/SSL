<?
/*
 *	==================================
 *	PROJECT:	SSL - Lab 03
 *	FILE:		views/footer.php
 *	AUTHOR: 	Lindsay Roberts
 *	CREATED:	12/03/2014
 *	==================================
 */
?>
	<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
	<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-modal/2.2.5/js/bootstrap-modal.min.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-modal/2.2.5/js/bootstrap-modalmanager.min.js"></script>
	<script src="public/js/main.js"></script>
	
	<?
		if(isset($_GET["action"]) && $_GET["action"] == "edit") {
			$_SESSION["fade_in"] = TRUE;
		}
			
		if(isset($_SESSION["logged_out"]) && $_SESSION["logged_out"]) {
			?>
				<script>
					$('.notification.logged-out').removeClass('bounceOutRight notification-show animated bounceInRight');
					$('.notification.logged-out').addClass('notification-show animated bounceInRight');
					$('.notification.logged-out').one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function(){
						setTimeout(function(){
							$('.notification.logged-out').addClass('animated bounceOutRight');
						}, 2000);
					});
				</script>
			<?
			unset($_SESSION["logged_out"]);
		} else if(isset($_SESSION["login_success"]) && !$_SESSION["login_success"]) {
			?>
				<script>
					$('.notification.login-alert').html('Login failed!');
					$('.notification.login-alert').removeClass('bounceOutRight notification-show animated bounceInRight');
					$('.notification.login-alert').addClass('notification-show animated bounceInRight');
					$('.notification.login-alert').one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function(){
						setTimeout(function(){
						    $('.notification.login-alert').addClass('animated bounceOutRight');
						}, 2000);
					});
				</script>
			<?
		}
		
		if(isset($_SESSION["fade_in"]) && $_SESSION["fade_in"] || !isset($_SESSION["fade_in"])) {
			
			$url = 'http://www.example.com';
			?>
				<script>
					$('.logged-in').fadeIn();
					$('.roster').fadeIn();
					console.log('<?echo $_GET["action"]?>');
				</script>
			<?
		} else {
			?>
				<script>
					$('.logged-in').show();
					$('.roster').show();
				</script>
			<?
		}
	?>
</body>
</html>