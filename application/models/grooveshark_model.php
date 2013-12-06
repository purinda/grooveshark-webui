<?php

class Grooveshark_model extends Model
{
    protected $tinysong      = null;
    protected $active_socket = null;

    public function __construct() {
        global $config;
        $this->tinysong      = new Tinysong($config['tinysong_apikey']);
        $this->active_socket = new SimpleSocket($config['grooveshark_player_ip'], $config['grooveshark_player_port']);
    }

    public function getSongs($query) {
        $result = $this->tinysong
                        ->search($query)
                        ->execute();

        return $result;
    }

    public function playSong($songId) {
        global $config;
        $this->active_socket = new SimpleSocket($config['grooveshark_player_ip'], $config['grooveshark_player_port']);
        $this->active_socket->write('PLAY ' . $songId);
    }

}
