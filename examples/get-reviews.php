<?php
require_once("../lib/Onix.php");
$onix = new Onix("your-api-key", "api-username", "api-password");
$response = $onix->reviews();
if(!isset($response['error'])){
	echo 'Total reviews: '.$response['total_reviews'].'<br>';
	echo 'Average rating: '.$response['agency_rating'].'/5<br>';
	echo '<h3>Reviews:</h3>';
	echo '
	<table>
		<thead>
			<th>First name</th>
			<th>Last name</th>
			<th>Date</th>
			<th>Rating</th>
			<th>Comments</th>
			<th>Status</th>
		</thead>
		<tbody>';
	foreach($response['reviews'] as $review){
		echo '<tr>
			<td>'.$review['first_name'].'</td>
			<td>'.$review['last_name'].'</td>
			<td>'.$review['date'].'</td>
			<td>'.$review['rating'].'</td>
			<td>'.$review['review'].'</td>
			<td>'.($review['published'] ? 'Published':'Awaiting moderation').'</td>
		</tr>';
	}
	echo '
		</tbody>
	</table>';	
}