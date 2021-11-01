<?php 
namespace AdinanCenci\Shoutcast;

use \GuzzleHttp\Client;

class Shoutcast 
{
    /** @var bool If true methods return associative arrays, return objects otherwise */
    protected $associative = true;

    /** @var \AdinanCenci\Shoutcast\ShoutcastApi */
    protected $api = null;

    public function __construct($associative = true) 
    {
        $this->associative = $associative;
        $this->api = new ShoutcastApi();
    }
    
    /**
     * Return radio stations tagged as "$genre".
     * 
     * @param string $genre A musical genre, see self::getGenres().
     * @return string A json array.
     */    
    public function getStationsByGenre($genre) 
    {
        $json = $this->api->getStationsByGenre($genre);
        return json_decode($json, $this->associative);
    }

    /**
     * Return radio stations based on their title, artists and musics.
     * 
     * @param string $query An arbitrary query string. 
     * @return string A json array.
     */
    public function searchStations($query) 
    {
        $json = $this->api->searchStations($query);
        return json_decode($json, $this->associative);
    }

    /**
     * Return an URL for a stream to an specific radio station.
     * 
     * @param string $query
     * @return string A json array
     */
    public function getStream($stationId) 
    {
        return $this->api->getStream($stationId);
    }

    /**
     * Return an array of musical genres categorized by shoutcast.
     * The array is organized hierarchically.
     * 'name' => '', 
     * 'subGenres' => [ ... ]
     * 
     * @return array
     */
    public function getGenres() 
    {
        $genres = $this->api->getGenres();

        if ($this->associative) {
            return $genres;
        }

        foreach($genres as $key => $gen) {
            $genres[$key] = (object) $gen;

            if (!isset($gen['subGenres'])) {
                continue;
            }

            foreach($gen['subGenres'] as $k => $sub) {
                $genres[$key]->subGenres[$k] = (object) $sub;
            }
        }
        
        return $genres;
    }
}
