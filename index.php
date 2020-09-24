<?php

use CFX\JsonClient\Client;

include_once 'vendor/autoload.php';

$client = new Client();
$rates = $client->getRates();

echo '<html><head><title>example</title><body><pre>' . json_encode(
        $rates,
        JSON_PRETTY_PRINT
    ) . '</pre></body></head></html>';