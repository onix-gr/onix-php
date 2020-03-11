<?php
require_once("Onix.php");
$onix = new Onix("your-api-key", "api-username", "api-password");
$data = array(
	"purpose" => 1, 
	"category" => 1, 
	"subcategory" => 11, 
	"location" => "Θεσσαλονίκη, κέντρο", 
	"latitude" => "40.636101528180916",
	"longitude" => "22.952156066894535",
	"size" => 60,
	"price" => 600,
	"date_available" => "2020-01-14",
	"branch_id" => 1,
	"floor_number" => 2,
	"levels" => 1,
	"bedrooms" => 4,
	"alarm" => 1
);
$response = $onix->createProperty($data);
if(!isset($response['error'])){
	if($response['status'] == '200'){
		echo 'Property ID: '.$response['property_id'].'<br>'.$response['message'];
	}
	else {
		print_r($response);
	}
}