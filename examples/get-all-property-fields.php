<?php
require_once("../lib/Onix.php");
$onix = new Onix("your-api-key", "api-username", "api-password");
$response = $onix->propertyFields();
if(isset($response['available_fields'])){
	foreach($response['available_fields'] as $field){
		echo $field.'<br>';
	}
}