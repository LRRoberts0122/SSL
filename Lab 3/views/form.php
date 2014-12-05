<? 
/*
 *	==================================
 *	PROJECT:	SSL - Lab 03
 *	FILE:		views/form.php
 *	AUTHOR: 	Lindsay Roberts
 *	CREATED:	12/03/2014
 *	==================================
 */
?>
<div class="container">
	<div class="row">
	    <div class="com-md-12">
			<div class="notification login-alert">Oops! Please enter all form fields!</div>
			<div class="notification notification-success logged-out">You logged out successfully!</div>
		    <div class="well welcome-text">Hello, to access your profile please <button class="btn btn-default btn-register" disabled="disabled">Create an Account</button> or <button class="btn btn-default btn-login">Login</button></div>
		</div>
	</div>	
</div>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="well register-box">
                <form id="registerForm" enctype="multipart/form-data" action="index.php?action=registerAction" method="POST">
                    <legend>Account Registration</legend>
	                    <div class="form-group">
	                        <label for="tf_username">Username</label>
	                        <input value='' id="tf_username" name="tf_username" placeholder="Username" type="text" class="form-control" />
	                    </div>
	                    
	                    <div class="form-group">
	                        <label for="tf_password">Password</label>
	                        <input value='' id="tf_password" name="tf_password" placeholder="Password" type="password" class="form-control" />
	                    </div>
	                    
	                    <div class="form-group">
		                    <label for="tf_confirm_password">Confirm Password</label>
		                    <input value='' id="tf_confirm_password" name="tf_confirm_password" placeholder="Retype Password" type="password" class="form-control" />
	                    </div>
	                    
	                    <div class="form-group">
	                        <label for="file">Avatar</label>
	                        <input value='' id="file" name="file" placeholder="Select..." type="file" class="form-control" />
	                    </div>
	                    
	                    <div class="form-group text-left">
						 	<button class="btn btn-danger btn-cancel-action">Cancel</button>
                        	<input type="submit" class="btn btn-success btn-register-submit" value="Create My Account" />
                    	</div>
                    </div>
                </form>
            </div>
    	</div>
	</div>
</div>


<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="well login-box">
                <form id="loginForm" action="index.php?action=loginAction" method="POST">
                    <legend>Sign In</legend>
	                    <div class="form-group">
	                        <label for="tf_username">Username</label>
	                        <input value='' id="tf_username" name="tf_username" placeholder="Username" type="text" class="form-control" />
	                    </div>
	                    
	                    <div class="form-group">
	                        <label for="tf_password">Password</label>
	                        <input value='' id="tf_password" name="tf_password" placeholder="Password" type="password" class="form-control" />
	                    </div>
	                    
	                    <div class="form-group text-left">
						 	<button class="btn btn-danger btn-cancel-action">Cancel</button>
                        	<input type="submit" class="btn btn-success btn-login-submit" value="Login" />
                    	</div>
                    </div>
                </form>
            </div>
    	</div>
	</div>
</div>