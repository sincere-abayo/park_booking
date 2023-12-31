<?php
// Fetching JSON data from ExchangeRate-API for RWF to USD conversion
$req_url = 'https://v6.exchangerate-api.com/v6/86eca110820d0a9d44fe5225/latest/USD'; // Replace with your API key
$response_json = file_get_contents($req_url);

if (false !== $response_json) {
    try {
        // Decoding JSON response
        $response = json_decode($response_json);

        // Check for success
        if ('success' === $response->result) {

            // Assuming you have the amount in Rwandan francs (RWF)
            $amountRWF = 5000; // Replace with your RWF amount

            // Convert RWF to USD using the exchange rate obtained from the API
            $exchangeRateUSD = $response->conversion_rates->USD;
            $amountUSD = $amountRWF / $exchangeRateUSD;
            echo $amountUSD;          
          
        }
  
}
catch (Exception $e) {
    // Handle JSON parse error or other exceptions
    echo "Error: " . $e->getMessage();
}
}
