<?php 
namespace AdinanCenci\Shoutcast;

use \GuzzleHttp\Client;

class Shoutcast 
{
    /** @var bool If true methods return associative arrays, return objects otherwise */
    protected $associative = true;

    /** @var \AdinanCenci\Shoutcast\ShoutcastApi */
    protected ShoutcastApi $api;

    public function __construct(bool $associative = true) 
    {
        $this->associative = $associative;
        $this->api = new ShoutcastApi();
    }

    /**
     * Return radio stations tagged as "$genre".
     * 
     * @param string $genre A musical genre, see self::getGenres().
     * @return (array|\stdClass)[]
     * @throws \RuntimeException
     */
    public function getStationsByGenre(string $genre) : array
    {
        $json = $this->api->getStationsByGenre($genre);
        $data = $this->jsonDecode($json);
        return $data ?? [];
    }

    /**
     * Return radio stations based on their title, artists and musics.
     * 
     * @param string $query An arbitrary query string. 
     * @return (array|\stdClass)[]
     * @throws \RuntimeException
     */
    public function searchStations(string $query) : array
    {
        $json = $this->api->searchStations($query);
        $data = $this->jsonDecode($json);
        return $data ?? [];
    }

    /**
     * Return an URL for a stream to an specific radio station.
     * 
     * @param string|int $query
     * @return string A json array
     * @throws \RuntimeException
     */
    public function getStream($stationId) : string
    {
        return $this->api->getStream($stationId);
    }

    /**
     * Return an array of musical genres categorized by shoutcast.
     * The array is organized hierarchically.
     * 'name' => '', 
     * 'subGenres' => [ ... ]
     * 
     * @return array[]
     * @throws \RuntimeException
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

    protected function jsonDecode($json) 
    {
        return json_decode($json, $this->associative);
    }
}
