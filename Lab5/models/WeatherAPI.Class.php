<?
class WeatherAPI {
	public function get_weather_by_zip($zipcode) {
		$result = file_get_contents('http://weather.yahooapis.com/forecastrss?p=' . $zipcode . '&u=f');
		$xml = simplexml_load_string($result);
		
		$xml->registerXPathNamespace('yweather', 'http://xml.weather.yahoo.com/ns/rss/1.0');
		$location = $xml->channel->xpath('yweather:location');
		
		if(!empty($location)){
			foreach($xml->channel->item as $item){
				$current = $item->xpath('yweather:condition');
				$forecast = $item->xpath('yweather:forecast');
				$current = $current[0];
				$data = ["current"=>$current, "location"=>$location, "forecast"=>$forecast];
			}
		} else {
		    $data = 'No results found, please try a different zip code.';
		}
		
		return $data;
	}
}
?>