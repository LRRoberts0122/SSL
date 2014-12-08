<?
class API {
	public function search_by_keyword($keyword) {
		$data = array();
		
		for($i=0; $i<20; $i++) {
			$content = file_get_contents("https//api.instagram.com/v1/users/search?q=" . $search . "&client_id=7f02b064d9b945f6a285684ddee18693");
			$encoded = json_decode($content, true);
			$link = $encoded['data'][$i]['profile_picture'];
			$html = '<a href="' . $link . '"><img src="' . $link . '" /></a>';
			array_push($data, )
		}
	}
	
	public function save_keyword($keyword) {
		// Save here
	}
}
?>

<?php
/**
 * Created by PhpStorm.
 * User: Chris-PC
 * Date: 12/8/2014
 * Time: 8:05 AM
 */
for($i = 0; $i < 20; $i++) {
    $search = $_GET['keyword'];
    $content = file_get_contents("https://api.instagram.com/v1/users/search?q=".$search."&client_id=7f02b064d9b945f6a285684ddee18693");

$encoded = json_decode($content, true);
    $link = $encoded['data'][$i]['profile_picture'];
    //$link = $encoded['data'][3]['images']['standard_resolution']['url'];

    echo "<a href=".$link."><img src=" . $link . "></a>";
}
//var_dump($encoded['data']);
//var_dump($encoded['data'][0]['link']);

/*
//var_dump($encoded['objects']);

$location_ids = [];

foreach($encoded['objects'] as $data){
    array_push($location_ids, $data["id"]);
}

foreach($location_ids as $id){
    $query = file_get_contents('https://api.locu.com/v1_0/venue/'.$id.'/?api_key=36422c5789f9d5868ad452f4f6f5162a04891f5e');
    $enc = json_decode($query, true);
    $sections = $sections["objects"][0]["menus"][0]["sections"];
    var_dump($sections["objects"][0]["name"][0]);
    break;

    //$sections = $enc["objects"][0]["menus"][0]["sections"];

     foreach($sections as $sec) {

        foreach($sec["subsections"]["contents"] as $item) {
            echo $item;
        }
    } */

?>