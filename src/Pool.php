<?php

namespace MikrotikSdk;

use MikrotikSdk\MikrotikSdk;


class Pool extends MikrotikSdk
{
  

    public function getPool($ip, $login, $password)
    {
       $connect = $this->connect($ip, $login, $password);
       if ($connect) {
          // Get the pool
          $this->api->write('/ip/pool/print');
          $pool = $this->api->read();
          $this->disconnect();
          return json_encode($pool);
       }else{
            return json_encode(['error' => 'Failed to connect to the Mikrotik']);
       }
    }
}