# Shoutcast search
An unofficial library to fetch radio stations from [shoutcast.com](https://directory.shoutcast.com/).

## Get genres

```php
$shoutcast = new AdinanCenci\Shoutcast\Shoutcast();
$genres    = $shoutcast->getGenres();
var_dump($genres);
```

<br><br>

## Search stations by genre

Search for stations tagged with an specific musical genre by shoutcast.

```php
$shoutcast = new AdinanCenci\Shoutcast\Shoutcast();
$stations  = $shoutcast->getStationsByGenre('Metal');
var_dump($genres);
```

<br><br>

## Search stations

Search stations with an arbitrary query, search for bands, musics and genres.

```php
$shoutcast = new AdinanCenci\Shoutcast\Shoutcast();
$stations  = $shoutcast->searchStations('Metallica');
var_dump($genres);
```

<br><br>

## License
MIT