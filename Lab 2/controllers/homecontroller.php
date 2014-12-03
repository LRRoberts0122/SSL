<?
// Home Controller
include("models/views.php");
$views = new views();

session_start();
$_SESSION["password"] = $_POST['password'];
// echo md5($_SESSION['password']); 
        
if(!empty($_GET["action"])){

    if($_GET["action"] == "registerForm"){
        $views->getView("views/header.php");
        $views->getView("views/form.php");
        $views->getView("views/footer.php");
    }
    else if($_GET["action"] == "registerAction"){
	    
	    // VALIDATE RESULTS...
        $views->getView("views/header.php");
        
        $username = $_POST['tf_username'];
        $enc_pass = sha1($_POST['tf_password']);
        
		// $folder = "./uploads/";
		// move_uploaded_file($HTTP_POST_FILES['file']['tmp_name'], $folder.$HTTP_POST_FILES['file']['name']);
		
		session_start();
		$_SESSION['user'] = $username;
		$_SESSION['encp'] = $enc_pass;
		// $_SESSION['img'] = ???;
		
		/*
echo '<p>'.$username.'</p>';
		echo '<p>'.$enc_pass.'</p>';
		echo '<img src="'.$uploadfile.'" />';
*/
		
		$views->getView('views/results.php');
        // $data = $_POST;
        
        // $views->getView("views/results.php", $data);
            
    }else{
    $views->getView("views/header.php");
    
    }
    
}else{
	$views->getView("views/header.php");
    $views->getView("views/form.php");
    $views->getView("views/footer.php");
}

?>
