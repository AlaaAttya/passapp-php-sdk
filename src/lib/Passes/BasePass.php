<?php

/**
 * BasePass which holds the common Passes data and operations
 *
 * @author  Alaa Attya <alaa.attya91@gmail.com>
 */

namespace PassApp\Lib\Passes;

use PassApp\Lib\HTTP\PassAppRequest;


class BasePass {

    /**
     * HTTP request object
     *
     * @var PassAppRequest
     */
    protected $_request;

    /**
     * Initialize HTTP request object
     */
    public function __construct($pass_app_base) {
        $this->_request = new PassAppRequest();
    }
}