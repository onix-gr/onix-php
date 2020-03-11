<?php
require_once("../lib/Onix.php");
$onix = new Onix("your-api-key", "api-username", "api-password");
$property_id = 5; //Enter the property's id
$response = $onix->getProperties($property_id);
if(!isset($response['error'])){
	print_r($response);
}