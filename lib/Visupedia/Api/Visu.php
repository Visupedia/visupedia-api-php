<?php

namespace Visupedia\Api;

use Visupedia\HttpClient\HttpClient;

/**
 * Returns an MyVisu api instance
 *
 * @param $key The api key provided by Visupedia
 */
class Visu
{

    private $key;
    private $client;

    public function __construct($key, HttpClient $client)
    {
        $this->key = $key;
        $this->client = $client;
    }

    /**
     * Returns all information about the wanted Visu
     *
     * '/api?key=:key&id=:id&lang=:lang&version=:version' GET
     *
     * @param $id The unique ID of the Visu
     * @param $lang The language code wanted for the Visu
     * @param $version Use a specific version of our API
     */
    public function get($id, $lang, $version, array $options = array())
    {
        $body = (isset($options['query']) ? $options['query'] : array());
        $body['id'] = $id;
        $body['lang'] = $lang;
        $body['version'] = $version;

        $response = $this->client->get('/api?key='.rawurlencode($this->key).'&id='.rawurlencode($id).'&lang='.rawurlencode($lang).'&version='.rawurlencode($version).'', $body, $options);

        return json_decode($response->body);
    }

}
