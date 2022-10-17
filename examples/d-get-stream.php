<?php 
use AdinanCenci\Shoutcast\Shoutcast;

//-----------------------------

error_reporting(E_ALL);
ini_set('display_errors', 1);

//-----------------------------

require '../vendor/autoload.php';

//-----------------------------

$shoutcast = new Shoutcast();
$stationId = 99498428; // Metal Rock Radio

try {
    $url = $shoutcast->getStream($stationId);
} catch(\Exception $e) {
    die($e->getMessage());
}

//-----------------------------

echo 
'<h2>' . $url . '</h2>
<audio src="' . $url . '" controls autoplay />';
