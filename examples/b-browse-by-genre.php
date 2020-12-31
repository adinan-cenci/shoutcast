<?php 
use AdinanCenci\Shoutcast\Shoutcast;

//-----------------------------

error_reporting(E_ALL);
ini_set('display_errors', 1);

//-----------------------------

require '../vendor/autoload.php';

//-----------------------------

$shoutcast = new Shoutcast();
$json      = $shoutcast->browseByGenre('Metal');

echo $json;

/*$data      = json_decode($json, true);

echo '<pre>';
print_r($data);
echo '</pre>';
*/