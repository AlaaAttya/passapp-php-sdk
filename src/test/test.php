<?php
/**
 * Created by PhpStorm.
 * User: alaa
 * Date: 03/12/15
 * Time: 10:27 م
 */

require '../../vendor/autoload.php';

/*use PassApp\PassApp;

$passApp = new PassApp("key", "secret");

$ticket = $passApp->Passes->getInstance('Ticket');
$response = $ticket->create(array('event_id' => 1, 'name' => 'test ya 3mmna'));
echo $response;
*/

use GuzzleHttp\Client;


// Create a client with a base URI
$client = new GuzzleHttp\Client(['base_uri' => 'http://localhost/']);
// Send a request to https://foo.com/api/test
$response = $client->request('GET', 'test.php');

echo "<pre>";
var_dump($response->getBody()->getContents());die;