<div class="container">
    <div class="row">
        <div class="col-md-3">
               <div class="well login-box">
				<form id="loginForm" action="?action=login" method="POST">
                    <legend>Sign In to Save</legend>
	                    <div class="form-group">
	                        <label for="tf_username">Username</label>
	                        <input value='' id="tf_username" name="tf_username" placeholder="Email" type="text" class="form-control" />
	                    </div>
	                    
	                    <div class="form-group">
	                        <label for="tf_password">Password</label>
	                        <input value='' id="tf_password" name="tf_password" placeholder="Password" type="password" class="form-control" />
	                    </div>
	                    
	                    <div class="form-group text-left">
                        	<input type="submit" class="btn btn-success btn-login-submit" value="Login" /> <br /><br />
                        	<p><small>Don't have an account? <a href="#" class="go-to-register">Register</a></small></p>
                    	</div>
                    </div>
                </form>
                
                <form id="registerForm" action="index.php?action=register" method="POST">
                    <legend>Sign In to Save</legend>
	                    <div class="form-group">
	                        <label for="tf_username">Username</label>
	                        <input value='' id="tf_username" name="tf_username" placeholder="Email" type="text" class="form-control" />
	                    </div>
	                    
	                    <div class="form-group">
	                        <label for="tf_password">Password</label>
	                        <input value='' id="tf_password" name="tf_password" placeholder="Password" type="password" class="form-control" />
	                    </div>
	                    
	                    <div class="form-group">
	                        <label for="tf_verify">Verify Password</label>
	                        <input value='' id="tf_verify" name="tf_verify" placeholder="Retype Password" type="password" class="form-control" />
	                    </div>
	                    
	                    <div class="form-group text-left">
                        	<input type="submit" class="btn btn-success btn-register-submit" value="Sign Up!" /> <br /><br />
                        	<p><small>Have an account? <a href="#" class="go-to-login">Login</a></small></p>
                    	</div>
                    </div>
                </form>
            
		        <div class="well results-box">
		            <form id="save-search-form" action="?action=save_search&keyword=<? echo $data["keyword"]; ?>" method="GET">
			            <h2>Results for <? echo $data["keyword"]; ?>
			            <button class="btn btn-normal btn-follow" disabled="disabled"><span class="glyphicon glyphicon-plus"></span> Save Search</button>
			        </form></h2>
		            
		            <hr />
		            
		            <?		        	
						foreach($data["images"] as $key) {
				        	echo $key;
			        	}
			        ?>
		        </div>
            </div>
    	</div>
	</div>
</div>