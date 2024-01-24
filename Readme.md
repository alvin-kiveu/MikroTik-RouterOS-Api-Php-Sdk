## MIKROTIK - ROUTEROS - API - PHP - SDK

This is a PHP SDK for the Mikrotik RouterOS API.


### Installation

```bash
composer require mikrotik/php-sdk
```

### Usage

Connect to the Mikrotik

```php

use MikrotikSdk\MikrotikSdk;

$mikrotik = new MikrotikSdk;

$connect = $mikrotik->connect('192.168.88.1', 'admin', 'password');
if ($connect) {
    echo 'Connected';
}else{
    echo 'Not Connected';
}

```




