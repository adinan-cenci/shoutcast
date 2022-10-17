<?php 
namespace AdinanCenci\Shoutcast;

use \GuzzleHttp\Client;
use \AdinanCenci\Shoutcast\Tool\Scraper;

class ShoutcastApi 
{
    /**
     * Return radio stations tagged as "$genre".
     * 
     * @param string $genre A musical genre, see self::getGenres().
     * @return string A json array.
     */
    public function getStationsByGenre(string $genre) : string
    {
        return $this->request('https://directory.shoutcast.com/Home/BrowseByGenre', 'POST', ['genrename' => $genre]);
    }

    /**
     * Return radio stations based on their title, artists and musics.
     * 
     * @param string $query An arbitrary query string. 
     * @return string A json array.
     */
    public function searchStations(string $query) : string
    {
        return $this->request('https://directory.shoutcast.com/Search/UpdateSearch', 'POST', ['query' => $query]);
    }

    /**
     * Return an URL for a stream to an specific radio station.
     * 
     * @param string $query
     * @return string A json array
     */
    public function getStream(string $stationId) : string
    {
        $response = $this->request('https://directory.shoutcast.com/Player/GetStreamUrl', 'POST', ['station' => $stationId]);
        return trim($response, '"');
    }

    /**
     * Return an array of musical genres categorized by shoutcast.
     * The array is organized hierarchically.
     * 'name' => '', 
     * 'subGenres' => [ ... ]
     * 
     * @return array
     */
    public function getGenres() : array
    {
        $genres = [];
        $html = $this->request('https://directory.shoutcast.com/', 'GET');
        $scraper = new Scraper($html);

        $mainGenres = $scraper->querySelectorAll("//li[contains(@class,'main-genre')]");
        foreach ($mainGenres as $key => $mainGenre) {
            $a = $scraper->querySelector('.//a', $mainGenre);
            $genres[$key] = ['title' => $a->nodeValue];

            $sub = [];
            $subGenres = $scraper->querySelectorAll(".//li[contains(@class,'sub-genre')]/a", $mainGenre);
            foreach ($subGenres as $subGenre) {
                $sub[] = ['title' => $subGenre->nodeValue];
            }

            if ($sub) {
                $genres[$key]['subGenres'] = $sub;
            }
        }

        return $genres;
    }

    /**
     * Generic method to make http requests.
     * 
     * @param string $url
     * @param string $method The http methods, get or post.
     * @return string Html
     */
    protected function request(string $url, string $method = 'GET', $fields = []) : string
    {
        $client = new Client();
        $options = [
            'connect_timeout'   => 15, 
            'timeout'           => 15,
            'form_params'       => $method == 'POST' ? $fields : null,
            'query'             => $method == 'GET'  ? $fields : null,
        ];

        $response = $client->request($method, $url, $options);
        return $response->getBody();
    }
}
