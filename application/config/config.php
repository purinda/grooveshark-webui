<?php

$config['base_url']                = 'http://songs/'; // Base URL including trailing slash (e.g. http://localhost/)

$config['default_controller']      = 'main'; // Default controller to load
$config['error_controller']        = 'error'; // Controller used for errors (e.g. 404, 500 etc)

$config['db_host']                 = 'localhost'; // Database host (e.g. localhost)
$config['db_name']                 = 'grooveshark'; // Database name
$config['db_username']             = 'root'; // Database username
$config['db_password']             = 'toor'; // Database password

$config['tinysong_apikey']         = '15b33a3af72bd771e6013c54f26304a0';

// Raspberry PI
//$config['grooveshark_player_ip']   = '127.0.0.1';
// Dev box
$config['grooveshark_player_ip']   = '10.10.0.10';

$config['grooveshark_player_port'] = '16444';
