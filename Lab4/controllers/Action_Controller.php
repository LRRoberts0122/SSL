<?
session_start();

include("models/Views.Class.php");
include("models/Auth.Class.php");
include("models/Users.Class.php");

$views = new Views();
$auth = new Auth();
$users = new Users();


if(!empty($_GET["action"])) {
// If the "action" is specified:
	if($_GET["action"] == "register") {
	// CREATE USER
		$username = $_POST['tf_username'];
		$password = $_POST['tf_password'];
		$file = NULL;
		
		if(isset($_FILES['file']['name']) && !empty($_FILES['file']['name'])) {
			$uploaddir = './uploads/';
			$uploadfile = $uploaddir . basename($_FILES['file']['name']);
			
			if(move_uploaded_file($_FILES['file']['tmp_name'], $uploadfile)) {
				$file = $_FILES['file']['name'];
			}
		} else {
			$file = 'default.jpg';
		}
		
		$users->create_user($username, $password, $file);
		$id = $users->read_id_by_username($username);
		$user = $users->read_user_by_id($id[0]["id"]);
    	
    	$_SESSION["login_success"] = true;
    	$_SESSION["current_user"] = $user[0];
    	
    	header("Location: /ssl/Lab4/?action=dashboard");
	} else if($_GET["action"] == "delete") {
	// DELETE USER
		if($_SESSION["current_user"]["id"] == $_GET["id"]) {
			$users->delete_user_by_id($_GET["id"]);
			$auth->logout();
			header("Location: /ssl/Lab4/");
		} else {
			$users->delete_user_by_id($_GET["id"]);
			$_SESSION["fade_in"] = FALSE;
			header("Location: /ssl/Lab4/?action=dashboard");
		}
	} else if($_GET["action"] == "update") {
	// UPDATE USERNAME
		if(isset($_POST["tf_id"]) && isset($_POST["tf_username"])) {
			$users->update_user_by_id($_POST["tf_id"], $_POST["tf_username"]);
			
			if($_POST["tf_id"] == $_SESSION["current_user"]["id"]) {
				
				$_SESSION["current_user"]["username"] = $_POST["tf_username"];
			}
			
			header("Location: /ssl/Lab4/?action=dashboard");
		} else {
			header("Location: /ssl/Lab4/?action=dashboard");
		}
	} else if($_GET["action"] == "login") {
	// USER LOGIN
		if($auth->check_login($_POST['tf_username'], $_POST['tf_password'])) {
			$id = $users->read_id_by_username($_POST['tf_username']);
			$user = $users->read_user_by_id($id[0]["id"]);
			
			$_SESSION["login_success"] = true;
			$_SESSION["current_user"] = $user[0];
			header("Location: /ssl/Lab4/?action=dashboard");
		} else {
			$_SESSION["login_success"] = false;
			header("Location: /ssl/Lab4/");
		}
	} else if($_GET["action"] == "logout") {
	// USER LOGOUT
		$auth->logout();
	} else if($_GET["action"] == "dashboard") {
	// DISPLAY PROFILE
		if(isset($_SESSION["login_success"])) {
			if(!$_SESSION["login_success"]) {
				header("Location: /ssl/Lab4/");
			} else {
				$data = $users->read_all_users();
				$views->getView("views/header.php");
				$views->getView("views/dashboard.php", $data);
				$views->getView("views/footer.php");
			}
		} else {
			header("Location: /ssl/Lab4/");
		}	
	} else if($_GET["action"] == "edit") {
		if(isset($_SESSION["login_success"])) {
			if(!$_SESSION["login_success"]) {
				header("Location: /ssl/Lab4/");
			} else {
				$_SESSION["fade_in"] = FALSE;
				$data = $users->read_user_by_id($_GET["id"]);
				$views->getView("views/header.php");
				$views->getView("views/edit.php", $data);
				$views->getView("views/footer.php");
			}
		} else {
			header("Location: /ssl/Lab4/");
		}
	} else {
	// INVALID ACTION
		header("Location: /ssl/Lab4/");
	}
} else {
// If the "action" is not specified:	
	if(isset($_SESSION["login_success"])) {
		if($_SESSION["login_success"]) {
			header("Location: /ssl/Lab4/?action=dashboard");
		} else {
			$views->getView("views/header.php");
			$views->getView("views/home.php");
			$views->getView("views/footer.php");
		}
	} else {
		$views->getView("views/header.php");
		$views->getView("views/home.php");
		$views->getView("views/footer.php");
	}
}
?>
