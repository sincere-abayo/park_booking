<?php
session_start();
require '../vendor/autoload.php';

use Omnipay\Omnipay;

if (isset($_POST['paypal'])) {
    $amount = $_POST['amount'];
   $name=$_POST['name'];
   $email=$_POST['email'];
    $amount=(float)$amount;
    $_SESSION['paidAmount']=$amount;
    $_SESSION['payerEmail']=$email;
    $_SESSION['payername']=$name;
    $_SESSION['method']= "Paypal";

    // Fetching JSON data from ExchangeRate-API for USD to RWF conversion
    $req_url = 'https://v6.exchangerate-api.com/v6/86eca110820d0a9d44fe5225/latest/USD';
    $response_json = file_get_contents($req_url);

    if (false !== $response_json) {
        try {
            // Decoding JSON response
            $response = json_decode($response_json);

            // Check for success
            if ('success' === $response->result) {
                $amountRWF = $amount;

                // Convert RWF to USD using the exchange rate obtained from the API
                $exchangeRateUSD = $response->conversion_rates->RWF;
                $amountUSD = $amountRWF / $exchangeRateUSD;
                   $floatAmount=(float)$amountUSD;
                   $formatedAmount=number_format($floatAmount,2);
                // Set up Omnipay PayPal gateway
                $gateway = Omnipay::create('PayPal_Rest');
                $gateway->initialize([
                    'clientId' => 'AbW_acddhAUS_T_qDgJwY-PGTQPYGsSKXlnQW_wTj2YDUpUy22sdQ-o_P3hp-TrDQp1P_IG6r6BwXhtC',
                    'secret' => 'EBSImuu-5CMMpkXt-1U60uc0MGa-lOdgUwnaiKfYASYNAMX07qUTW6Rk4zkNDk0ShnB6T9e37zH4XcB4',
                
                    'testMode' => true, // Set to false for live transactions
                ]);

                // Create a purchase request
                $response = $gateway->purchase([
                    'amount' => $formatedAmount,
                    'currency' => 'USD',
                    'description' => 'Refound project',
                    'returnUrl' => 'https://faithful-big-martin.ngrok-free.app/park_booking/user/refound_success.php',
                    'cancelUrl' => 'https://faithful-big-martin.ngrok-free.app/park_booking/user/refound_canceled.php',
                ])->send();

                // Redirect to PayPal for payment authorization
                if ($response->isRedirect()) {
                   
                    $response->redirect();
                    exit(); // Ensure script termination after redirection
                } 
                else 
                {
                    // Payment failed: display error
                    // echo $response->getMessage();
                    echo "Payment failed. Details: " . print_r($response->getData(), true);

                }
            } 
            else {
                echo "<script>history.back()</script>";
            }
        } catch (Exception $e) {
            // Handle JSON parse error or other exceptions
            echo "Error: " . $e->getMessage();
        }
    } else {
        echo "Failed to fetch exchange rates from the API.";
    }
}
