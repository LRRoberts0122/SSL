<?
class API {
	public function search_by_keyword($keyword) {
		$data = array();
		$data["keyword"] = $keyword;
		$data["images"] = array();

		for($i=0; $i<20; $i++) {
			$content = file_get_contents("https://api.instagram.com/v1/users/search?q=".$keyword."&client_id=7f02b064d9b945f6a285684ddee18693");
			$encoded = json_decode($content, true);
			$link = $encoded['data'][$i]['profile_picture'];
			$html = '<a href="' . $link . '"><img src="' . $link . '" /></a>';
			array_push($data["images"], $html);
		}

		return $data;
	}
	
	public function save_keyword($keyword) {
		// Save here
	}
}
?>