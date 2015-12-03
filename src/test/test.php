<?php
/**
 * Created by PhpStorm.
 * User: alaa
 * Date: 03/12/15
 * Time: 10:27 م
 */

require '../../vendor/autoload.php';

use PassApp\PassApp;

$passApp = new PassApp("key", "secret");

$ticket = $passApp->Passes->getInstance('Ticket');
$response = $ticket->create(array('event_id' => 1, 'name' => 'test ya 3mmna'));
echo $response;
