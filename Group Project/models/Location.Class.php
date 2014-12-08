<?
class Location {
	public function get_location_by_ip() {
		$content = file_get_contents('http://ipinfo.io/json');
		$encoded = json_decode($content, true);
		
		echo $encoded["city"];
		echo $encoded["region"];
	}
}
?>