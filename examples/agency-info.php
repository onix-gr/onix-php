<?php
require_once("Onix.php");
$onix = new Onix("your-api-key", "api-username", "api-password");
$response = $onix->agencyInfo();
if(!isset($response['error'])){
	print_r($response);
}