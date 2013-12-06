<?php

/**
 * @author Purinda Gunasekara
 *
 * Little wrapper class around built-in php socket
 * functions.
 *
 */

class SimpleSocket
{
    private $socket;
    private $connected = false;

    public function __construct($address, $port)
    {
        $this->socket = pfsockopen($address, $port);
        if (!$this->socket) {
            throw new Exception('Cannot connect');
        }
    }

    public function write($buffer, $flags = MSG_EOF) {
        return fputs($this->socket, $buffer . "\n");
    }

    public function close()
    {
        fclose($this->socket);
    }

}
