<?php

class Playlist_model extends Model
{
    protected $config;

    public function __construct() {
        global $config;
        $this->config = $config;
        parent::__construct();
    }
/*
<b>array</b>
  'Url' <font color='#888a85'>=&gt;</font> <small>string</small> <font color='#cc0000'>'http://tinysong.com/CCxO'</font> <i>(length=24)</i>
  'SongID' <font color='#888a85'>=&gt;</font> <small>string</small> <font color='#cc0000'>'23179691'</font> <i>(length=8)</i>
  'SongName' <font color='#888a85'>=&gt;</font> <small>string</small> <font color='#cc0000'>'Six Degrees of Inner Turbulence: IV. The Test That Stumped Them All'</font> <i>(length=67)</i>
  'ArtistID' <font color='#888a85'>=&gt;</font> <small>string</small> <font color='#cc0000'>'1988'</font> <i>(length=4)</i>
  'ArtistName' <font color='#888a85'>=&gt;</font> <small>string</small> <font color='#cc0000'>'Dream Theater'</font> <i>(length=13)</i>
  'AlbumID' <font color='#888a85'>=&gt;</font> <small>string</small> <font color='#cc0000'>'125070'</font> <i>(length=6)</i>
  'AlbumName' <font color='#888a85'>=&gt;</font> <small>string</small> <font color='#cc0000'>'Six Degrees of Inner Turbulence'</font> <i>(length=31)</i>
</pre><br />
 */
    public function addSong(array $song) {
        $song_id   = $this->escapeString($song['SongID']);
        $song_name = $this->escapeString($song['SongName']);
        $artist    = $this->escapeString($song['ArtistName']);

        $insert_sql =<<<SQL
    INSERT IGNORE INTO `songs` (`song_id`, `name`, `artist`)
    VALUES ($song_id, '$song_name', '$artist');
SQL;
        $result  = $this->execute($insert_sql);
        return $result;
    }

    public function getSongs() {
        $songs_sql =<<<SQL
    SELECT `song_id`, `name`, `artist`, `last_played`
    FROM `songs`
SQL;
        $result = array();
        foreach ($this->query($songs_sql) as $song) {
            $result[$song->song_id] = $song;
        }

        return $result;
    }
}
