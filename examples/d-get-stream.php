<?php 
use AdinanCenci\Shoutcast\Shoutcast;

//-----------------------------

error_reporting(E_ALL);
ini_set('display_errors', 1);

//-----------------------------

require '../vendor/autoload.php';

//-----------------------------

$shoutcast   = new Shoutcast();
$stationId   = 99497996; // ANTENNE BAYERN
$url         = $shoutcast->getStream(99497996);

//-----------------------------

echo 
'<audio src="'.$url.'" controls autoplay />';
