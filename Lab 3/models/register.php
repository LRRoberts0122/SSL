<?
/*
 *	==================================
 *	PROJECT:	SSL - Lab 03
 *	FILE:		models/register.php
 *	AUTHOR: 	Lindsay Roberts
 *	CREATED:	12/03/2014
 *	==================================
 */
class register{

    public function makeUser($username, $password, $file){
        $user = "root";
        $pass = "root";
        $dbh = new PDO('mysql:host=localhost;dbname=SSL;port=8889', $user, $pass);
        
        $stmt = $dbh->prepare(
	      'INSERT INTO users (username, password, avatar)
	       VALUES (:username, :password, :avatar)'  
        );
        
        if($stmt->execute(array(
	        ':username'=>$username,
	        ':password'=>sha1($password),
	        ':avatar'=>$file
        ))) {
	        return true;
        } else {
	        return false;
        }
    }
}
?>