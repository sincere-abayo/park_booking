<?php
$number=$_POST['number'];
$_SESSION['ticket']=$_POST['ticket'];
$amount=$_POST['amount'];
$amount=(int)$amount;

include 'auth.php';
use Ramsey\Uuid\Uuid;


// Generate a version 4 (random) UUID
$uuid4 = Uuid::uuid4();

// Get the string representation of the UUID
$uuidString = $uuid4->toString();
// Your request parameters
global $referenceId;
global $authorization;




$authorization = 'Bearer '.$accessToken;
// $callbackUrl = 'Your_Callback_URL';
$referenceId = $uuidString;
$uniqueId=rand(00000,99999);
 $_SESSION['authorization']=$authorization;
 $_SESSION['referenceId']=$referenceId;

$requestBody = [
    "amount" => $amount, // Replace with the desired amoun
    "currency" => "RWF", // Replace with the desired currency
    "externalId" => $uniqueId, // Replace with the desired external ID (a unique identifier for the transaction)
    "payer" => [
        "partyIdType" => "MSISDN",
        "partyId" => $number, // Replace with the payer's MSISDN (mobile number)
    ],
    "payerMessage" => "Payment for ticket ", // Replace with the desired payer message
    "payeeNote" => "Invoice $uniqueId", // Replace with the desired payee note
];

   $url = 'https://mtndeveloperapi.portal.mtn.co.rw/collection/v1_0/requesttopay';
// $url = 'https://proxy.momoapi.mtn.co.rw/collection/v1_0/requesttopay';

$headers = [
    'Authorization' => $authorization,
   // 'X-Callback-Url'=>'http://localhost/clemant/update.php',
    'X-Reference-Id' => $referenceId,
    'X-Target-Environment' => $targetEnvironment,
    'Content-Type' => 'application/json',
    'Ocp-Apim-Subscription-Key' => $key,
];

try {
    $response = $client->post($url, [
        'headers' => $headers,
        'json' => $requestBody,
    ]);

    // Get the response body
    $responseBody = $response->getBody()->getContents();

   header("location:status.php");
            
         // echo "<div style='color:red'> Insuficiency balance top up on balance before pay</div> ";
}


 catch (RequestException $ex) {
    echo $ex->getMessage();
   
}
?>