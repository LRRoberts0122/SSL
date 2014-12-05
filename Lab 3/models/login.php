<? 
/*
 *	==================================
 *	PROJECT:	SSL - Lab 03
 *	FILE:		models/login.php
 *	AUTHOR: 	Lindsay Roberts
 *	CREATED:	12/03/2014
 *	==================================
 */
class login{
    public function checkLogin($username="", $password=""){
	    $user = "root";
	    $pass = "root";
    	$dbh = new PDO('mysql:host=localhost;dbname=SSL;port=8889', $user, $pass);
    	
    	$stmt = $dbh->prepare(
    		'SELECT id, username, password, avatar
    		 FROM users 
    		 WHERE username = :username 
    		 AND password = :password'
    	);
    						   
    	// $stmt->bindParam(':username', $username);
    	// $stmt->bindParam(':password', $password);
    	
    	$stmt->execute(array(
    		':username'=>$username,
    		':password'=>sha1($password)
    	));
    	
    	$result = $stmt->fetchAll();
    	
    	if($stmt->rowCount() > 0) {
	    	$_SESSION['current_user_id'] = $result[0]['id'];
	    	$_SESSION['current_user'] = $result[0]['username'];
	    	
	    	if($result[0]['avatar'] == '' || $result[0]['avatar'] == NULL) {
		    	$_SESSION['current_img'] = 'default.jpg';
	    	} else {
		    	$_SESSION['current_img'] = $result[0]['avatar'];
	    	}
	    	$_SESSION['login_success'] = true;
	    	return true;
    	} else {
	    	$_SESSION["login_success"] = false;
	    	return false;
    	}
    }
}
?>