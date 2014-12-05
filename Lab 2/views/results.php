<?
/*
 *	==================================
 *	PROJECT:	SSL - Lab 02
 *	FILE:		views/results.php
 *	AUTHOR: 	Lindsay Roberts
 *	CREATED:	12/01/2014
 *	==================================
 */
?>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="well result-box">
                    <?
	                echo '<legend>View Profile</legend>';
	                echo '<div class="profileDiv">';
	                echo '<p><b>Username:</b> '.$_SESSION['user'].'</p>';
	                echo '<p><b>Encrypted Password:</b> '.$_SESSION['encp'].'</p>';
	                echo '<div class="form-group text-left"><a href="index.php" class="btn btn-success btn-finished">Finished</a></div>';
	                echo '</div>';
	                echo '<div class="imageDiv" style="background: url(\'uploads/'.$_SESSION['file'].'\')"></div>';
	                echo '<div class="clear"></div>';
	                ?>
        	</div>
    	</div>
	</div>
</div>