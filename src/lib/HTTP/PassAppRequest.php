<?php

namespace PassApp\Lib\HTTP;

/**
 * Created by PhpStorm.
 * User: alaa
 * Date: 03/12/15
 * Time: 08:55 م
 */
class PassAppRequest {


    public function __construct() {

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
        return \json_encode($data);
    }
}