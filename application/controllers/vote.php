<?php

class Vote extends Controller
{
    protected $grooveshark_model = null;
    protected $session           = null;

    public function __construct()
    {
        // Load session based playlist
        $this->session           = $this->loadHelper('session_helper');
        if ($this->session->exists('playlist')) {
            $this->playlist          = $this->session->get('playlist');
        }

        $this->loadPlugin('tinysong');
        $this->loadPlugin('simplesocket');
        $this->grooveshark_model = $this->loadModel('grooveshark_model');
    }

    public function index()
    {
        $template = $this->loadView('main_view');
        $template->set('page_title', 'Songs');
        $template->set('playlist', $this->playlist);

        $template->render();
    }
