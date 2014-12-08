<? 
/*
 *	==================================
 *	PROJECT:	SSL - Lab 03
 *	FILE:		models/login.php
 *	AUTHOR: 	Lindsay Roberts
 *	CREATED:	12/03/2014
 *	==================================
 */
class Auth {
    public function check_login($username="", $password=""){
	    $user = "root";
	    $pass = "root";
    	$dbh = new PDO('mysql:host=localhost;dbname=SSL;port=8889', $user, $pass);
    	
    	$stmt = $dbh->prepare(
    		'SELECT id, username, password
    		 FROM users 
    		 WHERE username = :username 
    		 AND password = :password'
    	);
    	
    	$stmt->execute(array(
    		':username'=>$username,
    		':password'=>sha1($password)
    	));
    	
    	$result = $stmt->fetchAll();
    	
    	if($stmt->rowCount() > 0) {
	    	return true;
    	} else {
	    	return false;
    	}
    }
    
    public function logout() {
	    unset($_SESSION['current_user']);
	    unset($_SESSION['login_success']);
	    session_destroy();
	    header("Location: /ssl/Lab4/");
    }
}
?>