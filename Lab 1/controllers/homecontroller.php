<?
/*
 *	==================================
 *	PROJECT:	SSL - Lab 01
 *	FILE:		controllers/homecontroller.php
 *	AUTHOR: 	Lindsay Roberts
 *	CREATED:	11/30/2014
 *	==================================
 */
include("models/views.php");
$views = new views();
        
if(!empty($_GET["action"])){
    if($_GET["action"] == "registerForm"){
        $views->getView("views/header.php");
        $views->getView("views/form.php");
        $views->getView("views/footer.php");
    }
    else if($_GET["action"] == "registerAction"){	    
        $views->getView("views/header.php");
        $data = $_POST;
        $views->getView("views/results.php", $data);
        $views->getView("views/footer.php");
    }else{
    $views->getView("views/header.php");
    }
}else{
	$views->getView("views/header.php");
    $views->getView("views/form.php");
    $views->getView("views/footer.php");
}

?>
