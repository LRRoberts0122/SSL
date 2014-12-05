<?
/*
 *	==================================
 *	PROJECT:	SSL - Lab 03
 *	FILE:		controllers/homecontroller.php
 *	AUTHOR: 	Lindsay Roberts
 *	CREATED:	12/03/2014
 *	==================================
 */

session_start();

include("models/views.php");
include("models/login.php");
include("models/register.php");

$views = new views();
$login = new login();
$register = new register();
        
if(!empty($_GET["action"])){

    if($_GET["action"] == "registerForm"){
        $views->getView("views/header.php");
        $views->getView("views/form.php");
        $views->getView("views/footer.php");
    } else if($_GET["action"] == "registerAction"){
	    
        if(isset($_POST['tf_username']) && 
           isset($_POST['tf_password']) &&
           isset($_FILES['file']['name']) && 
           $_POST['tf_username'] != '' &&
           $_POST['tf_password'] != '') {
	        	$uploaddir = './uploads/';
				$uploadfile = $uploaddir . basename($_FILES['file']['name']);
				if(move_uploaded_file($_FILES['file']['tmp_name'], $uploadfile)) {
					$_SESSION['file'] = $_FILES['file']['name'];
				} else {
					$_SESSION['file_error'] = "There was an error uploading the file!";
				}
	        
	        $register->makeUser($_POST['tf_username'], $_POST['tf_password'], $_FILES['file']['name']);
        }
        
        $views->getView('views/header.php');
		$views->getView('views/results.php');
		$views->getView('views/footer.php');
    }else if($_GET["action"] == "loginAction") {
	    if(isset($_POST["tf_username"]) && isset($_POST["tf_password"])) {
		    $r = $login->checkLogin($_POST["tf_username"], $_POST["tf_password"]);
		    
		    if($r) {
			    $views->getView("views/header.php");
				$views->getView("views/profile.php");
				$views->getView("views/footer.php");
		    } else {
				header("Location: /ssl/Lab 3/index.php");
		    }
	    } else {
		    header("Location: /ssl/Day 3/index.php");
	    }
    } else{
    	$views->getView("views/header.php");
		$views->getView("views/form.php");
		$views->getView("views/footer.php");
    }
}else{
	$views->getView("views/header.php");
    $views->getView("views/form.php");
    $views->getView("views/footer.php");
}

?>
