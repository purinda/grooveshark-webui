<?php

class error extends Controller
{
    public function index()
    {
        $this->error404();
    }

    public function error404()
    {
        echo '<h1>404 Error</h1>';
        echo '<p>Looks like this page doesn\'t exist</p>';
    }

}
