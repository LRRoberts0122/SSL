<? 
?>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="well result-box">
                    <?
	                echo '<legend>View Profile</legend>';
	                echo '<p><b>Username:</b> '.$_SESSION['user'].'</p>';
	                echo '<p><b>Encrypted Password:</b> '.$_SESSION['encp'].'</p>';
	                ?>
        	</div>
    	</div>
	</div>
</div>