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


    public function addPool($ip, $login, $password, $name, $ranges)
    {
       $connect = $this->connect($ip, $login, $password);
       if ($connect) {
          // Add the pool
          $this->api->write('/ip/pool/add', false);
          $this->api->write('=name='.$name, false);
          $this->api->write('=ranges='.$ranges);
          $pool = $this->api->read();
          $this->disconnect();
          return json_encode($pool);
       }else{
            return json_encode(['error' => 'Failed to connect to the Mikrotik']);
       }
    }
}