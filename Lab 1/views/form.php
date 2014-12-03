<? 
//form view
?>
    <div class="container">
		<div class="row">
		    <div class="com-md-12">
				<div class="notification login-alert">Oops! Please enter all form fields!</div>
				<div class="notification notification-success logged-out">You logged out successfully!</div>
			    <div class="well welcome-text">Hello, to access the app please <button class="btn btn-default btn-login">Create an Account</button> or <button class="btn btn-default btn-register" disabled="disabled">Login</button></div>
			</div>
		</div>	
	</div> <!-- /container -->
	
	<div class="container">
	    <div class="row">
	        <div class="col-md-12">
	            <div class="well login-box">
	                <form id="registerForm" action="index.php?action=registerAction" method="POST">
	                    <legend>Account Registration</legend>
	                    <div class="section">
		                    <div class="form-group">
		                        <label for="tf_firstname">First Name</label>
		                        <input value='' id="tf_firstname" name="tf_firstname" placeholder="First Name" type="text" class="form-control" />
		                    </div>
		                    
		                    <div class="form-group">
		                        <label for="tf_lastname">Last Name</label>
		                        <input value='' id="tf_lastname" name="tf_lastname" placeholder="Last Name" type="text" class="form-control" />
		                    </div>
		                    
		                    <div class="form-group">
		                        <label for="tf_email">Email</label>
		                        <input value='' id="tf_email" name="tf_email" placeholder="Email" type="email" class="form-control" />
		                    </div>
		                    
		                    <div class="form-group">
		                        <label for="tf_password">Password</label>
		                        <input value='' id="tf_password" name="tf_password" placeholder="Password" type="password" class="form-control" />
		                    </div>
		                    
		                    <div class="form-group">
		                        <label for="tf_website">Website</label>
		                        <input value='' id="tf_website" name="tf_website" placeholder="http://www..." type="url" class="form-control" />
		                    </div>
	                    </div>
	                    
	                    <div class="section">
	                    <div class="form-group">
	                        <label for="tf_address">Address</label>
	                        <input value='' id="tf_address" name="tf_address" placeholder="Line 1" type="text" class="form-control" />
	                    </div>
	                    
	                    <div class="form-group">
	                        <label for="tf_city">City</label>
	                        <input value='' id="tf_city" name="tf_city" placeholder="City" type="text" class="form-control" />
	                    </div>
	                    
	                    <div class="form-group">
	                        <label for="select_state">State</label>
	                        <select class="form-control" id="select_state" name="select_state">
								<option value="AL">Alabama</option>
								<option value="AK">Alaska</option>
								<option value="AZ">Arizona</option>
								<option value="AR">Arkansas</option>
								<option value="CA">California</option>
								<option value="CO">Colorado</option>
								<option value="CT">Connecticut</option>
								<option value="DE">Delaware</option>
								<option value="DC">District Of Columbia</option>
								<option value="FL">Florida</option>
								<option value="GA">Georgia</option>
								<option value="HI">Hawaii</option>
								<option value="ID">Idaho</option>
								<option value="IL">Illinois</option>
								<option value="IN">Indiana</option>
								<option value="IA">Iowa</option>
								<option value="KS">Kansas</option>
								<option value="KY">Kentucky</option>
								<option value="LA">Louisiana</option>
								<option value="ME">Maine</option>
								<option value="MD">Maryland</option>
								<option value="MA">Massachusetts</option>
								<option value="MI">Michigan</option>
								<option value="MN">Minnesota</option>
								<option value="MS">Mississippi</option>
								<option value="MO">Missouri</option>
								<option value="MT">Montana</option>
								<option value="NE">Nebraska</option>
								<option value="NV">Nevada</option>
								<option value="NH">New Hampshire</option>
								<option value="NJ">New Jersey</option>
								<option value="NM">New Mexico</option>
								<option value="NY">New York</option>
								<option value="NC">North Carolina</option>
								<option value="ND">North Dakota</option>
								<option value="OH">Ohio</option>
								<option value="OK">Oklahoma</option>
								<option value="OR">Oregon</option>
								<option value="PA">Pennsylvania</option>
								<option value="RI">Rhode Island</option>
								<option value="SC">South Carolina</option>
								<option value="SD">South Dakota</option>
								<option value="TN">Tennessee</option>
								<option value="TX">Texas</option>
								<option value="UT">Utah</option>
								<option value="VT">Vermont</option>
								<option value="VA">Virginia</option>
								<option value="WA">Washington</option>
								<option value="WV">West Virginia</option>
								<option value="WI">Wisconsin</option>
								<option value="WY">Wyoming</option>
							</select>
	                    </div>
	                    
	                    <div class="form-group">
	                        <label for="tf_zip">Zip</label>
	                        <input value='' id="tf_zip" name="tf_zip" placeholder="Zip Code" type="text" class="form-control" />
	                    </div>
	                    
	                    <div class="form-group">
		                        <label for="tf_phone">Phone</label>
		                        <input value='' id="tf_phone" name="tf_phone" placeholder="(999) 999-9999" type="text" class="form-control" />
		                    </div>
	                    
	                    <div class="form-group text-right">
	                        <button class="btn btn-danger btn-cancel-action">Cancel</button>
	                        <input type="submit" class="btn btn-success btn-login-submit" value="Login" />
	                    </div>
	                    </div>
	                    
	                    <div class="clear"></div>
	                </form>
	            </div>
	        
				<div class="logged-in well">
	        		<h1>You are logged in! <div class="pull-right"><button class="btn-logout btn btn-danger"><span class="glyphicon glyphicon-off"></span> Logout</button></div></h1>
	        	</div>
	    	</div>
		</div>
	</div>