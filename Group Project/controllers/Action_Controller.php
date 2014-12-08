<?
session_start();

include("models/Views.Class.php");
include("models/Auth.Class.php");
include("models/Users.Class.php");
include("models/API.Class.php");

$views = new Views();
$auth = new Auth();
$users = new Users();
$api = new API();

if(!empty($_GET["action"])) {
// If the "action" is specified:
	if($_GET["action"] == "search") {
		//echo $_POST["tf_keyword"];
		$data = NULL;
		
		$data = $api->search_by_keyword($_POST["tf_keyword"]);
		$_SESSION["latest_search"] = $data;
		
		$views->getView("views/header.php");
		$views->getView("views/results.php", $data);
		$views->getView("views/footer.php");
	} else if($_GET["action"] == "login") {
		if($auth->check_login($_POST["tf_username"], $_POST["tf_password"])) {
			$_SESSION["login_success"] = TRUE;
			
			$id = $users->read_id_by_username($_POST["tf_username"]);
			$user = $users->read_user_by_id($id[0]["id"]);
			
			$_SESSION["current_user"] = $user[0];
			
			$views->getView("views/header.php");
			$views->getView("views/results.php", $_SESSION["latest_search"]);
			$views->getView("views/footer.php");
		}
	} else if($_GET["action"] == "register") {
		
		$username = $_POST['tf_username'];
		$password = $_POST['tf_password'];
		
		$users->create_user($username, $password);
		$id = $users->read_id_by_username($username);
		$user = $users->read_user_by_id($id[0]["id"]);
    	
    	$_SESSION["login_success"] = true;
    	$_SESSION["current_user"] = $user[0];
    	
    	$views->getView("views/header.php");
		$views->getView("views/results.php", $_SESSION["latest_search"]);
		$views->getView("views/footer.php");
	} else if($_GET["action"] == "logout") {
		$auth->logout();
	} else {
	// INVALID ACTION
		header("Location: /ssl/Group Project/");
	}
} else {
// If the "action" is not specified:	
	$views->getView("views/header.php");
	$views->getView("views/home.php");
	$views->getView("views/footer.php");
}
?>
