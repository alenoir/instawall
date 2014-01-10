<?php

class Instagram {
	public function getPictures() {
		$lien = 'https://api.instagram.com/v1/media/search?lat=48.858844&lng=2.294351&client_id=4626f74ee7fb465cb6ba0790375c34f1';
		
		$curl = curl_init();
		
		curl_setopt($curl, CURLOPT_URL, $lien);
		curl_setopt($curl, CURLOPT_COOKIESESSION, true);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
		
		$return = curl_exec($curl);
		curl_close($curl);
		
		return json_decode($return);
	}	
}

