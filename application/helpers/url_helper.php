<?php

class Url_helper
{
    public function base_url()
    {
        global $config;

        return $config['base_url'];
    }

    public function segment($seg)
    {
        if(!is_int($seg)) return false;

        $parts = explode('/', $_SERVER['REQUEST_URI']);

        return isset($parts[$seg]) ? $parts[$seg] : false;
    }

}
