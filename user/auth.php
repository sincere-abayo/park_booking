<?php
session_start();

require_once '../vendor/autoload.php';

use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;

// Your credentials and key  
// $apiUserId = '4fb75001-6b06-460f-b42f-56e425414149';
// $apiKey = '90d60ee5cea546b280234f109f2b3e8e';
$apiUserId = '58a75be0-35cf-4140-bdce-fabce66976e6';
$apiKey = 'f0116eeaa3734d42b29a939d7e420643';
global $key;
global $targetEnvironment;
$targetEnvironment="mtnrwanda";
$key="ad2c48fddd8f42ddbf5b917ae23ca431";
// $key="2a7752c700714dcdbc830d7b0fe36882";
// $apiUserId = '58a75be0-35cf-4140-bdce-fabce66976e6';
// $apiKey = 'f0116eeaa3734d42b29a939d7e420643';
// $key="6ae2089ec5874f8ebad9fe9c1da7c8b8";
$credentials = $apiUserId . ':' . $apiKey;
$encodedCredentials = base64_encode($credentials);
$encodedCredentials='Basic '.$encodedCredentials;
global $accessToken;

// $client = new Client();
$client = new Client([
    'verify' => false, // Disable SSL verification (for testing only)
]);


$url = 'https://mtndeveloperapi.portal.mtn.co.rw/collection/token/';

// $url = 'https://proxy.momoapi.mtn.co.rw/collection/token/';

$headers = [
    'Authorization' => $encodedCredentials,
    'Ocp-Apim-Subscription-Key' => $key,
];

$body = []; // Add your request body here if needed

try {
    $response = $client->post($url, [
        'headers' => $headers,
        // 'json' => $body,
    ]);

    // Get the response body
    $responseBody = $response->getBody()->getContents();

    $response = json_decode($responseBody, true);
    if (isset($response['access_token'])) {
    $accessToken =$response['access_token'];
   // $_SESSION['authorization']="Bear ".$accessToken;
    // echo  $accessToken;
} else {
   $accessToken="Error: Unable to retrieve access token.";
}
} 
catch (RequestException $ex) {
    echo $ex->getMessage();
}
