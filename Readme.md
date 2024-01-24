## MIKROTIK - ROUTEROS - API - PHP - SDK

This PHP SDK provides a convenient interface for interacting with the Mikrotik RouterOS API. You can use this SDK to connect to a Mikrotik device, execute commands, and manage the RouterOS configuration.


### Installation

This PHP SDK provides a convenient interface for interacting with the Mikrotik RouterOS API. You can use this SDK to connect to a Mikrotik device, execute commands, and manage the RouterOS configuration.

```bash
composer require mikrotik/php-sdk
```

### Usage

To use the SDK, create an instance of the MikrotikSdk class, and then use its methods to connect to a Mikrotik device.

```php

use MikrotikSdk\MikrotikSdk;

$mikrotik = new MikrotikSdk;

// Connect to Mikrotik
$connect = $mikrotik->connect('192.168.88.1', 'admin', 'password');
if ($connect) {
    echo 'Connected';
} else {
    echo 'Not Connected';
}

```

### Methods

connect($ip, $username, $password)

Connects to the Mikrotik device using the specified IP address, username, and password. Returns true on successful connection, otherwise false.

```php
$connect = $mikrotik->connect('192.168.88.1', 'admin', 'password');
```

disconnect()

Disconnects from the Mikrotik device. Returns true on successful disconnection, otherwise false.

```php
$disconnect = $mikrotik->disconnect();
```

### Additional Methods

You can use the following methods to perform various operations on the Mikrotik device:


executeCommand($command, $param2 = true): Executes a RouterOS command. Returns true on success.

```php
$result = $mikrotik->executeCommand('/interface/print');
```

sendCommand($com, $arr = array()): Sends a custom command with optional parameters. Returns the parsed response.

```php
$response = $mikrotik->sendCommand('/ip/address/print', ['?interface' => 'ether1']);
```

parseResponse($response): Parses the raw response from RouterOS. Returns an array with parsed data.

```php
$parsedData = $mikrotik->parseResponse($response);
```

### Example
Here's a complete example demonstrating the usage of the SDK:

```php
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

```

### License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.

### Donate to this project

If you find this project useful, please consider making a donation. Any funds donated will be used to help further development on this project.

[![Donate](https://paystack.com/pay/oqwdgv9xck)]

### Credits

- Nick Barnes

- [Ben Menking](ben [at] infotechsc [dot] com)

- [Jeremy Jefferson](http://jeremyj.com)

- [Cristian Deluxe](djcristiandeluxe [at] gmail [dot] com)

- [Mikhail Moskalev](mmv.rus [at] gmail [dot] com)

## References

- [Mikrotik RouterOS API Wiki](https://wiki.mikrotik.com/wiki/Manual:API)







