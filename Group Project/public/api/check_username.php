<?
	$user = "root";
    $pass = "root";
	$dbh = new PDO('mysql:host=localhost;dbname=SSL;port=8889', $user, $pass);
	
	$stmt = $dbh->prepare(
		'SELECT username
		 FROM users 
		 WHERE username = :username'
	);
	
	$stmt->execute(array(
		':username'=>$_POST['un']
	));
		
	$result = array('valid' => TRUE);
	
	if($stmt->rowCount() > 0) {
		$result['valid'] = FALSE;
	}
	
	echo json_encode($result, JSON_PRETTY_PRINT);
?>