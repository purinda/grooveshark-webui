<?php

/**
 * @author https://github.com/amferraz
 *
 * Please refer to example.php for usage.
 *
 * For API info, refer to:
 * http://tinysong.com/api
 */

class tinysong
{
    protected $api_key = '';
    protected $method = '';
    protected $limit = '10';
    protected $query_string = '';

    public static $CURL_OPTS = array(
        CURLOPT_CONNECTTIMEOUT => 10,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_TIMEOUT        => 60,
        CURLOPT_USERAGENT      => 'tinysong-php-0.7',
    );

    public function __construct($api_key)
    {
        $this->api_key = $api_key;
    }

    /**
     * A wrapper for RESTful method /a/ (single
     * @return @Tinysong
     */
    public function single_tinysong_link($query_string)
    {
        $this->query_string($query_string);

        return $this->method('a');
    }

    /**
     * A wrapper for RESTful method /b/ (single song with medatada)
     * @return @Tinysong
     */
    public function single_tinysong_metadata($query_string)
    {
        $this->query_string($query_string);

        return $this->method('b');
    }

    /**
     * A wrapper for RESTful method /s/ (search)
     * @return Tinysong
     */
    public function search($query_string)
    {
        $this->query_string($query_string);

        return $this->method('s');
    }

    /**
     * Sets the query string
     * @return Tinysong
     */
    public function query_string($query_string)
    {
        $this->query_string = urlencode($query_string);

        return $this;
    }

    /**
     *
     * @param  type     $method
     * @return Tinysong
     */
    public function method($method)
    {
        $this->method = $method;

        return $this;
    }

    /**
     * Fetchs the data based on the parameters
     * @param  bool     $clean_params cleans the params after build the url
     * @param  resource $ch           a custom php curl resource
     * @return array    an associative array with the data
     */
    public function execute($clean_params = true, $ch = null)
    {

        $url = $this->build_query();

        if ($clean_params) {
            $this->clean_params();
        }

        if (!$ch) {
            $ch = curl_init($url);
            curl_setopt_array($ch, self::$CURL_OPTS);
        }

        $query_result = curl_exec($ch);

        curl_close($ch);

        return  json_decode($query_result, true);

    }

    /**
     * Builds an API query based on the parameters
     * @return string the query
     */
    public function build_query()
    {
        $url = "http://tinysong.com";
        $url .= '/'.$this->method.'/';
        $url .= $this->query_string.'?';

        if ($this->limit) {
            $url .= 'limit='.$this->limit;
        }

        $url .= '&key='.$this->api_key;
        $url .= '&format=json';

        return $url;
    }

    /**
     * Cleans the params (method, query string and limit)
     * @return Tinysong
     */
    public function clean_params()
    {
        $this->method       = '';
        $this->query_string = '';
        $this->limit        = '';
    }

}
