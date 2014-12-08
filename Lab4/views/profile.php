<?
?>
<div class="container">
	<div class="row">
	    <div class="com-md-12">
			<div class="notification login-alert">Oops! There was an error!</div>
		</div>
	</div>	
</div>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="well profile"> 
				<form id="editProfile" enctype="multipart/form-data" action="?action=update" method="POST">
                    <legend>Edit Username</legend>
	                    <div class="form-group">
	                        <label for="tf_username">Username</label>
	                        <input value="<? echo $data[0]["username"] ?>" id="tf_username" name="tf_username" placeholder="Username" type="text" class="form-control" />
	                    </div>
	                    
	                    <div class="form-group text-left">
		                    <input value="<? echo $data[0]["username"] ?>" id="tf_current_username" name="tf_current_username" type="hidden" />
		                    <input value="<? echo $data[0]["id"] ?>" id="tf_id" name="tf_id" type="hidden" />
						 	<button class="btn btn-danger btn-cancel-edit-action">Cancel</button>
                        	<input type="submit" class="btn btn-success btn-edit-submit" value="Save Changes" />
                    	</div>
                    </div>
                </form>
            </div>
    	</div>
	</div>
</div>