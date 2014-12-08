<?
/*
 *	==================================
 *	PROJECT:	SSL - Lab 03
 *	FILE:		views/results.php
 *	AUTHOR: 	Lindsay Roberts
 *	CREATED:	12/03/2014
 *	==================================
 */
?>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="well result-box">
                    <?
	                    if(!$_SESSION['file_error']) {
		                    echo '<legend>View Profile</legend>';
							echo '<p><b>Username:</b> '.$_SESSION['user'].'</p>';
							echo '<p><b>Encrypted Password:</b> '.$_SESSION['encp'].'</p>';
							echo '<img width="265" height="265" style="border-radius: 500%" src="uploads/'.$_SESSION['file'].'" />';
	                    } else {
		                    echo '<div class="alert alert-danger" role="alert"><b>Error!</b> There was a problem uploading the file.</div>';
		                    echo '<div class="form-group text-left"><a href="/ssl/Template/index.php?action=registerForm" class="btn btn-danger btn-finished">Go Back</a></div>';
	                    }
	                ?>
        	</div>
    	</div>
	</div>
</div>