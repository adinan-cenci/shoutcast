<?php 
use AdinanCenci\Shoutcast\Shoutcast;

//-----------------------------

error_reporting(E_ALL);
ini_set('display_errors', 1);

//-----------------------------

require '../vendor/autoload.php';

//-----------------------------

$shoutcast = new Shoutcast();

try {
    $stations = $shoutcast->getStationsByGenre('Metal');
} catch(\Exception $e) {
    die($e->getMessage());
}

//-----------------------------

echo '<pre>';
print_r($stations);
echo '</pre>';
