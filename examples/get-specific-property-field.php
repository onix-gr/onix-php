<?php
require_once("Onix.php");
$onix = new Onix("your-api-key", "api-username", "api-password");
$response = $onix->propertyFields('year');
if(!isset($response['error'])){
	echo '<h3>Information about '.$response['name'].'</h3>';
	print_r($response);
}