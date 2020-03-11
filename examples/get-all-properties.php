<?php
require_once("Onix.php");
$onix = new Onix("your-api-key", "api-username", "api-password");
$response = $onix->getProperties();
if(!isset($response['error']) && $response['status'] == '200'){
	echo 'Total properties: '.$response['total_properties'].'<br>';
	foreach($response['properties'] as $property){
		echo 'ID: '.$property.'<br>';
	}
}