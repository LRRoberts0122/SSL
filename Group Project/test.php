<?
	$content = file_get_contents('http://ipinfo.io/json');
	$encoded = json_decode($content, true);
	
	echo $encoded["city"];
	echo $encoded["region"];
?>