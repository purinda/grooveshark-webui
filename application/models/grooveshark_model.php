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

    public function pauseSong() {
        global $config;
        $this->active_socket = new SimpleSocket($config['grooveshark_player_ip'], $config['grooveshark_player_port']);
        $this->active_socket->write('PAUSE ');
    }

    public function stopSong() {
        global $config;
        $this->active_socket = new SimpleSocket($config['grooveshark_player_ip'], $config['grooveshark_player_port']);
        $this->active_socket->write('STOP ');
    }

    public function setVolume($vol) {
        global $config;
        if ($vol < 0 || is_nan($vol)) {
            return;
        }

        $this->active_socket = new SimpleSocket($config['grooveshark_player_ip'], $config['grooveshark_player_port']);
        $this->active_socket->write('VOL ' . (int) $vol);
    }
}
