<?php

namespace MikrotikSdk;

include_once 'RouterosAPI.php';

use RouterosAPI;

class MikrotikSdk
{
    protected $api;

    public function __construct()
    {
        $this->api = new RouterosAPI();
    }

    public function connect($ip, $login, $password)
    {
        return $this->api->connect($ip, $login, $password);
    }

    public function disconnect()
    {
        $this->api->disconnect();
    }

}
