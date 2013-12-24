<?php

class Song
{
    protected $song_id;
    protected $name;
    protected $artist;

    public function __construct() {

    }

    public function setId($song_id) {
        $this->song_id = $song_id;
        return $this;
    }

    public function setName($name) {
        $this->name = $name;
        return $this;
    }

    public function setArtist($artist) {
        $this->artist = $artist;
        return $this;
    }

    public function getVotes() {

    }

}
