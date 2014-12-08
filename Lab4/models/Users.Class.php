<?
/*
 *	==================================
 *	PROJECT:	SSL - Lab 04
 *	FILE:		models/users.php
 *	AUTHOR: 	Lindsay Roberts
 *	CREATED:	12/05/2014
 *	==================================
 */
class Users {
	
	public function read_user_by_id($id) {
		$user = "root";
        $pass = "root";
        $dbh = new PDO('mysql:host=localhost;dbname=SSL;port=8889', $user, $pass);
        
        $stmt = $dbh->prepare(
	      'SELECT id, username, avatar FROM users WHERE id = :id'  
        );
        
        $stmt->execute(array(":id"=>$id));
        $result = $stmt->fetchAll();
        return $result;
	}
	
	public function read_id_by_username($username) {
		$user = "root";
		$pass = "root";
		
		$dbh = new PDO('mysql:host=localhost;dbname=SSL;port=8889', $user, $pass);
		
		$stmt = $dbh->prepare(
			'SELECT id FROM users WHERE username = :username'
		);
		
		$stmt->execute(array(":username"=>$username));
		$result = $stmt->fetchAll();
		return $result;
	}

    public function read_all_users(){
        $user = "root";
        $pass = "root";
        $dbh = new PDO('mysql:host=localhost;dbname=SSL;port=8889', $user, $pass);
        
        $stmt = $dbh->prepare(
	      'SELECT * FROM users'  
        );
        
        $stmt->execute();
        $result = $stmt->fetchAll();
        return $result;
    }
    
	public function create_user($username, $password, $file) {
		$user = "root";
        $pass = "root";
        $dbh = new PDO('mysql:host=localhost;dbname=SSL;port=8889', $user, $pass);
        
        $stmt = $dbh->prepare(
	      'INSERT INTO users (username, password, avatar) VALUES (:username, :password, :avatar)'  
        );
        
        $stmt->execute(array(":username"=>$username, ":password"=>sha1($password), ":avatar"=>$file));
	}
	
	public function delete_user_by_id($id) {
		$user = "root";
        $pass = "root";
        $dbh = new PDO('mysql:host=localhost;dbname=SSL;port=8889', $user, $pass);
        
        $stmt = $dbh->prepare(
	      'DELETE FROM users WHERE id = :id'
        );
        
        $stmt->execute(array(":id"=>$id));
	}
	
	public function update_user_by_id($id, $username) {
		$user = "root";
		$pass = "root";
		$dbh = new PDO('mysql:host=localhost;dbname=SSL;port=8889', $user, $pass);
		
		$stmt = $dbh->prepare(
			'UPDATE users SET username = :username WHERE id = :id'
		);
		
		$stmt->execute(array(":id"=>$id, ":username" => $username));
	}
}
?>