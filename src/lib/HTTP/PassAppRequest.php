<?php

namespace PassApp\Lib\HTTP;
use GuzzleHttp\Client;

/**
 * Created by PhpStorm.
 * User: alaa
 * Date: 03/12/15
 * Time: 08:55 م
 */
class PassAppRequest {

    private $api_base_url;

    private $app_key;

    private $app_secret;

    private $guzzle_client;

    /**
     */
    public function __construct($api_base_url, $app_key, $app_secret) {
        $this->api_base_url = $api_base_url;
        $this->app_key = $app_key;
        $this->app_secret = $app_secret;

        $this->guzzle_client = new Client(['base_uri' => $this->api_base_url]);
    }

    /**
     * Handling PassApp API requests
     *
     * @param   string  $method     [POST, 'GET', 'PUT' or 'DELETE']
     * @param   string  $path       PassApp API request path
     * @param   array   $data       Pass details data
     * @param   array   $headers    request extra headers
     */
    public function create($method, $path, $data, $headers) {
        return $this->guzzle_client->request($method, $path, array(
            'headers' => $headers,
            'json' => \json_encode($data)
        ))->getBody()->getContents();
    }
}