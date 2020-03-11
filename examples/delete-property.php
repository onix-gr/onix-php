<?php
require_once("../lib/Onix.php");
$onix = new Onix("your-api-key", "api-username", "api-password");
$property_id = 5; //Enter the property's id
$response = $onix->deleteProperty($property_id);
if(!isset($response['error'])){
	if($response['status'] == '200'){
		echo $response['message'];
	}
	else {
		print_r($response);
	}
}