<?php 
namespace AdinanCenci\Shoutcast;

use \AdinanCenci\SimpleRequest\Request;

class Shoutcast 
{
    // return a string
    public function browseByGenre($genre) 
    {
        $request = new Request('https://directory.shoutcast.com/Home/BrowseByGenre');
        $request->post();
        $request->fields(['genrename' => $genre]);
        $response = $request->request();

        if ($response->code != 200) {
            throw new Exception('Something went wrong with the request', 1);          
        }

        return $response->body;
    }

    // return an URL
    public function getStream($stationId) 
    {
        $request = new Request('https://directory.shoutcast.com/Player/GetStreamUrl');
        $request->post();
        $request->fields(['station' => $stationId]);
        $response = $request->request();

        if ($response->code != 200) {
            throw new Exception('Something went wrong with the request', 1);          
        }

        return trim($response->body, '"');
    }

    public function getGenres() 
    {
        return ['Alternative', 'Adult Alternative', 'Britpop', 'Classic Alternative', 'College', 'Dancepunk', 'Dream Pop', 'Emo', 'Goth', 'Grunge', 'Hardcore', 'Indie Pop', 'Indie Rock', 'Industrial', 'LoFi', 'Modern Rock', 'New Wave', 'Noise Pop', 'Post Punk', 'Power Pop', 'Punk', 'Ska', 'Xtreme', 'Blues', 'Acoustic Blues', 'Chicago Blues', 'Contemporary Blues', 'Country Blues', 'Delta Blues', 'Electric Blues', 'Cajun and Zydeco', 'Classical', 'Baroque', 'Chamber', 'Choral', 'Classical Period', 'Early Classical', 'Impressionist', 'Modern', 'Opera', 'Piano', 'Romantic', 'Symphony', 'Country', 'Alt Country', 'Americana', 'Bluegrass', 'Classic Country', 'Contemporary Bluegrass', 'Contemporary Country', 'Honky Tonk', 'Hot Country Hits', 'Western', 'Easy Listening', 'Exotica', 'Light Rock', 'Lounge', 'Orchestral Pop', 'Polka', 'Space Age Pop', 'Electronic', 'Acid House', 'Ambient', 'Big Beat', 'Breakbeat', 'Dance', 'Demo', 'Disco', 'Downtempo', 'Drum and Bass', 'Electro', 'Garage', 'Hard House', 'House', 'IDM', 'Jungle', 'Progressive', 'Techno', 'Trance', 'Tribal', 'Trip Hop', 'Dubstep', 'Folk', 'Alternative Folk', 'Contemporary Folk', 'Folk Rock', 'New Acoustic', 'Traditional Folk', 'World Folk', 'Old Time', 'Themes', 'Adult', 'Best Of', 'Chill', 'Eclectic', 'Experimental', 'Female', 'Heartache', 'Instrumental', 'LGBT', 'Love and Romance', 'Party Mix', 'Patriotic', 'Rainy Day Mix', 'Reality', 'Sexy', 'Shuffle', 'Travel Mix', 'Tribute', 'Trippy', 'Work Mix', 'Rap', 'Alternative Rap', 'Dirty South', 'East Coast Rap', 'Freestyle', 'Hip Hop', 'Gangsta Rap', 'Mixtapes', 'Old School', 'Turntablism', 'Underground Hip Hop', 'West Coast Rap', 'Inspirational', 'Christian', 'Christian Metal', 'Christian Rap', 'Christian Rock', 'Classic Christian', 'Contemporary Gospel', 'Gospel', 'Praise and Worship', 'Sermons and Services', 'Southern Gospel', 'Traditional Gospel', 'International', 'African', 'Arabic', 'Asian', 'Bollywood', 'Brazilian', 'Caribbean', 'Celtic', 'Chinese', 'European', 'Filipino', 'French', 'Greek', 'Hawaiian and Pacific', 'Hindi', 'Indian', 'Japanese', 'Hebrew', 'Klezmer', 'Korean', 'Mediterranean', 'Middle Eastern', 'North American', 'Russian', 'Soca', 'South American', 'Tamil', 'Worldbeat', 'Zouk', 'German', 'Turkish', 'Islamic', 'Afrikaans', 'Creole', 'Jazz', 'Acid Jazz', 'Avant Garde', 'Big Band', 'Bop', 'Classic Jazz', 'Cool Jazz', 'Fusion', 'Hard Bop', 'Latin Jazz', 'Smooth Jazz', 'Swing', 'Vocal Jazz', 'World Fusion', 'Latin', 'Bachata', 'Banda', 'Bossa Nova', 'Cumbia', 'Latin Dance', 'Latin Pop', 'Latin Rap and Hip Hop', 'Latin Rock', 'Mariachi', 'Merengue', 'Ranchera', 'Reggaeton', 'Regional Mexican', 'Salsa', 'Tango', 'Tejano', 'Tropicalia', 'Flamenco', 'Samba', 'Metal', 'Black Metal', 'Classic Metal', 'Extreme Metal', 'Grindcore', 'Hair Metal', 'Heavy Metal', 'Metalcore', 'Power Metal', 'Progressive Metal', 'Rap Metal', 'Death Metal', 'Thrash Metal', 'New Age', 'Environmental', 'Ethnic Fusion', 'Healing', 'Meditation', 'Spiritual', 'Decades', '30s', '40s', '50s', '60s', '70s', '80s', '90s', '00s', 'Pop', 'Adult Contemporary', 'Barbershop', 'Bubblegum Pop', 'Dance Pop', 'Idols', 'Oldies', 'JPOP', 'Soft Rock', 'Teen Pop', 'Top 40', 'World Pop', 'KPOP', 'R&amp;B and Urban', 'Classic R&amp;B', 'Contemporary R&amp;B', 'Doo Wop', 'Funk', 'Motown', 'Neo Soul', 'Quiet Storm', 'Soul', 'Urban Contemporary', 'Reggae', 'Contemporary Reggae', 'Dancehall', 'Dub', 'Pop Reggae', 'Ragga', 'Rock Steady', 'Reggae Roots', 'Rock', 'Adult Album Alternative', 'British Invasion', 'Classic Rock', 'Garage Rock', 'Glam', 'Hard Rock', 'Jam Bands', 'Piano Rock', 'Prog Rock', 'Psychedelic', 'Rock &amp; Roll', 'Rockabilly', 'Singer and Songwriter', 'Surf', 'JROCK', 'Celtic Rock', 'Seasonal and Holiday', 'Anniversary', 'Birthday', 'Christmas', 'Halloween', 'Hanukkah', 'Honeymoon', 'Kwanzaa', 'Valentine', 'Wedding', 'Winter', 'Soundtracks', 'Anime', 'Kids', 'Original Score', 'Showtunes', 'Video Game Music', 'Talk', 'Comedy', 'Community', 'Educational', 'Government', 'News', 'Old Time Radio', 'Other Talk', 'Political', 'Scanner', 'Spoken Word', 'Sports', 'Technology', 'BlogTalk', 'Misc', 'Public Radio', 'News', 'Talk', 'College', 'Sports', 'Weather'];
    }
}
