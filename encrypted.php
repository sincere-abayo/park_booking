

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Encryption and Decryption</title>
</head>
<body>

    <h2>Encryption and Decryption</h2>

    <form method="post">
        <label for="dataToEncrypt">Data to Encrypt:</label>
        <!-- <input type="text" name="dataToEncrypt" required> -->
        <textarea name="dataToEncrypt" placeholder="Write us something"></textarea>
        <button type="submit" name="encrypt">Encrypt</button>
        
    </form>

    <br>

    <form method="post">
        <label for="encryptedData">Encrypted Data:</label>
        <input type="text" name="encryptedData" required>
        <button type="submit" name="decrypt">Decrypt</button>
    </form>
<?php

function encryptData($data, $privateKey) {
    $iv = openssl_random_pseudo_bytes(openssl_cipher_iv_length('aes-256-cbc'));
    $encrypted = openssl_encrypt($data, 'aes-256-cbc', $privateKey, 0, $iv);

    return base64_encode($iv . '::' . $encrypted);
}

function decryptData($encryptedData, $privateKey) {
    list($iv, $encrypted) = explode('::', base64_decode($encryptedData), 2);
    return openssl_decrypt($encrypted, 'aes-256-cbc', $privateKey, 0, $iv);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $privateKey = "YourPrivateKey"; // Replace with your actual private key

    if (isset($_POST['encrypt'])) {
        $dataToEncrypt = $_POST['dataToEncrypt'];
        $encryptedData = encryptData($dataToEncrypt, $privateKey);
        echo "Encrypted Data: " . $encryptedData;
    }

    if (isset($_POST['decrypt'])) {
        $encryptedData = $_POST['encryptedData'];
        $decryptedData = decryptData($encryptedData, $privateKey);
        echo "Decrypted Data: " . $decryptedData;
    }
}

?>
</body>
</html>
