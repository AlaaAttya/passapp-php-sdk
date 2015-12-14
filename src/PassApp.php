<?php

namespace PassApp;

use PassApp\Lib\HTTP\PassAppRequest;
use PassApp\Lib\Passes\BasePass;
use PassApp\Lib\Events\PassAppEvent;
use PassApp\Lib\Users\PassAppUser;
use GuzzleHttp\Client;

/**
 * PassApp SDK
 * This class is used to access all the API resources
 *
 * @author  Alaa Attya <alaa.attya91@gmail.com>
 * @link    http://api.passapp.io
 * @date    3-12-2015 (while being at the train traveling to Alexandria)
 */
class PassApp {

    /**
     * PassApp API base url
     *
     * @var     string
     * @access  private
     */
    private $api_base_url = 'https://api.passapp.io/';

    /**
     * Pass object which will be used to handle pass operations
     *
     * @var     Pass
     * @access  public
     */
    public $Passes;

    /**
     * Event object which will handle event operations
     *
     * @var     \PassAppEvent
     * @access  public
     */
    public $Events;

    /**
     * User object that will handle user operations
     *
     * @var     \PassAppUser
     * @access  public
     */
    public $User;

    /**
     * Request client
     *
     * @var     PassAppRequest
     * @access  protected
     */
    protected $_request_client;

    /**
     * Create App object
     *
     * @param   string  $app_key
     * @param   string  $app_secret
     */
    public function __construct($app_key, $app_secret, $api_url = null) {

        if(!is_null($api_url)) {
            $this->api_base_url = $api_url;
        }

        // Initialize request object
        $this->_request_client = new PassAppRequest($this->api_base_url, $app_key, $app_secret);

        // Initialize Passe object
        $this->Passes = new BasePass();

        // Initialize Event object
        $this->Events = new PassAppEvent();

        // Initialize User object
        $this->User = new PassAppUser();
    }


}