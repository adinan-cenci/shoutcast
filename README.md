# Shoutcast search

An unofficial library to fetch radio stations from [shoutcast.com](https://directory.shoutcast.com/).

<br><br>

## Instantiating

```php
use AdinanCenci\Shoutcast\Shoutcast;

$shoutcast = new Shoutcast();
```

<br><br>

## Get genres

This will return an array of the musical genres used to index the different radio stations.

```php
$genres = $shoutcast->getGenres();
```

<br><br>

## Search stations by genre

Search for stations tagged with an specific musical genre by shoutcast.

```php
stations = $shoutcast->getStationsByGenre('Metal');
```

<br><br>

## Search stations

Search stations with an arbitrary query, search for bands, musics and genres.

```php
$stations = $shoutcast->searchStations('Metallica');
```

<br><br>

## License

MIT