<? 
?>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="well result-box">
                    <?
	                  $a = $data;
	                  
	                  if(
	                  	!isset($data['tf_firstname']) || 
	                  	!isset($data['tf_lastname']) || 
	                  	!isset($data['tf_email']) || 
	                  	!isset($data['tf_password']) ||
	                  	!isset($data['tf_website']) ||
	                  	!isset($data['tf_address']) ||
	                  	!isset($data['tf_city']) ||
	                  	!isset($data['select_state']) ||
	                  	!isset($data['tf_zip']) ||
	                  	!isset($data['tf_phone']) || 
	                  	$data['tf_firstname'] == '' ||
	                  	$data['tf_lastname'] == '' ||
	                  	$data['tf_email'] == '' ||
	                  	$data['tf_password'] == '' ||
	                  	$data['tf_website'] == '' ||
	                  	$data['tf_address'] == '' ||
	                  	$data['tf_city'] == '' ||
	                  	$data['select_state'] == '' ||
	                  	$data['tf_zip'] == '' ||
	                  	$data['tf_phone'] == '') {
		                  	echo '<legend>Account Registration</legend>';
		                  	echo '<div class="alert alert-danger" role="alert"><b>Error!</b> Please correct the following mistakes.</div>';
		                  	echo '<div class="results">';
							
							if(!isset($data['tf_firstname']) || $data['tf_firstname'] == '') {
								echo '<p>Your <u>first name</u> is required.</p>';
							}
							
							if(!isset($data['tf_lastname']) || $data['tf_lastname'] == '') {
								echo '<p>Your <u>last name</u> is required.</p>';
							}
							
							if(!isset($data['tf_email']) || $data['tf_email'] == '') {
								echo '<p>Your <u>email</u> is required.</p>';
							}
							
							if(!isset($data['tf_password']) || $data['tf_password'] == '') {
								echo '<p>Your <u>password</u> is required.</p>';
							}
							
							if(!isset($data['tf_website']) || $data['tf_website'] == '') {
								echo '<p>Your <u>website url</u> is required.</p>';
							}
							
							if(!isset($data['tf_address']) || !isset($data['tf_city']) || !isset($data['select_state']) || !isset($data['tf_zip']) || $data['tf_address'] == '' || $data['tf_city'] == '' || $data['select_state'] == '' || $data['tf_zip'] == '') {
								echo '<p>Your <u>full address</u> is required.</p>';
							}
							
							if(!isset($data['tf_phone']) || $data['tf_phone'] == '') {
								echo '<p>Your <u>phone number</u> is required.</p>';
							}
							
							echo '</div>';
							echo '<div class="form-group text-left"><a href="/ssl/Template/index.php?action=registerForm" class="btn btn-danger btn-finished">Go Back</a></div>';			
	                  } else {
							$password = $data['tf_password'];
							for($i = 0; $i < strlen($password)-3; $i++) {
							  $password[$i] = '*';
							}
							
							echo '<legend>Account Registration</legend>';
							echo '<div class="alert alert-success" role="alert"><b>Success!</b> Your new account has been created!</div>'; 
							echo '<div class="results">';
							echo '<p><b>Name:</b> '.$data['tf_firstname'].' '.$data['tf_lastname'].'</p>';
							echo '<p><b>Email:</b> '.$data['tf_email'].'</p>';
							echo '<p><b>Password:</b> '.$password."</p>";
							echo '<p><b>Website:</b> <a href="'.$data['tf_website'].'">'.$data['tf_website'].'</a></p>';
							echo '<p><b>Address:</b> '.$data['tf_address'].', '.$data['tf_city'].', '.$data['select_state'].' '.$data['tf_zip'].'</p>';
							echo '<p><b>Phone:</b> '.$data['tf_phone'].'</p>';
							echo '</div>';
							echo '<div class="form-group text-left"><a href="index.php" class="btn btn-success btn-finished">Finished</a></div>';
		                    
		                    /* 
							foreach($data as $key) {
								echo "<p>".$key."</p>";
							}
							
							if($data["select_state"] == "FL"){
								echo "<p>You're from the Sunshine State!</p>";
							}else if($data["select_state"] == "NY"){
								echo "<p>You're from the Empire State!</p></br>";
							}
							*/
	                  }
	            
	                ?>
        	</div>
    	</div>
	</div>
</div>