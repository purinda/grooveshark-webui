<?php

class main extends Controller
{
    protected $grooveshark_model = null;
    protected $session           = null;
    protected $playlist          = array();
    protected $current_song_id   = null;

    protected $volume_mul_factor = 10;

    public function __construct()
    {
        // Load session based playlist
        $this->session = $this->loadHelper('session_helper');

        $this->loadPlugin('tinysong');
        $this->loadPlugin('simplesocket');
        $this->grooveshark_model = $this->loadModel('grooveshark_model');
        $this->playlist_model    = $this->loadModel('playlist_model');

        $this->playlist = $this->playlist_model->getSongs();
    }

    public function index()
    {
        $template = $this->loadView('main_view');
        $template->set('page_title', 'Songs');
        $template->set('playlist', $this->playlist);

        $template->render();
    }

    public function search($input)
    {
        $possible_matches = array();
        if (!empty($input)) {
            $possible_matches = $this->grooveshark_model->getSongs($input);
        }

        header('Content-Type: application/json');
        echo json_encode($possible_matches);
    }

    public function playlist($action)
    {
        $song = $_POST['song'];

        switch (strtoupper($action)) {
            case 'ADD':
                $this->addSong($song);
                break;
            default:
        }

        // Save modified playlist back to session
        $this->session->set('playlist', $this->playlist);
    }

    public function addSong(array $song) {
        // Add the song to the db
        $this->playlist_model->addSong($song);
    }

    public function play($paused = false) {
        $song    = $_POST['song'];
        $song_id = $song['song_id'];

        var_dump($song_id);
        if ($paused) {
            $song_id = null;
        }

        $this->grooveshark_model->playSong($song_id);
    }

    public function pause() {
        $this->grooveshark_model->pauseSong();
    }

    public function stop() {
        $this->grooveshark_model->stopSong();
    }

    public function volume() {
        $this->grooveshark_model->setVolume($this->volume_mul_factor * (int)$_POST['vol']);
    }
}
