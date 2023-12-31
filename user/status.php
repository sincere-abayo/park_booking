<?php
session_start();
require '../vendor/autoload.php';

use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;


$key="ad2c48fddd8f42ddbf5b917ae23ca431";


$client = new Client([
    'verify' => false, 
]);
$referenceId=$_SESSION['referenceId'];$authorization=$_SESSION['authorization'];

$url = "https://mtndeveloperapi.portal.mtn.co.rw/collection/v1_0/requesttopay/{$referenceId}";

$headers = [
    'Authorization' => $authorization,
    'X-Target-Environment' => 'mtnrwanda',
    'Ocp-Apim-Subscription-Key' => $key,
];

try {
    $response = $client->get($url, [
        'headers' => $headers,
    ]);

    // Get the response body
    $responseBody = $response->getBody()->getContents();

$responseData = json_decode($responseBody, true);

 $status = $responseData['status'];
    $amount = $responseData['amount'];
    $currency = $responseData['currency'];
    $partyId = $responseData['payer']['partyId'];
    if ($status=="PENDING") {
        echo "<div style='color: green;'>your Payment of $amount on $partyId is Pending,<br> dial *182*7*1# if your aren't asked to approve it. if you continue to see this,</br> Refresh the page for updates on your payment</div>
        <script>setTimeout(function(){
            location.reload();
        },4000)</script>
        ";
    }
    elseif ($status=="SUCCESSFUL") {
        $_SESSION['method']= "Mtn";
        $_SESSION['paidAmount']= $amount;
        $_SESSION['paidTicket']= $_SESSION['ticket'];
        
        echo "<div style='color:green'> Your Payment of $amount was sussfull; completed on $partyId, redirecting...
        <script>setTimeout(function(){
            window.location.href='success.php';
        },3000)</script>
        ";
    }
else{
    echo "<div style='color:red'>error while payment => $status, click here to <a href='pay.php'> retry again </a>";
}
} catch (RequestException $ex) {
    echo $ex->getMessage();
}
