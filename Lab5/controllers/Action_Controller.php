<?
session_start();

include("models/Views.Class.php");
include("models/WeatherAPI.Class.php");

$views = new Views();
$api = new WeatherAPI();


if(!empty($_GET["action"])) {
// If the "action" is specified:
	if($_GET["action"] == "lookup") {
		if(isset($_POST['tf_zip']) && $_POST['tf_zip'] != ''){
		    $zipcode = $_POST['tf_zip'];
		}else{
		    $zipcode = '32792';
		}
		
		$data = $api->get_weather_by_zip($zipcode);
		$views->getView("views/header.php");
		$views->getView("views/weather.php", $data);
		$views->getView("views/footer.php");
	} else {
	// INVALID ACTION
		header("Location: /ssl/Lab5/");
	}
} else {
// If the "action" is not specified:	
	$views->getView("views/header.php");
	$views->getView("views/home.php");
	$views->getView("views/footer.php");
}
?>
