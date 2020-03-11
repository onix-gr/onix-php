<?php

class Onix {
    private $timeout;
    private $language;

    public function __construct($api_key = '', $api_username = '', $api_password = '', $timeout = 30) {
        $this->api_key = $api_key;
        $this->api_username = $api_username;
        $this->api_password = $api_password;
        $this->timeout = $timeout;
        $this->language = 'en';
    }

    public function createProperty($data = array()) {
        $data = json_encode($data);
        $response = self::request('https://api.onix.gr/v1/'.$this->api_key.'/createProperty', $data);
		return $response;
    }  
	
    public function editProperty($property_id, $data = array()) {
        $data = json_encode($data);
        $response = self::request('https://api.onix.gr/v1/'.$this->api_key.'/editProperty/'.$property_id, $data);
        return $response;
    }
	
    public function deleteProperty($property_id) {
        $response = self::request('https://api.onix.gr/v1/'.$this->api_key.'/deleteProperty/'.$property_id);
        return $response;
    }
	
    public function propertyFields($field=null) {
        if($field)
			$response = self::request('https://api.onix.gr/v1/'.$this->api_key.'/propertyFields/'.$field);
		else
			$response = self::request('https://api.onix.gr/v1/'.$this->api_key.'/propertyFields');
        return $response;
    }
	
    public function getProperties($property_id=null) {
		if($property_id)
			$response = self::request('https://api.onix.gr/v1/'.$this->api_key.'/getProperties/'.$property_id);
		else
			$response = self::request('https://api.onix.gr/v1/'.$this->api_key.'/getProperties');
        return $response;
    }

    public function agencyInfo() {
       $response = self::request('https://api.onix.gr/v1/'.$this->api_key.'/agencyInfo');
        return $response;
    }

    public function reviews() {
       $response = self::request('https://api.onix.gr/v1/'.$this->api_key.'/reviews');
        return $response;
    }

    public function setLang($lang) {
        $this->language = $lang;
    }

    private function request($url, $data=null) {
        $curl = curl_init();

        $headers = array(
			'Content-Type:application/json',
			'Username: '.$this->api_username,
			'Password: '.$this->api_password,
			'Language: '.$this->language
		);

        curl_setopt($curl, CURLOPT_URL, $url);

        // Force continue-100 from server
        curl_setopt($curl, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/40.0.2214.85 Safari/537.36");
        curl_setopt($curl, CURLOPT_POST, 1);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
		if($data)
			curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
        curl_setopt($curl, CURLOPT_FAILONERROR, 0);
		curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 1);
        curl_setopt($curl, CURLOPT_TIMEOUT, $this->timeout);

        $response = json_decode(curl_exec($curl), true);

        if ($response === null) {
            $response = array (
                "error" => 'cURL Error: ' . curl_error($curl)
            );
        }

        curl_close($curl);

        return $response;
    }
}
