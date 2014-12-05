<?
/*
 *	==================================
 *	PROJECT:	SSL - Lab 03
 *	FILE:		views/profile.php
 *	AUTHOR: 	Lindsay Roberts
 *	CREATED:	12/03/2014
 *	==================================
 */
	if(isset($_SESSION["login_success"])) {
		if(!$_SESSION["login_success"]) {
			header("location:/ssl/Day 3/index.php");
		}
	} else {
		header("location:/ssl/Day 3/index.php");
	}
?>
<div class="container">
    <div class="row">
        <div class="col-md-12">
			<div class="logged-in well">
				<? echo '<h1><div class="avatar" style="background-image: url(\'uploads/'.$_SESSION['current_img'].'\')"></div> Welcome, '.$_SESSION['current_user'].'! <div class="pull-right"><button class="btn-logout btn btn-danger"><span class="glyphicon glyphicon-off"></span> Logout</button></div></h1>' ?>
			</div>
        </div>
    </div>
</div>