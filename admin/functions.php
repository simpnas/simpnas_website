<?php

function SeoUrl($string){
 	$tempUrl = str_replace('-', ' ', $string);
  $tempUrl = trim(strtolower($tempUrl));
 	$tempUrl = preg_replace('/(\s|[^A-Za-z0-9\-])+/', '-', $tempUrl);
 	$tempUrl = trim($tempUrl, '-');

	return $tempUrl;
}

?>