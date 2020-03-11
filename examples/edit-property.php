<?php
require_once("../lib/Onix.php");
$onix = new Onix("your-api-key", "api-username", "api-password");
$property_id = 5; //Enter the property's id
$data = array(
	"size" => 55
);
$response = $onix->editProperty($property_id, $data);
if(!isset($response['error'])){
	if($response['status'] == '200'){
		echo $response['message'];
	}
	else {
		print_r($response);
	}
}