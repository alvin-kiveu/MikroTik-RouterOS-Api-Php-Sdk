<?php
require_once __DIR__ . '/../vendor/autoload.php';
use MikrotikSdk\MikrotikSdk;

$mikrotik = new MikrotikSdk;

// Connect to Mikrotik
$connect = $mikrotik->connect('192.168.88.1', 'admin', 'password');
if ($connect) {
    // Execute a command
    $response = $mikrotik->sendCommand('/ip/address/print', ['?interface' => 'ether1']);
    
    // Parse and display the response
    $parsedData = $mikrotik->parseResponse($response);
    print_r($parsedData);

    // Disconnect from Mikrotik
    $mikrotik->disconnect();
} else {
    echo 'Not Connected';
}