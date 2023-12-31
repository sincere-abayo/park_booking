<?php

// Fetching JSON data from ExchangeRate-API for USD to RWF conversion
$req_url = 'https://v6.exchangerate-api.com/v6/86eca110820d0a9d44fe5225/latest/USD';
$response_json = file_get_contents($req_url);

if (false !== $response_json) {
    try {
        // Decoding JSON response
        $response = json_decode($response_json);

        // Check for success
        if ('success' === $response->result) {

            // Assuming you have the amount in Rwandan francs (RWF)
            $amountRWF = 500000; // Replace with your RWF amount

            // Convert RWF to USD using the exchange rate obtained from the API
            $exchangeRateUSD = $response->conversion_rates->RWF;
            $amountUSD = $amountRWF / $exchangeRateUSD;

            echo "Equivalent amount in USD: " . $amountUSD;
        } else {
            echo "Failed to retrieve exchange rates.";
        }
    } catch (Exception $e) {
        // Handle JSON parse error or other exceptions
        echo "Error: " . $e->getMessage();
    }
}
