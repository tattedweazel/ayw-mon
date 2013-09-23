<?php

class Mapi {

	private $request;

	const API_URL = 'www.allyourweb.net/monitaur/api'; // update this to the target url
	const API_KEY = 'aI31bITjdl90x'; // This needs to be set on a per-account basis

	public function __construct($server, $type, $description, $details){
		$this->buildRequest($server, $type, $description, $details);
		$this->curlCall();
	}

	private function buildRequest($server, $type, $description, $details){
		if (is_array($details) || is_object($details)){
			$details = serialize($details);
		}
		// Set the Query POST parameters
		$query_vals = array(
		    'api_key' => $this::API_KEY,
		    'server' => $server, 
		    'type' => $type, 
		    'description' => $description, 
		    'details' => $details
		);// Generate the POST string
		foreach($query_vals as $key => $value) {
		    $ret .= $key.'='.urlencode($value).'&';
		}// Chop off the trailing ampersand
		$this->request = rtrim($ret, '&');
	}

	private function curlCall(){
		$ch = curl_init($this::API_URL); 
		curl_setopt($ch, CURLOPT_HEADER, 0);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $this->request);
		curl_setopt($ch, CURLINFO_HEADER_OUT, 1);
		$response = curl_exec($ch);
		curl_close ($ch);
	
	}
}
?>
