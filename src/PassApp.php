<?php

namespace PassApp;

use PassApp\Lib\PassFactory;
use PassApp\Lib\Events\PassAppEvent;
use PassApp\Lib\Users\PassAppUser;


/**
 * PassApp SDK
 * This class is used to access all the API resources
 *
 * @author  Alaa Attya <alaa.attya91@gmail.com>
 * @date    3-12-2015 (while being at the train traveling to Alexandria)
 */
class PassApp {

    /**
     * PassApp API base url
     *
     * @var     string
     * @access  private
     */
    private $_api_base_url = '';

    /**
     * PassApp application key
     *
     * @var     string
     * @access  private
     */
    private $_app_key = '';

    /**
     * PassApp application secret
     *
     * @var     string
     * @access  private
     */
    private $_app_secret = '';

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
     * Create App object
     *
     * @param   string  $app_key
     * @param   string  $app_secret
     */
    public function __construct($app_key, $app_secret, $api_url = null) {
        $this->_app_key = $app_key;
        $this->_app_secret = $app_secret;

        if(!is_null($api_url)) {
            $this->_api_base_url = $api_url;
        }

        // Initialize Passe object
        $this->Passes = new PassFactory($this);

        // Initialize Event object
        $this->Events = new PassAppEvent($this);

        // Initialize User object
        $this->User = new PassAppUser($this);
    }


}