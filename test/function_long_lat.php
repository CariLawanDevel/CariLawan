<?php

function getLatitude($address)
{
	$prepAddr = urlencode($address);

	$geocode = file_get_contents('http://maps.google.com/maps/api/geocode/json?address='.$prepAddr.'&sensor=false');

	$output = json_decode($geocode);

	$lat = $output->results[0]->geometry->location->lat;

	return $lat;
}

function getLongitude($address)
{
	$prepAddr = urlencode($address);

	$geocode = file_get_contents('http://maps.google.com/maps/api/geocode/json?address='.$prepAddr.'&sensor=false');

	$output = json_decode($geocode);

	$lng = $output->results[0]->geometry->location->lng;

	return $lng;
}

?>