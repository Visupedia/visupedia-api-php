<?php

namespace Visupedia;

use Visupedia\HttpClient\HttpClient;

class Client
{
    private $httpClient;

    public function __construct($auth = array(), array $options = array())
    {
        $this->httpClient = new HttpClient($auth, $options);
    }

    /**
     * Returns an MyVisu api instance
     *
     * @param $key The api key provided by Visupedia
     */
    public function visu($key)
    {
        return new Api\Visu($key, $this->httpClient);
    }

}
