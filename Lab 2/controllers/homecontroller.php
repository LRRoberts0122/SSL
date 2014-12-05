<?
/*
 *	==================================
 *	PROJECT:	SSL - Lab 02
 *	FILE:		controllers/homecontroller.php
 *	AUTHOR: 	Lindsay Roberts
 *	CREATED:	12/01/2014
 *	==================================
 */
 
session_start();

include("models/views.php");
$views = new views();
        
if(!empty($_GET["action"])){

    if($_GET["action"] == "registerForm"){
        $views->getView("views/header.php");
        $views->getView("views/form.php");
        $views->getView("views/footer.php");
    } else if($_GET["action"] == "registerAction"){	    
        $views->getView("views/header.php");
        
        $username = $_POST['tf_username'];
        $enc_pass = sha1($_POST['tf_password']);
        		
		$_SESSION['user'] = $username;
		$_SESSION['encp'] = $enc_pass;
		
		$uploaddir = './uploads/';
		$uploadfile = $uploaddir . basename($_FILES['file']['name']);
		
		if(move_uploaded_file($_FILES['file']['tmp_name'], $uploadfile)) {
			$_SESSION['file'] = $_FILES['file']['name'];
		} else {
			$_SESSION['error'] = "There was an error uploading the file!";
		}
		
		$views->getView('views/results.php');
		$views->getView("views/footer.php");   
    }else{
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
